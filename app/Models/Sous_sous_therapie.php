<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sous_sous_therapie extends Model
{
    use HasFactory;
    protected $table = 'sous_sous_therapie';
    protected $fillable = [
        'sous_therapie_id',
        'nom',
        'description',
    ];

    public function sous_therapie()
    {
        return $this->belongsTo(Sous_therapie::class, 'sous_therapie_id', 'id');
    }
}
