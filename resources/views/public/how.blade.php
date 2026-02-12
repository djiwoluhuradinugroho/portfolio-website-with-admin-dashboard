@extends('public.layout')

@section('title', 'Shxttyjiro – How It Works')

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
                     alt="Process illustration">
                
                <p class="text-sm leading-relaxed text-primary">
                    Custom illustrations crafted to bring your<br>
                    ideas to life from concept to final artwork.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- HOW IT WORKS SECTION -->
<section class="py-32">
    <div class="max-w-[1440px] mx-auto px-12">

        <!-- Step 01 -->
        <div class="grid grid-cols-[1fr,520px] gap-20 items-start mb-32">
            <div class="max-w-lg">
                <span class="text-secondary mb-2 block">01.</span>
                <h3 class="text-2xl font-medium text-primary mb-3">Consultation</h3>
                <p class="text-base text-secondary leading-relaxed">
                    Start by discussing your design ideas with our admin. Tell us what style you want, share references, and explain your vision we'll help shape it into a clear concept.
                </p>
            </div>

            <div class="w-[520px] h-[520px]">
                <img src="{{ asset('assets/foto12.png') }}" 
                     class="w-full h-full object-cover rounded-2xl" 
                     alt="Consultation step">
            </div>
        </div>

        <!-- Step 02 -->
        <div class="grid grid-cols-[1fr,520px] gap-20 items-start mb-32">
            <div class="max-w-lg">
                <span class="text-secondary mb-2 block">02.</span>
                <h3 class="text-2xl font-medium text-primary mb-3">Sketch Creation</h3>
                <p class="text-base text-secondary leading-relaxed">
                    After the consultation, we create an initial sketch based on your request so you can see the basic composition and direction.
                </p>
            </div>

            <div class="w-[520px] h-[520px]">
                <img src="{{ asset('assets/foto2.jpg') }}" 
                     class="w-full h-full object-cover rounded-2xl" 
                     alt="Sketch creation">
            </div>
        </div>

        <!-- Step 03 -->
        <div class="grid grid-cols-[1fr,520px] gap-20 items-start mb-32">
            <div class="max-w-lg">
                <span class="text-secondary mb-2 block">03.</span>
                <h3 class="text-2xl font-medium text-primary mb-3">Revision</h3>
                <p class="text-base text-secondary leading-relaxed">
                    Not satisfied yet? No worries! You can request revisions until the sketch matches your expectations.
                </p>
            </div>

            <div class="w-[520px] h-[520px]">
                <img src="{{ asset('assets/foto13.jpg') }}" 
                     class="w-full h-full object-cover rounded-2xl" 
                     alt="Revision process">
            </div>
        </div>

        <!-- Step 04 -->
        <div class="grid grid-cols-[1fr,520px] gap-20 items-start mb-32">
            <div class="max-w-lg">
                <span class="text-secondary mb-2 block">04.</span>
                <h3 class="text-2xl font-medium text-primary mb-3">Payment Before Final</h3>
                <p class="text-base text-secondary leading-relaxed">
                    Once the sketch is approved, payment is required before we proceed to the final artwork.
                </p>
            </div>

            <div class="w-[520px] h-[520px]">
                <img src="{{ asset('assets/foto15.jpg') }}" 
                     class="w-full h-full object-cover rounded-2xl" 
                     alt="Payment step">
            </div>
        </div>

        <!-- Step 05 -->
        <div class="grid grid-cols-[1fr,520px] gap-20 items-start">
            <div class="max-w-lg">
                <span class="text-secondary mb-2 block">05.</span>
                <h3 class="text-2xl font-medium text-primary mb-3">Final Delivery</h3>
                <p class="text-base text-secondary leading-relaxed">
                    We complete your illustration in full detail and deliver the final result ready to use!
                </p>
            </div>

            <div class="w-[520px] h-[520px]">
                <img src="{{ asset('assets/foto5.jpg') }}" 
                     class="w-full h-full object-cover rounded-2xl" 
                     alt="Final delivery">
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