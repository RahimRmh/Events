<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hall extends Model
{
    use HasFactory;
    protected $fillable = ['name','capacity','location','price','category','description','hall_image'];
    
    public function reservations(){
        return $this->hasMany(reservation::class);
    }
    public function cars(){
        return $this->belongsToMany(car::class);
    }
    public function dishes(){
        return $this->belongsToMany(dish::class);
    }
    public function singers(){
        return $this->belongsToMany(Singer::class);
    }
    public function images(){
        return $this->hasMany(HallImage::class);
    }
}
