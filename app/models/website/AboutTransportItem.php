<?php

namespace App\models\website;

use Illuminate\Database\Eloquent\Model;

class AboutTransportItem extends Model
{
    const TYPE_FEATURE = 'feature';
    const TYPE_BADGE = 'badge';

    protected $table = 'about_transport_items';
    protected $fillable = ['type', 'title', 'description', 'image', 'sort', 'status'];
}
