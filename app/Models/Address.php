<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'route_name',
        'route_number',
        'city_name',
        'zip_code',
        'country_name',
        'country_code'
        /* country_id
        city_id
        request_ip_id */
    ];
    
    public function userDetail()
    {
        return $this->hasOne(UserDetail::class);
    }
}
