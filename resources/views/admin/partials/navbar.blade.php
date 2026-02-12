<header class="bg-white/80 backdrop-blur-lg shadow-sm border-b border-gray-100 px-6 py-4 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <button onclick="toggleSidebar()" class="md:hidden p-2 hover:bg-gray-100 rounded-lg transition-colors duration-200">
            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <h1 class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
            Admin Panel
        </h1>
    </div>

    {{-- RIGHT SIDE --}}
    <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center gap-3 focus:outline-none">
            <span class="text-sm font-medium text-gray-600">
                {{ auth()->user()->name }}
            </span>

            <div class="relative">
                <img
                    src="{{ auth()->user()->avatar
                        ? asset('storage/' . auth()->user()->avatar)
                        : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=8b5cf6&color=fff' }}"
                    class="w-10 h-10 rounded-full ring-2 ring-purple-500/20 hover:ring-purple-500/40 transition-all duration-300"
                >
                <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
            </div>
        </button>

        {{-- DROPDOWN --}}
        <div
            x-show="open"
            @click.outside="open = false"
            x-transition
            class="absolute right-0 mt-3 w-44 bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden z-50"
        >
            <a href="{{ route('admin.profile.edit') }}"
               class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                👤 Profile
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50">
                    🚪 Logout
                </button>
            </form>
        </div>
    </div>
</header>
