<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\LietotajsLoma;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param string $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if(!Auth::check()) abort(404);

        foreach($roles as $role)
        {
            $userroles = LietotajsLoma::where('users_id', '=', Auth::user()->id)
                        ->join('loma', 'lietotajsloma.loma_id', '=', 'loma.id')
                        ->where('loma.nosaukums', $role)
                        ->get();
            if(!$userroles->isEmpty()) break;
        }

        if($userroles->isEmpty())
        {
            abort(404);
        }

        return $next($request);
    }
}
