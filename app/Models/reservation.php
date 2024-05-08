<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $fillable = [
        'user_id',
        'hall_id',
        'time_id',
        'car_id',
        
        'Date',
        'Total_price',
        'status',
        'notes'
    ];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function hall(){
        return $this->belongsTo(hall::class);
    }

    public function time(){
        return $this->belongsTo(time::class);
    }
    public function car(){
        return $this->belongsTo(car::class);
    }
    public function dishes(){
        return $this->belongsToMany(dish::class);
    }
}
