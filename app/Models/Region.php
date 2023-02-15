<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function coordinates()
    {
        return $this->belongsTo(Coordinates::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    
 /* indico un nome diverso per la forein key */
    public function capital()
    {
        return $this->belongsTo(City::class, "capital_id");
    }
}