<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
public function edit()
{
    return view('admin.profile.edit', [
        'user' => Auth::user()
    ]);
}

    public function update(Request $request)
    {
        $user = Auth::user();

        // VALIDATION
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // UPDATE NAME
        $user->name = $request->name;

        // 🔥 HANDLE AVATAR
        if ($request->hasFile('avatar')) {

            // hapus avatar lama (kalau ada)
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            // simpan avatar baru
            $path = $request->file('avatar')->store('avatars', 'public');

            // simpan path ke DB
            $user->avatar = $path;
        }

        // SAVE USER
        $user->save();

        return back()->with('success', 'Profile berhasil diupdate!');
    }
}
