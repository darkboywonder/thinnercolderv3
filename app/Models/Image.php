<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }
}
