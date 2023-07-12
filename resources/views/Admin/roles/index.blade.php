@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Manage Roles</h2>
    <hr class="h-0.5 bg-blue-600">


    <div class="m-6 shadow-md p-4 rounded-lg ">
        <div class="flex flex-row justify-end m-4">
            <a href="{{ route('roles.create') }}" class="bg-blue-500 px-4 py-1 rounded-md text-white">Add Role</a>
        </div>

        <table id="mytable">

            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Roles</th>
                    <th>Task Type</th>
                    <th>Allocated to</th>
                    <th>Status</th>

                    <th>Actions</th>

                </tr>
            </thead>

            <tbody>

                @forelse ($roles as $key=>$role)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $role->role }}</td>
                        <td>Email</td>
                        <td>Department</td>
                        <td>Number of Tasks</td>
                        <td>
                            <button class="bg-blue-500 rounded text-white px-3">Edit</button>
                            <button class="bg-red-500 rounded text-white px-3">Delete</button>
                            <a class="bg-green-500 rounded text-white px-3 py-0.5"
                                href="{{ route('roles.manage',$role->users()->get()->first()->id) }}">Manage
                                Permission </a>
                        </td>
                    </tr>
                @empty

                    <tr>
                        <td colspan="6">No Roles Registered </td>
                    </tr>
                @endforelse

            </tbody>

        </table>
    </div>

    <script>
        let table = new DataTable('#mytable');
    </script>
@endsection
