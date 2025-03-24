<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>@yield('title', 'Portal Sekolah')</title>
    @vite('resources/css/app.css') {{-- Tailwind CSS --}}
    
</head>

<body class="bg-gray-50 text-gray-800 scroll-smooth">

    @include('layouts.navigation')

    <main class="container mx-auto py-0 ">
        @yield('content')
    </main>

    @stack('scripts')

    @include('layouts.footer')

</body>




</html>
