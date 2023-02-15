<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [

        'profile_img',
        'cover_img',
        'primary_color',
        'secondary_color',
        
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
