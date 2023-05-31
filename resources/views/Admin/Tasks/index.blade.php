@extends('layouts.app')

@section('content')


<h2 class="text-2xl font-bold p-6">Manage Tasks</h2>
<hr class="h-0.5 bg-blue-600">


<div class="m-6 shadow-md p-4 rounded-lg ">
    <div class="flex flex-row justify-end m-4">
        <a href="{{route('category.create')}}" class="bg-blue-500 p-2 rounded-md text-white">Add New Task</a>
    </div>

    <table id="mytable">

        <thead>
            <tr>
                <th>Sn</th>
                <th>Task</th>
                <th>Task Type</th>
                <th>Allocated to</th>
                <th>Status</th>

                <th>Action</th>

            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>Manager</td>
                <td>Email</td>
                <td>Department</td>
                <td>Number of Tasks</td>
                <td>
                    <button class="bg-blue-500 rounded text-white px-3">Edit</button>
                    <button class="bg-red-500 rounded text-white px-3">Delete</button>
                    <button class="bg-green-500 rounded text-white px-3">Allocate Task</button>
                </td>
            </tr>
        </tbody>

    </table>
</div>

<script>
    let table = new DataTable('#mytable');
</script>



@endsection