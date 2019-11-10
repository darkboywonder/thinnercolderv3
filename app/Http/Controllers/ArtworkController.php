<?php

namespace App\Http\Controllers;

use App\Models\Artwork;

class ArtworkController extends Controller
{
    public function index()
    {
        return view('artwork.index')->with([
            'artwork' => Artwork::latest()->visible()->get(),
        ]);
    }

    public function show(Artwork $artwork)
    {
        return view('artwork.show')->with([
            'artwork' => $artwork->load('specifications'),
        ]);
    }
}
