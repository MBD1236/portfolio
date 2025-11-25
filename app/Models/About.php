<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class About
 *
 * Informations personnelles du portfolio.
 */
class About extends Model
{
    protected $fillable = [
        'name',
        'title',
        'bio',
        'profile_image',
        'cv_file',
        'email',
        'phone',
        'location',
        'github_url',
        'linkedin_url',
        'facebook_url',
    ];
}
