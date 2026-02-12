@extends('public.layout')

@section('title', 'Shxttyjiro – Illustration Commission')

@section('content')

<!-- HERO SECTION -->
<section class="relative pt-20 pb-32 overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-12">
        <div class="relative w-full h-[520px]">
            
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
                    <a href="https://wa.me/6282200539193" 
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
                <img src="{{ asset('assets/foto1.jpg') }}" 
                     class="absolute w-[220px] h-[220px] rounded-2xl object-cover opacity-50 -rotate-[10deg] -translate-x-10 translate-y-7" 
                     alt="Card 1">
                <img src="{{ asset('assets/foto2.jpg') }}" 
                     class="absolute w-[220px] h-[220px] rounded-2xl object-cover opacity-75 rotate-[8deg] translate-x-10 translate-y-[18px]" 
                     alt="Card 2">
                <img src="{{ asset('assets/foto3.jpg') }}" 
                     class="absolute w-[220px] h-[220px] rounded-2xl object-cover z-[3] right-[100px]" 
                     alt="Card 3">
            </div>

            <!-- Right Description -->
            <p class="absolute right-0 top-[480px] w-[230px] text-2xl text-secondary leading-tight">
                Custom illustrations crafted to<br>
                bring your ideas to life from<br>
                concept to final artwork.
            </p>
        </div>
    </div>
</section>

<!-- INTRO SECTION -->
<section class="py-32">
    <div class="max-w-[1440px] mx-auto px-12">
        <div class="grid grid-cols-2 gap-12 items-stretch">
            
            <!-- Image -->
            <div>
                <img src="{{ asset('assets/foto5.jpg') }}" 
                     class="w-full h-[440px] object-cover rounded-xl" 
                     alt="Illustration preview">
            </div>

            <!-- Content -->
            <div class="flex flex-col justify-between">
                <div>
                    <h2 class="text-[40px] font-medium leading-tight text-primary mb-5">
                        Illustration is more than visuals it's expression.
                    </h2>

                    <p class="text-base text-secondary">
                        Freelance illustrator specializing in character illustration and custom commissions.
                    </p>
                </div>

                <!-- Stats -->
                <div class="space-y-8 mt-24">
                    <div class="max-w-sm">
                        <h3 class="text-[32px] font-medium text-primary mb-2">120+</h3>
                        <p class="text-base text-secondary">
                            Delivered custom artworks for clients with different styles and needs.
                        </p>
                    </div>

                    <div class="max-w-sm">
                        <h3 class="text-[32px] font-medium text-primary mb-2">3+</h3>
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
<section class="py-32">
    <div class="max-w-[1440px] mx-auto px-12">
        <div class="grid grid-cols-[420px,1fr] gap-36">
            
            <!-- Left Content -->
            <div class="flex flex-col">
                <h2 class="text-[40px] font-medium leading-tight text-primary mb-4">
                    Bringing ideas to life<br>
                    through custom illustration services
                </h2>

                <p class="text-base text-secondary max-w-sm mb-8">
                    A selection of illustration services focused on character design, style, and creative expression.
                </p>

                <a href="https://wa.me/6282200539193" 
                   target="_blank"
                   rel="noopener"
                   class="self-start px-7 py-3 rounded-full bg-primary text-white font-medium hover:-translate-y-0.5 hover:shadow-2xl transition-all duration-300">
                    Lets Talk
                </a>
            </div>

            <!-- Service Cards Grid -->
            <div class="grid grid-cols-2 gap-6">
                
                <!-- Card 1 -->
                <div class="relative bg-white border border-border rounded-xl p-6 min-h-[220px] flex flex-col cursor-pointer hover:-translate-y-1.5 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-8 h-px bg-primary mb-5"></div>
                    <h4 class="text-xl font-medium text-primary mb-4">Original Character</h4>
                    <p class="text-base text-secondary leading-relaxed max-w-[280px] mb-auto">
                        Custom character illustrations created from your ideas.
                    </p>
                    <span class="absolute right-5 bottom-5 text-[22px] text-primary group-hover:translate-x-1.5 transition-transform">→</span>
                </div>

                <!-- Card 2 -->
                <div class="relative bg-white border border-border rounded-xl p-6 min-h-[220px] flex flex-col cursor-pointer hover:-translate-y-1.5 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-8 h-px bg-primary mb-5"></div>
                    <h4 class="text-xl font-medium text-primary mb-4">Anime & Manga</h4>
                    <p class="text-base text-secondary leading-relaxed max-w-[280px] mb-auto">
                        Illustrations inspired by anime and manga aesthetics.
                    </p>
                    <span class="absolute right-5 bottom-5 text-[22px] text-primary group-hover:translate-x-1.5 transition-transform">→</span>
                </div>

                <!-- Card 3 - Active -->
                <div class="relative bg-primary rounded-xl p-6 min-h-[220px] flex flex-col cursor-pointer scale-[1.02] shadow-2xl group">
                    <div class="absolute inset-0 border border-white/15 rounded-xl pointer-events-none"></div>
                    <div class="w-8 h-px bg-white/80 mb-5"></div>
                    <h4 class="text-xl font-medium text-white mb-4">Original Character</h4>
                    <p class="text-base text-white/90 leading-relaxed max-w-[280px] mb-auto">
                        Carefully designed concepts to reflect identity.
                    </p>
                    <span class="absolute right-5 bottom-5 text-[22px] text-white">↗</span>
                </div>

                <!-- Card 4 -->
                <div class="relative bg-white border border-border rounded-xl p-6 min-h-[220px] flex flex-col cursor-pointer hover:-translate-y-1.5 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-8 h-px bg-primary mb-5"></div>
                    <h4 class="text-xl font-medium text-primary mb-4">Fanart Illustration</h4>
                    <p class="text-base text-secondary leading-relaxed max-w-[280px] mb-auto">
                        Fanart reinterpreted in my personal style.
                    </p>
                    <span class="absolute right-5 bottom-5 text-[22px] text-primary group-hover:translate-x-1.5 transition-transform">→</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PORTFOLIO SECTION -->
<section class="py-32">
    <div class="max-w-[1440px] mx-auto px-12">
        
        <!-- Header -->
        <div class="grid grid-cols-[1fr,360px] gap-20 mb-20">
            <h2 class="text-[40px] font-medium leading-tight text-primary">
                A visual journey through character,<br>
                expression, and imagination
            </h2>

            <p class="text-base text-secondary">
                Freelance illustrator specializing in character illustration and custom commissions.
            </p>
        </div>

        <!-- Portfolio Grid -->
        <div class="grid grid-cols-3 gap-6">
            <div class="aspect-[4/3] rounded-xl overflow-hidden group cursor-pointer">
                <img src="{{ asset('assets/foto11.jpg') }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                     alt="Portfolio 1">
            </div>

            <div class="aspect-[4/3] rounded-xl overflow-hidden group cursor-pointer">
                <img src="{{ asset('assets/foto12.png') }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                     alt="Portfolio 2">
            </div>

            <div class="aspect-[4/3] rounded-xl overflow-hidden group cursor-pointer">
                <img src="{{ asset('assets/foto13.jpg') }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                     alt="Portfolio 3">
            </div>

            <div class="aspect-[4/3] rounded-xl overflow-hidden group cursor-pointer">
                <img src="{{ asset('assets/foto14.jpg') }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                     alt="Portfolio 4">
            </div>

            <div class="aspect-[4/3] rounded-xl overflow-hidden group cursor-pointer">
                <img src="{{ asset('assets/foto15.jpg') }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                     alt="Portfolio 5">
            </div>

            <div class="aspect-[4/3] rounded-xl overflow-hidden group cursor-pointer">
                <img src="{{ asset('assets/foto1.jpg') }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                     alt="Portfolio 6">
            </div>
        </div>
    </div>
</section>

<!-- THINGS TO KNOW SECTION -->
<section class="py-32 bg-background">
    <div class="max-w-[1440px] mx-auto px-12">
        
        <!-- Header -->
        <div class="grid grid-cols-[1fr,400px] gap-20 mb-16">
            <h2 class="text-5xl font-medium leading-tight text-primary">
                Things to know before<br>
                Commissioning
            </h2>

            <p class="text-base text-secondary leading-relaxed">
                Some important details to help you understand my commission terms and scope.
            </p>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-3 gap-6">
            
            <!-- Card 1 -->
            <div class="bg-white border border-border rounded-2xl p-10 flex flex-col gap-4 min-h-[240px] hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                <h4 class="text-2xl font-medium text-primary">Meet Jiroo</h4>
                <p class="text-base text-secondary leading-relaxed flex-1">
                    A freelance illustrator passionate about bringing characters to life through digital art and storytelling.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white border border-border rounded-2xl p-10 flex flex-col gap-4 min-h-[240px] hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                <h4 class="text-2xl font-medium text-primary">Work Ethic</h4>
                <p class="text-base text-secondary leading-relaxed flex-1">
                    Committed to clear communication, timely delivery, and ensuring your vision is captured in every detail.
                </p>
            </div>

            <!-- Card 3 - Dark -->
            <div class="bg-primary rounded-2xl p-10 flex flex-col gap-4 min-h-[240px] group cursor-pointer hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                <h4 class="text-2xl font-medium text-white">Strong Commitment</h4>
                <p class="text-base text-white/90 leading-relaxed flex-1">
                    Every commission is treated with dedication and care, from initial concept to final artwork delivery.
                </p>
                <span class="text-base font-medium text-white mt-auto group-hover:opacity-80 transition-opacity">
                    Learn More →
                </span>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Service Card Click Handler
    const serviceCards = document.querySelectorAll('.grid.grid-cols-2 > div');
    
    serviceCards.forEach(card => {
        card.addEventListener('click', () => {
            // Remove active state from all cards
            serviceCards.forEach(c => {
                c.classList.remove('bg-primary', 'scale-[1.02]', 'shadow-2xl');
                c.classList.add('bg-white', 'border', 'border-border');
                
                // Reset text colors
                const h4 = c.querySelector('h4');
                const p = c.querySelector('p');
                const span = c.querySelector('span');
                const line = c.querySelector('div');
                
                if (h4) h4.classList.remove('text-white');
                if (h4) h4.classList.add('text-primary');
                if (p) p.classList.remove('text-white/90');
                if (p) p.classList.add('text-secondary');
                if (span) span.classList.remove('text-white');
                if (span) span.classList.add('text-primary');
                if (line) line.classList.remove('bg-white/80');
                if (line) line.classList.add('bg-primary');
            });
            
            // Add active state to clicked card
            card.classList.remove('bg-white', 'border', 'border-border');
            card.classList.add('bg-primary', 'scale-[1.02]', 'shadow-2xl');
            
            // Update text colors
            const h4 = card.querySelector('h4');
            const p = card.querySelector('p');
            const span = card.querySelector('span');
            const line = card.querySelector('div');
            
            if (h4) h4.classList.remove('text-primary');
            if (h4) h4.classList.add('text-white');
            if (p) p.classList.remove('text-secondary');
            if (p) p.classList.add('text-white/90');
            if (span) span.classList.remove('text-primary');
            if (span) span.classList.add('text-white');
            if (line) line.classList.remove('bg-primary');
            if (line) line.classList.add('bg-white/80');
        });
    });
</script>
@endpush