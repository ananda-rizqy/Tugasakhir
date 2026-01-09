<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - POLINES LAB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    {{-- <img src="/images/logo-polines.png" alt="POLINES" class="h-10"> --}}
                    <span class="text-xl font-bold">POLINES LAB</span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                            LOGOUT
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar & Content -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg min-h-screen">
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-50 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-600' : '' }}">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded hover:bg-blue-50 {{ request()->routeIs('admin.users.*') ? 'bg-blue-100 text-blue-600' : '' }}">
                            Kelola Pengguna
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.locations.index') }}" class="block px-4 py-2 rounded hover:bg-blue-50 {{ request()->routeIs('admin.locations.*') ? 'bg-blue-100 text-blue-600' : '' }}">
                            Lokasi Alat
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.qrcode.index') }}" class="block px-4 py-2 rounded hover:bg-blue-50 {{ request()->routeIs('admin.qrcode.*') ? 'bg-blue-100 text-blue-600' : '' }}">
                            QR Code
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>