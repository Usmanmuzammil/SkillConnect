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
        'category',
        'country',
        'year_of_experience',
        'facebook_link',
        'twitter_link',
        'youtube_link',
        'description',
        'image',
        'status'
    ];
}
