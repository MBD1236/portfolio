<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 *
 * Messages envoyés via le formulaire.
 */
class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
        'is_read',
    ];
}
