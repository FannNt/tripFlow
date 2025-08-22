<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripCity extends Model
{
    /** @use HasFactory<\Database\Factories\TripCityFactory> */
    use HasFactory;
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function handler()
    {
        return $this->belongsTo(User::class, 'handler_id');
    }
}
