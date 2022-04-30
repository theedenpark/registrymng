@extends('Dashboard.dashboard')

@section('dashboardContent')
<div class="container col-md-9">
    <div class="card p-4">
        <h4>Add New Property Type</h4>
        <form actionUrl="/addNewPropType" method="post" id="propertyTypeForm">
            @csrf
            <div class="row m-0 py-4">
                <div class="col-md-10 mb-3">
                    <input type="text" class="form-control" placeholder="Enter Property Type" name="property_name" required>
                </div>
                <div class="col-md-2 mb-3">
                    <button class="btn btn-info btn-block shadow-none text-capitalize" id="addBtn">Add New Type</button>
                </div>
            </div>
            <div class="alert p-3 alert-success proptypeAdded" style="display: none;"><i class="fas fa-smile"></i> Added successfully.</div>
            <div class="alert p-3 alert-danger proptypeDenied" style="display: none;"><i class="fas fa-frown"></i> Cannot add this property right now.</div>
        </form>
    </div>

    <div class="card my-4 p-4" style="overflow-x: auto !important;">
        <h4 class="pb-2">All Property Types</h4>
        <table class="table table-sm my-3" id="myDataTable">
            <thead>
                <tr>
                    <th>S.no.</th>
                    <th>Property type</th>
                    <th>Added On</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allPropTypes as $propType)
                <tr style="font-size: 12px;">
                    <td>{{$propType->sn}}</td>
                    <td>{{$propType->property_type}}</td>
                    <td>{{$propType->date_created}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
