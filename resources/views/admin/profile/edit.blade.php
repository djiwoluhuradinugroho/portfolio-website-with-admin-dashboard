@extends('admin.layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow p-6">
    <h2 class="text-xl font-semibold mb-6">Profile</h2>

    @if(session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    {{-- CURRENT PROFILE --}}
    <div class="flex items-center gap-4 mb-6">
        <img
            src="{{ $user->avatar
                ? asset('storage/' . $user->avatar)
                : asset('images/default-avatar.png') }}"
            class="w-24 h-24 rounded-full object-cover border"
        >

        <div>
            <p class="font-medium">{{ $user->name }}</p>
            <p class="text-sm text-gray-500">{{ $user->email }}</p>
        </div>
    </div>
    {{-- UPDATE FORM --}}
    <form
        action="{{ route('admin.profile.update') }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-4"
    >
        @csrf

        {{-- NAME --}}
        <div>
            <label class="block mb-1 text-sm font-medium">
                Nama
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $user->name) }}"
                class="block w-full border rounded-lg p-2"
                required
            >

            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- AVATAR --}}
        <div>
            <label class="block mb-1 text-sm font-medium">
                Update Profile Picture
            </label>

            <input
                type="file"
                name="avatar"
                accept="image/*"
                class="block w-full text-sm border rounded-lg cursor-pointer"
            >

            @error('avatar')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        {{-- CHANGE PASSWORD --}}
<div class="pt-6 border-t mt-6 space-y-4">

    <h3 class="text-lg font-semibold">Change Password</h3>

    {{-- CURRENT PASSWORD --}}
    <div>
        <label class="block mb-1 text-sm font-medium">
            Current Password
        </label>

        <input
            type="password"
            name="current_password"
            class="block w-full border rounded-lg p-2"
        >

        @error('current_password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- NEW PASSWORD --}}
    <div>
        <label class="block mb-1 text-sm font-medium">
            New Password
        </label>

        <input
            type="password"
            name="password"
            class="block w-full border rounded-lg p-2"
        >

        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- CONFIRM PASSWORD --}}
    <div>
        <label class="block mb-1 text-sm font-medium">
            Confirm Password
        </label>

        <input
            type="password"
            name="password_confirmation"
            class="block w-full border rounded-lg p-2"
        >
    </div>

</div>
        {{-- SUBMIT --}}
        <button
            type="submit"
            class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800"
        >
            Update Profile
        </button>
    </form>
</div>
@endsection
