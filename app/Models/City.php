<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory;

    public function tripCities()
    {
        return $this->hasMany(TripCity::class);
    }

    public function trips()
    {
        return $this->belongsToMany(Trip::class, 'trip_cities', 'city_id', 'trip_id')
            ->withPivot(['id', 'handler_id', 'status', 'notes'])
            ->withTimestamps();
    }
}
