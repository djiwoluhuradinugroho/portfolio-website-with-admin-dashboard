<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\CommissionPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
    public function index()
    {
        $artworks = Artwork::with('price')
            ->latest()
            ->get();

        return view('admin.artworks.index', compact('artworks'));
    }

    public function create()
    {
        $prices = CommissionPrice::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('admin.artworks.create', compact('prices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'commission_price_id' => 'required|exists:commission_prices,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('artworks', 'public');

        Artwork::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description, // ✅ SIMPAN
            'commission_price_id' => $request->commission_price_id,
            'image_path' => $imagePath,
        ]);

        return redirect()
            ->route('admin.artworks.index')
            ->with('success', 'Artwork berhasil ditambahkan');
    }

    public function edit(Artwork $artwork)
    {
        $prices = CommissionPrice::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('admin.artworks.edit', compact('artwork', 'prices'));
    }

    public function update(Request $request, Artwork $artwork)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'commission_price_id' => 'required|exists:commission_prices,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description, // ✅ FIX UTAMA
            'commission_price_id' => $request->commission_price_id,
        ];

        if ($request->hasFile('image')) {
            if ($artwork->image_path) {
                Storage::disk('public')->delete($artwork->image_path);
            }

            $data['image_path'] = $request->file('image')
                ->store('artworks', 'public');
        }

        $artwork->update($data);

        return redirect()
            ->route('admin.artworks.index')
            ->with('success', 'Artwork berhasil diupdate');
    }

    public function destroy(Artwork $artwork)
    {
        if ($artwork->image_path) {
            Storage::disk('public')->delete($artwork->image_path);
        }

        $artwork->delete();

        return redirect()
            ->route('admin.artworks.index')
            ->with('success', 'Artwork berhasil dihapus');
    }
}
