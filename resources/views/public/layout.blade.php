<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        /* Mobile menu transition */
        #mobile-menu {
            transition: opacity 0.2s ease, transform 0.2s ease;
        }
        #mobile-menu.hidden {
            opacity: 0;
            pointer-events: none;
            transform: translateY(-8px);
        }
        #mobile-menu.open {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0);
        }

        /* Commission closed overlay animations */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes scanline {
            0%   { transform: translateY(-100%); }
            100% { transform: translateY(100vh); }
        }
        @keyframes flicker {
            0%, 95%, 100% { opacity: 1; }
            96%            { opacity: 0.85; }
            97%            { opacity: 1; }
            98%            { opacity: 0.9; }
        }
        @keyframes ticker {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50%       { opacity: 0; }
        }

        .closed-overlay {
            animation: flicker 6s ease-in-out infinite;
        }
        .closed-card {
            animation: fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) both;
        }
        .scanline-bar {
            animation: scanline 4s linear infinite;
        }
        .ticker-inner {
            animation: ticker 18s linear infinite;
            white-space: nowrap;
        }
        .cursor-blink {
            animation: blink 1s step-end infinite;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-background text-primary antialiased">

@php
$logoPlacement = \App\Models\ImagePlacement::where('key','logo')
    ->with('artworks')
    ->first();
$logoArtwork = $logoPlacement?->artworks->first();

$commissionStatus = DB::table('settings')
    ->where('key','commission_status')
    ->value('value');
@endphp

{{-- ============================================================
     COMMISSION CLOSED OVERLAY
     Diletakkan di LUAR div blur supaya teks tidak ikut blur
     ============================================================ --}}
@if($commissionStatus == 'closed')
<div class="closed-overlay fixed inset-0 z-[99999] flex flex-col items-center justify-center overflow-hidden bg-[#0d0d0d]">

    {{-- Subtle scanline effect --}}
    <div class="scanline-bar pointer-events-none absolute left-0 w-full h-[2px] opacity-[0.06]"
         style="background: white;"></div>

    {{-- Fine grid pattern --}}
    <div class="pointer-events-none absolute inset-0 opacity-[0.04]"
         style="background-image: linear-gradient(rgba(255,255,255,0.6) 1px, transparent 1px),
                                  linear-gradient(90deg, rgba(255,255,255,0.6) 1px, transparent 1px);
                background-size: 40px 40px;"></div>

    {{-- Corner marks --}}
    <div class="pointer-events-none absolute top-8 left-8 w-10 h-10 border-t-2 border-l-2 border-white/20"></div>
    <div class="pointer-events-none absolute top-8 right-8 w-10 h-10 border-t-2 border-r-2 border-white/20"></div>
    <div class="pointer-events-none absolute bottom-16 left-8 w-10 h-10 border-b-2 border-l-2 border-white/20"></div>
    <div class="pointer-events-none absolute bottom-16 right-8 w-10 h-10 border-b-2 border-r-2 border-white/20"></div>

    {{-- Main card --}}
    <div class="closed-card relative z-10 flex flex-col items-center text-center px-10 py-14 max-w-md w-full mx-6"
         style="border: 1px solid rgba(255,255,255,0.12); background: rgba(255,255,255,0.03);">

        {{-- Top label --}}
        <p class="text-[10px] font-semibold tracking-[0.35em] uppercase text-white/30 mb-10">
            shxttyjiro · illustration
        </p>

        {{-- Big X icon --}}
        <div class="mb-8 w-16 h-16 flex items-center justify-center border border-white/20"
             style="background: rgba(255,255,255,0.04);">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.7)" stroke-width="1.5">
                <path d="M18 6L6 18M6 6l12 12"/>
            </svg>
        </div>

        {{-- Title --}}
        <h1 class="text-[52px] font-bold text-white leading-none tracking-tight mb-2"
            style="font-family: 'Satoshi', sans-serif; letter-spacing: -0.03em;">
            CLOSED
        </h1>

        {{-- Subtitle --}}
        <p class="text-xs tracking-[0.2em] uppercase text-white/30 mb-8">
            Commissions · Not Available
        </p>

        {{-- Divider --}}
        <div class="w-full h-px bg-white/10 mb-8"></div>

        {{-- Description --}}
        <p class="text-sm text-white/50 leading-relaxed mb-10">
            Saat ini aku tidak menerima commission.<br>
            Pantau update di sosial media ya<span class="cursor-blink text-white/40">_</span>
        </p>

        {{-- Social buttons --}}
        <div class="flex gap-3 w-full">
            <a href="https://www.instagram.com/shxttyjiro_" target="_blank" rel="noopener"
               class="flex-1 py-3 text-xs font-semibold tracking-[0.15em] uppercase text-white/60 transition-all duration-200"
               style="border: 1px solid rgba(255,255,255,0.12);"
               onmouseover="this.style.background='rgba(255,255,255,0.08)'; this.style.color='rgba(255,255,255,1)';"
               onmouseout="this.style.background='transparent'; this.style.color='rgba(255,255,255,0.6)';">
                Instagram
            </a>
            <a href="https://x.com/louise0k" target="_blank" rel="noopener"
               class="flex-1 py-3 text-xs font-semibold tracking-[0.15em] uppercase text-white/60 transition-all duration-200"
               style="border: 1px solid rgba(255,255,255,0.12);"
               onmouseover="this.style.background='rgba(255,255,255,0.08)'; this.style.color='rgba(255,255,255,1)';"
               onmouseout="this.style.background='transparent'; this.style.color='rgba(255,255,255,0.6)';">
                X / Twitter
            </a>
        </div>
    </div>

    {{-- Bottom ticker --}}
    <div class="absolute bottom-0 left-0 right-0 overflow-hidden border-t border-white/10 py-3 bg-[#0d0d0d]">
        <div class="ticker-inner inline-block text-[10px] tracking-[0.25em] uppercase text-white/20">
            &nbsp;&nbsp;&nbsp;Commission Closed &nbsp;·&nbsp; Check Back Later &nbsp;·&nbsp; Follow For Updates &nbsp;·&nbsp; @shxttyjiro &nbsp;·&nbsp;
            Commission Closed &nbsp;·&nbsp; Check Back Later &nbsp;·&nbsp; Follow For Updates &nbsp;·&nbsp; @shxttyjiro &nbsp;·&nbsp;
            Commission Closed &nbsp;·&nbsp; Check Back Later &nbsp;·&nbsp; Follow For Updates &nbsp;·&nbsp; @shxttyjiro &nbsp;·&nbsp;
        </div>
    </div>
</div>
@endif

{{-- ============================================================
     MAIN SITE (blurred when closed)
     ============================================================ --}}
<div class="{{ $commissionStatus == 'closed' ? 'blur-sm pointer-events-none select-none' : '' }}">

    <!-- NAVBAR -->
    <header class="sticky top-0 z-50 bg-background/80 backdrop-blur-md border-b border-border/50">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 py-4 md:py-6">
            <div class="flex items-center justify-between">
                
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-2.5 group">
                    @if($logoArtwork)
                        <img src="{{ asset('storage/'.$logoArtwork->image_path) }}"
                             class="w-7 h-7 md:w-8 md:h-8 transition-transform group-hover:rotate-12">
                    @else
                        <img src="{{ asset('assets/shape.svg') }}"
                             class="w-7 h-7 md:w-8 md:h-8 transition-transform group-hover:rotate-12">
                    @endif
                    <span class="text-[22px] md:text-[26px] font-medium text-primary">Shxttyjiro</span>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center gap-12">
                    <a href="{{ url('/about') }}" class="text-lg font-normal text-primary hover:opacity-60 transition-opacity">About</a>
                    <a href="{{ url('/service') }}" class="text-lg font-normal text-primary hover:opacity-60 transition-opacity">Service</a>
                    <a href="{{ url('/portfolio') }}" class="text-lg font-normal text-primary hover:opacity-60 transition-opacity">Portofolio</a>
                    <a href="{{ url('/how-it-works') }}" class="text-lg font-normal text-primary hover:opacity-60 transition-opacity">How It Works</a>
                </nav>

                <!-- Desktop CTA -->
                <a href="https://wa.me/6285887807176" 
                   target="_blank" 
                   rel="noopener"
                   class="hidden md:inline-flex px-6 py-3 rounded-full border border-primary/15 bg-transparent text-primary font-medium hover:bg-primary hover:text-white transition-all duration-300">
                    Let's Talk
                </a>

                <!-- Mobile Menu Button -->
                <button id="menu-toggle" class="md:hidden p-2 text-primary" aria-label="Toggle menu">
                    <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-border/50 bg-background/95 backdrop-blur-md">
            <div class="max-w-[1440px] mx-auto px-6 py-6 flex flex-col gap-1">
                <a href="{{ url('/about') }}" class="text-lg font-normal text-primary py-3 hover:opacity-60 transition-opacity border-b border-border/40">About</a>
                <a href="{{ url('/service') }}" class="text-lg font-normal text-primary py-3 hover:opacity-60 transition-opacity border-b border-border/40">Service</a>
                <a href="{{ url('/portfolio') }}" class="text-lg font-normal text-primary py-3 hover:opacity-60 transition-opacity border-b border-border/40">Portofolio</a>
                <a href="{{ url('/how-it-works') }}" class="text-lg font-normal text-primary py-3 hover:opacity-60 transition-opacity border-b border-border/40">How It Works</a>
                <a href="https://wa.me/6285887807176" 
                   target="_blank" 
                   rel="noopener"
                   class="mt-4 w-full text-center px-6 py-3 rounded-full bg-primary text-white font-medium transition-all duration-300">
                    Let's Talk
                </a>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-primary text-white mt-auto">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 py-16 md:py-32">
            
            <div class="flex flex-col sm:flex-row justify-between items-start gap-8 mb-12 md:mb-20">
                <h2 class="text-4xl md:text-6xl font-medium leading-tight">
                    Let's Connect<br>
                    There
                </h2>

                <a href="https://wa.me/6285887807176" 
                   target="_blank"
                   rel="noopener"
                   class="px-7 py-3.5 rounded-full border border-white/20 bg-transparent text-white font-medium hover:bg-white hover:text-primary transition-all duration-300 whitespace-nowrap">
                    Let's Talk
                </a>
            </div>

            <div class="h-px bg-white/15 mb-12 md:mb-20"></div>

            <div class="grid grid-cols-1 lg:grid-cols-[420px,1fr] gap-12 md:gap-20 mb-12 md:mb-20">
                
                <div>
                    <div class="flex items-center gap-2.5 mb-4">
                        @if($logoArtwork)
                            <img src="{{ asset('storage/'.$logoArtwork->image_path) }}"
                                 class="w-8 h-8 brightness-0 invert">
                        @else
                            <img src="{{ asset('assets/ShapeWhite.svg') }}"
                                 class="w-8 h-8">
                        @endif
                        <span class="text-2xl font-medium">Shxttyjiro</span>
                    </div>

                    <p class="text-white/90 max-w-xs mb-6 leading-relaxed">
                        Illustration artist focused on character design, anime inspired visuals, and custom illustration commissions.
                    </p>

                    <div class="flex gap-5">
                        <a href="https://www.instagram.com/shxttyjiro_?igsh=eWZibXpicXZtOTh6" class="hover:opacity-70 transition-opacity" aria-label="Instagram">
                            <img src="{{ asset('storage/assets/instagram.svg') }}" alt="Instagram" class="w-6 h-6">
                        </a>
                        <a href="https://x.com/louise0k" class="hover:opacity-70 transition-opacity" aria-label="X">
                            <img src="{{ asset('storage/assets/X.svg') }}" alt="X" class="w-6 h-6">
                        </a>
                        <a href="https://www.tiktok.com/@louise0kkk" class="hover:opacity-70 transition-opacity" aria-label="TikTok">
                            <img src="{{ asset('storage/assets/Tiktok.svg') }}" alt="TikTok" class="w-6 h-6">
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 md:gap-12">
                    <div>
                        <h5 class="text-base font-medium mb-3 text-white">Address</h5>
                        <p class="text-white/70 leading-relaxed">Indonesia</p>
                        <p class="text-white/70 leading-relaxed">Bekasi, West Java</p>
                    </div>

                    <div>
                        <h5 class="text-base font-medium mb-3 text-white">Email Address</h5>
                        <p class="text-white/70 leading-relaxed">shxttyjiro@gmail.com</p>
                    </div>

                    <div>
                        <h5 class="text-base font-medium mb-3 text-white">Contact Number</h5>
                        <p class="text-white/70 leading-relaxed">+62 858 8780 7176</p>
                    </div>
                </div>
            </div>

            <div class="h-px bg-white/15 mb-8 md:mb-10"></div>

            <div class="text-center">
                <p class="text-sm text-white/50">All rights reserved ©Shxttyjiro {{ date('Y') }}</p>
            </div>
        </div>
    </footer>

    <!-- Chatbot Bubble -->
    <div id="chat-toggle"
         class="fixed bottom-6 right-6 z-[9999] w-14 h-14 rounded-full bg-primary text-white 
                flex items-center justify-center cursor-pointer shadow-lg hover:scale-105 transition">
        💬
    </div>

    <!-- Chatbot Box -->
    <div id="chat-box"
         class="hidden fixed bottom-24 right-6 z-[9999] w-[340px] max-w-[90vw]
                bg-white rounded-2xl shadow-2xl flex flex-col overflow-hidden"
         style="height: 500px; max-height: 80vh;">

        <!-- Header -->
        <div class="flex items-center justify-between px-4 py-3 bg-primary text-white shrink-0">
            <span class="font-medium text-sm">Shxttyjiro Assistant</span>
            <button id="chat-close" class="text-white/80 hover:text-white">✕</button>
        </div>

        <!-- Messages -->
        <div id="chat-messages"
             class="flex-1 px-4 py-3 space-y-2 overflow-y-auto text-sm min-h-0">
            <div class="bg-gray-100 rounded-xl px-3 py-2 w-fit max-w-[85%]">
                Hi! 👋 Aku bisa bantu soal ilustrasi & commission kamu ✨
            </div>
        </div>

        <!-- Input -->
        <div class="p-2 border-t flex gap-2 shrink-0">
            <input id="chat-input"
                   class="flex-1 border rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-300"
                   placeholder="Type your message..." />
            <button id="chat-send"
                    class="bg-primary text-white px-3 rounded">
                Send
            </button>
        </div>
    </div>

    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const chatToggle = document.getElementById('chat-toggle');
            const chatBox    = document.getElementById('chat-box');
            const chatClose  = document.getElementById('chat-close');
            const chatSend   = document.getElementById('chat-send');
            const chatInput  = document.getElementById('chat-input');
            const chatMessages = document.getElementById('chat-messages');

            if (!chatToggle || !chatBox) return;

            chatToggle.addEventListener('click', () => {
                chatBox.classList.toggle('hidden');
            });

            chatClose.addEventListener('click', () => {
                chatBox.classList.add('hidden');
            });

            chatSend.addEventListener('click', sendMessage);
            chatInput.addEventListener('keypress', e => {
                if (e.key === 'Enter') sendMessage();
            });

            function sendMessage() {
                const text = chatInput.value.trim();
                if (!text) return;

                appendMessage(text, 'user');
                chatInput.value = '';

                fetch('/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ message: text })
                })
                .then(res => res.json())
                .then(data => {
                    const cleanReply = stripHtml(data.reply);
                    appendMessage(cleanReply, 'bot');
                    if (data.wa_link) {
                        appendWaButton();
                    }
                })
                .catch(() => {
                    appendMessage('Maaf, terjadi kesalahan. Silakan coba lagi.', 'bot');
                });
            }

            function stripHtml(html) {
                const tmp = document.createElement('div');
                tmp.innerHTML = html;
                return tmp.innerText || tmp.textContent || '';
            }

            function appendMessage(text, sender) {
                const msg = document.createElement('div');
                msg.className =
                    sender === 'user'
                        ? 'ml-auto bg-primary text-white rounded-xl px-3 py-2 w-fit max-w-[85%] break-words'
                        : 'bg-gray-100 rounded-xl px-3 py-2 w-fit max-w-[85%] break-words';
                msg.innerHTML = text.replace(/\n/g, '<br>');
                chatMessages.appendChild(msg);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            function appendWaButton() {
                const a = document.createElement('a');
                a.href = 'https://wa.me/6285887807176';
                a.target = '_blank';
                a.rel = 'noopener noreferrer';
                a.style.cssText = [
                    'display:inline-flex',
                    'align-items:center',
                    'gap:8px',
                    'padding:8px 16px',
                    'background:#25D366',
                    'color:white',
                    'border-radius:12px',
                    'font-size:14px',
                    'font-weight:600',
                    'text-decoration:none',
                    'box-shadow:0 1px 4px rgba(0,0,0,0.15)',
                    'cursor:pointer'
                ].join(';');

                a.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                        <path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.126 1.533 5.862L.057 23.428a.75.75 0 0 0 .915.915l5.566-1.476A11.953 11.953 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.75a9.726 9.726 0 0 1-4.964-1.361l-.355-.212-3.684.976.991-3.595-.232-.37A9.712 9.712 0 0 1 2.25 12C2.25 6.615 6.615 2.25 12 2.25S21.75 6.615 21.75 12 17.385 21.75 12 21.75z"/>
                    </svg>
                    Lanjut ke WhatsApp
                `;

                chatMessages.appendChild(a);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        });

        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const iconOpen   = document.getElementById('icon-open');
        const iconClose  = document.getElementById('icon-close');

        menuToggle.addEventListener('click', () => {
            const isOpen = mobileMenu.classList.contains('open');
            if (isOpen) {
                mobileMenu.classList.remove('open');
                mobileMenu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
            } else {
                mobileMenu.classList.remove('hidden');
                mobileMenu.offsetHeight;
                mobileMenu.classList.add('open');
                iconOpen.classList.add('hidden');
                iconClose.classList.remove('hidden');
            }
        });

        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('open');
                mobileMenu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
            });
        });
    </script>
</div>
</body>
</html>