@extends('layouts.app')

@section('content')


<h2 class="text-2xl font-bold p-6">Manage Permissions</h2>
<h2 class="text-lg font-bold px-6">{{ auth()->user()->role->role}}</h2>
<hr class="h-0.5 bg-blue-600">


<div class="m-6 shadow-md p-4 rounded-lg ">
    <div class="flex flex-row justify-end m-4">

        <!-- <a href="{{ route('roles.create') }}" class="bg-blue-500 px-4 py-1 rounded-md text-white">Add Permissons</a> -->
    </div>

    @forelse ($permissions as $permission)
    <div>
        <input type="checkbox" name="" id="">
        <label for=""> Admin </label>
    </div>
    @empty

    @endforelse

</div>

<script>
    let table = new DataTable('#mytable');
</script>



@endsection