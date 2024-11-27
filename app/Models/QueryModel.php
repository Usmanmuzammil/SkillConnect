<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueryModel extends Model
{
    protected $table = 'query_models';

    protected $fillable = [
        'name',
        'email',
        'query',
    ];
}
