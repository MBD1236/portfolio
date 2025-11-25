<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Education
 *
 * Représente un diplôme ou une formation suivie.
 */
class Education extends Model
{
    protected $fillable = [
        'school',
        'degree',
        'field',
        'start_year',
        'end_year',
        'description',
    ];
}
