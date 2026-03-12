<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ImagePlacement;
use App\Models\Artwork;


class PageController extends Controller
{
    private function getPlacements()
    {
        return ImagePlacement::with('artworks')
            ->get()
            ->keyBy('key');
    }

    public function home()
    {
        $placements = ImagePlacement::with('artworks')
            ->get()
            ->keyBy('key');

        return view('public.home', compact('placements'));
    }
    

    public function about()
    {
        $placements = ImagePlacement::with('artworks')
            ->get()
            ->keyBy('key');

        return view('public.about', compact('placements'));
    }

    public function service()
    {
        $placements = ImagePlacement::with('artworks')
            ->get()
            ->keyBy('key');

        return view('public.service', compact('placements'));
    }

    public function portfolio()
{
    $placements = $this->getPlacements();
    $style = request('style');

    // Query dasar (exclude Logo)
    $query = Artwork::where('style', '!=', 'Logo');

    // Kalau ada filter style
    if ($style) {
        $query->where('style', $style);
    }

    $artworks = $query->latest()->get();

    // Featured hanya muncul kalau TIDAK ada filter
    $featured = null;

    if (!$style) {
        $portfolioImage = $placements['portfolio_image'] ?? null;

        if ($portfolioImage && $portfolioImage->artworks->count()) {
            $featured = $portfolioImage->artworks->first();
        }
    }

    return view('public.portfolio', compact('placements','artworks','featured','style'));
}
    public function how()   // 👈 INI YANG KURANG
    {
        return view('public.how', [
            'placements' => $this->getPlacements()
        ]);
    }
}