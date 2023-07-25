@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Manage Employee</h2>
    <hr class="h-0.5 bg-blue-600">


    <div class="m-6 shadow-md p-4 rounded-lg ">
        <div class="flex flex-row justify-end m-4">
            <a href="{{ route('employee.create') }}" class="bg-blue-500 p-2 rounded-md text-white">Add New Employee</a>
        </div>

        <table id="mytable">

            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>

                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->department->name }}</td>

                        <td>
                            <button class="bg-blue-500 rounded text-white px-3">Edit</button>
                            <button class="bg-red-500 rounded text-white px-3">Delete</button>
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
