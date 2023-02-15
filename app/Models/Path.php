<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* use Illuminate\Database\Eloquent\Casts\Attribute; */

class Path extends Model
{
    use HasFactory;

    protected $fillable = [

        'title',
        'code',
        'path',
    ];
    public function  continent(){
        return $this->hasOne(Continet::class,'path_code','code');
    }
/*     protected function data(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }  */
}