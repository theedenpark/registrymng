@extends('Dashboard.dashboard')

@section('dashboardContent')
<div class="container">

    <!-- Add New Property  -->
    <div class="card">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4 class="px-4 pt-3 pb-1">Add New Property</h4>
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
            <form action="/addNewProperty" method="post" enctype="multipart/form-data" id="propForm">
                @csrf
                <!-- Row Start  -->
                <div class="text-info px-4 py-2 bg-light">1. Property Information</div>
                <div class="row m-0 p-4">
                    <div class="col-md-6 mb-3">
                        <label for="">Property Acquisition Status</label>
                        <select name="prop_acq_status" class="form-select" required>
                            <option value="purchased">Purchased</option>
                            <option value="registered agreement">Registered Agreement</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Property Type</label>
                        <select name="prop_type_id" class="form-select" required>
                            @foreach($allPropTypes as $propType)
                            <option value="{{$propType->property_type}}">{{$propType->property_type}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <table class="table table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>बसरा न.</td>
                                    <td>खाता न.</td>
                                    <td>खेत न.</td>
                                    <td>मᵒ (मध्य)</td>
                                    <td>क्षेत्र</td>
                                    <td>इकाई</td>
                                    <td>वर्ग फुट . में</td>
                                    <td class="text-center"><i class="fas fa-times"></i></td>
                                </tr>
                            </thead>
                            <tbody id="khetContainer">
                                <tr class="areaRow">
                                    <td>
                                        <input type="text" class="formFields" min="0" name="basra_no[]" id="basra_no">
                                    </td>
                                    <td>
                                        <input name="khata_no[]" type="text" value="" class="formFields" />
                                    </td>
                                    <td>
                                        <input name="khet_no[]" type="text" value="" class="formFields" />
                                    </td>
                                    <td class="text-center" width="100px">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="madhya[]" value="1" id="flexCheckDefault" onclick="$(this).siblings().prop('checked', false);" />Yes<br>

                                            <input class="form-check-input" type="checkbox" name="madhya[]" value="0" id="flexCheckDefault1" checked onclick="$(this).siblings().prop('checked', false);" />No
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" value="" class="formFields khetArea" autocomplete="off" />
                                    </td>
                                    <td>
                                        <select class="form-select" id="changeUnit">
                                            @foreach($allUnits as $unit)
                                            <option value="{{$unit->unit_value}}">{{$unit->unit_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="formFields" name="khet_area[]" readonly value="00.00" style="background: #eee;" id="valueInSqft">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-floating shadow-none remove"><i class="fas fa-times"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="100%">
                                        <button id="addNewKhet" type="button"
                                            class="btn btn-success border-1 shadow-none text-capitalize"
                                            data-toggle="tooltip" data-original-title="Add more controls"><i class="fas fa-plus"></i> Add New Khet</button>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="">Property Name</label>
                        <input type="text" class="formFields" name="prop_name">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Property Location</label>
                        <select name="prop_location" class="form-select">
                            <option value="mountains">Mountains</option>
                            <option value="plains">Plains</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Road Connectivity</label>
                        <select name="road_conn" class="form-select">
                            <option value="on road">On Road</option>
                            <option value="off road">Off Road</option>
                        </select>
                    </div>
                    <!-- <div class="col-md-6 mb-3">
                        <label for="" class="px-3">Property Area</label>
                        <div class="d-flex justify-content-between">
                            <div class="col-10 px-3">
                                <input type="number" class="formFields" id="areaVal">
                            </div>
                            <div class="col-2">
                                <select class="form-select" id="changeUnit">
                                    @foreach($allUnits as $unit)
                                    <option value="{{$unit->unit_value}}">{{$unit->unit_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Value (in sq.ft.)</label>
                        <input type="number" class="formFields" name="area_sqft" readonly value="00.00" style="background: #eee;" id="valueInSqft">
                    </div> -->
                    <div class="col-md-12 mb-3">
                        <label for="">Upload Registry (Only PDF)</label>
                        <input type="file" class="form-control" accept="application/pdf" name="reg_file">
                    </div>
                </div>
                <!-- End of Row  -->

                <!-- Row Start  -->
                <div class="text-info px-4 py-2 bg-light">2. Address</div>
                    <div class="row m-0 p-3">
                        <div class="col-md-3 mb-3">
                            <select name="p_state" id="myStates" class="formFields">
                                <option value="">Select State</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <select name="p_district" id="myDistrict" class="formFields districtChange">
                                <option value="">Select District</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <select name="p_tehsil" id="myTehsil" class="formFields tehsilChange">
                                <option value="">Select Tehsil</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <select name="p_village" id="myVillage" class="formFields villageChange">
                                <option value="">Select Village</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">PIN Code</label>
                            <input type="number" class="formFields" name="pin">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Longitude/Latitude</label>
                            <input type="text" class="formFields" name="long_lat">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Landmark</label>
                            <input type="text" class="formFields" name="landmark">
                        </div>
                    </div>
                <!-- End of Row  -->

                <!-- Row Start  -->
                <div class="text-info px-4 py-2 bg-light">3. Individual Information</div>
                <div class="row m-0 p-4">
                    <div class="col-md-12 mb-3">
                        <label for="">Property Account</label>
                        <select name="prop_acc" class="form-select">
                            <option value="">Select Property Account</option>
                            @foreach($PropAcc as $user)
                            <option value="{{$user->username}}">{{$user->username}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 ">
                        <table class="table table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>Select Seller</td>
                                    <td class="text-center">Remove</td>
                                </tr>
                            </thead>
                            <tbody id="sellerContainer">
                                <tr>
                                    <td width="80%">
                                        <select name="seller_id[]" class="form-select">
                                            <option value="">Select Seller</option>
                                            @foreach($Sellers as $seller)
                                            <option value="{{$seller->username}}">{{$seller->username}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-floating shadow-none remove"><i class="fas fa-times"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">
                                        <button id="addNewSeller" type="button"
                                            class="btn btn-info border-1 shadow-none text-capitalize"
                                            data-toggle="tooltip" data-original-title="Add more controls"><i class="fas fa-plus"></i> Add New Seller</button>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="col-md-12 ">
                        <table class="table table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>Select Witness</td>
                                    <td class="text-center">Remove</td>
                                </tr>
                            </thead>
                            <tbody id="witnessContainer">
                                <tr>
                                    <td width="80%">
                                        <select name="witness_id[]" class="form-select">
                                            <option value="">Select Witness</option>
                                            @foreach($Witnesses as $witness)
                                            <option value="{{$witness->username}}">{{$witness->username}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-floating shadow-none remove"><i class="fas fa-times"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">
                                        <button id="addNewWitness" type="button"
                                            class="btn btn-warning border-1 shadow-none text-capitalize"
                                            data-toggle="tooltip" data-original-title="Add more controls"><i class="fas fa-plus"></i> Add New Witness</button>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
                <!-- End of Row -->

                <!-- Row Start  -->
                <div class="text-info px-4 py-2 bg-light">4. Other Information</div>
                <div class="row m-0 p-4">
                    <div class="col-md-4 mb-3">
                        <label for="">Date of Registry</label>
                        <input type="date" class="formFields" name="date_of_reg">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Registeration Number</label>
                        <input type="text" class="formFields" name="reg_no">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Actual Value (₹)</label>
                        <input type="number" class="formFields" name="actual_value">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Registered Value (₹)</label>
                        <input type="number" class="formFields" name="reg_value">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Returned Rate/Amount (If registry get cancelled)</label>
                        <div class="d-flex justify-content-between">
                            <div class="col-8">
                                <input type="number" class="formFields" name="return_rate">
                            </div>
                            <div class="col-4 px-1">
                                <select name="reg_val_unit" class="form-select">
                                    <option value="rate">Rate</option>
                                    <option value="amount">Amount</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Cancellation Terms</label>
                        <textarea name="cancellation_terms" class="formFields"></textarea>
                    </div>
                </div>
                <!-- End of Row  -->

                <!-- Row Start  -->
                <div class="text-info px-4 py-2 bg-light mb-3">5. Expense Details</div>

                <div class="row m-0 p-4">
                    <div class="col-md-6">
                        <label for="">Select Agent</label>
                        <div class="formFields align-items-center" style="max-height: 200px;">
                            <div class="d-flex">
                                <div>
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="px-2" style="flex: 1;">
                                    <input type="text" name="agent_id" class="searchAgent" placeholder="Search Agent"
                                        autocomplete="none">
                                </div>
                            </div>
                            <div class="agentList"
                                style="display: none; overflow-y: auto; min-height: 50px; max-height: 100px;">
                                @foreach($Agents as $agent)
                                <div class="px-4 py-1 agentBlock">
                                    <p class="p-0 m-0" onclick="putAgent($(this).html())">{{$agent->username}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Agent Expense (₹)</label>
                        <input type="number" class="formFields" name="agent_exp">
                    </div>

                    <div class="col-md-6">
                        <label for="">Select Draftmen</label>
                        <div class="formFields align-items-center" style="max-height: 200px;">
                            <div class="d-flex">
                                <div>
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="px-2" style="flex: 1;">
                                    <input name="draftmen_id" type="text" class="searchDraftmen"
                                        placeholder="Search Draftmen" autocomplete="none">
                                </div>
                            </div>
                            <div class="draftList"
                                style="display: none; overflow-y: auto; min-height: 50px; max-height: 100px;">
                                @foreach($Draftmens as $draftmen)
                                <div class="px-4 py-1 draftmenBlock">
                                    <p class="p-0 m-0" onclick="putDraftmen($(this).html())">{{$draftmen->username}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Draftmen/Leagal Expense (₹)</label>
                        <input type="number" class="formFields" name="draftmen_exp">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Stamp Duty</label>
                        <input type="number" class="formFields" value="100" name="stamp_duty">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Registration Fees</label>
                        <input type="number" class="formFields" value="100" name="reg_fees">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">No. of Electronic Files</label>
                        <input type="number" class="formFields" value="1" name="electronic_files">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Electronic File Processing Fees</label>
                        <input type="number" class="formFields" value="1" name="electronic_files_fee">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="formFields"></textarea>
                    </div>

                </div>

                <!-- End of Row  -->

                <!-- Row Start  -->
                <div class="text-info px-4 py-2 bg-light">6. Payment Details</div>
                <div class="row m-0 p-4">
                    <div class="col-md-6 mb-3">
                        <label for="">Deposit Date</label>
                        <input type="date" class="formFields" name="deposit_date">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="">Total Amount</label>
                        <input type="number" class="formFields" placeholder="₹0.00" id="total"
                            name="total_amount">
                    </div>

                    <div class="col-md-12">
                        <table class="table table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>Payment Mode</td>
                                    <td>Amount (INR)</td>
                                    <td>Transaction ID (Put - if paid by cash)</td>
                                    <td class="text-center">Remove</td>
                                </tr>
                            </thead>
                            <tbody id="TextBoxContainer">
                                <tr>
                                    <td>
                                        <select name="pay_mode[]" class="formFields">
                                            <option value="bank" selected>Bank</option>
                                            <option value="cash">Cash</option>
                                            <option value="cheque">Cheque</option>
                                            <option value="demand draft">Demand Draft</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input name="pay_mode_amount[]" type="number" value="" class="formFields"
                                         />
                                    </td>
                                    <td>
                                        <input name="transaction_id[]" type="text" value=""
                                            class="formFields" />
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-floating shadow-none remove"><i
                                                class="fas fa-times"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">
                                        <button id="btnAdd" type="button"
                                            class="btn btn-info border-1 shadow-none text-capitalize"
                                            data-toggle="tooltip" data-original-title="Add more controls"><i class="fas fa-plus"></i> Add New Mode</button>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Payment Description</label>
                        <textarea name="pay_desc" class="formFields"></textarea>
                    </div>
                </div>
                <!-- End of Row  -->

                <div class="mx-4 mb-3">
                    <button class="btn btn-info btn-lg shadow-none text-capitalize" type="submit" id="addPropertyBtn">
                        Add Property
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- All Properties  -->
    <div class="card my-4 p-4" style="overflow-x: auto !important;">
        <h4>All Added Properties</h4>
        <div class="my-3" style="max-height: 63vh; overflow: auto;">
            <table class="table table-responsive table-sm" style="font-size: 11px;" id="myDataTable">
                <thead>
                    <tr class="bg-light">
                        <th>Basra no.</th>
                        <th>Khata no.</th>
                        <th>Khet no.</th>
                        <th>Khet area</th>
                        <th>Property Name</th>
                        <th>Seller</th>
                        <th>Reg. Value</th>
                        <th>Date of Registry</th>
                        <th class="text-center">Registry</th>
                        <th class="text-center">143</th>
                        <th class="text-center">View</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach($allProperties as $prop)
                    <tr class="text-capitalize" id="myRow">
                        <td>{{$prop->basra_no}}</td>
                        <td>{{$prop->khata_no}}</td>
                        <td>{{$prop->khet_no}}
                            @if($prop->madhya != 0)
                            मᵒ
                            @endif
                        </td>
                        <td>{{$prop->khet_area}} sq.ft.</td>
                        <td>{{$prop->prop_name}}</td>
                        <td>{{$prop->seller_id}}</td>
                        <td>₹{{number_format($prop->reg_value)}}</td>
                        <td>{{date('d-m-Y', strtotime($prop->date_of_reg))}}</td>
                        <td class="text-center">
                            @if($prop->reg_file == 0)
                                <button class="btn btn-light btn-floating shadow-0 btn-sm" data-mdb-toggle="modal"
                                    data-mdb-target="#exampleModal"
                                    onclick="uploadMyRegBtn(this, `{{$prop->prop_id}}`, `{{$prop->prop_name}}`)">
                                    <i class="fa-solid fa-arrow-up-from-bracket text-danger"></i>
                                </button>
                            @else
                                <span class="badge bg-success" style="font-weight: 400 !important;">Available</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($prop->new_property_type == 0)
                                <button class="btn btn-light btn-floating shadow-0 btn-sm" data-mdb-toggle="modal"
                                        data-mdb-target="#onefourthreeModal"
                                        onclick="uploadOFT(this, `{{$prop->khet_id}}`, `{{$prop->khet_no}}`)">
                                    <i class="fa-solid fa-arrow-up-from-bracket text-info"></i>
                                </button>
                            @else
                                <a href="{{$prop->oft}}" target="_blank">
                                    <button class="btn btn-light btn-floating shadow-0 p-0 btn-sm">
                                        <i class="fas fa-file-invoice text-info"></i>
                                    </button>
                                </a>
                            @endif
                        </td>
                        <td class="text-center">
                            <button class="btn btn-light btn-floating shadow-0 p-0 btn-sm" onclick="viewPropDetails(`{{$prop->prop_id}}`, `{{$prop->basra_no}}`, `{{$prop->khet_no}}`, `{{$prop->khata_no}}`, `{{$prop->khet_area}}`)">
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

<!-- Upload Registry Modal  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: block;" aria-modal="true" role="dialog"> -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Registry</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/uploadMyRegBtn" method="post" class="p-0 m-0" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Property Name</label>
                        <input type="text" id="prop_id" name="prop_id" style="display: none;">
                        <input type="text" class="formFields" disabled id="property">
                    </div>
                    <div class="mb-3">
                        <label for="">Upload Registry (Only PDF)</label>
                        <input type="file" class="form-control" name="reg_file" accept=".pdf">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-capitalize shadow-1 btn-light"
                        data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn text-capitalize shadow-1 btn-primary" onclick="$(this).html('Uploading...');"><i
                            class="fa-solid fa-arrow-up-from-bracket fa-sm"></i>&nbsp; Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Upload 143 Aggrement  -->
<div class="modal fade" id="onefourthreeModal" tabindex="-1" aria-labelledby="onefourthreeModalLabel" aria-hidden="true">
    <!-- <div class="modal fade show" id="onefourthreeModal" tabindex="-1" aria-labelledby="onefourthreeModalLabel" style="display: block;" aria-modal="true" role="dialog"> -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="onefourthreeModalLabel">Update Property Type (143 Aggrement)</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/uploadoft" method="post" class="p-0 m-0" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Khet No.</label>
                        <input type="text" id="khet_id" name="khet_id" style="display: none;">
                        <input type="text" class="formFields" disabled id="khet">
                    </div>
                    <div class="mb-3">
                        <label for="">Property Type (Now)</label>
                        <select name="new_prop_type" id="" class="form-select">
                            @foreach($allPropTypes as $propType)
                            <option value="{{$propType->property_type}}">{{$propType->property_type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Upload 143 Aggrement (Only PDF)</label>
                        <input type="file" class="form-control" name="reg_file" accept=".pdf">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-capitalize shadow-1 btn-light"
                        data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn text-capitalize shadow-1 btn-primary" onclick="$(this).html('Uploading...');"><i
                            class="fa-solid fa-arrow-up-from-bracket fa-sm"></i>&nbsp; Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
