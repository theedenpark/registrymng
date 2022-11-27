@extends('Dashboard.dashboard')

@section('dashboardContent')

<div class="container">
    <div class="card">
        <div class="d-flex align-items-center justify-content-between py-2 px-3">
            <div>
                <h5 class="px-2 pt-3 pb-1">Add New Property</h5>
                <p class="px-2 pb-0 mb-0" style="color: #aaa; font-size: 12px; position: relative; top: -10px;">Note:
                    All fileds are mandatory.</p>
            </div>
            <div class="px-2">
                <button class="btn btn-outline-info border-1 btn-floating" id="collapseBtn">
                    <i class="fas fa-caret-down fa-lg"></i>
                </button>
            </div>
        </div>

        <div class="myFormOverflow" style="border-top: 1px solid #ddd; display: none;">
            <form actionUrl="/addMyProperty">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                {{-- registration details  --}}
                <section>
        
                    <div class="bg-light p-2 mb-2 px-3">
                        1. Registration Details
                    </div>
                    <div class="row m-0 m-3">
                        <div class="col-md-3">
                            <label for="">Registeration Number</label>
                            <input type="text" class="formFields form-select-sm" id="reg_no" name="reg_no">
                        </div>
                        <div class="col-md-3">
                            <label for="">Jild Number</label>
                            <input type="text" class="formFields form-select-sm" id="jild_no" name="jild_no">
                        </div>
                        <div class="col-md-3">
                            <label for="">Pages (Ex: 10-60)</label>
                            <input type="text" class="formFields form-select-sm" name="page_no" onkeyup="checkReg($(this).val())">
                            <p id="response" style="font-size: 11px;"></p>
                        </div>
                        <div class="col-md-3">
                            <label for="">Date of Registry</label>
                            <input type="date" class="formFields form-select-sm" name="date_of_reg">
                        </div>
                        <div class="col-md-3">
                            <label for="">Market Value</label>
                            <input type="number" class="formFields form-select-sm" name="actual_value">
                        </div>
                        <div class="col-md-3">
                            <label for="">Registered Value</label>
                            <input type="number" class="formFields form-select-sm" name="reg_value">
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-end">
                                <div class="col-md-8">
                                    <label for="">Return rate/amount (if registry gets cancelled)</label>
                                    <input type="number" class="formFields form-select-sm" name="return_rate">
                                </div>
                                <div class="col-md-4" style="padding-left: 10px;">
                                    {{-- <label for="">Rate</label> --}}
                                    <select name="reg_val_unit" id="" class="form-select form-select-sm pb-1 pt-2">
                                        <option value="" selected disabled>Select unit</option>
                                        <option value="rate">Rate</option>
                                        <option value="amount">Amount</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2 mb-3">
                            <label for="">Cancellation Terms</label>
                            <textarea name="cancellation_terms" class="formFields"></textarea>
                        </div>
                    </div>
        
                </section>
        
                {{-- individual detaisl  --}}
                <section>
        
                    <div class="bg-light p-2 mb-2 px-3">
                        2. Individual Details
                    </div>
        
                    <div class="row m-3">
        
                        <div class="col-md-12 pb-3">
                            <label for="">Property Account</label>
                            <select name="prop_acc" class="form-select" onmousedown="individual(this, 1)">
                                <option value="" disabled selected>Select Individual</option>
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
                                            <select name="seller_id[]" class="form-select" onmousedown="individual(this, 3)">
                                                <option value="" selected disabled>Select Individual</option>
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
                                            <select name="witness_id[]" class="form-select" onmousedown="individual(this, 5)">
                                                <option value="" selected disabled>Select Individual</option>
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
                </section>
        
                {{-- property details  --}}
                <section>
                    <div class="bg-light p-2 mb-2 px-3">
                        3. Property Details
                    </div>
        
                    <div class="row m-0 p-3">
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
                        {{-- <div class="col-md-12 mb-3">
                            <label for="">Upload Registry (Only PDF)</label>
                            <input type="file" class="form-control" accept="application/pdf" name="reg_file">
                        </div> --}}
                    </div>
                </section>
        
                {{-- address details  --}}
                <section>
                    <div class="bg-light p-2 mb-2 px-3">
                        4. Address Details
                    </div>
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
                </section>
        
                {{-- expense details  --}}
                <section>
                    <div class="bg-light p-2 mb-2 px-3">
                        5. Expense Details
                    </div>
                    <div class="row m-0 p-3">
                        <div class="col-md-6">
                            <label for="">Select Agent</label>
                            <select name="agent_id" class="form-select" onmousedown="individual(this, 2)">
                                <option value="" selected disabled>Select Individual</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Agent Expense (₹)</label>
                            <input type="number" class="formFields" name="agent_exp">
                        </div>
        
                        <div class="col-md-6">
                            <label for="">Select Draftmen</label>
                            <select name="draftmen_id" class="form-select" onmousedown="individual(this, 6)">
                                <option value="" selected disabled>Select Individual</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Draftmen/Leagal Expense (₹)</label>
                            <input type="number" class="formFields" name="draftmen_exp">
                        </div>
        
                        <div class="col-md-3 mb-3">
                            <label for="">Stamp Duty</label>
                            <input type="number" class="formFields" name="stamp_duty">
                        </div>
        
                        <div class="col-md-3 mb-3">
                            <label for="">Registration Fees</label>
                            <input type="number" class="formFields" name="reg_fees">
                        </div>
        
                        <div class="col-md-3 mb-3">
                            <label for="">No. of Electronic Files</label>
                            <input type="number" class="formFields" name="electronic_files">
                        </div>
        
                        <div class="col-md-3 mb-3">
                            <label for="">Electronic File Processing Fees</label>
                            <input type="number" class="formFields" name="electronic_files_fee">
                        </div>
        
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="formFields"></textarea>
                        </div>
        
                    </div>
                </section>
        
                {{-- payment details  --}}
                <section>
                    <div class="bg-light p-2 mb-2 px-3">
                        6. Payment Details
                    </div>
                    <div class="row m-0 p-3">
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
                                            <button id="btnAdd" type="button" class="btn btn-info border-1 shadow-none text-capitalize" data-toggle="tooltip" data-original-title="Add more controls">
                                                <i class="fas fa-plus"></i> Add New Mode
                                            </button>
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
                </section>
                <div class="mx-4 mb-3">
                    <button class="btn btn-info btn-lg shadow-none text-capitalize" type="button" onclick="insert(this)">
                        Add Property
                    </button>
                </div>
            </form>

        </div>


    </div>


    <!-- All Properties  -->
    <div class="card my-4 p-4" style="overflow-x: auto !important;">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h5 class="m-0">All Added Properties</h5>
            </div>
            <div>
                <button class="btn btn-light rounded-pill shadow-none px-3" onclick="listProps()" title="Reload List">
                    <i class="fa-solid fa-arrow-rotate-right"></i>
                </button>
            </div>
        </div>
        <div class="my-3" style="max-height: 63vh; overflow: auto;" id="listProps">
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


<script>
    function checkReg(page_no)
    {
        var reg_no = $('#reg_no').val();
        var jild_no = $('#jild_no').val();
        $('#response').html('Please wait...');

        $.ajax({
            url: '/checkReg',
            type: 'GET',
            data: {
                'reg_no' : reg_no,
                'jild_no' : jild_no,
                'page_no' : page_no
            },
            success: function(res){
                if(res == true)
                {
                    $('#response').html('<span class="text-success">Good to go! '+ reg_no +'/'+ jild_no + '/'+ page_no +' </span>');
                }
                else
                {
                    $('#response').html('<span class="text-danger">Already Exist! '+ reg_no +'/'+ jild_no + '/'+ page_no +' </span>');
                }
            }
        });
    }

    function individual(elem, val)
    {
        $(elem).html('<option>Loading...</option>')
        $.ajax({
            url : '/individual',
            type: 'GET',
            data: {
                'user_type' : val
            },
            success: function(res){
                $(elem).html(res);
            }
        });
    }

    function listProps()
    {
        $('#listProps').html('<div class="d-flex align-items-center"> <div> <div class="spinner-border text-primary spinner-border-sm" role="status"><span class="visually-hidden"></span></div> </div> <div class="px-2">Please wait...</div> </div>');
        $.ajax({
            url: '/listProps',
            type: 'GET',
            success: function (res){
                $('#listProps').html(res);
            }
        });
    }

    $(document).ready(function(){
        listProps();
    });

</script>

@endsection