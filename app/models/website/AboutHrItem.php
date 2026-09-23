<?php

namespace App\models\website;

use Illuminate\Database\Eloquent\Model;

class AboutHrItem extends Model
{
    const TYPE_FEATURE = 'feature';
    const TYPE_TRAINING = 'training';

    protected $table = 'about_hr_items';
    protected $fillable = ['type', 'title', 'description', 'image', 'sort', 'status'];
}
