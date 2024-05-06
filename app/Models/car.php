<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;
    protected $fillable = [
        'model',
      
        'office_id',
        
    ];
    public function halls(){
        return $this->belongsToMany(hall::class);
    }
    public function office(){
        return $this->belongsTo(office::class);
    }
}