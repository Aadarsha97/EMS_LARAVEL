@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Register Leave</h2>
    <hr class="h-0.5 bg-blue-600">


    <div class="m-6 shadow-md p-4 rounded-lg ">


        <div class="flex flex-row justify-around">
            <p>Today</p>
            <p>Date : {{ date('Y-m-d') }}</p>
        </div>


        <hr class="my-4">


        <form action="{{ route('leave.store') }}" method="post" class="m-12" enctype="multipart/form-data">
            <legend class="text-lg text-center">
                <h2>Register Leave</h2>
            </legend>
            @csrf
            <div class="my-2">
                <x-input-label for="work_plan" :value="__('Write your leave reason')" />
                <textarea id="work_plan" class="block w-full bg-slate-100" type="text" name="leave_reason" :value="old('image')"
                    required autofocus>
                </textarea>
                <x-input-error :messages="$errors->get('leave_reason')" class="mt-2" />
            </div>



            <div class="my-2">
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
                <button class="bg-blue-500 w-full  text-white py-1  rounded my-2">Register Leave</button>
            </div>



        </form>







    </div>

    <script>
        let table = new DataTable('#mytable');
    </script>
@endsection
