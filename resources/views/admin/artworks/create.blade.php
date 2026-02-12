@extends('admin.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6 p-6">

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.artworks.index') }}" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Add New Artwork</h1>
    </div>

    <form method="POST"
          action="{{ route('admin.artworks.store') }}"
          enctype="multipart/form-data"
          class="bg-white/80 backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-gray-100 space-y-6">

        @csrf

        {{-- TITLE --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
            <input type="text"
                   name="title"
                   value="{{ old('title') }}"
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
                      placeholder="Describe your artwork...">{{ old('description') }}</textarea>
        </div>

        {{-- PRICE LIST --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Commission Price</label>
            <select name="commission_price_id"
                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 appearance-none bg-white"
                    required>
                <option value="">— Select Price —</option>
                @foreach ($prices as $price)
                    <option value="{{ $price->id }}">
                        {{ $price->title }} — {{ $price->price_label }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- IMAGE UPLOAD --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Artwork Image</label>

            <div class="relative border-2 border-dashed border-gray-300 rounded-xl p-6 hover:border-purple-500 transition-all duration-200 bg-gray-50/50">
                <input type="file"
                       name="image"
                       accept="image/*"
                       onchange="previewImage(event)"
                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="mt-2 text-sm text-gray-600">Click to upload or drag and drop</p>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                </div>
            </div>

            <img id="preview"
                 class="mt-4 hidden w-full h-64 rounded-xl object-cover border-2 border-gray-200 shadow-lg">
        </div>

        {{-- ACTION --}}
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.artworks.index') }}"
               class="px-6 py-3 text-sm font-semibold rounded-xl border-2 border-gray-300 hover:bg-gray-50 transition-all duration-200">
                Cancel
            </a>

            <button class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all duration-200">
                Save Artwork
            </button>
        </div>

    </form>
</div>

{{-- IMAGE PREVIEW SCRIPT --}}
<script>
function previewImage(event) {
    const img = document.getElementById('preview')
    img.src = URL.createObjectURL(event.target.files[0])
    img.classList.remove('hidden')
}
</script>
@endsection