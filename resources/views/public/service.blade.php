@extends('public.layout')

@section('title', 'Shxttyjiro – Services')

@section('content')

<!-- HERO SECTION -->
<section class="pt-28 md:pt-80 pb-16 md:pb-32">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">
        <div class="grid grid-cols-1 md:grid-cols-[1fr,440px] gap-12 md:gap-32 items-center">
            
            <!-- Left Content -->
            <div class="flex flex-col gap-6 md:gap-8 md:pt-10">
                <h1 class="text-[52px] sm:text-[72px] md:text-[96px] font-normal leading-none text-primary tracking-tight">
                    Illustration<br>
                    Commission
                </h1>

                <div class="flex flex-wrap gap-3 md:gap-4">
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

            <!-- Right Image -->
            <div class="flex flex-col gap-5">
                @php
                    $serviceImage = $placements['service_image'] ?? null;
                @endphp
                @if($serviceImage && $serviceImage->artworks->count())
                    @php $img = $serviceImage->artworks->first(); @endphp
                    <img src="{{ asset('storage/'.$img->image_path) }}"
                         class="w-full h-auto object-cover rounded-2xl cursor-pointer hover:scale-[1.01] transition-transform duration-300"
                         onclick="openSingleLightbox('{{ asset('storage/'.$img->image_path) }}')"
                         alt="Illustration work">
                @endif
                
                <p class="text-sm leading-relaxed text-primary">
                    Custom illustrations crafted to bring your
                    ideas to life from concept to final artwork.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SERVICE DETAIL SECTION -->
<section class="py-16 md:py-32">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">

        <!-- Service Item 01 -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-start mb-16 md:mb-24">
            <div class="max-w-lg">
                <span class="text-secondary mb-2 block">01.</span>
                <h3 class="text-2xl font-medium text-primary mb-3">Original Character (OC)</h3>
                <p class="text-base text-secondary leading-relaxed max-w-md">
                    Custom character illustrations created from scratch based on your ideas, personality, and visual concept.
                </p>
            </div>

            <div class="w-full aspect-square">
                @php $oc = $placements['service_oc'] ?? null; @endphp
                @if($oc && $oc->artworks->count())
                    @php $img = $oc->artworks->first(); @endphp
                    <img src="{{ asset('storage/'.$img->image_path) }}"
                         class="w-full h-full object-cover rounded-2xl cursor-pointer hover:scale-[1.01] transition-transform duration-300"
                         onclick="openSingleLightbox('{{ asset('storage/'.$img->image_path) }}')"
                         alt="Original Character">
                @endif
            </div>
        </div>

        <!-- Service Item 02 - Reversed -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-start mb-16 md:mb-24">
            <div class="w-full aspect-square md:order-1 order-2">
                @php $anime = $placements['service_anime'] ?? null; @endphp
                @if($anime && $anime->artworks->count())
                    @php $img = $anime->artworks->first(); @endphp
                    <img src="{{ asset('storage/'.$img->image_path) }}"
                         class="w-full h-full object-cover rounded-2xl cursor-pointer hover:scale-[1.01] transition-transform duration-300"
                         onclick="openSingleLightbox('{{ asset('storage/'.$img->image_path) }}')"
                         alt="Anime Manga">
                @endif
            </div>

            <div class="max-w-lg md:order-2 order-1">
                <span class="text-secondary mb-2 block">02.</span>
                <h3 class="text-2xl font-medium text-primary mb-3">Anime / Manga Style</h3>
                <p class="text-base text-secondary leading-relaxed max-w-md">
                    Character illustration inspired by anime and manga aesthetics.
                </p>
            </div>
        </div>

        <!-- Service Item 03 -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-start mb-16 md:mb-24">
            <div class="max-w-lg">
                <span class="text-secondary mb-2 block">03.</span>
                <h3 class="text-2xl font-medium text-primary mb-3">Fanart Illustration</h3>
                <p class="text-base text-secondary leading-relaxed max-w-md">
                    Fanart reinterpretation with my personal illustration style.
                </p>
            </div>

            <div class="w-full aspect-square">
                @php $fanart = $placements['service_fanart'] ?? null; @endphp
                @if($fanart && $fanart->artworks->count())
                    @php $img = $fanart->artworks->first(); @endphp
                    <img src="{{ asset('storage/'.$img->image_path) }}"
                         class="w-full h-full object-cover rounded-2xl cursor-pointer hover:scale-[1.01] transition-transform duration-300"
                         onclick="openSingleLightbox('{{ asset('storage/'.$img->image_path) }}')"
                         alt="Fanart">
                @endif
            </div>
        </div>

        <!-- Service Item 04 - Reversed -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-start mb-16 md:mb-24">
            <div class="w-full aspect-square md:order-1 order-2">
                @php $portrait = $placements['service_portrait'] ?? null; @endphp
                @if($portrait && $portrait->artworks->count())
                    @php $img = $portrait->artworks->first(); @endphp
                    <img src="{{ asset('storage/'.$img->image_path) }}"
                         class="w-full h-full object-cover rounded-2xl cursor-pointer hover:scale-[1.01] transition-transform duration-300"
                         onclick="openSingleLightbox('{{ asset('storage/'.$img->image_path) }}')"
                         alt="Custom Portrait">
                @endif
            </div>

            <div class="max-w-lg md:order-2 order-1">
                <span class="text-secondary mb-2 block">04.</span>
                <h3 class="text-2xl font-medium text-primary mb-3">Custom Portrait (Illustrated)</h3>
                <p class="text-base text-secondary leading-relaxed max-w-md">
                    Get a personalized illustrated portrait that highlights your uniqueness, personality, character, expression and artistic interpretation.
                </p>
            </div>
        </div>

        <!-- Service Item 05 -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-start">
            <div class="max-w-lg">
                <span class="text-secondary mb-2 block">05.</span>
                <h3 class="text-2xl font-medium text-primary mb-3">Cover / Artwork Illustration</h3>
                <p class="text-base text-secondary leading-relaxed max-w-md">
                    Design eye-catching covers and artwork for projects or digital artwork created with strong composition that could storytelling or idea.
                </p>
            </div>

            <div class="w-full aspect-square">
                @php $cover = $placements['service_cover'] ?? null; @endphp
                @if($cover && $cover->artworks->count())
                    @php $img = $cover->artworks->first(); @endphp
                    <img src="{{ asset('storage/'.$img->image_path) }}"
                         class="w-full h-full object-cover rounded-2xl cursor-pointer hover:scale-[1.01] transition-transform duration-300"
                         onclick="openSingleLightbox('{{ asset('storage/'.$img->image_path) }}')"
                         alt="Cover Artwork">
                @endif
            </div>
        </div>
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

<!-- LIGHTBOX (single image, no nav) -->
<div 
    id="lightbox-single"
    class="fixed inset-0 z-[99998] hidden items-center justify-center"
    onclick="closeSingleLightbox()"
    style="background: rgba(0,0,0,0.85); backdrop-filter: blur(6px);"
>
    <button 
        onclick="closeSingleLightbox()"
        class="absolute top-5 right-5 z-10 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-all"
    >
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18 6L6 18M6 6l12 12"/>
        </svg>
    </button>

    <div class="relative flex items-center justify-center w-full h-full px-6 py-10">
        <img 
            id="lightbox-single-img"
            src="" 
            alt="Preview"
            class="max-w-full max-h-full object-contain rounded-xl shadow-2xl"
            style="max-height: 88vh; transition: opacity 0.2s ease, transform 0.2s ease;"
            onclick="event.stopPropagation()"
        >
    </div>
</div>

@endsection

@push('scripts')
<script>
    function openSingleLightbox(src) {
        const lb  = document.getElementById('lightbox-single');
        const img = document.getElementById('lightbox-single-img');

        img.style.opacity   = '0';
        img.style.transform = 'scale(0.97)';
        lb.classList.remove('hidden');
        lb.classList.add('flex');
        document.body.style.overflow = 'hidden';

        setTimeout(() => {
            img.src             = src;
            img.style.opacity   = '1';
            img.style.transform = 'scale(1)';
        }, 120);
    }

    function closeSingleLightbox() {
        const lb = document.getElementById('lightbox-single');
        lb.classList.add('hidden');
        lb.classList.remove('flex');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeSingleLightbox();
    });
</script>
@endpush