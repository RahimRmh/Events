<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallImage extends Model
{
    use HasFactory;
    
    protected $fillable = ['hall_id', 'path'];

    // Define the relationship with the Hall model
    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
