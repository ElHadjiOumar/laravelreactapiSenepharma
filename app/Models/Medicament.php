<?php

namespace App\Models;

use App\Models\Sous_sous_therapie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;
    protected $table = 'medicament';
    protected $fillable = [
        'medicament_nom',
        'medicament_prix',
        'status',
        'DCI',
        'tableau',
        'forme',
        'dosage',
        'classe_therapeutique',
        'posologie',
        'image',

    ];
}
