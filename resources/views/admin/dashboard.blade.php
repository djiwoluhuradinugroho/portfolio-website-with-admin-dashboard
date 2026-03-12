@extends('admin.layouts.app')

@section('content')
<div class="space-y-6 p-4 sm:p-6 min-h-screen" style="background:#f5f5f5;">

    {{-- WELCOME HEADER --}}
    <div class="mb-4 sm:mb-8">
        <h1 class="text-2xl sm:text-4xl font-bold tracking-tight" style="color:#0d0d0d;">
            Welcome, {{ auth()->user()->name }}
        </h1>
        <p class="mt-2 text-sm sm:text-base" style="color:#999;">Manage your artworks and commissions</p>
    </div>

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

        {{-- TOTAL ARTWORKS --}}
        <div class="relative overflow-hidden p-5 sm:p-6 rounded-2xl transition-all duration-300 hover:-translate-y-1"
             style="background:#0d0d0d;box-shadow:0 4px 24px rgba(0,0,0,0.12);">
            <div class="absolute top-0 right-0 w-32 h-32 rounded-full -mr-16 -mt-16"
                 style="background:rgba(255,255,255,0.04);"></div>
            <div class="relative z-10">
                <div class="p-3 rounded-xl inline-flex mb-4" style="background:rgba(255,255,255,0.08);">
                    <svg class="w-5 h-5" style="color:rgba(255,255,255,0.7);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium mb-1" style="color:rgba(255,255,255,0.45);">Total Artworks</p>
                <p class="text-4xl font-bold" style="color:#fff;">{{ $totalArtworks }}</p>
            </div>
        </div>

        {{-- ACTIVE PRICE LIST --}}
        <div class="relative overflow-hidden p-5 sm:p-6 rounded-2xl transition-all duration-300 hover:-translate-y-1"
             style="background:#fff;border:1px solid #e8e8e8;box-shadow:0 4px 24px rgba(0,0,0,0.06);">
            <div class="absolute top-0 right-0 w-32 h-32 rounded-full -mr-16 -mt-16"
                 style="background:rgba(0,0,0,0.02);"></div>
            <div class="relative z-10">
                <div class="p-3 rounded-xl inline-flex mb-4" style="background:#f5f5f5;">
                    <svg class="w-5 h-5" style="color:#555;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium mb-1" style="color:#aaa;">Active Price List</p>
                <p class="text-4xl font-bold" style="color:#0d0d0d;">{{ $activePrices }}</p>
            </div>
        </div>

        {{-- COMMISSION STATUS --}}
        <div class="relative overflow-hidden p-5 sm:p-6 rounded-2xl transition-all duration-300 hover:-translate-y-1 sm:col-span-2 lg:col-span-1"
             style="background:#fff;border:1px solid #e8e8e8;box-shadow:0 4px 24px rgba(0,0,0,0.06);">
            <div class="relative z-10">
                <div class="p-3 rounded-xl inline-flex mb-4" style="background:#f5f5f5;">
                    <svg class="w-5 h-5" style="color:#555;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium mb-1" style="color:#aaa;">Commission Status</p>
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-2 h-2 rounded-full" style="background:{{ $commissionStatus === 'open' ? '#22c55e' : '#aaa' }};"></span>
                    <p class="text-2xl font-bold" style="color:#0d0d0d;">{{ strtoupper($commissionStatus) }}</p>
                </div>
                <form method="POST" action="{{ route('admin.commission.toggle') }}">
                    @csrf
                    <button class="w-full px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200"
                            style="background:#0d0d0d;color:#fff;border:none;">
                        {{ $commissionStatus === 'open' ? 'Close Commission' : 'Open Commission' }}
                    </button>
                </form>
            </div>
        </div>

    </div>

    {{-- ARTWORK PREVIEW --}}
    <div class="rounded-2xl p-4 sm:p-6" style="background:#fff;border:1px solid #e8e8e8;box-shadow:0 4px 24px rgba(0,0,0,0.06);">
        <div class="flex justify-between items-center mb-4 sm:mb-6">
            <h2 class="text-lg sm:text-xl font-bold tracking-tight" style="color:#0d0d0d;">
                Latest Artworks
            </h2>
            <a href="{{ route('admin.artworks.index') }}"
               class="px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 hover:-translate-y-0.5 whitespace-nowrap"
               style="background:#0d0d0d;color:#fff;">
                View all →
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            @forelse ($artworks as $art)
                <div class="group rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-1"
                     style="background:#fff;border:1px solid #ebebeb;box-shadow:0 2px 12px rgba(0,0,0,0.05);">

                    {{-- IMAGE --}}
                    <div class="relative overflow-hidden">
                        <img
                            src="{{ asset('storage/' . $art->image_path) }}"
                            class="h-44 sm:h-52 w-full object-cover transition-transform duration-500 group-hover:scale-105"
                            alt="{{ $art->title }}"
                        >
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                             style="background:linear-gradient(to top, rgba(0,0,0,0.4), transparent);"></div>
                    </div>

                    <div class="p-4 sm:p-5 space-y-3">

                        {{-- TITLE --}}
                        <h3 class="font-bold text-base line-clamp-1" style="color:#0d0d0d;">
                            {{ $art->title }}
                        </h3>

                        {{-- DESCRIPTION --}}
                        @if ($art->description)
                            <p class="text-sm line-clamp-2" style="color:#888;">
                                {{ $art->description }}
                            </p>
                        @else
                            <p class="text-sm italic" style="color:#bbb;">No description</p>
                        @endif

                        {{-- PRICE TAG --}}
                        @if ($art->price)
                            <div class="pt-2" style="border-top:1px solid #f0f0f0;">
                                <div class="rounded-lg p-3" style="background:#f8f8f8;">
                                    <p class="text-xs mb-1" style="color:#aaa;">Price Category</p>
                                    <p class="font-semibold text-sm" style="color:#0d0d0d;">{{ $art->price->title }}</p>
                                    <p class="text-xs mt-1" style="color:#888;">{{ $art->price->price_label }}</p>
                                </div>
                            </div>
                        @else
                            <div class="rounded-lg p-3" style="background:#fff5f5;border:1px solid #fecaca;">
                                <p class="text-sm font-medium" style="color:#e74c3c;">No price linked</p>
                            </div>
                        @endif

                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4" style="background:#f5f5f5;">
                        <svg class="w-8 h-8" style="color:#ccc;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <p style="color:#aaa;">No artworks yet. Create your first masterpiece!</p>
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection