@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">{{ auth()->user()->role->role }} Attendence </h2>
    <hr class="h-0.5 bg-blue-600">


    <div class="m-6 shadow-md p-4 rounded-lg ">


        <div class="flex flex-row justify-around">

            <div>

                <p>Employee: {{ $user->name }}</p>
                <p>Role: {{ $user->role->role }}</p>
            </div>

        </div>

        <div class="flex flex-row justify-around mt-3">
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

            <button onclick="attendance()" class="bg-blue-500 text-white text-sm rounded px-2 py-1">View Attendance
                Chart</button>





        </div>

        <hr class="my-4">


        <table id="mytable">

            <thead>
                <tr>
                    <th>SN</th>
                    <th>Date</th>

                    <th>Action</th>
                </tr>
            </thead>


            <tbody>

                @foreach ($attendances as $key => $attendance)
                    <tr>
                        <td>{{ $key + 1 }} </td>
                        <td>{{ date('Y-M-d', strtotime($attendance->date)) }}</td>

                        <td><a href="{{ route('attendance.show', $attendance->id) }}"
                                class="bg-blue-500 text-white text-sm rounded px-2 py-1 cursor-pointer">Show
                                Work Plan</a>

                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>







    </div>


    <div id="attendancedialog"
        class="hidden backdrop-blur-sm h-screen w-screen fixed top-0 left-0  justify-center items-center">
        <div class="bg-white p-4 shadow-lg relative">
            <button onclick="attendance()" class="absolute top-0 right-1 hover:bg-slate-300 p-1 rounded-md"><i
                    class="fa fa-times" aria-hidden="true"></i></button>
            <div>
                <div class="flex gap-3 m-3">
                    <p class="text-xl font-bold my-2">Attendance of this Month</p>
                    <input type="month" name="" id="" value="{{ date('Y-m') }}"
                        onchange="changemonth(this.value)">
                </div>
                <hr>
            </div>
            <div>
                <div style="width: 400px; margin: auto;">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        let table = new DataTable('#mytable');

        const attendancedialog = document.getElementById('attendancedialog');



        function changemonth(month) {
            console.log(month);

            $.ajax({
                type: "POST",
                url: "{{ route('attendance.changemonth') }}",
                data: {
                    data: {
                        month: month,
                        user_id: "{{ $user->id }}",

                    },
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    attendanceChart.data.datasets[0].data = response;
                    attendanceChart.update();

                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Sample data for the pie chart
        const data = {
            labels: ['Total Present Days', 'Total Absent Days'],
            datasets: [{
                data: @json($days),
                backgroundColor: ['#FF6384', '#36A2EB'],
                hoverBackgroundColor: ['#FF6384', '#36A2EB'],
            }, ],
        };

        // Configuration options for the pie chart
        const options = {
            responsive: true,
            maintainAspectRatio: false,
        };

        // Create the pie chart
        const ctx = document.getElementById('myPieChart').getContext('2d');
        const attendanceChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options,
        });

        function attendance() {
            if (attendancedialog.classList.contains('hidden')) {
                attendancedialog.classList.remove('hidden');
                attendancedialog.classList.add('flex');
            } else {
                attendancedialog.classList.remove('flex');
                attendancedialog.classList.add('hidden');
            }
        }
    </script>
@endsection
