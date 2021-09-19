<?php

namespace App\Models;

use App\Models\Therapie;
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
        'status',
    ];

    protected $with = ['therapie'];
    public function therapie()
    {
        return $this->belongsTo(Therapie::class, 'therapie_id', 'id');
    }
}
