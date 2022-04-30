@extends('Dashboard.dashboard')

@section('dashboardContent')
<div class="container col-md-9">
    <div class="card p-4">
        <h4>Add New Revenue Village</h4>
        <form actionUrl="/addRevenueVillage" method="post" id="newRevenueVillageForm">
            @csrf
            <div class="row m-0 py-4">
                <div class="col-md-6 mb-3">
                    <label for="">Select State</label>
                    <select name="state" id="myStates" class="form-select" required>
                        <option value="">Choose your state</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Select District</label>
                    <select name="district" id="myDistrict" class="form-select" required>
                        <option value="">Choose your district</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Enter name of Tehsil</label>
                    <input type="text" class="formFields" name="tehsil" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Enter name of Village</label>
                    <input type="text" class="formFields" name="village" required>
                </div>
                <div class="col-md-3 mt-3">
                    <button class="btn btn-info btn-block shadow-none text-capitalize" id="addBtn">Add New Village</button>
                </div>
            </div>
            <div class="alert p-3 alert-success villageAdded" style="display: none;"><i class="fas fa-smile"></i> Added successfully.</div>
            <div class="alert p-3 alert-danger villageDenied" style="display: none;"><i class="fas fa-frown"></i> Cannot add this unit right now.</div>
        </form>
    </div>

    <div class="card my-4 p-4" style="overflow-x: auto !important;">
        <h4 class="pb-2">All Revenue Villages</h4>
        <table class="table table-sm my-3" id="myDataTable">
            <thead>
                <tr>
                    <th>S.no.</th>
                    <th>Village</th>
                    <th>Tehsil</th>
                    <th>District</th>
                    <th>State</th>
                    <th>Added On</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allReveneueVillage as $village)
                <tr>
                    <td>{{$village->v_id}}</td>
                    <td>{{$village->village}}</td>
                    <td>{{$village->tehsil}}</td>
                    <td>{{$village->district}}</td>
                    <td>{{$village->state}}</td>
                    <td>{{$village->added_on}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection