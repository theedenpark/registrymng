@extends('Employee.dashboard')

@section('bodyOFeDash')
<div style="overflow: auto; height: 100vh;" class="px-4 py-3">
    <div class="row m-0 justify-content-between">
        <div class="col-md-4">
            <h3>Add New Group</h3>
            <form actionUrl="/employee/addGroup" id="addGroupForm" method="post">
                @csrf
                <div class="my-3">
                    <label for="">Group Name</label>
                    <input type="text" class="form-control" name="group_name">
                    <label for="" style="font-size: 9px; color: #aaa;">Example: Sales, IT etc.</label>
                </div>
                <div class="my-3">
                    <button class="btn btn-primary shadow-0 text-capitalize" id="submitBtn">Add Group</button>
                </div>
            </form>
            <div class="alert alert-danger failed mt-3" style="display: none;">
                <i class="fas fa-times"></i> &nbsp;Failed
            </div>
            <div class="alert alert-success success" style="display: none;">
                <i class="fas fa-check"></i> &nbsp;Hooray!
            </div>
        </div>

        <div class="col-md-8">
            <h6>All Groups</h6>
            <table class="table table-sm table-bordered" style="font-size: 12px;">
                <tr>
                    <th>Group ID</th>
                    <th>Group Name</th>
                    <th>Added On</th>
                </tr>
                @foreach ($groups as $group)
                <tr>
                    <td>{{$group->group_id}}</td>
                    <td>{{$group->group_name}}</td>
                    <td>{{$group->gen_on}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection