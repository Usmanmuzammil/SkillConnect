<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{

    protected $guards = 'faculty';
    protected $table = 'teachers';

    protected $fillable = [
        'name',
        'email',
        'password',
        'desgination',
        'description',
        'image',
        'facebook_link',
        'youtube_link',
        'twitter_link',
        'status'
    ];
}
