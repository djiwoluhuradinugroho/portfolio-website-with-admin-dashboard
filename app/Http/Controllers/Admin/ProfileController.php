<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

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

    $request->validate([
        'name' => 'required|string|max:255',
        'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'password' => 'nullable|confirmed|min:6',
    ]);

    // UPDATE NAME
    $user->name = $request->name;

    // UPDATE AVATAR
    if ($request->hasFile('avatar')) {

        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $path = $request->file('avatar')->store('avatars', 'public');
        $user->avatar = $path;
    }

    // CHANGE PASSWORD
    if ($request->filled('password')) {

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Password lama salah!');
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Password berhasil diubah!');
    }

    $user->save();

    return back()->with('success', 'Profile berhasil diupdate!');
}
}