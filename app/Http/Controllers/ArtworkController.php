<?php

namespace App\Http\Controllers;

use App\Models\Artwork;

class ArtworkController extends Controller
{
    public function index()
    {
        return view('artwork.index')->with([
            'artwork' => Artwork::with('specifications')->latest()->visible()->get(),
        ]);
    }

    public function show(Artwork $artwork)
    {
        return view('artwork.show')->with([
            'artwork' => $artwork,
        ]);
    }
}
