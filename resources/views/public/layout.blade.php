<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Shxttyjiro – Illustration Commission')</title>
    
    <!-- Satoshi Font -->
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@700,500,400&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        satoshi: ['Satoshi', 'sans-serif'],
                    },
                    colors: {
                        primary: '#1E1E1E',
                        background: '#FAFAFA',
                        secondary: '#6F6F6F',
                        border: '#E5E5E5',
                    },
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Satoshi', sans-serif;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-background text-primary antialiased">

    <!-- NAVBAR -->
    <header class="sticky top-0 z-50 bg-background/80 backdrop-blur-md border-b border-border/50">
        <div class="max-w-[1440px] mx-auto px-12 py-6">
            <div class="flex items-center justify-between">
                
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-2.5 group">
                    <img src="{{ asset('assets/shape.svg') }}" alt="logo" class="w-8 h-8 transition-transform group-hover:rotate-12">
                    <span class="text-[26px] font-medium text-primary">Shxttyjiro</span>
                </a>

                <!-- Navigation -->
                <nav class="hidden md:flex items-center gap-12">
                    <a href="{{ url('/about') }}" class="text-lg font-normal text-primary hover:opacity-60 transition-opacity">About</a>
                    <a href="{{ url('/service') }}" class="text-lg font-normal text-primary hover:opacity-60 transition-opacity">Service</a>
                    <a href="{{ url('/portfolio') }}" class="text-lg font-normal text-primary hover:opacity-60 transition-opacity">Portfolio</a>
                    <a href="{{ url('/how-it-works') }}" class="text-lg font-normal text-primary hover:opacity-60 transition-opacity">How It Works</a>
                </nav>

                <!-- CTA Button -->
                <a href="https://wa.me/6282200539193" 
                   target="_blank" 
                   rel="noopener"
                   class="hidden md:inline-flex px-6 py-3 rounded-full border border-primary/15 bg-transparent text-primary font-medium hover:bg-primary hover:text-white transition-all duration-300">
                    Let's Talk
                </a>

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 text-primary">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-primary text-white mt-auto">
        <div class="max-w-[1440px] mx-auto px-12 py-32">
            
            <!-- Top CTA Section -->
            <div class="flex justify-between items-start mb-20">
                <h2 class="text-6xl font-medium leading-tight">
                    Let's Connect<br>
                    There
                </h2>

                <a href="https://wa.me/6282200539193" 
                   target="_blank"
                   rel="noopener"
                   class="px-7 py-3.5 rounded-full border border-white/20 bg-transparent text-white font-medium hover:bg-white hover:text-primary transition-all duration-300">
                    Let's Talk
                </a>
            </div>

            <!-- Divider -->
            <div class="h-px bg-white/15 mb-20"></div>

            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 lg:grid-cols-[420px,1fr] gap-20 mb-20">
                
                <!-- Brand Section -->
                <div>
                    <div class="flex items-center gap-2.5 mb-4">
                        <img src="{{ asset('assets/ShapeWhite.svg') }}" alt="logo" class="w-8 h-8">
                        <span class="text-2xl font-medium">Shxttyjiro</span>
                    </div>

                    <p class="text-white/90 max-w-xs mb-6 leading-relaxed">
                        Illustration artist focused on character design, anime inspired visuals, and custom illustration commissions.
                    </p>

                    <!-- Social Icons -->
                    <div class="flex gap-5">
                        <a href="#" class="hover:opacity-70 transition-opacity" aria-label="Instagram">
                            <img src="{{ asset('assets/instagram.svg') }}" alt="Instagram" class="w-6 h-6">
                        </a>
                        <a href="#" class="hover:opacity-70 transition-opacity" aria-label="X">
                            <img src="{{ asset('assets/X.svg') }}" alt="X" class="w-6 h-6">
                        </a>
                        <a href="#" class="hover:opacity-70 transition-opacity" aria-label="TikTok">
                            <img src="{{ asset('assets/Tiktok.svg') }}" alt="TikTok" class="w-6 h-6">
                        </a>
                    </div>
                </div>

                <!-- Info Columns -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div>
                        <h5 class="text-base font-medium mb-3 text-white">Address</h5>
                        <p class="text-white/70 leading-relaxed">Indonesia</p>
                        <p class="text-white/70 leading-relaxed">Bojonegoro, East Java</p>
                    </div>

                    <div>
                        <h5 class="text-base font-medium mb-3 text-white">Email Address</h5>
                        <p class="text-white/70 leading-relaxed">shxttyjiro@gmail.com</p>
                    </div>

                    <div>
                        <h5 class="text-base font-medium mb-3 text-white">Contact Number</h5>
                        <p class="text-white/70 leading-relaxed">+62 822 0053 9193</p>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="h-px bg-white/15 mb-10"></div>

            <!-- Copyright -->
            <div class="text-center">
                <p class="text-sm text-white/50">All rights reserved ©Shxttyjiro {{ date('Y') }}</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>