@extends('Dashboard.dashboard')

@section('dashboardContent')

<div class="container">
    <!-- Combine New Property  -->
    <div class="card">

        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4 class="px-4 pt-3 pb-1">Combine Property</h4>
                <p class="px-4 pb-0 mb-0" style="color: #aaa; font-size: 12px; position: relative; top: -10px;">Note:
                    All fileds are mandatory.</p>
            </div>
            <div class="px-3">
                <button class="btn btn-outline-info border-1 btn-floating" id="collapseBtn">
                    <i class="fas fa-caret-down fa-lg"></i>
                </button>
            </div>
        </div>
        <div class="myFormOverflow" style="border-top: 1px solid #ddd; display: none;">
        <form action="/combineNewProperty" method="post" id="propForm">
                @csrf
                <!-- Row Start  -->
                <div class="row m-0 p-4">
                    <div class="col-md-12 mt-2">
                        <table class="table table-responsive table-bordered">
                            <tbody id="PropBoxContainer">
                                <tr id="thisIsRow">
                                    <td>
                                        <select name="prop_ids[]" class="formFields" required>
                                            <option value="">Select Property</option>
                                            @foreach($properties as $property)
                                            <option value="{{$property->sn}}">Basra: {{$property->basra_no}}, {{$property->prop_name}}, {{$property->areaInSqft}}, {{$property->address}}, {{$property->prop_location}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" required name="c_khet_no[]" class="formFields" placeholder="Khet No.">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="times" disabled class="btn btn-danger btn-floating shadow-none remove"><i class="fas fa-times"></i></button>
                                    </td>
                                </tr>
                                <tr id="thisIsRow">
                                    <td>
                                        <select name="prop_ids[]" class="formFields" required>
                                            <option value="">Select Property</option>
                                            @foreach($properties as $property)
                                            <option value="{{$property->sn}}">Basra: {{$property->basra_no}}, {{$property->prop_name}}, {{$property->areaInSqft}}, {{$property->address}}, {{$property->prop_location}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" required name="c_khet_no[]" class="formFields" placeholder="Khet No.">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="times" disabled class="btn btn-danger btn-floating shadow-none remove"><i class="fas fa-times"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">
                                        <button id="btnAddProp" type="button" class="btn btn-info border-1 shadow-none text-capitalize" data-toggle="tooltip" data-original-title="Add more controls"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add Another Property&nbsp;</button>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>


                <div class="mx-4 mb-3">
                    <button class="btn btn-info btn-lg shadow-none text-capitalize" type="submit" id="addPropertyBtn">
                        Combine These Properties
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- All Properties  -->
    <div class="card my-4 p-4" style="overflow-x: auto !important;">
        <h4>All Combined Properties</h4>
        <div class="my-3" style="max-height: 63vh; overflow: auto;">
            <table class="table table-responsive table-sm" style="font-size: 13px;" id="myDataTable">
                <thead>
                    <tr class="bg-light">
                        <th>Sn</th>
                        <th>Property ID's</th>
                        <th>Combined on</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach($combinedProperties as $property)
                    <tr>
                        <td>{{$property->c_id}}</td>
                        <td>{{$property->prop_ids}}</td>
                        <td>{{$property->combined_on}}</td>
                        <td>
                            <button class="btn btn-light btn-floating shadow-0 p-0 btn-sm" onclick="viewCompPropDetails(`{{$property->prop_ids}}`)">
                                <i class="fas fa-eye p-0" style="font-size: 13px;"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Property Details  -->
    <div class="modalBg" style="display: none;"></div>
    <div class="myModal" style="display: none;">
        
        <div class="result">
            <!-- data will appear here  -->
            <div class="p-5 text-center">
                <div class="spinner-border text-danger spinner-border-sm" role="status"><span class="visually-hidden"></span></div>&nbsp;Please wait...
            </div>
        </div>
    </div>
</div>
@endsection
