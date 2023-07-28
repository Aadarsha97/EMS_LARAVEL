@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Manage Leaves </h2>
    <hr class="h-0.5 bg-blue-600">


    <div class="m-6 shadow-md p-4 rounded-lg ">


        <table id="mytable">

            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Leave Date</th>
                    <th>Employee Name</th>
                    <th>Employee Email</th>
                    <th>Reason</th>


                </tr>
            </thead>

            <tbody>

                @foreach ($leaves as $key => $leave)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <th>{{ $leave->date }}</th>
                        <th>{{ $leave->user->name }}</th>
                        <th>{{ $leave->user->email }}</th>
                        <th>{{ $leave->leave_reason }}</th>

                    </tr>
                @endforeach


            </tbody>

        </table>
    </div>

    <script>
        let table = new DataTable('#mytable');
    </script>
@endsection
