<?php

namespace App\Http\Controllers;

use App\Models\Design;

class DesignsController extends Controller
{
    public function index()
    {
        return view('designs.index')->with([
            'designs' => Design::visible()->latest()->get(),
        ]);
    }

    public function show(Design $design)
    {
        return view('designs.show')->with(['design' => $design]);
    }
}
