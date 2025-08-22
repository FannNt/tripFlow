<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    /** @use HasFactory<\Database\Factories\TripFactory> */
    use HasFactory;

    protected $guarded = [];

    public function cities()
    {
        return $this->belongsToMany(City::class, 'trip_cities', 'trip_id', 'city_id')
            ->withPivot(['id', 'handler_id', 'status', 'notes'])
            ->withTimestamps();
    }

    public function tripCities()
    {
        return $this->hasMany(TripCity::class);
    }

    // Creator of the trip
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
