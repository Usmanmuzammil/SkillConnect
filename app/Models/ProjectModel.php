<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
   protected $table = 'project_models';

   protected $fillable = [
    'title',
    'description',
    'price',
    'image',
    'whatsapp_num',
    'status',
   ];
}
