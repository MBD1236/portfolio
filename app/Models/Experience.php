<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Experience
 *
 * Expériences professionnelles : stage, job, freelance.
 */
class Experience extends Model
{
    protected $fillable = [
        'title',
        'company',
        'location',
        'experience_type',
        'description',
        'start_date',
        'end_date',
        'is_current',
    ];
}
