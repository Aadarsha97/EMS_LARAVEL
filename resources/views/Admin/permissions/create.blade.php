@extends('layouts.app')

@section('content')
    <div class="p-6">
        <h2 class="text-2xl font-bold px-6">Add Permission</h2>
        <p class="text-md font-thin px-6">{{ $user->role->role }}</p>
        <hr class="h-0.5 bg-blue-600">
    </div>


    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <div class="flex flex-row justify-end ">
            <button class="bg-blue-500 py-1 px-2 m-4 rounded text-white ">Add Permission</button>
        </div>
        <div class="m-6">

            <table id="mytable">

                <thead>
                    <tr>
                        <th>First Column</th>
                        <th>Second Column</th>
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
                            <td><input type="checkbox" name="permissions[]" value="{{ $permission1->id }}" id="">
                                {{ $permission1->permission }}
                            </td>
                            <td><input type="checkbox" name="permissions[]" value="{{ $permission2->id }}" id="">
                                {{ $permission2->permission }}</td>
                            <td><input type="checkbox"name="permissions[]" value="{{ $permission3->id }}" id="">
                                {{ $permission3->permission }}</td>
                        </tr>
                    @endfor





                </tbody>
            </table>


        </div>
    </form>

    <script>
        let table = new DataTable('#mytable');
    </script>
@endsection
