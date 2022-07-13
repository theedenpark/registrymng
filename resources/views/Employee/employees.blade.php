@extends('Employee.dashboard')

@section('bodyOFeDash')
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css'>
<div style="overflow: auto; height: 100vh;" class="px-4 py-3">
    <div class="row m-0 justify-content-between">
        <div class="col-md-12">
            <h3>Add New Employee</h3>
            <form actionUrl="/employee/addEmployee" id="addEmployeeForm" method="post">
                @csrf
                <div class="row m-0">
                    <div class="col-md-4 my-3">
                        <label for="">Employee Name</label>
                        <input type="text" class="form-control form-control-sm" name="e_name">
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control form-control-sm" name="e_email">
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="">Mobile</label>
                        <input type="tel" class="form-control form-control-sm" name="e_mobile">
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="">Select Group</label>
                        <select name="group_id" id="" class="form-select form-select-sm">
                            <option selected disabled>Select Group</option>
                            @foreach ($groups as $group)
                                <option value="{{$group->group_id}}">{{$group->group_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="">Percentage Share</label>
                        <input type="text" placeholder="%" class="form-control form-control-sm" name="percentage_share">
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="">Joined On</label>
                        <input type="date" class="form-control form-control-sm" name="joined_on">
                    </div>
                    <div class="my-3">
                        <button class="btn btn-primary shadow-0 text-capitalize" id="submitBtn">Add Employee</button>
                    </div>
                </div>
            </form>
            <div class="alert alert-danger failed mt-3" style="display: none;">
                <i class="fas fa-times"></i> &nbsp;Failed
            </div>
            <div class="alert alert-success success" style="display: none;">
                <i class="fas fa-check"></i> &nbsp;Hooray!
            </div>
        </div>

        <div class="col-md-12">
            <h6 class="mt-3">All Employees</h6>
            <table class="table table-sm table-bordered table-striped" style="font-size: 12px;" id="myDataTable">
                <thead>
                    <tr>
                        <th>E_ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Group</th>
                        <th>% Share</th>
                        <th>Joined_On</th>
                        <th>Added_On</th>
                        <th>View</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td>{{$employee->employee_id}}</td>
                        <td>{{$employee->e_name}}</td>
                        <td>{{$employee->e_email}}</td>
                        <td>{{$employee->e_mobile}}</td>
                        <td>{{$employee->group_id}}</td>
                        <td>{{$employee->percentage_share}}</td>
                        <td>{{$employee->joined_on}}</td>
                        <td>{{date('d M, Y', strtotime($employee->added_on))}}</td>
                        <td class="text-center">
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </td>
                        <td class="text-center">
                            <i class="fa-solid fa-edit"></i>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js'></script>
<script id="rendered-js" >
    $(document).ready(function () {
        $('#myDataTable').DataTable({ order: [[1, 'asc']], });
    });
</script>
@endsection