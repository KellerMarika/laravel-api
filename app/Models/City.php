<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [

        'nome',
        'zip_code',
        'population',//to drop

        'region_id',
        'coordinates_id',
    ];
    public function coordinates()
    {
        return $this->belongsTo(Coordinates::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    /* indico un nome diverso per la forein key */
    public function capital_of_country()
    {
        return $this->hasOne(Country::class,"capital_id");
    }

 /* indico un nome diverso per la forein key */
    public function capital_of_region()
    {
        return $this->hasOne(Region::class,"capital_id");
    }
}