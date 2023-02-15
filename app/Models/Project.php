<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\PDO\PostgresDriver;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [

        'title',
        'completed',
        'cover_img',
        'description',
        'github_link',

        'type_id',
        'level_id',
        /*        'languages_id', */
        'user_id',
    ];


    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /* languages many to many? */

    public function posts()
    {
        return $this->hasMany(PostgresDriver::class);
    }
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
    public function tecnologies()
    {
        return $this->belongsToMany(Tecnology::class);
    }

}