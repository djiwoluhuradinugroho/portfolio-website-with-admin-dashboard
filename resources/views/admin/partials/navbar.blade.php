<header class="px-6 py-4 flex items-center justify-between"
        style="background:rgba(250,250,250,0.85);backdrop-filter:blur(12px);border-bottom:1px solid #ebebeb;">

    <div class="flex items-center gap-3">
        <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-lg transition-colors duration-200 hover:bg-black/5">
            <svg class="w-5 h-5" style="color:#0d0d0d;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <h1 class="text-xl font-bold tracking-tight" style="color:#0d0d0d;">
            Admin Panel
        </h1>
    </div>

    {{-- RIGHT SIDE --}}
    <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center gap-3 focus:outline-none">
            <span class="text-sm font-medium" style="color:#888;">
                {{ auth()->user()->name }}
            </span>

            <div class="relative">
                <img
                    src="{{ auth()->user()->avatar
                        ? asset('storage/' . auth()->user()->avatar)
                        : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0d0d0d&color=fff' }}"
                    class="w-9 h-9 rounded-full transition-all duration-300"
                    style="ring:2px solid rgba(0,0,0,0.1);"
                >
                <div class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 rounded-full border-2 border-white"></div>
            </div>
        </button>

        {{-- DROPDOWN --}}
        <div
            x-cloak
            x-show="open"
            @click.outside="open = false"
            x-transition
            class="absolute right-0 mt-3 w-44 rounded-xl overflow-hidden z-50"
            style="background:#fff;border:1px solid #ebebeb;box-shadow:0 8px 24px rgba(0,0,0,0.08);"
        >
            <a href="{{ route('admin.profile.edit') }}"
               class="flex items-center gap-2 px-4 py-3 text-sm transition-colors duration-150 hover:bg-gray-50"
               style="color:#333;">
                <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Profile
            </a>

            <div style="height:1px;background:#f0f0f0;"></div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-2 px-4 py-3 text-sm transition-colors duration-150 hover:bg-red-50"
                    style="color:#e74c3c;text-align:left;">
                    <svg class="w-4 h-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>