<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Skill
 *
 * Compétence classée par catégorie.
 */
class Skill extends Model
{
    protected $fillable = [
        'name',
        'level',
        'category_id',
    ];

    /**
     * La compétence appartient à une catégorie.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
