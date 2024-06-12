<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectList extends Model
{
    protected $table = 'project_list'; // Ensure this matches the table name in your migration

    protected $fillable = ['name', 'description', 'date', 'image'];

    // Define the relationship with the Portfolio model
    public function portfolios(): HasMany
    {
        return $this->hasMany(Portfolio::class, 'project_id');
    }

    // Define the many-to-many relationship with Tag model
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'project_tag', 'project_list_id', 'tag_id');
    }
}
