<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = ['name'];

    // Define the many-to-many relationship with ProjectList model
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(ProjectList::class, 'project_tag', 'tag_id', 'project_id');
    }
}
