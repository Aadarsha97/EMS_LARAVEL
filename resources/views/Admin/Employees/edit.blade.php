@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Edit Employee<p< /h2>
            <hr class="h-0.5 bg-blue-600">

            <form action="{{ route('employees.update', $employee->id) }}" method="post" class="m-12">

                @csrf


                <div class="my-2">
                    <x-input-label for="name" :value="__('Enter Employee Name')" />
                    <input id="name" name="name"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        type="text" value="{{ $employee->name }}" required autofocus>

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>


                <div class="my-2">
                    <x-input-label for="name" :value="__('Enter Employee Email')" />
                    <input id="email" name="email"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        type="text" value="{{ $employee->email }}" required autofocus>

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>


                <div class="my-2">
                    <x-input-label for="name" :value="__('Enter Employee Department')" />
                    <!-- <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus /> -->

                    <select id="name" class="block mt-1 w-full" name="department_id">
                        <option value="">--Select Department --</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" @if ($employee->department->id == $department->id) selected @endif>
                                {{ $department->name }}</option>
                        @endforeach

                    </select>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="my-2">
                    <x-input-label for="name" :value="__('Enter Employee Role')" />
                    <!-- <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus /> -->

                    <select id="name" class="block mt-1 w-full" name="role_id">
                        <option value="">--Select Role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @if ($employee->role->id == $role->id) selected @endif>
                                {{ $role->role }}</option>
                        @endforeach

                    </select>
                    <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
                </div>



                <x-forminput name="password" label="Enter Employee Password" type="password" />

                <x-forminput name="confirm_password" label="Confirm Employee Password" type="password" />




                <div class="">
                    <button class="bg-blue-500 text-white px-3 py-1 rounded-sm my-2 w-[100%]" type="submit">Edit
                        Employee</button>
                </div>

            </form>
        @endsection
