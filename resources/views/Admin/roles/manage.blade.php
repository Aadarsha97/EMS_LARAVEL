@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold px-6 pt-6">Manage Roles Permisson</h2>
    <p class="text-md font-mono px-6">{{ $role->role }}</p>
    <hr class="h-0.5 bg-blue-600">


    <div class="m-6 shadow-md p-4 rounded-lg ">
        <div class="flex flex-row justify-end m-4">
            <a href="{{ route('permissions.create') }}" class="bg-blue-500 px-4 py-1 rounded-md text-white">Add Permission</a>
        </div>

        <table id="mytable">

            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Permissions</th>
                    <th>Actions</th>

                </tr>
            </thead>

            <tbody>

                @forelse ($permissions as $key=>$permission)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $permission->permission }}</td>
                        <td>
                            <a href="{{ route('permissions.destroy', [$role->id, $permission->id]) }}"
                                onclick="confirm('Are You sure want to remove this permission ?')"
                                class="bg-blue-500 text-white px-2 py-1 rounded font-thin"> Remove </a>
                        </td>

                    </tr>
                @empty
                @endforelse



            </tbody>

        </table>
    </div>

    <script>
        let table = new DataTable('#mytable');


        function loadData() {
            $.ajax({
                url: 'path/to/your/server/data', // Replace this with the actual server URL
                type: 'POST', // Change to 'POST' if you are sending data to the server
                dataType: 'json', // Change to 'html' or other data type if required
                success: function(data) {
                    // This function will be executed when the AJAX request is successful
                    // Update the page content with the received data
                    $('#data-container').html(data);
                },
                error: function(xhr, status, error) {
                    // This function will be executed if the AJAX request encounters an error
                    console.error('Error: ' + error);
                    // Handle error, display a message, or take appropriate action
                }
            });
        }
    </script>
@endsection
