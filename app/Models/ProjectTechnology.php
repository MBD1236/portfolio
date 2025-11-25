<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Pivot entre projets et technologies.
 */
class ProjectTechnology extends Pivot
{
    protected $table = 'project_technologies';
}
