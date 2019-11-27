<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $table = 'artwork';
    protected $casts = [
        'is_sellable' => 'boolean',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
