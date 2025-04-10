<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="min-h-screen bg-gray-50 text-gray-800">
<nav class="bg-white shadow-md border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo and brand -->
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <span class="ml-2 text-xl font-bold text-blue-600">Delivery System</span>
                </div>
            </div>

            <!-- Navigation links -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('delivery-request.create') }}" class="px-4 py-2 rounded-md text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition">
                    New Request (Blade)
                </a>
                <a href="{{ route('delivery-request.vue') }}" class="px-4 py-2 rounded-md text-sm font-medium text-gray-600 hover:text-purple-600 hover:bg-purple-50 transition">
                    New Request (Vue)
                </a>
                <a href="{{ route('delivery-request.index') }}" class="px-4 py-2 rounded-md text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition">
                    View Requests
                </a>
            </div>
        </div>
    </div>
</nav>

<main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    @yield('content')
</main>
</body>
</html>
