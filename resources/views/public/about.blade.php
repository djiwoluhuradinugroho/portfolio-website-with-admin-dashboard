@extends('public.layout')

@section('title', 'Shxttyjiro – About')

@section('content')

<!-- HERO SECTION -->
<section class="pt-80 pb-32">
    <div class="max-w-[1440px] mx-auto px-12">
        <div class="grid grid-cols-[1fr,440px] gap-32 items-center">
            
            <!-- Left Content -->
            <div class="flex flex-col gap-8 pt-10">
                <h1 class="text-[96px] font-normal leading-none text-primary tracking-tight">
                    Illustration<br>
                    beyond visuals
                </h1>

                <div class="flex gap-4">
                    <a href="https://wa.me/6282200539193" 
                       target="_blank"
                       rel="noopener"
                       class="px-7 py-3 rounded-full bg-primary text-white font-medium hover:-translate-y-0.5 hover:shadow-2xl transition-all duration-300">
                        Lets Talk
                    </a>
                    <a href="{{ url('/portfolio') }}" 
                       class="px-7 py-3.5 rounded-full border border-primary/15 bg-transparent text-primary font-medium hover:bg-primary hover:text-white transition-all duration-300">
                        View Portfolio
                    </a>
                </div>
            </div>

            <!-- Right Image -->
            <div class="flex flex-col gap-5">
                <img src="{{ asset('assets/foto11.jpg') }}" 
                     class="w-full h-auto object-cover rounded-2xl" 
                     alt="Illustration work">
                
                <p class="text-sm leading-relaxed text-primary">
                    Creating characters through<br>
                    illustrations.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- STATS SECTION -->
<section class="py-32">
    <div class="max-w-[1440px] mx-auto px-12">
        
        <!-- Title -->
        <h2 class="text-5xl font-normal mb-10 text-primary">
            Creating characters through illustration.
        </h2>

        <!-- Big Image -->
        <div class="w-full aspect-[1480/683] overflow-hidden rounded-2xl mb-16">
            <img src="{{ asset('assets/foto11.jpg') }}" 
                 class="w-full h-full object-cover" 
                 alt="Featured work">
        </div>

        <!-- Stats Row -->
        <div class="grid grid-cols-[1fr,1fr,1.2fr] gap-20">
            
            <!-- Stat 1 -->
            <div class="flex flex-col gap-3">
                <h2 class="text-5xl font-medium text-primary">120+</h2>
                <p class="text-base text-secondary leading-relaxed">
                    Delivered custom artworks for clients...
                </p>
            </div>

            <!-- Stat 2 -->
            <div class="flex flex-col gap-3">
                <h2 class="text-5xl font-medium text-primary">3+</h2>
                <p class="text-base text-secondary leading-relaxed">
                    Years of experience creating illustrations
                </p>
            </div>

            <!-- Description -->
            <div class="flex flex-col gap-3">
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
                <div class="relative bg-primary rounded-xl p-6 min-h-[220px] flex flex-col cursor-pointer scale-[1.02] shadow-2xl">
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
            serviceCards.forEach(c => {
                c.classList.remove('bg-primary', 'scale-[1.02]', 'shadow-2xl');
                c.classList.add('bg-white', 'border', 'border-border');
            });
            
            card.classList.remove('bg-white', 'border', 'border-border');
            card.classList.add('bg-primary', 'scale-[1.02]', 'shadow-2xl');
        });
    });
</script>
@endpush