<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;
    protected $fillable = [
        'model',
        'car_image',
        'price',
        'office_id',
        
    ];

    public function halls(){
        return $this->belongsToMany(hall::class);
    }
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
    public function office(){
        return $this->belongsTo(office::class);
    }
}
