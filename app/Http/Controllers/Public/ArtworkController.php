<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Artwork;

class ArtworkController extends Controller
{
    // GALLERY
    public function index()
    {
        $artworks = Artwork::with('price')
            ->latest()
            ->get();

        return view('public.artworks.index', compact('artworks'));
    }

    // DETAIL ARTWORK
    public function show(Artwork $artwork)
    {
        return view('public.artworks.show', compact('artwork'));
    }
}
