@extends('Dashboard.dashboard')

@section('dashboardContent')
<div class="container col-md-9">
    <div class="card p-4">
        <h4>Add New Document Type</h4>
        <form actionUrl="/addNewDocType" method="post" id="documentTypeForm">
            @csrf
            <div class="row m-0 py-4">
                <div class="col-md-10 mb-3">
                    <input type="text" class="form-control" placeholder="Enter Document Type" name="document_name" required>
                </div>
                <div class="col-md-2 mb-3">
                    <button class="btn btn-info btn-block shadow-none text-capitalize" id="addBtn">Add New Type</button>
                </div>
            </div>
            <div class="alert p-3 alert-success doctypeAdded" style="display: none;"><i class="fas fa-smile"></i> Added successfully.</div>
            <div class="alert p-3 alert-danger doctypeDenied" style="display: none;"><i class="fas fa-frown"></i> Cannot add this document type right now.</div>
        </form>
    </div>

    <div class="card my-4 p-4" style="overflow-x: auto !important;">
        <h4 class="pb-2">All Document Types</h4>
        <table class="table table-sm my-3" id="myDataTable">
            <thead>
                <tr>
                    <th>S.no.</th>
                    <th>Document type</th>
                    <th>Added On</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allDocTypes as $docType)
                <tr style="font-size: 12px;">
                    <td>{{$docType->sn}}</td>
                    <td>{{$docType->document_type}}</td>
                    <td>{{$docType->date_created}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
