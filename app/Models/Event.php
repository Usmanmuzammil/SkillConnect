<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'title',
        'description',
    ];

    public function media()
    {
        return $this->hasMany(ImageMedia::class); // or belongsToMany depending on your relationship
    }
}
