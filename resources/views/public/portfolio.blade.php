@extends('public.layout')

@section('title', 'Shxttyjiro – Portfolio')

@section('content')

<!-- HERO SECTION -->
<section class="pt-80 pb-32">
    <div class="max-w-[1440px] mx-auto px-12">
        <div class="grid grid-cols-[1fr,440px] gap-32 items-center">
            
            <!-- Left Content -->
            <div class="flex flex-col gap-8 pt-10">
                <h1 class="text-[96px] font-normal leading-none text-primary tracking-tight">
                    Beyond Ideas<br>
                    Into Creation.
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
                     alt="Featured work">
                
                <p class="text-sm leading-relaxed text-primary">
                    Custom illustrations crafted to bring your<br>
                    ideas to life from concept to final artwork.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- FEATURED SECTION -->
<section class="py-32">
    <div class="max-w-[1440px] mx-auto px-12">
        
        <!-- Section Title -->
        <h2 class="text-6xl font-normal text-primary mb-16">Latest Project</h2>

        <!-- Big Featured Card -->
        <div class="relative w-full max-w-[1340px] aspect-[1340/690] rounded-2xl overflow-hidden mb-20 group cursor-pointer">
            <img src="{{ asset('assets/SF499P.jpg') }}" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                 alt="Featured Project">
            
            <!-- Overlay Content -->
            <div class="absolute left-8 bottom-8 text-white z-10">
                <h3 class="text-5xl font-medium mb-3">Hanabi Art</h3>
                <span class="text-3xl font-normal opacity-80 block mb-3">2025</span>
                
                <div class="inline-flex items-center px-6 py-2.5 rounded-full bg-white/15 backdrop-blur-md border border-white/20 text-lg font-medium">
                    Featured Project
                </div>
            </div>
        </div>

        <!-- Portfolio List -->
        <div class="flex flex-col gap-16">
            
            <!-- Portfolio Item 1 -->
            <div class="grid grid-cols-[1fr,520px] gap-20 pb-16 border-b border-border/60">
                <div class="flex flex-col justify-between">
                    <div>
                        <h3 class="text-[32px] font-medium text-primary mb-2">Hanabi Art</h3>
                        <span class="text-base text-secondary font-normal block mb-4">2025</span>
                        
                        <div class="inline-flex items-center px-3.5 py-1.5 rounded-full bg-gray-100 text-sm font-normal text-primary mt-4">
                            Full Art Manga
                        </div>
                    </div>

                    <div class="flex gap-16 mt-auto pt-8">
                        <div class="flex flex-col gap-2">
                            <span class="text-sm font-normal text-secondary">Category</span>
                            <p class="text-base font-normal text-primary">Custom Commission</p>
                        </div>

                        <div class="flex flex-col gap-2">
                            <span class="text-sm font-normal text-secondary">Style</span>
                            <p class="text-base font-normal text-primary">Manga Art</p>
                        </div>
                    </div>
                </div>

                <div class="w-full h-80 rounded-2xl overflow-hidden group cursor-pointer">
                    <img src="{{ asset('assets/SF499P.jpg') }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                         alt="Hanabi Art">
                </div>
            </div>

            <!-- Portfolio Item 2 -->
            <div class="grid grid-cols-[1fr,520px] gap-20 pb-16 border-b border-border/60">
                <div class="flex flex-col justify-between">
                    <div>
                        <h3 class="text-[32px] font-medium text-primary mb-2">Hanabi Art</h3>
                        <span class="text-base text-secondary font-normal block mb-4">2025</span>
                        
                        <div class="inline-flex items-center px-3.5 py-1.5 rounded-full bg-gray-100 text-sm font-normal text-primary mt-4">
                            Full Art Manga
                        </div>
                    </div>

                    <div class="flex gap-16 mt-auto pt-8">
                        <div class="flex flex-col gap-2">
                            <span class="text-sm font-normal text-secondary">Category</span>
                            <p class="text-base font-normal text-primary">Custom Commission</p>
                        </div>

                        <div class="flex flex-col gap-2">
                            <span class="text-sm font-normal text-secondary">Style</span>
                            <p class="text-base font-normal text-primary">Manga Art</p>
                        </div>
                    </div>
                </div>

                <div class="w-full h-80 rounded-2xl overflow-hidden group cursor-pointer">
                    <img src="{{ asset('assets/foto12.png') }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                         alt="Portfolio item">
                </div>
            </div>

            <!-- Portfolio Item 3 -->
            <div class="grid grid-cols-[1fr,520px] gap-20 pb-16 border-b border-border/60">
                <div class="flex flex-col justify-between">
                    <div>
                        <h3 class="text-[32px] font-medium text-primary mb-2">Hanabi Art</h3>
                        <span class="text-base text-secondary font-normal block mb-4">2025</span>
                        
                        <div class="inline-flex items-center px-3.5 py-1.5 rounded-full bg-gray-100 text-sm font-normal text-primary mt-4">
                            Full Art Manga
                        </div>
                    </div>

                    <div class="flex gap-16 mt-auto pt-8">
                        <div class="flex flex-col gap-2">
                            <span class="text-sm font-normal text-secondary">Category</span>
                            <p class="text-base font-normal text-primary">Custom Commission</p>
                        </div>

                        <div class="flex flex-col gap-2">
                            <span class="text-sm font-normal text-secondary">Style</span>
                            <p class="text-base font-normal text-primary">Manga Art</p>
                        </div>
                    </div>
                </div>

                <div class="w-full h-80 rounded-2xl overflow-hidden group cursor-pointer">
                    <img src="{{ asset('assets/foto13.jpg') }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                         alt="Portfolio item">
                </div>
            </div>

            <!-- Portfolio Item 4 -->
            <div class="grid grid-cols-[1fr,520px] gap-20 pb-16 border-b border-border/60">
                <div class="flex flex-col justify-between">
                    <div>
                        <h3 class="text-[32px] font-medium text-primary mb-2">Hanabi Art</h3>
                        <span class="text-base text-secondary font-normal block mb-4">2025</span>
                        
                        <div class="inline-flex items-center px-3.5 py-1.5 rounded-full bg-gray-100 text-sm font-normal text-primary mt-4">
                            Full Art Manga
                        </div>
                    </div>

                    <div class="flex gap-16 mt-auto pt-8">
                        <div class="flex flex-col gap-2">
                            <span class="text-sm font-normal text-secondary">Category</span>
                            <p class="text-base font-normal text-primary">Custom Commission</p>
                        </div>

                        <div class="flex flex-col gap-2">
                            <span class="text-sm font-normal text-secondary">Style</span>
                            <p class="text-base font-normal text-primary">Manga Art</p>
                        </div>
                    </div>
                </div>

                <div class="w-full h-80 rounded-2xl overflow-hidden group cursor-pointer">
                    <img src="{{ asset('assets/foto14.jpg') }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                         alt="Portfolio item">
                </div>
            </div>

            <!-- Portfolio Item 5 -->
            <div class="grid grid-cols-[1fr,520px] gap-20">
                <div class="flex flex-col justify-between">
                    <div>
                        <h3 class="text-[32px] font-medium text-primary mb-2">Hanabi Art</h3>
                        <span class="text-base text-secondary font-normal block mb-4">2025</span>
                        
                        <div class="inline-flex items-center px-3.5 py-1.5 rounded-full bg-gray-100 text-sm font-normal text-primary mt-4">
                            Full Art Manga
                        </div>
                    </div>

                    <div class="flex gap-16 mt-auto pt-8">
                        <div class="flex flex-col gap-2">
                            <span class="text-sm font-normal text-secondary">Category</span>
                            <p class="text-base font-normal text-primary">Custom Commission</p>
                        </div>

                        <div class="flex flex-col gap-2">
                            <span class="text-sm font-normal text-secondary">Style</span>
                            <p class="text-base font-normal text-primary">Manga Art</p>
                        </div>
                    </div>
                </div>

                <div class="w-full h-80 rounded-2xl overflow-hidden group cursor-pointer">
                    <img src="{{ asset('assets/foto15.jpg') }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                         alt="Portfolio item">
                </div>
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