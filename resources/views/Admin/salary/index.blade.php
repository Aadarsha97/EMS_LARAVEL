@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Salary</h2>
    <hr class="h-0.5 bg-blue-600">




    <div class="m-6 shadow-md p-4 rounded-lg ">


        <div class="flex flex-row justify-around">
            <p>Register Salary</p>
            <p>Month : {{ date('M') }}</p>










        </div>


        <hr class="my-4">


        <table id="mytable">
            <thead>
                <tr>
                    <td>SN</td>
                    <td>Employee Name</td>
                    <td>Employee Email</td>
                    <td>Salary amount</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>

                @foreach ($salaries as $key => $salary)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $salary->user->name }}</td>
                        <td>{{ $salary->user->email }}</td>

                        <td>{{ $salary->salary }}</td>
                        <td>{{ $salary->status }}</td>
                        <td>
                            @if ($salary->status != 'Paid')
                                <button class="bg-blue-500 text-white text-sm px-2 py-0.5 rounded"
                                    onclick="paidsalary({{ $salary->id }})">Paid
                                    Salary</button>
                            @else
                                <p class="  text-center rounded-sm">Already Paid for this month</p>
                        </td>
                @endif
                </tr>
                @endforeach
            </tbody>
        </table>






    </div>

    <div id="salarydialog" class="fixed top-0 w-screen backdrop-blur-md h-screen flex flex-row justify-center items-center"
        style="display: none">
        <div class="bg-white shadow-md p-6 rounded flex flex-col items-center gap-2">

            <p>Are You Sure to Pay the Salary ?</p>
            <div>
                <button onclick="confirmsalary()" class="bg-blue-500 text-white px-2 py-0.5">Yes</button>

                <button class="bg-red-500 text-white px-2 py-0.5" onclick="paidsalary()">No</button>
            </div>

        </div>
    </div>
    <script>
        let table = new DataTable('#mytable');
        const salarydialog = document.getElementById('salarydialog');
        var salary;

        function paidsalary(salary) {
            if (salarydialog.style.display == 'none') {
                salarydialog.style.display = 'flex';
                this.salary = salary;
                console.log(salary);
            } else {
                salarydialog.style.display = 'none';
            }
        }

        function confirmsalary() {
            salary_id = salary;
            let url = "http://127.0.0.1:8000/salary/" + salary_id + "/paid";
            console.log(url);
            location.href = url;
        }
    </script>
@endsection
