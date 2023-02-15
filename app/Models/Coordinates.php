<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinates extends Model
{
    use HasFactory;
    protected $fillable = [
        'lat',
        'lng', 
    ];
    
    public function  continent(){
        return $this->hasOne(Continet::class);
    }
    public function  country(){
        return $this->hasOne(Country::class);
    }
    public function  region(){
        return $this->hasOne(Region::class);
    }
    public function  city(){
        return $this->hasOne(City::class);
    }
}
