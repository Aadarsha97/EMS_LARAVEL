@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Attendence</h2>
    <hr class="h-0.5 bg-blue-600">


    <div class="m-6 shadow-md p-4 rounded-lg ">


        <div class="flex flex-row justify-around">
            <p>Today Attendance</p>
            <p>Date : {{ date('Y-m-d') }}</p>


            @empty($oldattendances || $leave)
                <div class="flex gap-4">
                    <p><a href="{{ route('attendance.create') }}"
                            class="bg-blue-500 text-white text-sm rounded px-2 py-1">Register
                            Attendance </a></p>
                    <p><a href="{{ route('leave.create') }}" class="bg-blue-500 text-white text-sm rounded px-2 py-1"> Apply
                            for
                            Leave </a></p>
                </div>
            @endempty

            @isset($oldattendances)
                <p>Already registered today Attendance</p>
            @endisset
            @isset($leave)
                <a href="{{ route('leave.index') }}" class="bg-blue-500 text-white text-sm rounded px-2 py-1">View Leave
                    History</a>
            @endisset





        </div>


        <hr class="my-4">


        <table id="mytable">

            <thead>
                <tr>
                    <th>SN</th>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>


            <tbody>

                @foreach ($attendances as $key => $attendance)
                    <tr>
                        <td>{{ $key + 1 }} </td>
                        <td>{{ $attendance->user->name }}</td>
                        <td>{{ $attendance->user->department->name }}</td>
                        <td>{{ $attendance->user->role->role }}</td>
                        <td><a href="{{ route('attendance.show', $attendance->id) }}"
                                class="bg-blue-500 text-white text-sm rounded px-2 py-1 cursor-pointer">Show
                                Work Plan</a>
                            <a href="{{ route('attendance.history', $attendance->user->id) }}"
                                class="bg-blue-500 text-white text-sm rounded px-2 py-1 cursor-pointer">Show
                                Attendance History</a>
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
