<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Project
 *
 * Projet du portfolio.
 */
class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'thimbnail',
        'demo_url',
        'github_url',
        'status',
    ];

    /**
     * Un projet peut utiliser plusieurs technologies.
     */
    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class, 'project_technologies');
    }
}
