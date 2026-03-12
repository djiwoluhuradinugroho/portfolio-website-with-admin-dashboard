<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImagePlacement;
use App\Models\Artwork;

class ImagePlacementController extends Controller
{

    public function index()
    {
        $placements = ImagePlacement::with('artworks')->get();
        $artworks = Artwork::all();

        return view('admin.settings.index', compact('placements','artworks'));
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:image_placements,key',
            'label' => 'required'
        ]);

        ImagePlacement::create($request->only('key','label'));

        return redirect()->route('admin.settings.index');
    }

    public function edit(ImagePlacement $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

   public function updateAll(Request $request)
{
    foreach ($request->placements as $placementId => $artworkIds) {

        $placement = ImagePlacement::find($placementId);

        $placement->artworks()->sync($artworkIds);
    }

    return back();
}

    public function destroy(ImagePlacement $setting)
    {
        $setting->delete();

        return back();
    }
}