<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Models\ImagePlacement;

class SiteSettingController extends Controller
{
    public function index()
{
    $artworks = Artwork::all();

    $placements = ImagePlacement::with('artwork')->get();

    return view('admin.settings.index', compact(
        'artworks',
        'placements'
    ));
}

    public function update(Request $request)
{
    foreach($request->placements as $key => $artworkId){

        ImagePlacement::where('key',$key)
            ->update(['artwork_id'=>$artworkId]);
    }

    return back()->with('success','Placement updated');
}
}