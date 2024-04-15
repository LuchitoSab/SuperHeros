<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superheros extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'fullName',
        'strength',
        'speed',
        'durability',
        'power',
        'combat',
        'race',
        'heightM',
        'heightCm',
        'weightLb',
        'weightKg',
        'eyeColor',
        'hairColor',
        'publisher',
    ];


}
