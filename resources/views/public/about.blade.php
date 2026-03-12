@extends('public.layout')

@section('title', 'Shxttyjiro – About')

@section('content')

<!-- HERO SECTION -->
<section class="pt-20 md:pt-32 pb-16 md:pb-32">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">
        <div class="flex flex-col gap-6">
            
            <!-- Heading -->
            <h1 class="text-[52px] sm:text-[72px] md:text-[96px] font-normal leading-none text-primary tracking-tight">
                Illustration<br>
                beyond visuals
            </h1>

            <!-- Pill Tags -->
            <div class="flex flex-wrap gap-3">
                <span class="px-5 py-2 rounded-full border border-primary/20 text-sm text-primary font-normal">Illustration</span>
                <span class="px-5 py-2 rounded-full border border-primary/20 text-sm text-primary font-normal">Character</span>
                <span class="px-5 py-2 rounded-full border border-primary/20 text-sm text-primary font-normal">Anime</span>
                <span class="px-5 py-2 rounded-full border border-primary/20 text-sm text-primary font-normal">Custom Commision</span>
            </div>

        </div>
    </div>
</section>

<!-- STATS SECTION -->
<section class="py-16 md:py-32">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">
        
        <!-- Title -->
        <h2 class="text-3xl md:text-5xl font-normal mb-8 md:mb-10 text-primary">
            Creating characters through illustration.
        </h2>

        <!-- Big Image -->
        <div class="w-full aspect-[1480/683] overflow-hidden rounded-2xl mb-10 md:mb-16">
            @php
                $hero = $placements['about_image'] ?? null;
                $heroImage = $hero?->artworks->first();
            @endphp
            @if($heroImage)
                <img src="{{ asset('storage/'.$heroImage->image_path) }}"
                     class="w-full h-auto object-cover object-top rounded-2xl"
                     alt="Illustration work">
            @endif
        </div>

        <!-- Stats Row -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-[1fr,1fr,1.2fr] gap-8 md:gap-20">
            
            <!-- Stat 1 -->
            <div class="flex flex-col gap-3">
                <h2 class="text-4xl md:text-5xl font-medium text-primary">120+</h2>
                <p class="text-base text-secondary leading-relaxed">
                    Delivered custom artworks for clients...
                </p>
            </div>

            <!-- Stat 2 -->
            <div class="flex flex-col gap-3">
                <h2 class="text-4xl md:text-5xl font-medium text-primary">3+</h2>
                <p class="text-base text-secondary leading-relaxed">
                    Years of experience creating illustrations
                </p>
            </div>

            <!-- Description -->
            <div class="flex flex-col gap-3 sm:col-span-2 md:col-span-1">
                <p class="text-base text-secondary leading-relaxed">
                    Freelance illustrator specializing in character-based illustration and custom commissions.
                    <br><br>
                    Custom illustrations crafted to bring your ideas to life from concept to final artwork.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES SECTION -->
<section class="py-16 md:py-32">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-[420px,1fr] gap-12 lg:gap-36">
            
            <!-- Left Content -->
            <div class="flex flex-col">
                <h2 class="text-[28px] md:text-[40px] font-medium leading-tight text-primary mb-4">
                    Bringing ideas to life<br>
                    through custom illustration services
                </h2>

                <p class="text-base text-secondary max-w-sm mb-6 md:mb-8">
                    A selection of illustration services focused on character design, style, and creative expression.
                </p>

                <a href="https://wa.me/6285887807176" 
                   target="_blank"
                   rel="noopener"
                   class="self-start px-7 py-3 rounded-full bg-primary text-white font-medium hover:-translate-y-0.5 hover:shadow-2xl transition-all duration-300">
                    Lets Talk
                </a>
            </div>

            <!-- Service Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                
                <!-- Card 1 -->
                <a href="{{ route('portfolio', ['style' => 'Original Character (OC)']) }}"
                   class="relative bg-white border border-border rounded-xl p-6 min-h-[200px] md:min-h-[220px] flex flex-col hover:-translate-y-1.5 hover:shadow-xl transition-all duration-300 group block">
                    <div class="w-8 h-px bg-primary mb-5"></div>
                    <h4 class="text-xl font-medium text-primary mb-4">Original Character</h4>
                    <p class="text-base text-secondary leading-relaxed mb-auto">
                        Custom character illustrations created from your ideas.
                    </p>
                    <span class="absolute right-5 bottom-5 text-[22px] text-primary group-hover:translate-x-1.5 transition-transform">→</span>
                </a>

                <!-- Card 2 -->
                <a href="{{ route('portfolio', ['style' => 'Anime']) }}"
                   class="relative bg-white border border-border rounded-xl p-6 min-h-[200px] md:min-h-[220px] flex flex-col hover:-translate-y-1.5 hover:shadow-xl transition-all duration-300 group block">
                    <div class="w-8 h-px bg-primary mb-5"></div>
                    <h4 class="text-xl font-medium text-primary mb-4">Anime & Manga</h4>
                    <p class="text-base text-secondary leading-relaxed mb-auto">
                        Illustrations inspired by anime and manga aesthetics.
                    </p>
                    <span class="absolute right-5 bottom-5 text-[22px] text-primary group-hover:translate-x-1.5 transition-transform">→</span>
                </a>

                <!-- Card 3 - Active -->
                <a href="{{ route('portfolio', ['style' => 'Chibi']) }}"
                   class="relative bg-primary rounded-xl p-6 min-h-[200px] md:min-h-[220px] flex flex-col scale-[1.02] shadow-2xl group block">
                    <div class="absolute inset-0 border border-white/15 rounded-xl pointer-events-none"></div>
                    <div class="w-8 h-px bg-white/80 mb-5"></div>
                    <h4 class="text-xl font-medium text-white mb-4">Chibi</h4>
                    <p class="text-base text-white/90 leading-relaxed mb-auto">
                        A specific style of caricature originating from Japan, where characters are drawn in an exaggeratedly small and cute way to achieve a kawaii aesthetic.
                    </p>
                    <span class="absolute right-5 bottom-5 text-[22px] text-white transition-transform group-hover:translate-x-1">↗</span>
                </a>

                <!-- Card 4 -->
                <a href="{{ route('portfolio', ['style' => 'Fan Art']) }}"
                   class="relative bg-white border border-border rounded-xl p-6 min-h-[200px] md:min-h-[220px] flex flex-col hover:-translate-y-1.5 hover:shadow-xl transition-all duration-300 group block">
                    <div class="w-8 h-px bg-primary mb-5"></div>
                    <h4 class="text-xl font-medium text-primary mb-4">Fanart Illustration</h4>
                    <p class="text-base text-secondary leading-relaxed mb-auto">
                        Fanart reinterpreted in my personal style.
                    </p>
                    <span class="absolute right-5 bottom-5 text-[22px] text-primary group-hover:translate-x-1.5 transition-transform">→</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- PORTFOLIO SECTION -->
<section class="py-16 md:py-32">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">
        
        <!-- Header -->
        <div class="grid grid-cols-1 md:grid-cols-[1fr,360px] gap-6 md:gap-20 mb-12 md:mb-20">
            <h2 class="text-[28px] md:text-[40px] font-medium leading-tight text-primary">
                A visual journey through character,<br>
                expression, and imagination
            </h2>
            <p class="text-base text-secondary">
                Freelance illustrator specializing in character illustration and custom commissions.
            </p>
        </div>

        <!-- Portfolio Grid -->
        @php
        $portfolioPlacement = $placements['about_portfolio'] ?? null;
        @endphp

        @if($portfolioPlacement && $portfolioPlacement->artworks->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
    @foreach($portfolioPlacement->artworks as $artwork)
        <div 
            class="aspect-[4/3] rounded-xl overflow-hidden cursor-pointer"
            onclick="openLightbox('{{ asset('storage/'.$artwork->image_path) }}')"
        >
            <img src="{{ asset('storage/'.$artwork->image_path) }}"
                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                 alt="{{ $artwork->title }}">
        </div>
    @endforeach
</div>
        @endif
    </div>
</section>

<!-- THINGS TO KNOW SECTION -->
<section class="py-16 md:py-32 bg-background">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">
        
        <!-- Header -->
        <div class="grid grid-cols-1 md:grid-cols-[1fr,400px] gap-6 md:gap-20 mb-10 md:mb-16">
            <h2 class="text-[32px] md:text-5xl font-medium leading-tight text-primary">
                Things to know before<br>
                Commissioning
            </h2>
            <p class="text-base text-secondary leading-relaxed">
                Some important details to help you understand my commission terms and scope.
            </p>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            
            <!-- Card 1 -->
            <div class="bg-white border border-border rounded-2xl p-8 md:p-10 flex flex-col gap-4 min-h-[200px] md:min-h-[240px] hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                <h4 class="text-2xl font-medium text-primary">Meet Jiroo</h4>
                <p class="text-base text-secondary leading-relaxed flex-1">
                    A freelance illustrator passionate about bringing characters to life through digital art and storytelling.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white border border-border rounded-2xl p-8 md:p-10 flex flex-col gap-4 min-h-[200px] md:min-h-[240px] hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                <h4 class="text-2xl font-medium text-primary">Work Ethic</h4>
                <p class="text-base text-secondary leading-relaxed flex-1">
                    Committed to clear communication, timely delivery, and ensuring your vision is captured in every detail.
                </p>
            </div>

            <!-- Card 3 - Dark -->
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
    onclick="closeLightbox(event)"
    style="background: rgba(0,0,0,0.85); backdrop-filter: blur(6px);"
>
    <button 
        onclick="closeLightboxDirect()"
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
        <img id="lightbox-img" src="" alt="Preview"
            class="max-w-full max-h-full object-contain rounded-xl shadow-2xl"
            style="transition: opacity 0.2s ease, transform 0.2s ease; max-height: 85vh;"
            onclick="event.stopPropagation()">
    </div>

    <div id="lb-counter" class="absolute bottom-5 left-1/2 -translate-x-1/2 text-white/50 text-xs tracking-widest"></div>
</div>

@push('scripts')
<script>
    const portfolioImages = [
        @foreach($portfolioPlacement->artworks as $artwork)
            '{{ asset('storage/'.$artwork->image_path) }}',
        @endforeach
    ];

    let currentIndex = 0;

    function openLightbox(src) {
        currentIndex = portfolioImages.indexOf(src);
        if (currentIndex === -1) currentIndex = 0;
        showImage(currentIndex);
        const lb = document.getElementById('lightbox');
        lb.classList.remove('hidden');
        lb.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function showImage(index) {
        const img = document.getElementById('lightbox-img');
        img.style.opacity = '0';
        img.style.transform = 'scale(0.97)';
        setTimeout(() => {
            img.src = portfolioImages[index];
            img.style.opacity = '1';
            img.style.transform = 'scale(1)';
        }, 150);
        document.getElementById('lb-counter').textContent = (index + 1) + ' / ' + portfolioImages.length;
    }

    function navigateLightbox(direction) {
        currentIndex = (currentIndex + direction + portfolioImages.length) % portfolioImages.length;
        showImage(currentIndex);
    }

    function closeLightbox(event) {
        if (!event.target.closest('img') && !event.target.closest('button')) closeLightboxDirect();
    }

    function closeLightboxDirect() {
        const lb = document.getElementById('lightbox');
        lb.classList.add('hidden');
        lb.classList.remove('flex');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', (e) => {
        if (document.getElementById('lightbox').classList.contains('hidden')) return;
        if (e.key === 'Escape') closeLightboxDirect();
        if (e.key === 'ArrowLeft') navigateLightbox(-1);
        if (e.key === 'ArrowRight') navigateLightbox(1);
    });
</script>
@endpush

@endsection


