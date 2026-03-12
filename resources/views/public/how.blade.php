@extends('public.layout')

@section('title', 'Shxttyjiro – How It Works')

@section('content')

<!-- HERO SECTION -->
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
    </div>
</section>

<!-- HOW IT WORKS SECTION -->
<section class="py-16 md:py-32">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">

        @php
        $steps = [
            ['key' => 'how_step_1', 'num' => '01.', 'title' => 'Consultation',        'desc' => "Start by discussing your design ideas with our admin. Tell us what style you want, share references, and explain your vision we'll help shape it into a clear concept."],
            ['key' => 'how_step_2', 'num' => '02.', 'title' => 'Sketch Creation',     'desc' => 'After the consultation, we create an initial sketch based on your request so you can see the basic composition and direction.'],
            ['key' => 'how_step_3', 'num' => '03.', 'title' => 'Revision',            'desc' => 'Not satisfied yet? No worries! You can request revisions until the sketch matches your expectations.'],
            ['key' => 'how_step_4', 'num' => '04.', 'title' => 'Payment Before Final','desc' => 'Once the sketch is approved, payment is required before we proceed to the final artwork.'],
            ['key' => 'how_step_5', 'num' => '05.', 'title' => 'Final Delivery',      'desc' => 'We complete your illustration in full detail and deliver the final result ready to use!'],
        ];
        @endphp

        @foreach($steps as $i => $step)
        <div class="grid grid-cols-1 md:grid-cols-[1fr,520px] gap-8 md:gap-20 items-start {{ !$loop->last ? 'mb-16 md:mb-32' : '' }}">
            <div class="max-w-lg">
                <span class="text-secondary mb-2 block">{{ $step['num'] }}</span>
                <h3 class="text-2xl font-medium text-primary mb-3">{{ $step['title'] }}</h3>
                <p class="text-base text-secondary leading-relaxed">{{ $step['desc'] }}</p>
            </div>

            <div class="w-full aspect-square md:w-[520px] md:h-[520px]">
                @php $placement = $placements[$step['key']] ?? null; @endphp
                @if($placement && $placement->artworks->count())
                    @php $img = $placement->artworks->first(); @endphp
                    <img src="{{ asset('storage/'.$img->image_path) }}"
                         class="w-full h-full object-cover rounded-2xl"
                         alt="{{ $step['title'] }}">
                @endif
            </div>
        </div>
        @endforeach

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

@endsection