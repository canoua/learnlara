<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saveLocations extends Model
{
    use HasFactory;

    protected $fillable = [
        'locations-name',
        'locations-longitude',
        'locations-width',
    ];
}
