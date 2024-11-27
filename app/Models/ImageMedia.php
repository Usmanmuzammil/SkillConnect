<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageMedia extends Model
{
    protected $table = 'image_media';

    protected $fillable = [
        'event_id',
        'path',
    ];
}
