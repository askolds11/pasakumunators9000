<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Pasakums  model usage

class Pasakums extends Model
{
    use HasFactory;

    protected $fillable = ['nosaukums','apraksts','datums','norises_ilgums','norises_vieta','cena','veidotajs_id'];
    protected $table = 'pasakums';
}
