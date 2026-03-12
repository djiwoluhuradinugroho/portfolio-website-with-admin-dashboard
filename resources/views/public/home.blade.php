@extends('public.layout')

@section('title', 'Shxttyjiro – Illustration Commission')

@section('content')

<!-- HERO SECTION -->
<section class="relative pt-16 md:pt-20 pb-20 md:pb-32 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">

        <!-- Mobile Layout -->
        <div class="flex flex-col gap-8 lg:hidden">

            <!-- Stacked Cards (mobile: top) -->
            <div class="relative w-full h-[220px] flex justify-center">
                @php $stackKeys = ['stack_image_1','stack_image_2','stack_image_3']; @endphp
                @foreach($stackKeys as $index => $key)
                    @if(isset($placements[$key]) && $placements[$key]->artworks->count())
                        @php $stackArtwork = $placements[$key]->artworks->first(); @endphp
                        <img 
                            src="{{ asset('storage/'.$stackArtwork->image_path) }}"
                            class="absolute w-[160px] h-[160px] rounded-2xl object-cover
                                {{ $index == 0 ? 'opacity-50 -rotate-[10deg] left-[5%] top-6' : '' }}
                                {{ $index == 1 ? 'opacity-75 rotate-[8deg] right-[5%] top-4' : '' }}
                                {{ $index == 2 ? 'z-[3] left-1/2 -translate-x-1/2 top-2' : '' }}
                            "
                        >
                    @endif
                @endforeach
            </div>

            <!-- Text -->
            <div>
                <h1 class="text-[52px] sm:text-[68px] font-medium leading-[1.05] text-primary mb-4">
                    Illustration<br>
                    Commission
                </h1>

                <p class="text-base sm:text-lg text-secondary mb-6 max-w-[480px]">
                    Character Illustration · Anime-Inspired Style · Custom Portrait · Cover Artwork
                </p>

                <div class="flex flex-wrap gap-3">
                    <a href="https://wa.me/6285887807176" 
                       target="_blank"
                       rel="noopener"
                       class="px-6 py-3 rounded-full bg-primary text-white font-medium hover:-translate-y-0.5 hover:shadow-2xl transition-all duration-300">
                        Lets Talk
                    </a>
                    <a href="{{ url('/portfolio') }}" 
                       class="px-6 py-3 rounded-full border border-primary/15 bg-transparent text-primary font-medium hover:bg-primary hover:text-white transition-all duration-300">
                        View Portfolio
                    </a>
                </div>
            </div>

            <!-- Description -->
            <p class="text-base text-primary/70 leading-relaxed max-w-[320px]">
                Custom illustrations crafted to bring your ideas to life from concept to final artwork.
            </p>
        </div>

        <!-- Desktop Layout -->
        <div class="relative w-full h-[520px] hidden lg:block">
            
            <!-- Left Text -->
            <div class="absolute left-0 top-[340px] w-[876px] z-10">
                <h1 class="text-[96px] font-medium leading-[1.05] text-primary mb-6">
                    Illustration<br>
                    Commission
                </h1>

                <p class="text-2xl text-secondary mb-10 max-w-[560px]">
                    Character Illustration · Anime-Inspired Style · Custom Portrait · Cover Artwork
                </p>

                <div class="flex gap-4">
                    <a href="https://wa.me/6285887807176" 
                       target="_blank"
                       rel="noopener"
                       class="px-7 py-3 rounded-full bg-primary text-white font-medium hover:-translate-y-0.5 hover:shadow-2xl transition-all duration-300">
                        Lets Talk
                    </a>
                    <a href="{{ url('/portfolio') }}" 
                       class="px-7 py-3 rounded-full border border-primary/15 bg-transparent text-primary font-medium hover:bg-primary hover:text-white transition-all duration-300">
                        View Portfolio
                    </a>
                </div>
            </div>

            <!-- Stacked Cards -->
            <div class="absolute right-0 top-5 w-[452px] h-[328px]">
                @foreach($stackKeys as $index => $key)
                    @if(isset($placements[$key]) && $placements[$key]->artworks->count())
                        @php $stackArtwork = $placements[$key]->artworks->first(); @endphp
                        <img 
                            src="{{ asset('storage/'.$stackArtwork->image_path) }}"
                            class="absolute w-[220px] h-[220px] rounded-2xl object-cover
                                {{ $index == 0 ? 'opacity-50 -rotate-[10deg] -translate-x-10 translate-y-7' : '' }}
                                {{ $index == 1 ? 'opacity-75 rotate-[8deg] translate-x-10 translate-y-[18px]' : '' }}
                                {{ $index == 2 ? 'z-[3] right-[100px]' : '' }}
                            "
                        >
                    @endif
                @endforeach
            </div>

            <!-- Right Description -->
            <p class="absolute right-0 top-[360px] w-[260px] text-lg text-primary/70 leading-relaxed">
                Custom illustrations crafted to
                bring your ideas to life from
                concept to final artwork.
            </p>
        </div>

    </div>
</section>

<!-- INTRO SECTION -->
<section class="py-16 md:py-32">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-stretch">
            
            <!-- Image -->
            <div>
                @if(isset($placements['about_image']) && $placements['about_image']->artworks->count())
                    @php $aboutImage = $placements['about_image']->artworks->first(); @endphp
                    <img 
                        src="{{ asset('storage/'.$aboutImage->image_path) }}"
                        class="w-full h-[280px] md:h-[440px] object-cover rounded-xl">
                @endif
            </div>

            <!-- Content -->
            <div class="flex flex-col justify-between gap-8 md:gap-0">
                <div>
                    <h2 class="text-[28px] md:text-[40px] font-medium leading-tight text-primary mb-4 md:mb-5">
                        Illustration is more than visuals it's expression.
                    </h2>

                    <p class="text-base text-secondary">
                        Freelance illustrator specializing in character illustration and custom commissions.
                    </p>
                </div>

                <!-- Stats -->
                <div class="space-y-6 md:space-y-8 mt-4 md:mt-24">
                    <div class="max-w-sm">
                        <h3 class="text-[28px] md:text-[32px] font-medium text-primary mb-2">120+</h3>
                        <p class="text-base text-secondary">
                            Delivered custom artworks for clients with different styles and needs.
                        </p>
                    </div>

                    <div class="max-w-sm">
                        <h3 class="text-[28px] md:text-[32px] font-medium text-primary mb-2">3+</h3>
                        <p class="text-base text-secondary">
                            Years of experience creating illustrations consistently across personal.
                        </p>
                    </div>
                </div>
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
        @php $portfolioPlacement = $placements['home_portfolio'] ?? null; @endphp

        @if($portfolioPlacement && $portfolioPlacement->artworks->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                @foreach($portfolioPlacement->artworks as $artwork)
                    <div 
                        class="aspect-[4/3] rounded-xl overflow-hidden group cursor-zoom-in relative"
                        onclick="openLightbox('{{ asset('storage/'.$artwork->image_path) }}')"
                    >
                        <img 
                            src="{{ asset('storage/'.$artwork->image_path) }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        >
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

<!-- ============================================================
     LIGHTBOX
     ============================================================ -->
<div 
    id="lightbox"
    class="fixed inset-0 z-[99998] hidden items-center justify-center"
    onclick="closeLightbox(event)"
    style="background: rgba(0,0,0,0.85); backdrop-filter: blur(6px);"
>
    <!-- Close button -->
    <button 
        onclick="closeLightboxDirect()"
        class="absolute top-5 right-5 z-10 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-all"
        aria-label="Close"
    >
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18 6L6 18M6 6l12 12"/>
        </svg>
    </button>

    <!-- Nav: Prev -->
    <button
        id="lb-prev"
        onclick="event.stopPropagation(); navigateLightbox(-1)"
        class="absolute left-4 md:left-8 z-10 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-all"
        aria-label="Previous"
    >
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M15 18l-6-6 6-6"/>
        </svg>
    </button>

    <!-- Nav: Next -->
    <button
        id="lb-next"
        onclick="event.stopPropagation(); navigateLightbox(1)"
        class="absolute right-4 md:right-8 z-10 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-all"
        aria-label="Next"
    >
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M9 18l6-6-6-6"/>
        </svg>
    </button>

    <!-- Image container -->
    <div class="relative flex items-center justify-center w-full h-full px-16 py-10">
        <img 
            id="lightbox-img"
            src=""
            alt="Preview"
            class="max-w-full max-h-full object-contain rounded-xl shadow-2xl"
            style="transition: opacity 0.2s ease, transform 0.2s ease; max-height: 85vh;"
            onclick="event.stopPropagation()"
        >
    </div>

    <!-- Counter -->
    <div id="lb-counter" class="absolute bottom-5 left-1/2 -translate-x-1/2 text-white/50 text-xs tracking-widest"></div>
</div>

@endsection

@push('scripts')
<script>
    // Collect all portfolio image URLs
    const portfolioImages = [
        @if($portfolioPlacement && $portfolioPlacement->artworks->count())
            @foreach($portfolioPlacement->artworks as $artwork)
                '{{ asset('storage/'.$artwork->image_path) }}',
            @endforeach
        @endif
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
        const counter = document.getElementById('lb-counter');
        
        img.style.opacity = '0';
        img.style.transform = 'scale(0.97)';
        
        setTimeout(() => {
            img.src = portfolioImages[index];
            img.style.opacity = '1';
            img.style.transform = 'scale(1)';
        }, 150);

        counter.textContent = (index + 1) + ' / ' + portfolioImages.length;

        // Hide prev/next if only one image
        document.getElementById('lb-prev').style.display = portfolioImages.length <= 1 ? 'none' : 'flex';
        document.getElementById('lb-next').style.display = portfolioImages.length <= 1 ? 'none' : 'flex';
    }

    function navigateLightbox(direction) {
        currentIndex = (currentIndex + direction + portfolioImages.length) % portfolioImages.length;
        showImage(currentIndex);
    }

    function closeLightbox(event) {
        // Only close when clicking the backdrop (not the image)
        if (event.target === document.getElementById('lightbox') || 
            event.target.closest('#lightbox') === document.getElementById('lightbox') && 
            !event.target.closest('img') && !event.target.closest('button')) {
            closeLightboxDirect();
        }
    }

    function closeLightboxDirect() {
        const lb = document.getElementById('lightbox');
        lb.classList.add('hidden');
        lb.classList.remove('flex');
        document.body.style.overflow = '';
    }

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        const lb = document.getElementById('lightbox');
        if (lb.classList.contains('hidden')) return;
        if (e.key === 'Escape') closeLightboxDirect();
        if (e.key === 'ArrowLeft') navigateLightbox(-1);
        if (e.key === 'ArrowRight') navigateLightbox(1);
    });
</script>
@endpush