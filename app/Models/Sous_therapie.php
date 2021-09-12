<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sous_therapie extends Model
{
    use HasFactory;
    protected $table = 'sous_therapie';
    protected $fillable = [
        'therapie_id',
        'nom',
        'description',
    ];

    public function therapie()
    {
        return $this->belongsTo(Therapie::class, 'therapie_id', 'id');
    }
}
