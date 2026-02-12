@extends('admin.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6 p-6">

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.artworks.index') }}" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Edit Artwork</h1>
    </div>

    <form method="POST"
          action="{{ route('admin.artworks.update', $artwork->id) }}"
          enctype="multipart/form-data"
          class="bg-white/80 backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-gray-100 space-y-6">

        @csrf
        @method('PUT')

        {{-- TITLE --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $artwork->title) }}"
                   class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                   placeholder="Enter artwork title"
                   required>
        </div>

        {{-- DESCRIPTION --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
            <textarea name="description"
                      rows="4"
                      class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                      placeholder="Describe your artwork...">{{ old('description', $artwork->description) }}</textarea>
        </div>

        {{-- PRICE LIST --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Commission Price</label>
            <select name="commission_price_id"
                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 appearance-none bg-white"
                    required>
                @foreach ($prices as $price)
                    <option value="{{ $price->id }}"
                        {{ $artwork->commission_price_id == $price->id ? 'selected' : '' }}>
                        {{ $price->title }} — {{ $price->price_label }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- CURRENT IMAGE --}}
        @if ($artwork->image_path)
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Current Image</label>
                <div class="relative group">
                    <img src="{{ asset('storage/' . $artwork->image_path) }}"
                         class="w-full h-64 rounded-xl object-cover border-2 border-gray-200 shadow-lg">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl"></div>
                </div>
            </div>
        @endif

        {{-- CHANGE IMAGE --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Change Image <span class="text-gray-400 text-xs font-normal">(optional)</span>
            </label>
            <div class="relative border-2 border-dashed border-gray-300 rounded-xl p-6 hover:border-purple-500 transition-all duration-200 bg-gray-50/50">
                <input type="file"
                       name="image"
                       accept="image/*"
                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    <p class="mt-2 text-sm text-gray-600">Click to upload new image</p>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                </div>
            </div>
        </div>

        {{-- ACTION --}}
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.artworks.index') }}"
               class="px-6 py-3 text-sm font-semibold rounded-xl border-2 border-gray-300 hover:bg-gray-50 transition-all duration-200">
                Cancel
            </a>

            <button class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all duration-200">
                Update Artwork
            </button>
        </div>

    </form>
</div>
@endsection