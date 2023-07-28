<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <!-- Link to Tailwind CSS -->


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-r from-indigo-600 to-blue-500 text-gray-900">

    <div class="flex flex-col justify-between min-h-screen">
        <!-- Navbar -->
        <nav class="bg-white py-4">
            <div class="container mx-auto flex items-center justify-between">
                <!-- Company Logo -->
                EMS

                <!-- Login Link -->

                <a href="{{ route('login') }}">Login</a>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 ">
            @yield('content')

        </div>


        <div class="bg-white py-4 text-center">
            <p>EMS: Developed By Aadarsha Subedi</p>
        </div>
    </div>

</body>

</html>
