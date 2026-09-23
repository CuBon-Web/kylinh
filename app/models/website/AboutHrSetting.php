<?php

namespace App\models\website;

use Illuminate\Database\Eloquent\Model;

class AboutHrSetting extends Model
{
    protected $table = 'about_hr_settings';
    protected $fillable = [
        'section_title',
        'subtitle',
        'intro_content',
        'main_image',
        'training_title',
        'health_title',
        'health_image',
        'health_text',
        'health_badge_image',
        'footer_text',
    ];
}
