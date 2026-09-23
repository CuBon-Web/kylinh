<?php

namespace App\models\website;

use Illuminate\Database\Eloquent\Model;

class ProfileAttestation extends Model
{
    protected $table = 'profile_attestations';
    protected $fillable = ['title', 'image', 'sort', 'status'];
}
