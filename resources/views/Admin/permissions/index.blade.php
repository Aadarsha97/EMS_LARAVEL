@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Permissions</h2>
    <hr class="h-0.5 bg-blue-600">


    <div class="m-6 shadow-md p-4 rounded-lg ">



        <div class="grid grid-cols-3 gap-5">

            @foreach ($permissions as $permission)
                <p>{{ $permission->permission }}</p>
            @endforeach


        </div>
        {{ $permissions->links() }}
    </div>

    <script>
        let table = new DataTable('#mytable');
    </script>
@endsection
