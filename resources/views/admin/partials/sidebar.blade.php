<div class="h-full flex flex-col" style="background:#0d0d0d;">

    {{-- HEADER --}}
    <div class="px-6 py-6" style="border-bottom:1px solid rgba(255,255,255,0.07);">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center font-bold text-sm"
                 style="background:linear-gradient(135deg,#fff 0%,#888 100%);color:#0d0d0d;letter-spacing:-0.02em;">
                SJ
            </div>
            <div>
                <h1 class="font-bold text-lg" style="color:#fff;">Shxttyjiro</h1>
                <p class="text-xs" style="color:rgba(255,255,255,0.3);">Admin Panel</p>
            </div>
        </div>
    </div>

    {{-- NAVIGATION --}}
    <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
           style="{{ request()->routeIs('admin.dashboard') ? 'background:rgba(255,255,255,0.08);color:#fff;' : 'color:rgba(255,255,255,0.45);' }}"
           class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 hover:bg-white/5 hover:!text-white">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 style="{{ request()->routeIs('admin.dashboard') ? 'color:#fff;' : 'color:rgba(255,255,255,0.35);' }}">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="font-medium text-sm">Dashboard</span>
            @if(request()->routeIs('admin.dashboard'))
                <span class="ml-auto w-1.5 h-1.5 rounded-full" style="background:#fff;opacity:0.5;"></span>
            @endif
        </a>

        {{-- View Website --}}
        <a href="{{ route('home') }}" target="_blank"
           style="color:rgba(255,255,255,0.45);"
           class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 hover:bg-white/5 hover:!text-white">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 style="color:rgba(255,255,255,0.35);">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 12a9 9 0 11-6.219-8.56M21 3v6h-6"/>
            </svg>
            <span class="font-medium text-sm">View Website</span>
            <svg class="w-3 h-3 ml-auto opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
            </svg>
        </a>

        {{-- Divider --}}
        <div style="height:1px;background:rgba(255,255,255,0.05);margin:8px 0;"></div>

        {{-- Artworks --}}
        <a href="{{ route('admin.artworks.index') }}"
           style="{{ request()->routeIs('admin.artworks.*') ? 'background:rgba(255,255,255,0.08);color:#fff;' : 'color:rgba(255,255,255,0.45);' }}"
           class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 hover:bg-white/5 hover:!text-white">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 style="{{ request()->routeIs('admin.artworks.*') ? 'color:#fff;' : 'color:rgba(255,255,255,0.35);' }}">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="font-medium text-sm">Artworks</span>
            @if(request()->routeIs('admin.artworks.*'))
                <span class="ml-auto w-1.5 h-1.5 rounded-full" style="background:#fff;opacity:0.5;"></span>
            @endif
        </a>

        {{-- Commission Prices --}}
        <a href="{{ route('admin.prices.index') }}"
           style="{{ request()->routeIs('admin.prices.*') ? 'background:rgba(255,255,255,0.08);color:#fff;' : 'color:rgba(255,255,255,0.45);' }}"
           class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 hover:bg-white/5 hover:!text-white">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 style="{{ request()->routeIs('admin.prices.*') ? 'color:#fff;' : 'color:rgba(255,255,255,0.35);' }}">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-medium text-sm">Commission Prices</span>
            @if(request()->routeIs('admin.prices.*'))
                <span class="ml-auto w-1.5 h-1.5 rounded-full" style="background:#fff;opacity:0.5;"></span>
            @endif
        </a>

        {{-- Image Placement --}}
        <a href="{{ route('admin.settings.index') }}"
           style="{{ request()->routeIs('admin.settings.*') ? 'background:rgba(255,255,255,0.08);color:#fff;' : 'color:rgba(255,255,255,0.45);' }}"
           class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 hover:bg-white/5 hover:!text-white">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 style="{{ request()->routeIs('admin.settings.*') ? 'color:#fff;' : 'color:rgba(255,255,255,0.35);' }}">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m2-2l1.586-1.586a2 2 0 012.828 0L22 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span class="font-medium text-sm">Image Placement</span>
            @if(request()->routeIs('admin.settings.*'))
                <span class="ml-auto w-1.5 h-1.5 rounded-full" style="background:#fff;opacity:0.5;"></span>
            @endif
        </a>

    </nav>

    {{-- FOOTER --}}
    <div class="px-6 py-5" style="border-top:1px solid rgba(255,255,255,0.07);">
        <p class="text-xs" style="color:rgba(255,255,255,0.2);letter-spacing:0.06em;">© SHXTTYJIRO 2026</p>
    </div>

</div>