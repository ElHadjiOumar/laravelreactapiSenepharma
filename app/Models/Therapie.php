<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Therapie extends Model
{
    use HasFactory;
    protected $table = 'therapie';
    protected $fillable = [
        'nom',
        'description',
        'status',
    ];
}
