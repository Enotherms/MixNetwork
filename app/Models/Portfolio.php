<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Portfolio extends Model
{
    protected $fillable = ['name', 'description', 'project_id'];

    // Relationship with ProjectList
    public function project(): BelongsTo
    {
        return $this->belongsTo(ProjectList::class, 'project_id');
    }

    // Relationship with Tag
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'portfolio_tag', 'portfolio_id', 'tag_id');
    }

    // Relationship with PortfolioImage
    public function images(): HasMany
    {
        return $this->hasMany(PortfolioImage::class);
    }
}
