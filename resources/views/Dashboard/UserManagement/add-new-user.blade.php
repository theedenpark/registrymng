@extends('Dashboard.dashboard')

@section('dashboardContent')
<div class="container col-md-9">
    <div class="card p-4">
        <h4>Add New User</h4>
        <form actionUrl="/addPortalUser" method="post" id="newUserForm">
            @csrf
            <div class="row m-0 py-4">
                <div class="col-md-6 mb-3">
                    <label for="">User Name</label>
                    <input type="text" class="formFields" placeholder="Enter Username" name="username" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Enter Email</label>
                    <input type="email" class="formFields" placeholder="Enter Email" name="email" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Enter Password</label>
                    <input type="password" class="formFields" placeholder="Enter Password" name="password" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Select User Type</label>
                    <select name="user_type" id="" class="form-select" required>
                        <option value="">Select User Type</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
                <div class="col-md-3 mt-3">
                    <button class="btn btn-info btn-block shadow-none text-capitalize" id="addBtn">Add New User</button>
                </div>
            </div>
            <div class="alert p-3 alert-success userAdded" style="display: none;"><i class="fas fa-smile"></i> Added successfully.</div>
            <div class="alert p-3 alert-danger userDenied" style="display: none;"><i class="fas fa-frown"></i> Cannot add this user right now.</div>
        </form>
    </div>

    <div class="card my-4 p-4" style="overflow-x: auto !important;">
        <h4 class="pb-2">All Users</h4>
        <table class="table table-sm my-3" id="myDataTable">
            <thead>
                <tr>
                    <th>S.no.</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Since</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allUsers as $user)
                <tr>
                    <td>{{$user->sn}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->user_type == 1)
                            Admin
                        @else
                            User
                        @endif
                    </td>
                    <td>{{$user->date_created}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection