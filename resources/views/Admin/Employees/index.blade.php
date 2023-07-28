@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Manage Employee</h2>
    <hr class="h-0.5 bg-blue-600">


    <div class="m-6 shadow-md p-4 rounded-lg ">
        @if (permission('manage-employees') || auth()->user()->role->role == 'Admin')
            <div class="flex flex-row justify-end m-4">
                <a href="{{ route('employee.create') }}" class="bg-blue-500 p-2 rounded-md text-white">Add New Employee</a>
            </div>
        @endif

        <table id="mytable">

            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    @if (permission('manage-employees') || auth()->user()->role->role == 'Admin')
                        <th>Action</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->department->name }}</td>
                        @if (permission('manage-employees') || auth()->user()->role->role == 'Admin')
                            <td>
                                <a href="{{ route('employees.edit', $employee->id) }}"
                                    class="bg-blue-500 rounded text-white px-3">Edit</a>
                            </td>
                        @endif
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>

    <script>
        let table = new DataTable('#mytable');
    </script>
@endsection
