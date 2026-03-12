@extends('public.layout')

@section('title', 'Shxttyjiro – Portfolio')

@section('content')

<!-- HERO SECTION -->
@if(!$style)
<section class="pt-28 md:pt-80 pb-16 md:pb-32">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">
        <div class="flex flex-col gap-6 md:gap-8">
            
            <h1 class="text-[52px] sm:text-[72px] md:text-[96px] font-normal leading-none text-primary tracking-tight">
                Beyond Ideas<br>
                Into Creation.
            </h1>

            <p class="text-sm leading-relaxed text-primary max-w-xs">
                Custom illustrations crafted to bring your
                ideas to life from concept to final artwork.
            </p>

            <div>
                <a href="https://wa.me/6285887807176"  
                   target="_blank"
                   rel="noopener"
                   class="inline-flex px-7 py-3 rounded-full bg-primary text-white font-medium hover:-translate-y-0.5 hover:shadow-2xl transition-all duration-300">
                    Lets Talk
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- FEATURED SECTION -->
@if(!$style)
<section class="py-16 md:py-32">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">
        
        <h2 class="text-4xl md:text-6xl font-normal text-primary mb-10 md:mb-16">
            Latest Project
        </h2>

        @if($featured)
            <div 
                class="relative w-full aspect-[1340/690] rounded-2xl overflow-hidden mb-12 md:mb-20 group cursor-pointer"
                onclick="openSingleLightbox('{{ asset('storage/'.$featured->image_path) }}')"
            >
                <img src="{{ asset('storage/'.$featured->image_path) }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                     alt="{{ $featured->title }}">

                <div class="absolute left-5 bottom-5 md:left-8 md:bottom-8 text-white z-10">
                    <h3 class="text-2xl md:text-5xl font-medium mb-2 md:mb-3">
                        {{ $featured->title }}
                    </h3>
                    <span class="text-xl md:text-3xl opacity-80 block mb-2 md:mb-3">
                        {{ $featured->created_at->format('Y') }}
                    </span>
                    @if($featured->style)
                        <div class="inline-flex items-center px-4 md:px-6 py-2 md:py-2.5 rounded-full bg-white/15 backdrop-blur-md border border-white/20 text-sm md:text-lg font-medium">
                            {{ $featured->style }}
                        </div>
                    @endif
                </div>
            </div>
        @endif

    </div>
</section>
@endif

<!-- ARTWORK LIST -->
<section class="py-16 md:py-32">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">
        <div class="flex flex-col gap-10 md:gap-16">

            @php $artworkList = []; @endphp

            @foreach($artworks as $art)
                @if(!$featured || $featured->id !== $art->id)
                    @php $artworkList[] = asset('storage/'.$art->image_path); @endphp

                    <div class="grid grid-cols-1 md:grid-cols-[1fr,520px] gap-8 md:gap-20 pb-10 md:pb-16 border-b border-border/60">

                        <div class="flex flex-col justify-between gap-6 md:gap-0">
                            <div>
                                <h3 class="text-2xl md:text-[32px] font-medium text-primary mb-2">
                                    {{ $art->title }}
                                </h3>
                                <span class="text-base text-secondary block mb-4">
                                    {{ $art->created_at->format('Y') }}
                                </span>
                                @if($art->style)
                                    <div class="inline-flex items-center px-3.5 py-1.5 rounded-full bg-gray-100 text-sm text-primary mt-2 md:mt-4">
                                        {{ $art->style }}
                                    </div>
                                @endif
                            </div>

                            <div class="flex gap-8 md:gap-16 mt-auto md:pt-8">
                                <div class="flex flex-col gap-2">
                                    <span class="text-sm text-secondary">Category</span>
                                    <p class="text-base text-primary">{{ $art->category ?? '-' }}</p>
                                </div>
                                @if($art->style)
                                    <div class="flex flex-col gap-2">
                                        <span class="text-sm text-secondary">Style</span>
                                        <p class="text-base text-primary">{{ $art->style }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div 
                            class="w-full h-64 md:h-80 rounded-2xl overflow-hidden cursor-pointer"
                            onclick="openListLightbox('{{ asset('storage/'.$art->image_path) }}')"
                        >
                            <img src="{{ asset('storage/'.$art->image_path) }}"
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                                 alt="{{ $art->title }}">
                        </div>

                    </div>
                @endif
            @endforeach

        </div>
    </div>
</section>

<!-- THINGS TO KNOW SECTION -->
<section class="py-16 md:py-32 bg-background">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">
        
        <div class="grid grid-cols-1 md:grid-cols-[1fr,400px] gap-6 md:gap-20 mb-10 md:mb-16">
            <h2 class="text-[32px] md:text-5xl font-medium leading-tight text-primary">
                Things to know before<br>
                Commissioning
            </h2>
            <p class="text-base text-secondary leading-relaxed">
                Some important details to help you understand my commission terms and scope.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-white border border-border rounded-2xl p-8 md:p-10 flex flex-col gap-4 min-h-[200px] md:min-h-[240px] hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                <h4 class="text-2xl font-medium text-primary">Meet Jiroo</h4>
                <p class="text-base text-secondary leading-relaxed flex-1">
                    A freelance illustrator passionate about bringing characters to life through digital art and storytelling.
                </p>
            </div>

            <div class="bg-white border border-border rounded-2xl p-8 md:p-10 flex flex-col gap-4 min-h-[200px] md:min-h-[240px] hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                <h4 class="text-2xl font-medium text-primary">Work Ethic</h4>
                <p class="text-base text-secondary leading-relaxed flex-1">
                    Committed to clear communication, timely delivery, and ensuring your vision is captured in every detail.
                </p>
            </div>

            <div class="bg-primary rounded-2xl p-8 md:p-10 flex flex-col gap-4 min-h-[200px] md:min-h-[240px] group cursor-pointer hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                <h4 class="text-2xl font-medium text-white">Strong Commitment</h4>
                <p class="text-base text-white/90 leading-relaxed flex-1">
                    Every commission is treated with dedication and care, from initial concept to final artwork delivery.
                </p>
                <a href="https://wa.me/6285887807176" 
                   target="_blank"
                   rel="noopener"
                   class="text-base font-medium text-white mt-auto group-hover:opacity-80 transition-opacity inline-block">
                    Let's talk →
                </a>
            </div>
        </div>
    </div>
</section>

<!-- LIGHTBOX -->
<div 
    id="lightbox"
    class="fixed inset-0 z-[99998] hidden items-center justify-center"
    onclick="closeLightbox()"
    style="background: rgba(0,0,0,0.85); backdrop-filter: blur(6px);"
>
    <button 
        onclick="closeLightbox()"
        class="absolute top-5 right-5 z-10 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-all"
    >
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18 6L6 18M6 6l12 12"/>
        </svg>
    </button>

    <button id="lb-prev" onclick="event.stopPropagation(); navigateLightbox(-1)"
        class="absolute left-4 md:left-8 z-10 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-all">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
    </button>

    <button id="lb-next" onclick="event.stopPropagation(); navigateLightbox(1)"
        class="absolute right-4 md:right-8 z-10 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-all">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
    </button>

    <div class="relative flex items-center justify-center w-full h-full px-16 py-10">
        <img 
            id="lightbox-img"
            src="" alt="Preview"
            class="max-w-full max-h-full object-contain rounded-xl shadow-2xl"
            style="max-height: 85vh; transition: opacity 0.2s ease, transform 0.2s ease;"
            onclick="event.stopPropagation()"
        >
    </div>

    <div id="lb-counter" class="absolute bottom-5 left-1/2 -translate-x-1/2 text-white/50 text-xs tracking-widest"></div>
</div>

@endsection

@push('scripts')
<script>
    // List artworks (excluding featured)
    const listImages = @json($artworkList ?? []);

    let currentIndex = 0;
    let currentMode  = 'single'; // 'single' or 'list'

    // Featured image — single preview, no nav
    function openSingleLightbox(src) {
        currentMode = 'single';
        showLightbox(src);
        document.getElementById('lb-prev').style.display = 'none';
        document.getElementById('lb-next').style.display = 'none';
        document.getElementById('lb-counter').textContent = '';
    }

    // List artworks — with nav
    function openListLightbox(src) {
        currentMode  = 'list';
        currentIndex = listImages.indexOf(src);
        if (currentIndex === -1) currentIndex = 0;
        showLightbox(listImages[currentIndex]);
        document.getElementById('lb-prev').style.display = listImages.length > 1 ? 'flex' : 'none';
        document.getElementById('lb-next').style.display = listImages.length > 1 ? 'flex' : 'none';
        updateCounter();
    }

    function showLightbox(src) {
        const lb  = document.getElementById('lightbox');
        const img = document.getElementById('lightbox-img');

        img.style.opacity   = '0';
        img.style.transform = 'scale(0.97)';
        lb.classList.remove('hidden');
        lb.classList.add('flex');
        document.body.style.overflow = 'hidden';

        setTimeout(() => {
            img.src             = src;
            img.style.opacity   = '1';
            img.style.transform = 'scale(1)';
        }, 150);
    }

    function navigateLightbox(dir) {
        if (currentMode !== 'list') return;
        currentIndex = (currentIndex + dir + listImages.length) % listImages.length;
        showLightbox(listImages[currentIndex]);
        updateCounter();
    }

    function updateCounter() {
        document.getElementById('lb-counter').textContent =
            (currentIndex + 1) + ' / ' + listImages.length;
    }

    function closeLightbox() {
        const lb = document.getElementById('lightbox');
        lb.classList.add('hidden');
        lb.classList.remove('flex');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', (e) => {
        if (document.getElementById('lightbox').classList.contains('hidden')) return;
        if (e.key === 'Escape')      closeLightbox();
        if (e.key === 'ArrowLeft')   navigateLightbox(-1);
        if (e.key === 'ArrowRight')  navigateLightbox(1);
    });
</script>
@endpush