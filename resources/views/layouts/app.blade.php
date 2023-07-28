<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EMS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('datatable/datatables.css') }}">
    <script src="{{ asset('datatable/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('datatable/datatables.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
        integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <style>
        .selected-date {
            background-color: #ffcc00;
            /* Change this to your desired background color */
            color: #ffffff;
            /* Change this to your desired text color */
        }
    </style>

    @livewireStyles()
</head>

<body class="font-sans antialiased">
    <div class="container flex flex-row min-w-full min-h-screen">

        <div class="bg-slate-200 w-64 min-h-full p-6">

            <h2 class="text-4xl font-bold text-blue-900 my-2">EMS</h2>


            @if (isset($success))
                @include('layouts.success_message')
            @endif



            <div class="flex flex-col">
                <img src="{{ asset('images/logo.png') }}" alt="" srcset="" class="w-32">
                <a href="{{ route('dashboard') }}" class="hover:bg-blue-400 p-1 text-lg">Dashboard</a>

                @if (permission('view-departments') || auth()->user()->role->role == 'Admin')
                    <a href="{{ route('departments.index') }}" class="hover:bg-blue-400 p-1 text-lg">Departments</a>
                @endif

                @if (permission('view-roles') || auth()->user()->role->role == 'Admin')
                    <a href="{{ route('roles.index') }}" class="hover:bg-blue-400 p-1 text-lg">Roles </a>
                @endif

                @if (permission('view-perrmissions') || auth()->user()->role->role == 'Admin')
                    <a href="{{ route('permissions.index') }}" class="hover:bg-blue-400 p-1 text-lg">Permissions</a>
                @endif

                @if (permission('view-notices') || auth()->user()->role->role == 'Admin')
                    <a href="{{ route('notice.index') }}" class="hover:bg-blue-400 p-1 text-lg">Notices</a>
                @endif


                @if (permission('view-employees') || auth()->user()->role->role == 'Admin')
                    <a href="{{ route('employee.index') }}" class="hover:bg-blue-400 p-1 text-lg">Employee</a>
                @endif


                @if (permission('view-attendances') || auth()->user()->role->role == 'Admin')
                    <a href="{{ route('attendance.index') }}" class="hover:bg-blue-400 p-1 text-lg">Attendance</a>
                @endif

                @if (permission('view-salaries') || auth()->user()->role->role == 'Admin')
                    <a href="{{ route('salary.index') }}" class="hover:bg-blue-400 p-1 text-lg">Salary</a>
                @endif



                @if (permission('view-analytics') || auth()->user()->role->role == 'Admin')
                    <a href="{{ route('analytics.index') }}" class="hover:bg-blue-400 p-1 text-lg">Analytics</a>
                @endif

            </div>
        </div>
        <div class="flex flex-col flex-1">
            <div class="h-12 bg-slate-200 gap-8 min-w-full flex flex-row justify-end items-center p-8 cursor-pointer  ">

                <button onclick="toggleModal()">
                    <i class="fa fa-user"> </i>
                    {{ auth()->user()->role->role }}:
                    {{ auth()->user()->name }}

                </button>
            </div>

            <div class="h-fit w-28 fixed right-10 top-16 shadow-xl py-3 bg-slate-200 hidden" id="logoutpopup">
                <ul>
                    <li class="text-center py-1 hover:bg-black hover:text-white"><a
                            href="{{ route('profile.index') }}">Profile</a></li>
                    <li class="text-center py-1  hover:bg-black hover:text-white">
                        <form action="{{ route('logout') }}" method="POST"x`>
                            @csrf
                            <input type="submit" value="Logout" />
                        </form>
                    </li>
                </ul>
            </div>
            <div>
                @if (session('success'))
                    <div id="successmsg" class="bg-green-500 fixed right-3 top-3 text-white p-4 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>

                    <script>
                        const successmsg = document.getElementById('successmsg');
                    </script>
                @endif

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
@livewireScripts()

</html>
