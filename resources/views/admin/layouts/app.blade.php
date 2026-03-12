<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100">
<div class="min-h-screen flex">

    <!-- SIDEBAR -->
    <aside
        id="sidebar"
        class="fixed inset-y-0 left-0 z-40 w-64 bg-gray-900 text-white
               transform -translate-x-full md:translate-x-0
               transition-transform duration-300 ease-in-out"
    >
        @include('admin.partials.sidebar')
    </aside>

    <!-- MAIN -->
    <div class="flex-1 md:ml-64">

        <!-- NAVBAR -->
        @include('admin.partials.navbar')

        <!-- CONTENT -->
        <main class="p-6">
            @yield('content')
        </main>

    </div>
</div>

<script>
function toggleSidebar() {
    document.getElementById('sidebar')
        .classList.toggle('-translate-x-full');
}
</script>

{{-- 🔥 INI WAJIB ADA --}}
@stack('scripts')

</body>
</html>
