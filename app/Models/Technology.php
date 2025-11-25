<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Technology
 *
 * Technologies utilisées dans les projets.
 */
class Technology extends Model
{
    protected $fillable = [
        'name',
        'icon',
    ];

    /**
     * Une technologie peut appartenir à plusieurs projets.
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_technologies');
    }
}
