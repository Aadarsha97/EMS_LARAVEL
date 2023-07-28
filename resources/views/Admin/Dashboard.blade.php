@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Dashboard</h2>
    <hr class="h-0.5 bg-blue-600">

    <div class="flex flex-row justify-center py-10">


        <div class=" flex flex-row gap-6">
            @if (permission('view-departments') || auth()->user()->role->role == 'Admin')
                <div class="min-h-[130px] bg-gray-500 rounded text-white flex flex-row justify-center items-center ">
                    <div>
                        <p class="text-2xl font-semibold px-4 min-w-[200px]">Departments</p>
                        <p class="text-center text-2xl">{{ $departments }}</p>
                    </div>
                </div>
            @endif
            @if (permission('view-roles') || auth()->user()->role->role == 'Admin')
                <div class="min-h-[130px] bg-gray-500 rounded text-white flex flex-row justify-center items-center ">
                    <div>
                        <p class="text-2xl font-semibold px-4 min-w-[200px]">Roles</p>
                        <p class="text-center text-2xl">{{ $roles }}</p>
                    </div>
                </div>
            @endif
            @if (permission('view-employees') || auth()->user()->role->role == 'Admin')
                <div
                    class="min-h-[130px] min-w-[200px] bg-blue-500 rounded text-white flex flex-row justify-center items-center ">
                    <div>
                        <p class="text-2xl font-semibold px-4">Employess</p>
                        <p class="text-center text-2xl">{{ $employee }}</p>
                    </div>
                </div>
            @endif

            @if (permission('view-salaries') || auth()->user()->role->role == 'Admin')
                <div
                    class="min-h-[130px] min-w-[200px] bg-green-500 rounded text-white flex flex-row justify-center items-center ">
                    <div>
                        <p class="text-2xl font-semibold px-4">Pending Salary of Empoyee</p>
                        <p class="text-center text-2xl">{{ $employee }}</p>
                    </div>
                </div>
            @endif

        </div>



    </div>


    {{-- Notices part --}}
    @if (permission('view-notices') || auth()->user()->role->role == 'Admin')
        <div class="m-5 p-3">
            <div>
                <p class="text-xl font-semibold">Notices</p>
                <hr>
            </div>

            <x-notices />
        </div>
    @endif
@endsection
