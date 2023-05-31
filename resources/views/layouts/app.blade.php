<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('datatable/datatables.css')}}">
    <script src="{{ asset('datatable/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('datatable/datatables.js') }}"></script>
</head>

<body class="font-sans antialiased">
    <div class="container flex flex-row min-w-full min-h-screen">

        <div class="bg-slate-200 w-64 min-h-full p-6">

            <h2 class="text-4xl font-bold text-blue-900 my-2">EMS</h2>


            <div class="flex flex-col">
                <img src="{{  asset('images/logo.png') }}" alt="" srcset="" class="w-32">
                <a href="" class="hover:bg-blue-400 p-1 text-lg">Dashboard</a>
                <a href="{{ route('category.index') }}" class="hover:bg-blue-400 p-1 text-lg">Categories</a>
                <a href="" class="hover:bg-blue-400 p-1 text-lg">About</a>
                <a href="" class="hover:bg-blue-400 p-1 text-lg">Logout</a>

            </div>
        </div>
        <div class="flex flex-col flex-1">
            <div class="h-12 bg-slate-200 min-w-full  ">Navbar

                <i class="fa fa-user"></i>
                <i class="fa fa-message"></i>
                <i class="fa fa-logout"></i>

            </div>
            <div>

                @yield('content')

            </div>
        </div>
    </div>
</body>

</html>