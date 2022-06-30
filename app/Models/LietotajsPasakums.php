<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//LietotajsPasakums  model usage

class LietotajsPasakums extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'pasakums_id'];
    protected $table = 'lietotajspasakums';
}
