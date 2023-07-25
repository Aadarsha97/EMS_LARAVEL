@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Analytics </h2>
    <hr class="h-0.5 bg-blue-600">


    <div class="m-6 shadow-md p-4 rounded-lg flex justify-end">


        <div class="">
            <label for="" id="monthlbl">Month: </label>
            <input class="mx-2 rounded-md" type="month" name="" id="month" value="{{ date('Y-m') }}"
                onchange="changemonth(this.value)">
        </div>

        @php
            $permissioncount = [];
            $rolee = [];
            foreach ($roles as $roles->role => $role) {
                $permissioncount[] .= $role->permissions->count();
                $rolee[] .= $role->role;
            }
            
        @endphp

    </div>

    <div class="flex flex-row justify-around h-80 gap-10 px-4">

        <div class="min-h-full h-full">
            <p>Permissions</p>
            <canvas id="permissionchart" class="h-full w-1/2"></canvas>
        </div>


        <div class="h-full">
            <p>Attandance</p>
            <canvas id="attendancechart" class="h-full w-1/2"></canvas>
        </div>


    </div>

    <script>
        let table = new DataTable('#mytable');







        function changemonth(month) {


            console.log(month);

            $.ajax({
                type: "POST",
                url: "{{ route('analytics.fetch') }}",
                data: {
                    month: month,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {

                    let attendances = response;


                    attendancechart.data.datasets[0].data = attendances;
                    attendancechart.update();




                }
            });


        }
    </script>

    <script>
        const pchart = document.getElementById('permissionchart');
        const achart = document.getElementById('attendancechart');
        const month = document.getElementById('monthlbl');

        const permissionchart = new Chart(pchart, {
            type: 'bar',
            data: {
                labels: @json($rolee),
                datasets: [{
                    label: '# of Permissions',
                    data: @json($permissioncount),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        const attendancechart = new Chart(achart, {
            type: 'line',
            data: {
                datasets: [{
                    label: 'Numbers of employee attendance',
                    data: @json($attendances),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
