<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dish extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'price',
        'dish_image',
        
    ];
    public function halls(){
        return $this->belongsToMany(hall::class);
    }
    public function reservations(){
        return $this->belongsToMany(reservation::class);
    }
}
