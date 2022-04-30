@extends('Dashboard.dashboard')

@section('dashboardContent')
<div class="container col-md-9">
    <div class="card p-4">
        <h4>Add New Bank Details</h4>
        <form actionUrl="/addNewBankUser" method="post" id="newBankUserForm">
            @csrf
            <div class="row m-0 py-4">
                <div class="col-md-6 mb-3">
                    <label for="">Select Bank</label>
                    <select name="bank_name" id="" class="form-select" required>
                        <option value="">Select Bank</option>
                        @foreach($banks as $bank)
                        <option value="{{$bank->bank_name}}">{{$bank->bank_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Account Holder Name</label>
                    <input type="text" class="formFields" placeholder="Account Holder Name" name="acc_name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Account Number</label>
                    <input type="number" class="formFields" placeholder="Account Number" name="acc_number" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">IFSC</label>
                    <input type="text" class="formFields text-uppercase" placeholder="Enter IFSC" name="bank_ifsc" required>
                </div>
                <div class="col-md-3 mt-3">
                    <button class="btn btn-info btn-block shadow-none text-capitalize" id="addBtn">Add New Account</button>
                </div>
            </div>
            <div class="alert p-3 alert-success bankUserAdded" style="display: none;"><i class="fas fa-smile"></i> Added successfully.</div>
            <div class="alert p-3 alert-danger bankUserDenied" style="display: none;"><i class="fas fa-frown"></i> Cannot add this user right now.</div>
        </form>
    </div>

    <div class="card my-4 p-4" style="overflow-x: auto !important;">
        <h4 class="pb-2">All Bank Users</h4>
        <table class="table table-sm my-3" id="myDataTable">
            <thead>
                <tr>
                    <th>S.no.</th>
                    <th>Bank Name</th>
                    <th>IFSC</th>
                    <th>A/c Holder Name</th>
                    <th>Acount Number</th>
                    <th>Status</th>
                    <th>Added On</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bankUsers as $bankUser)
                <tr>
                    <td>{{$bankUser->sn}}</td>
                    <td>{{$bankUser->bank_name}}</td>
                    <td>{{$bankUser->bank_ifsc}}</td>
                    <td>{{$bankUser->acc_name}}</td>
                    <td>{{$bankUser->acc_number}}</td>
                    <td>{{$bankUser->user_status}}</td>
                    <td>{{$bankUser->added_on}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection