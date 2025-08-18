<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    public function tripCity()
    {
        return $this->belongsTo(TripCity::class);
    }

    // User who completed the task (nullable)
    public function completedBy()
    {
        return $this->belongsTo(User::class, 'completed_by_id');
    }

    // Backward-compatible alias
    public function user()
    {
        return $this->completedBy();
    }
}
