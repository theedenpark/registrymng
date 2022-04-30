@extends('Dashboard.dashboard')

@section('dashboardContent')
<div class="container col-md-12">
    <div class="card p-4">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4>Add New Agent Account</h4>
            </div>
            <div class="px-3">
                <button class="btn btn-outline-info border-1 btn-floating" id="collapseBtn">
                    <i class="fas fa-caret-down fa-lg"></i>
                </button>
            </div>
        </div>
        <div class="myFormOverflow" style="border-top: 1px solid #ddd; display: none;">
            <form action="/addNewAcc" method="post" id="newAccForm" enctype="multipart/form-data">
                @csrf
                <div class="row m-0 py-4">
                    <div class="col-md-4 mb-3">
                        <label for="">Enter Aadhar No.</label>
                        <input type="text" class="formFields" name="aadhar" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Username</label>
                        <input type="text" class="formFields" placeholder="Enter User Name" name="username" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Mobile</label>
                        <input type="tel" class="formFields" placeholder="Enter Mobile" name="mobile" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Email</label>
                        <input type="email" class="formFields" name="email" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Gender</label>
                        <select name="gender" class="form-select">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Date-of-Birth</label>
                        <input type="date" class="formFields" name="dob" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Address</label>
                        <input type="address" class="formFields" name="address" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">City</label>
                        <input type="text" class="formFields" name="city" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">State</label>
                        <input type="text" class="formFields" name="state" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">PIN Code</label>
                        <input type="number" class="formFields" name="pin" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Upload ID</label>
                        <input type="file" class="form-control" name="id_proof" required>
                        <p class="pt-2 text-danger" style="font-size: 12px;">Note: Image name must be 10-11 characters long.</p>
                    </div>
                    <input type="text" value="2" name="user_type" style="display: none;">
                    <div class="col-md-3 mt-1">
                        <button class="btn btn-info btn-block shadow-none text-capitalize" id="addBtn" type="submit">Add New Agent Account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card my-4 p-4" style="overflow-x: auto !important;">
        <h4 class="pb-2">All Agents Accounts</h4>
        <table class="table table-sm my-3" style="font-size: 11px;" id="myDataTable">
            <thead>
                <tr>
                    <th>S.no.</th>
                    <th>Username</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>DoB</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>PIN</th>
                    <th>ID Proof</th>
                    <th>Added On</th>
                </tr>
            </thead>
            <tbody id="myTable">
            @foreach($Users as $user)
            <tr id="myRow">
                <td>{{$user->user_id}}</td>
                <td>
                    @if($user->user_status == 1)
                        <font class="text-success">{{$user->username}}</font>
                    @else
                        <font class="text-danger">{{$user->username}}</font>
                    @endif
                </td>
                <td>{{$user->mobile}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->dob}}</td>
                <td title="{{$user->address}}">{{substr($user->address, 0,12)}}...</td>
                <td>{{$user->city}}</td>
                <td>{{$user->state}}</td>
                <td>{{$user->pin}}</td>
                <td>
                    <a href="{{$user->id_proof}}" target="_blank">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
                <td>{{$user->added_on}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection