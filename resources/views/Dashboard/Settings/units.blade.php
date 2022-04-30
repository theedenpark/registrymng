@extends('Dashboard.dashboard')

@section('dashboardContent')
<div class="container col-md-9">
    <div class="card p-4">
        <h4>Add New Unit</h4>
        <form actionUrl="/addNewUnit" method="post" id="newUnitForm">
            @csrf
            <div class="row m-0 py-4">
                <div class="col-md-6 mb-3">
                    <label for="">Unit Name</label>
                    <input type="text" class="formFields" placeholder="Enter Unit Name" name="unit_name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Enter Value (In Sq.ft.)</label>
                    <input type="number" step="0.0000000000000001" class="formFields" placeholder="Enter Value" name="unit_value" required>
                </div>
                <div class="col-md-3 mt-3">
                    <button class="btn btn-info btn-block shadow-none text-capitalize" id="addBtn">Add New Unit</button>
                </div>
            </div>
            <div class="alert p-3 alert-success unitAdded" style="display: none;"><i class="fas fa-smile"></i> Added successfully.</div>
            <div class="alert p-3 alert-danger unitDenied" style="display: none;"><i class="fas fa-frown"></i> Cannot add this unit right now.</div>
        </form>
    </div>

    <div class="card my-4 p-4" style="overflow-x: auto !important;">
        <h4 class="pb-2">All Bank Users</h4>
        <table class="table table-sm my-3" id="myDataTable">
            <thead>
                <tr>
                    <th>S.no.</th>
                    <th>Unit Name</th>
                    <th>Value (In Sq.ft.)</th>
                    <th>Added On</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allUnits as $unit)
                <tr>
                    <td>{{$unit->unit_id}}</td>
                    <td>{{$unit->unit_name}}</td>
                    <td>{{$unit->unit_value}}</td>
                    <td>{{$unit->added_on}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection