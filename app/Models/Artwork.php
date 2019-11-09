<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $table = 'artwork';

    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
