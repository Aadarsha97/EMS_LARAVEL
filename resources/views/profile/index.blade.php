@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Profile</h2>
    <hr class="h-0.5 bg-blue-600">

    <div class="flex flex-row justify-center py-10">


        <div class="max-w-sm mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
            <div class="py-4 px-6">
                <h2 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h2>
                <p class="text-sm text-gray-600">{{ $user->role->role }}</p>

            </div>

            <div class=" py-2 px-4 bg-gray-100">
                <p class="text-gray-900 hover:underline">Department : {{ $user->department->name }}</p>
                <p class="text-gray-900 hover:underline">Email : {{ $user->email }}</p>
                <p class="text-gray-900 hover:underline">Number of Permissions : {{ $user->permissions->count() }}</p>

            </div>
        </div>



    </div>
@endsection
