@extends('admin.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6 p-6" style="min-height:100vh;">

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.artworks.index') }}"
           class="p-2 rounded-lg transition-colors hover:bg-black/5"
           style="color:#555;">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h1 class="text-2xl font-bold tracking-tight" style="color:#0d0d0d;">Edit Artwork</h1>
    </div>

    <form method="POST"
          action="{{ route('admin.artworks.update', $artwork) }}"
          enctype="multipart/form-data"
          class="p-8 rounded-2xl space-y-6"
          style="background:#fff;border:1px solid #ebebeb;box-shadow:0 2px 16px rgba(0,0,0,0.06);">

        @csrf
        @method('PUT')

        {{-- TITLE --}}
        <div>
            <label class="block text-sm font-semibold mb-2" style="color:#333;">Title</label>
            <input type="text"
                   name="title"
                   value="{{ $artwork->title }}"
                   class="w-full rounded-xl px-4 py-3 text-sm focus:outline-none transition-all duration-200"
                   style="border:1.5px solid #e2e2e2;color:#0d0d0d;background:#fff;"
                   onfocus="this.style.borderColor='#0d0d0d'"
                   onblur="this.style.borderColor='#e2e2e2'"
                   required>
        </div>

        {{-- DESCRIPTION --}}
        <div>
            <label class="block text-sm font-semibold mb-2" style="color:#333;">Description</label>
            <textarea name="description"
                      rows="4"
                      class="w-full rounded-xl px-4 py-3 text-sm focus:outline-none transition-all duration-200 resize-none"
                      style="border:1.5px solid #e2e2e2;color:#0d0d0d;background:#fff;"
                      onfocus="this.style.borderColor='#0d0d0d'"
                      onblur="this.style.borderColor='#e2e2e2'">{{ old('description', $artwork->description) }}</textarea>
        </div>

        {{-- STYLE --}}
        <div>
            <label class="block text-sm font-semibold mb-2" style="color:#333;">Style</label>
            <input type="text"
                   name="style"
                   value="{{ old('style', $artwork->style) }}"
                   class="w-full rounded-xl px-4 py-3 text-sm focus:outline-none transition-all duration-200"
                   style="border:1.5px solid #e2e2e2;color:#0d0d0d;background:#fff;"
                   onfocus="this.style.borderColor='#0d0d0d'"
                   onblur="this.style.borderColor='#e2e2e2'"
                   placeholder="Ex: Manga Art, Anime Style, Character Design">
        </div>

        {{-- PRICE --}}
        <div>
            <label class="block text-sm font-semibold mb-2" style="color:#333;">Commission Price</label>
            <select name="commission_price_id"
                    class="w-full rounded-xl px-4 py-3 text-sm focus:outline-none transition-all duration-200 appearance-none"
                    style="border:1.5px solid #e2e2e2;color:#0d0d0d;background:#fff;"
                    onfocus="this.style.borderColor='#0d0d0d'"
                    onblur="this.style.borderColor='#e2e2e2'"
                    required>
                @foreach($prices as $price)
                    <option value="{{ $price->id }}"
                        {{ $artwork->commission_price_id == $price->id ? 'selected' : '' }}>
                        {{ $price->title }} — {{ $price->price_label }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- CURRENT IMAGE --}}
        @if($artwork->image_path)
            <div>
                <label class="block text-sm font-semibold mb-2" style="color:#333;">Current Image</label>
                <img id="previewImage"
                     src="{{ asset('storage/'.$artwork->image_path) }}"
                     class="w-full h-64 rounded-xl object-cover"
                     style="border:1px solid #ebebeb;">
            </div>
        @endif

        {{-- UPLOAD --}}
        <div>
            <label class="block text-sm font-semibold mb-2" style="color:#333;">Change Image <span style="color:#bbb;font-weight:400;">(optional)</span></label>
            <div class="relative rounded-xl p-6 text-center transition-all duration-200"
                 style="border:2px dashed #e2e2e2;background:#fafafa;"
                 onmouseover="this.style.borderColor='#0d0d0d'"
                 onmouseout="this.style.borderColor='#e2e2e2'">
                <input type="file"
                       id="imageInput"
                       name="image"
                       accept="image/*"
                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                <svg class="mx-auto w-8 h-8 mb-2" style="color:#ccc;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <p class="text-sm" style="color:#888;">Click to upload new image</p>
                <p class="text-xs mt-1" style="color:#bbb;">PNG, JPG, GIF up to 10MB</p>
            </div>
        </div>

        {{-- ACTIONS --}}
        <div class="flex justify-end gap-3 pt-4" style="border-top:1px solid #f0f0f0;">
            <a href="{{ route('admin.artworks.index') }}"
               class="px-6 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 hover:bg-black/5"
               style="border:1.5px solid #e2e2e2;color:#555;">
                Cancel
            </a>
            <button type="submit"
                    class="px-6 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 hover:-translate-y-0.5"
                    style="background:#0d0d0d;color:#fff;box-shadow:0 4px 12px rgba(0,0,0,0.15);">
                Update Artwork
            </button>
        </div>

    </form>
</div>
@endsection

@push('scripts')
<script>
const input = document.getElementById('imageInput');
const preview = document.getElementById('previewImage');

if (input) {
    input.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(event) {
            if (preview) {
                preview.src = event.target.result;
            }
        };
        reader.readAsDataURL(file);
    });
}
</script>
@endpush