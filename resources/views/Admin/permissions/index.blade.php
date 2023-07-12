@extends('layouts.app')

@section('content')


<h2 class="text-2xl font-bold p-6">Permissions</h2>
<hr class="h-0.5 bg-blue-600">


<div class="m-6 shadow-md p-4 rounded-lg ">
    <div class="flex flex-row justify-end m-4">
        <a href="{{ route('roles.create') }}" class="bg-blue-500 px-4 py-1 rounded-md text-white">Add Permisson</a>
    </div>

    <table id="mytable">

        <thead>
            <tr>
                <th>Sn</th>
                <th> Permission </th>

                <th>Actions</th>

            </tr>
        </thead>

        <tbody>

            @forelse ($permissions as $key=>$permission)
            <tr>
                <td>{{ $key+1}}</td>
                <td> {{ $permission->permission }} </td>

                <td> <a href="" class="bg-green-500 text-white py-0.5 px-2 rounded font-thin"> Remove </a></td>

            </tr>
            @empty
<tr>
    <td> No Permission Registered</td>
</tr>
            @endforelse


        </tbody>

    </table>
</div>

<script>
    let table = new DataTable('#mytable');
</script>



@endsection