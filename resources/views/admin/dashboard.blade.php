@extends('admin.layouts.app')

@section('content')
<div class="space-y-8 p-6 bg-gradient-to-br from-purple-50 via-pink-50 to-blue-50 min-h-screen">

    {{-- WELCOME HEADER --}}
    <div class="mb-8">
        <h1 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
    Welcome {{ auth()->user()->name }}!
</h1>
        <p class="text-gray-600 mt-2">Manage your artworks and commissions</p>
    </div>

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- TOTAL ARTWORKS --}}
        <div class="group relative overflow-hidden bg-gradient-to-br from-purple-500 to-purple-700 p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mt-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-5 rounded-full -ml-12 -mb-12"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-white/80 text-sm font-medium mb-1">Total Artworks</h3>
                <p class="text-4xl font-bold text-white">{{ $totalArtworks }}</p>
            </div>
        </div>

        {{-- ACTIVE PRICE LIST --}}
        <div class="group relative overflow-hidden bg-gradient-to-br from-pink-500 to-rose-700 p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mt-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-5 rounded-full -ml-12 -mb-12"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-white/80 text-sm font-medium mb-1">Active Price List</h3>
                <p class="text-4xl font-bold text-white">{{ $activePrices }}</p>
            </div>
        </div>

        {{-- COMMISSION STATUS --}}
        <div class="group relative overflow-hidden bg-gradient-to-br {{ $commissionStatus === 'open' ? 'from-emerald-500 to-teal-700' : 'from-gray-500 to-gray-700' }} p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mt-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-5 rounded-full -ml-12 -mb-12"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-white/80 text-sm font-medium mb-1">Commission Status</h3>
                <p class="text-3xl font-bold text-white mb-4">
                    {{ strtoupper($commissionStatus) }}
                </p>
                <form method="POST" action="{{ route('admin.commission.toggle') }}">
                    @csrf
                    <button class="w-full px-4 py-2.5 rounded-xl text-sm font-semibold text-white bg-white/20 hover:bg-white/30 backdrop-blur-sm transition-all duration-300 border border-white/30">
                        {{ $commissionStatus === 'open' ? '🔒 Close Commission' : '🔓 Open Commission' }}
                    </button>
                </form>
            </div>
        </div>

    </div>

    {{-- ARTWORK PREVIEW --}}
    <div class="bg-white/60 backdrop-blur-lg rounded-2xl p-6 shadow-xl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                Latest Artworks
            </h2>
            <a href="{{ route('admin.artworks.index') }}"
               class="px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl text-sm font-semibold hover:shadow-lg transition-all duration-300 hover:scale-105">
                View all →
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($artworks as $art)
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:scale-105">

                    {{-- IMAGE WITH OVERLAY --}}
                    <div class="relative overflow-hidden">
                        <img
                            src="{{ asset('storage/' . $art->image_path) }}"
                            class="h-56 w-full object-cover transition-transform duration-500 group-hover:scale-110"
                            alt="{{ $art->title }}"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <div class="p-5 space-y-3">

                        {{-- TITLE --}}
                        <h3 class="font-bold text-lg text-gray-800 line-clamp-1">
                            {{ $art->title }}
                        </h3>

                        {{-- DESCRIPTION --}}
                        @if ($art->description)
                            <p class="text-sm text-gray-600 line-clamp-2">
                                {{ $art->description }}
                            </p>
                        @else
                            <p class="text-sm text-gray-400 italic">
                                No description
                            </p>
                        @endif

                        {{-- PRICE TAG --}}
                        @if ($art->price)
                            <div class="flex items-center gap-2 pt-2 border-t border-gray-100">
                                <div class="flex-1 bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg p-3">
                                    <p class="text-xs text-gray-500 mb-1">Price Category</p>
                                    <p class="font-semibold text-purple-700">
                                        {{ $art->price->title }}
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ $art->price->price_label }}
                                    </p>
                                </div>
                            </div>
                        @else
                            <div class="bg-red-50 border border-red-200 rounded-lg p-3">
                                <p class="text-sm text-red-600 font-medium">
                                    ⚠ No price linked
                                </p>
                            </div>
                        @endif

                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500">No artworks yet. Create your first masterpiece!</p>
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection