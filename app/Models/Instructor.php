<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 'instructors';

    protected $fillable = [
        'name',
        'email',
        'desgination',
        'description',
        'image',
        'facebook_link',
        'youtube_link',
        'twitter_link',
        'status'
    ];

}
