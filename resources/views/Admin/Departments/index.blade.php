@extends('layouts.app')

@section('content')


<h2 class="text-2xl font-bold p-6">Manage Departments</h2>
<hr class="h-0.5 bg-blue-600">


<div class="m-6 shadow-md p-4 rounded-lg ">
    <div class="flex flex-row justify-end m-4">
        <a href="{{route('departments.create')}}" class="bg-blue-500 py-2 px-3 rounded-md text-white">Add New Department</a>
    </div>

    <table id="mytable">

        <thead>
            <tr>
                <th>Sn</th>
                <th>Name</th>
                <th>No of Employee</th>

                <th>Action</th>

            </tr>
        </thead>

        <tbody>

            @foreach ($departments as $department)


            <tr>
                <td>{{ $loop->iteration }} </td>
                <td>{{ $department['name'] }}</td>
                <td>Number of Employee</td>
                <td class="flex gap-4">
                    <a class="bg-blue-500 rounded text-white px-3" href="{{ route('departments.edit',$department->id) }}">Edit</a>

                    <form action="{{ route('departments.destroy',$department->id) }}" method="post" class="flex flex-row">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-red-500 rounded text-white px-3" href="{{ route('departments.destroy',$department->id) }}">Delete</button>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

<script>
    let table = new DataTable('#mytable');
</script>



@endsection