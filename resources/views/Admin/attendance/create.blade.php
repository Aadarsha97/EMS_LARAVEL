@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Register Attendence</h2>
    <hr class="h-0.5 bg-blue-600">


    <div class="m-6 shadow-md p-4 rounded-lg ">


        <div class="flex flex-row justify-around">
            <p>Today Attendance</p>
            <p>Date : {{ date('Y-m-d') }}</p>
        </div>


        <hr class="my-4">


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
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
                <button class="bg-blue-500 w-full  text-white py-1  rounded my-2">Register Today Attendance</button>
            </div>




        </form>







    </div>

    <script>
        let table = new DataTable('#mytable');
    </script>
@endsection
