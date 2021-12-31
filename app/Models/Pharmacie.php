<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacie extends Model
{
    use HasFactory;
    protected $table = 'pharmacie';
    protected $fillable = [
        'pharmacie_nom',
        'pharmacie_adresse',
        'pharmacie_numero',
        'longitude',
        'lattitude',
        'region',
        'commune',
        'department',
        'status',
        'map_link',
    ];
}
