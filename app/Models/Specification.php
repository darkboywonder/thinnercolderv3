<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    public function material()
    {
        return $this->belongsTo(Material::class, 'materials_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'sizes_id');
    }

    public function Artwork()
    {
        return $this->belongsTo(Artwork::class, 'artwork_id');
    }
}
