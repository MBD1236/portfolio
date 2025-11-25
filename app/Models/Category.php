<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 *
 * Catégories pour organiser skills ou projets.
 */
class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * Une catégorie peut avoir plusieurs skills.
     */
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }
}
