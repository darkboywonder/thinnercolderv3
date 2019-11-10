<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
