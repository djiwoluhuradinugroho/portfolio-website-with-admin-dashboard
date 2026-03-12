@extends('admin.layouts.app')

@section('content')
<div class="p-6 space-y-6" style="background:#f5f5f5;min-height:100vh;">

    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold tracking-tight" style="color:#0d0d0d;">Artworks</h2>

        <a href="{{ route('admin.artworks.create') }}"
           class="flex items-center gap-2 px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 hover:-translate-y-0.5"
           style="background:#0d0d0d;color:#fff;box-shadow:0 4px 12px rgba(0,0,0,0.15);">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Artwork
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($artworks as $artwork)
            <div class="group rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-1"
                 style="background:#fff;border:1px solid #ebebeb;box-shadow:0 2px 12px rgba(0,0,0,0.05);">

                {{-- IMAGE --}}
                @if ($artwork->image_path)
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('storage/'.$artwork->image_path) }}"
                             class="w-full h-52 object-cover transition-transform duration-500 group-hover:scale-105"
                             alt="{{ $artwork->title }}">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                             style="background:linear-gradient(to top,rgba(0,0,0,0.35),transparent);"></div>
                    </div>
                @else
                    <div class="w-full h-52 flex items-center justify-center" style="background:#f5f5f5;">
                        <svg class="w-14 h-14" style="color:#ccc;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif

                <div class="p-5 space-y-3">

                    {{-- TITLE --}}
                    <h3 class="font-bold text-base" style="color:#0d0d0d;">
                        {{ $artwork->title }}
                    </h3>

                    {{-- STYLE --}}
                    @if($artwork->style)
                        <span class="inline-block text-xs font-semibold px-3 py-1 rounded-full"
                              style="background:#f0f0f0;color:#555;">
                            {{ $artwork->style }}
                        </span>
                    @else
                        <span class="inline-block text-xs font-semibold px-3 py-1 rounded-full"
                              style="background:#f5f5f5;color:#bbb;">
                            No Style
                        </span>
                    @endif

                    {{-- PRICE --}}
                    @if ($artwork->price)
                        <div class="flex items-center gap-2 rounded-lg p-3" style="background:#f8f8f8;">
                            <svg class="w-4 h-4 shrink-0" style="color:#888;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2"></path>
                            </svg>
                            <div class="flex-1">
                                <p class="font-semibold text-sm" style="color:#0d0d0d;">
                                    {{ $artwork->price->title }}
                                </p>
                                <p class="text-xs" style="color:#aaa;">
                                    {{ $artwork->price->price_label }}
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="rounded-lg p-3" style="background:#fff5f5;border:1px solid #fecaca;">
                            <p class="text-sm font-medium" style="color:#e74c3c;">No price linked</p>
                        </div>
                    @endif

                    {{-- DESCRIPTION --}}
                    @if ($artwork->description)
                        <p class="text-sm line-clamp-2" style="color:#888;">
                            {{ $artwork->description }}
                        </p>
                    @endif

                    {{-- ACTIONS --}}
                    <div class="flex justify-between items-center pt-3" style="border-top:1px solid #f0f0f0;">
                        <a href="{{ route('admin.artworks.edit', $artwork->id) }}"
                           class="text-sm font-semibold transition-colors duration-150 hover:opacity-60"
                           style="color:#0d0d0d;">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('admin.artworks.destroy', $artwork->id) }}"
                              onsubmit="return confirm('Are you sure you want to delete this artwork?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-sm font-semibold transition-colors duration-150"
                                    style="color:#e74c3c;background:none;border:none;cursor:pointer;">
                                Delete
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4" style="background:#f0f0f0;">
                    <svg class="w-8 h-8" style="color:#ccc;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <p style="color:#aaa;">No artworks yet.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection