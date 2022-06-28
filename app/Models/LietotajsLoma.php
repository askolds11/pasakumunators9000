<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//LietotajsLoma  model usage

class LietotajsLoma extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'loma_id'];
    protected $table = 'lietotajsloma';
}
