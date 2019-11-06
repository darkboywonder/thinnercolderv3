<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $table = 'artwork';

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
