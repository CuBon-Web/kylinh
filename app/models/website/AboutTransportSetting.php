<?php

namespace App\models\website;

use Illuminate\Database\Eloquent\Model;

class AboutTransportSetting extends Model
{
    protected $table = 'about_transport_settings';
    protected $fillable = [
        'section_title',
        'subtitle',
        'intro_content',
        'main_image',
        'gallery_images',
        'quote_text',
        'quote_icon',
        'footer_text',
    ];

    public function getGalleryListAttribute()
    {
        $raw = $this->gallery_images;
        if (is_array($raw)) {
            return array_values($raw);
        }
        $decoded = json_decode((string) $raw, true);
        return is_array($decoded) ? array_values($decoded) : [];
    }
}
