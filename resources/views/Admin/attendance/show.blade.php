@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Today Attendence Detail</h2>
    <hr class="h-0.5 bg-blue-600">


    <div class="m-6 shadow-md p-4 rounded-lg ">


        <div class="flex flex-row justify-around">
            <p class="text-md font-semibold">Today Attendance</p>
            <div>
                <p>Date : {{ $attendance->date }}</p>
                <p>Employee: {{ $attendance->user->name }}</p>
                <p>Role: {{ $attendance->user->role->role }}</p>
            </div>
        </div>


        <hr class="my-4">

        @if ($attendance->date == date('Y-m-d'))
            <div class="flex flex-row justify-around">
                <div class="flex flex-col min-w-[300px]">
                    <p class="text-md  font-medium">Work Plan</p>
                    <p>{{ $attendance->work_plan }}</p>
                </div>
                <div class="flex flex-col flex-grow">

                    <img src="{{ asset('images/' . $attendance->image) }}" alt="{{ $attendance->image }}"
                        style="height: 300px;width: 350px;object-fit: cover;" class="w-32">
                </div>
            </div>
        @else
            <form action="{{ route('attendance.store') }}" method="post" class="m-12" enctype="multipart/form-data">
                <legend class="text-lg text-center">
                    <h2>Register Today Attendance</h2>
                </legend>
                @csrf
                <div class="my-2">
                    <x-input-label for="work_plan" :value="__('Write about your work plan')" />
                    <textarea id="work_plan" class="block w-full bg-slate-100" type="text" name="work_plan" :value="old('image')"
                        required autofocus>
                </textarea>
                    <x-input-error :messages="$errors->get('work_plan')" class="mt-2" />
                </div>

                <div class="my-2">
                    <x-input-label for="image" :value="__('Upload Your Image')" />
                    <x-text-input id="image" class="block mt-1 w-full bg-slate-100" type="file" name="image"
                        :value="old('image')" required autofocus />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="my-2">
                    <button class="bg-blue-500 w-full  text-white py-1  rounded my-2">Register Today Attendance</button>
                </div>




            </form>
        @endif






    </div>

    <script>
        let table = new DataTable('#mytable');
    </script>
@endsection
