<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Attels model usage

class Attels extends Model
{
    use HasFactory;

    protected $fillable = ['apraksts', 'datums', 'pasakums_id', 'picture'];
    protected $table = 'attels';
}
