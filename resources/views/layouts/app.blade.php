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
                <a href="{{ route('dashboard')}}" class="hover:bg-blue-400 p-1 text-lg">Dashboard</a>
                <a href="{{ route('departments.index')}}" class="hover:bg-blue-400 p-1 text-lg">Departments</a>
                <a href="{{ route('employee.index')}}" class="hover:bg-blue-400 p-1 text-lg">Employee</a>
                <a href="{{ route('tasks.index')}}" class="hover:bg-blue-400 p-1 text-lg">Tasks</a>
                <a href="" class="hover:bg-blue-400 p-1 text-lg">Salary</a>
                <a href="" class="hover:bg-blue-400 p-1 text-lg">Analytics</a>
                <a href="" class="hover:bg-blue-400 p-1 text-lg">Leaves</a>

            </div>
        </div>
        <div class="flex flex-col flex-1">
            <div class="h-12 bg-slate-200 gap-8 min-w-full flex flex-row justify-end items-center p-8 cursor-pointer  ">

                <a onclick="toggleModal()"><span> <i class="fa fa-user"> </i>   Admin </span>
                </a>
            </div>

            <div class="h-fit w-28 fixed right-10 top-16 shadow-xl py-3 bg-slate-200 hidden" id="logoutpopup">
                <ul>
                    <li class="text-center py-1 hover:bg-black hover:text-white">Profile</li>
                    <li class="text-center py-1  hover:bg-black hover:text-white">Logout</li>
                </ul>
            </div>
            <div>

                @yield('content')

            </div>
        </div>
    </div>
</body>
<script>
    const divModal = document.getElementById('logoutpopup');

    function toggleModal() {
        if (divModal.style.display == "none") {
            divModal.style.display = "block";
        } else {
            divModal.style.display = "none";
        }
    }
</script>

</html>