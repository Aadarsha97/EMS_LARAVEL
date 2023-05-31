@extends('layouts.app')

@section('content')


<h2 class="text-2xl font-bold">Categories</h2>


<div class="m-6 shadow-md p-2 rounded-lg">
    <div class="flex flex-row justify-end m-4">
        <a href="{{route('category.create')}}" class="bg-blue-500 p-2 rounded-md text-white">Add Category</a>
    </div>

    <table id="mytable">

        <thead>
            <tr>
                <th>Order</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>Manager</td>
                <td>Delete</td>
            </tr>
        </tbody>

    </table>
</div>

<script>
    let table = new DataTable('#mytable');
</script>



@endsection