@extends('Employee.layouts')

@section('title')
    Dashboard - Employee Management | Ewen Realtors
@endsection

@section('body')

    <div class="d-flex m-0">
        <div class="col-lg-2 p-0">
            <div style="height: 100vh;" class="bg-dark shadow-5">
                <div class="d-flex" style="flex-direction: column;">
                    <div class="text-danger font-weight-bold text-center text-lg py-4" style="font-size: 18px;">eManagement</div>
                    <div>
                        <ul id="employee_nav">
                            <li><a href="/employee">Dashboard</a></li>
                            <li><a href="/employee/all">Employees</a></li>
                            <li><a href="/employee/groups">Groups</a></li>
                            <li><a href="/receipt/" target="_blank">Back To Receipt Management</a></li>
                            <li><a href="/receipt/logout" onclick="return confirm('Are you sure to log out?');">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            @yield('bodyOFeDash')
        </div>
    </div>

@endsection