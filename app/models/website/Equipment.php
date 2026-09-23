<?php

namespace App\models\website;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';
    protected $fillable = ['title', 'description', 'image', 'art', 'sort', 'status'];
}
