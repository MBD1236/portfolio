<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Certification
 *
 * Diplômes, certificats ou attestations.
 */
class Certification extends Model
{
    protected $fillable = [
        'title',
        'institution',
        'date_obtained',
        'credential_url',
        'file_path',
    ];
}
