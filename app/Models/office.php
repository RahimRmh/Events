<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class office extends Model
{
    use HasFactory;
    public function cars(){
        return $this->hasMany(car::class);
    }
}
