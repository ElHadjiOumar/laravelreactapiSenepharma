<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;
    protected $table = 'medicament';
    protected $fillable = [
        'sous_sous_therapie_id',
        'medicament_nom',
        'medicament_categorie',
        'medicament_reference',
        'medicament_prix',
    ];

    public function sous_sous_therapie()
    {
        return $this->belongsTo(Sous_sous_therapie::class, 'sous_sous_therapie_id', 'id');
    }
}
