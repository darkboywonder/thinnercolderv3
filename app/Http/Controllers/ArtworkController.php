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
        $artwork->load('specifications');

        $pricing = $artwork->specifications->groupBy(function ($specification) {
            return $specification->material->type;
        })->map(function ($material_specification_group) {
            return $material_specification_group->mapWithKeys(function ($specification) {
                return [
                    $specification->size->dimension => [
                        'price' => $specification->price,
                        'paypal' => $specification->paypal,
                    ],
                ];
            });
        });
        return view('artwork.show')->with([
            'artwork' => $artwork,
            'pricing' => $pricing,
        ]);
    }
}
