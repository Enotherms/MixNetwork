<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarouselImage extends Model
{
    protected $fillable = ['base64_image', 'is_active'];

    public $timestamps = true;
}
