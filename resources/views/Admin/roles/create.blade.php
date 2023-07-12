@extends('layouts.app')

@section('content')


<h2 class="text-2xl font-bold p-6">Create Departments</h2>
<hr class="h-0.5 bg-blue-600">

<form action="{{ route('roles.store') }}" method="post" class="m-12">
    @csrf
    <div class="my-2">
        <x-input-label for="name" :value="__('Enter Role Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="role" :value="old('role')" required autofocus />
        <x-input-error :messages="$errors->get('role')" class="mt-2" />
    </div>

    <div class="my-2">
        <x-input-label for="name" :value="__('Select Role Level After')" />
        <select name="role_id" id="" class="block mt-1 w-full">

        @forelse ($roles as $role)
        <option value="{{ $role->id }}"> {{ $role->role }} </option>
        @empty
        <option value="">No role</option>
        @endforelse
         
        </select>
        <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
    </div>


    <div class="">
        <button class="bg-blue-500 text-white px-3 py-1 rounded-sm my-2 w-[100%]" type="submit">Create Role</button>
    </div>

</form>





@endsection