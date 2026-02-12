@extends('admin.layouts.app')

@section('content')
<div class="p-6 space-y-6">

    <div class="flex justify-between items-center">
        <h2 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Artworks</h2>

        <a href="{{ route('admin.artworks.create') }}"
           class="flex items-center gap-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:scale-105 transition-all duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Artwork
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($artworks as $artwork)
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:scale-105 border border-gray-100">

                {{-- IMAGE --}}
                @if ($artwork->image_path)
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('storage/' . $artwork->image_path) }}"
                             class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110"
                             alt="{{ $artwork->title }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                @else
                    <div class="w-full h-56 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif

                <div class="p-5 space-y-3">

                    {{-- TITLE --}}
                    <h3 class="font-bold text-lg text-gray-800 line-clamp-1">
                        {{ $artwork->title }}
                    </h3>

                    {{-- PRICE --}}
                    @if ($artwork->price)
                        <div class="flex items-center gap-2 bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg p-3">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div class="flex-1">
                                <p class="font-semibold text-purple-700 text-sm">
                                    {{ $artwork->price->title }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $artwork->price->price_label }}
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="bg-red-50 border border-red-200 rounded-lg p-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            <p class="text-sm text-red-600 font-medium">
                                No price linked
                            </p>
                        </div>
                    @endif

                    {{-- DESCRIPTION --}}
                    @if ($artwork->description)
                        <p class="text-sm text-gray-600 line-clamp-2">
                            {{ $artwork->description }}
                        </p>
                    @endif

                    {{-- ACTIONS --}}
                    <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                        <a href="{{ route('admin.artworks.edit', $artwork->id) }}"
                           class="flex items-center gap-1 text-purple-600 text-sm font-semibold hover:text-purple-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('admin.artworks.destroy', $artwork->id) }}"
                              onsubmit="return confirm('Are you sure you want to delete this artwork?')">
                            @csrf
                            @method('DELETE')
                            <button class="flex items-center gap-1 text-red-600 text-sm font-semibold hover:text-red-700 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full mb-4">
                    <svg class="w-10 h-10 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <p class="text-gray-500 text-lg font-medium">No artworks yet.</p>
                <p class="text-gray-400 text-sm mt-2">Start by adding your first artwork!</p>
            </div>
        @endforelse
    </div>

</div>
@endsection