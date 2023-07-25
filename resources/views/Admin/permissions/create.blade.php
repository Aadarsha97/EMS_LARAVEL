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


            </td>


            <div class="grid grid-cols-3 gap-3 ">

                @foreach ($permissions as $permission)
                    <div>
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="">
                        {{ $permission->permission }}
                    </div>
                @endforeach

            </div>








        </div>
    </form>

    <script>
        let table = new DataTable('#mytable');
    </script>
@endsection
