@extends('layouts.app')

@section('content')


<h2 class="text-2xl font-bold p-6">Edit Departments</h2>
<hr class="h-0.5 bg-blue-600">

<form action="{{ route('departments.update',$department->id)  }}" method="post" class="m-12">
    @csrf
    @method('patch')
    <div class="my-2">
        <x-input-label for="name" :value="__('Enter Department Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$department['name']" required autofocus />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="">
        <button class="bg-blue-500 text-white px-3 py-1 rounded-sm my-2 w-[100%]" type="submit">Edit Department</button>
    </div>

</form>





@endsection