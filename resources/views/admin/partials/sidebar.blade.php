<div class="h-full flex flex-col bg-gray-900">
    
    {{-- HEADER - Logo Section --}}
    <div class="px-6 py-6 border-b border-gray-800">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center text-2xl">
                🎨
            </div>
            <div>
                <h1 class="text-white font-bold text-lg">ArtAdmin</h1>
                <p class="text-gray-400 text-xs">Art and Prices</p>
            </div>
        </div>
    </div>

    {{-- NAVIGATION --}}
    <nav class="flex-1 px-4 py-6 space-y-2">

        <a href="{{ route('admin.dashboard') }}"
           class="group flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-800/70 transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : '' }}">
            <div class="p-2 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-purple-500/20' : 'bg-gray-800 group-hover:bg-gray-700' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-purple-400' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
            </div>
            <span class="font-medium">Dashboard</span>
        </a>

        <a href="{{ route('admin.artworks.index') }}"
           class="group flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-800/70 transition-all duration-200 {{ request()->routeIs('admin.artworks.*') ? 'bg-gray-800 text-white' : '' }}">
            <div class="p-2 rounded-lg {{ request()->routeIs('admin.artworks.*') ? 'bg-purple-500/20' : 'bg-gray-800 group-hover:bg-gray-700' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.artworks.*') ? 'text-purple-400' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <span class="font-medium">Artworks</span>
        </a>

        {{-- 🔥 MENU BARU --}}
        <a href="{{ route('admin.prices.index') }}"
           class="group flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-gray-800/70 transition-all duration-200 {{ request()->routeIs('admin.prices.*') ? 'bg-gray-800 text-white' : '' }}">
            <div class="p-2 rounded-lg {{ request()->routeIs('admin.prices.*') ? 'bg-purple-500/20' : 'bg-gray-800 group-hover:bg-gray-700' }}">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.prices.*') ? 'text-purple-400' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="font-medium">💰 Commission Prices</span>
        </a>

    </nav>

    {{-- FOOTER --}}
    <div class="px-6 py-4 border-t border-gray-800 text-sm text-gray-500">
        © 2026
    </div>
</div>