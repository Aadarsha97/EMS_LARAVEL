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
                    <th>First Column</th>
                    <th> Second Column </th>

                    <th>Third Column</th>

                </tr>
            </thead>

            <tbody>

                @for ($i = 0; $i < count($permissions) / 3; $i = $i + 3)
                    @php
                        $permission1 = $permissions[$i];
                        $permission2 = $permissions[$i + 1];
                        $permission3 = $permissions[$i + 2];
                    @endphp
                    <tr>
                        <td>
                            {{ $permission1->permission }}
                        </td>
                        <td>
                            {{ $permission2->permission }}</td>
                        <td>
                            {{ $permission3->permission }}</td>
                    </tr>
                @endfor



            </tbody>

        </table>
    </div>

    <script>
        let table = new DataTable('#mytable');
    </script>
@endsection
