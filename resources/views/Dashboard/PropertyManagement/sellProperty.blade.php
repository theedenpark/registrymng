@extends('Dashboard.dashboard')

@section('dashboardContent')

<div class="container">
    <!-- Sell New Property  -->
    <div class="card">

        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4 class="px-4 pt-3 pb-1">Sell Property</h4>
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
            <form action="/sellNewProperty" method="post" enctype="multipart/form-data" id="propForm">
                @csrf
                <!-- Row Start  -->
                <div class="text-info px-4 py-2 bg-light">1. Property Information</div>
                <div class="row m-0 px-4 pt-4">
                    <div class="col-md-3 mb-3">
                        <select name="s_state" id="myStates" class="formFields">
                            <option value="">Select State</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <select name="s_district" id="myDistrict" class="formFields districtChange">
                            <option value="">Select District</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <select name="s_tehsil" id="myTehsil" class="formFields tehsilChange">
                            <option value="">Select Tehsil</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <select name="s_village" id="myVillage" class="formFields villageChange">
                            <option value="">Select Village</option>
                        </select>
                    </div>
                    <div class="col-md-1 mb-3">
                        <button type="button" class="listbtn btn btn-info shadow-0 rounded-2 text-capitalize"
                            style="display: none;"><i class="fas fa-list"></i></button>
                    </div>
                </div>
                <!-- End of Row  -->

                <div class="rowManager">
                    <!-- Start of Row  -->
                    <div class="row m-0 px-4 importRow" style="display: none;">
                        <!-- Items Will Appear Here  -->
                    </div>
                    <!-- End of Row  -->
                </div>

                <div class="row m-0 px-4">
                    <div class="col-md-12 mb-3">
                        <label for="">Total Area To Be Sold (In Sq.ft.)</label>
                        <input type="text" name="total_sold_area" placeholder="Total Area" id="totalArea" readonly
                            class="formFields">
                    </div>
                </div>

                <div class="text-info px-4 py-2 bg-light">2. Individual Information</div>
                <!-- Row Start -->
                <div class="row m-0 px-4 pt-4">
                    <div class="col-md-12 ">
                        <table class="table table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>Select Buyer</td>
                                    <td class="text-center">Remove</td>
                                </tr>
                            </thead>
                            <tbody id="buyerContainer">
                                <tr>
                                    <td width="80%">
                                        <select name="buyer_id[]" class="form-select" required>
                                            <option value="">Select Buyer</option>
                                            @foreach($Buyers as $buyer)
                                            <option value="{{$buyer->username}}">{{$buyer->username}}</option>
                                            @endforeach
                                        </select>
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
                                        <button id="addNewBuyer" type="button"
                                            class="btn btn-info border-1 shadow-none text-capitalize"
                                            data-toggle="tooltip" data-original-title="Add more controls"><i
                                                class="fas fa-plus"></i> Add New Buyer</button>
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
                                        <select name="witness_id[]" class="form-select" required>
                                            <option value="">Select Witness</option>
                                            @foreach($Witnesses as $witness)
                                            <option value="{{$witness->username}}">{{$witness->username}}</option>
                                            @endforeach
                                        </select>
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
                                        <button id="addNewWitness" type="button"
                                            class="btn btn-warning border-1 shadow-none text-capitalize"
                                            data-toggle="tooltip" data-original-title="Add more controls"><i
                                                class="fas fa-plus"></i> Add New Witness</button>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- Row End -->

                <!-- Row Start  -->
                <div class="text-info px-4 py-2 bg-light">3. Other Information</div>
                <div class="row m-0 p-4">
                    <div class="col-md-12 mb-3">
                        <label for="">Returned Rate/Amount (If registry get cancelled)</label>
                        <div class="d-flex justify-content-between">
                            <div class="col-8">
                                <input type="number" class="formFields" name="return_rate" required>
                            </div>
                            <div class="col-4 px-1">
                                <select name="ret_val_unit" class="form-select" required>
                                    <option value="rate">Rate</option>
                                    <option value="amount">Amount</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Cancellation Terms</label>
                        <textarea name="cancellation_terms" class="formFields" required></textarea>
                    </div>
                </div>
                <!-- End of Row  -->

                <!-- Row Start  -->
                <div class="text-info px-4 py-2 bg-light mb-3">4. Expense Details</div>

                <div class="row m-0 p-4">
                    <div class="col-md-6">
                        <label for="">Select Agent</label>
                        <div class="formFields align-items-center" style="max-height: 200px;">
                            <div class="d-flex align-items-center">
                                <div>
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="px-2" style="flex: 1;">
                                    <input type="text" name="agent_id" class="searchAgent" placeholder="Search Agent"
                                        autocomplete="off" required>
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
                        <input type="number" class="formFields" name="agent_exp" required>
                    </div>

                    <div class="col-md-6">
                        <label for="">Select Draftmen</label>
                        <div class="formFields align-items-center" style="max-height: 200px;">
                            <div class="d-flex align-items-center">
                                <div>
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="px-2" style="flex: 1;">
                                    <input name="draftmen_id" type="text" class="searchDraftmen"
                                        placeholder="Search Draftmen" autocomplete="off" required>
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
                        <input type="number" class="formFields" name="draftmen_exp" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Stamp Duty</label>
                        <input type="number" class="formFields" value="100" name="stamp_duty" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Registration Fees</label>
                        <input type="number" class="formFields" value="100" name="reg_fees" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">No. of Electronic Files</label>
                        <input type="number" class="formFields" value="1" name="electronic_files" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Electronic File Processing Fees</label>
                        <input type="number" class="formFields" value="1" name="electronic_files_fee" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="formFields" required></textarea>
                    </div>

                </div>

                <!-- End of Row  -->

                <!-- Row Start  -->
                <div class="text-info px-4 py-2 bg-light">5. Payment Details</div>
                <div class="row m-0 p-4">
                    <div class="col-md-6 mb-3">
                        <label for="">Deposit Date</label>
                        <input type="date" class="formFields" name="deposit_date" required>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="">Total Amount</label>
                        <input type="number" class="formFields" required placeholder="₹0.00" id="total"
                            name="total_amount">
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="">Bank Details</label>
                        <div class="formFields align-items-center" style="max-height: 200px;">
                            <div class="d-flex align-items-center">
                                <div>
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="px-2" style="flex: 1;">
                                    <input name="bank_detail_id" type="text" class="searchBanks"
                                        placeholder="Search Banks" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="allBanks"
                                style="display: none; overflow-y: auto; min-height: 50px; max-height: 100px;">
                                @foreach($banks as $bank)
                                <div class="px-4 py-1 bankBlock">
                                    <p class="p-0 m-0" onclick="putBank($(this).html())">{{$bank->bank_name}}, {{$bank->acc_name}}, {{$bank->acc_number}}, {{$bank->bank_ifsc}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <table class="table table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>Payment Mode</td>
                                    <td>Amount (INR)</td>
                                    <td>Transaction ID (Ignore if paid by cash)</td>
                                    <td>Remove</td>
                                </tr>
                            </thead>
                            <tbody id="TextBoxContainer">
                                <tr>
                                    <td>
                                        <select name="pay_mode[]" class="formFields" required>
                                            <option value="bank" selected>Bank</option>
                                            <option value="cash">Cash</option>
                                            <option value="cheque">Cheque</option>
                                            <option value="demand draft">Demand Draft</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input name="pay_mode_amount[]" type="number" value="" class="formFields"
                                            required />
                                    </td>
                                    <td>
                                        <input name="transaction_id[]" required type="text" value=""
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
                                            data-toggle="tooltip" data-original-title="Add more controls"><i
                                                class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add&nbsp;</button>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Payment Description</label>
                        <textarea name="pay_desc" class="formFields" required></textarea>
                    </div>
                </div>
                <!-- End of Row  -->

                <div class="mx-4 mb-3">
                    <button class="btn btn-info btn-lg shadow-none text-capitalize" type="submit" id="addPropertyBtn">
                        Sell This Property
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- All Properties  -->
    <div class="card my-4 p-4" style="overflow-x: auto !important;">
        <h4>All Sold Properties</h4>
        <div class="my-3" style="max-height: 63vh; overflow: auto;">
            <table class="table table-responsive table-sm" style="font-size: 11px;" id="myDataTable">
                <thead>
                    <tr class="bg-light">
                        <th>Sn</th>
                        <th>District</th>
                        <th>Tehsil</th>
                        <th>Village</th>
                        <th>Basra no</th>
                        <th>Khet no</th>
                        <th>Sold Area</th>
                        <th>Total Amount</th>
                        <th class="text-center">Registry</th>
                        <th class="text-center">View</th>
                        <th class="text-center">Mail</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach($soldProps as $prop)
                    <tr>
                        <td>{{$prop->sold_id}}</td>
                        <td>{{$prop->s_district}}</td>
                        <td>{{$prop->s_tehsil}}</td>
                        <td>{{$prop->s_village}}</td>
                        <td>{{$prop->s_basra_no}}</td>
                        <td>{{$prop->s_khet_no}}</td>
                        <td>{{$prop->sold_area}} sq.ft.</td>
                        <td>₹{{number_format($prop->s_total_amount)}}</td>
                        <td class="text-center">
                            @if($prop->s_reg_file == 0) 
                            <!-- <span class="badge bg-danger" style="font-weight: 400 !important;">Not Available</span> -->
                            <button class="btn btn-light btn-floating shadow-0 btn-sm" data-mdb-toggle="modal"
                                data-mdb-target="#exampleModal"
                                onclick="uploadRegBtn(this, `{{$prop->sold_id}}`, `{{$prop->s_buyer_id}}`)">
                                <i class="fa-solid fa-arrow-up-from-bracket text-danger"></i>
                            </button>
                            @else
                            <span class="badge bg-success" style="font-weight: 400 !important;">Available</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <button class="btn btn-light btn-floating shadow-0 p-0 btn-sm"
                                onclick="viewSoldPropDetails(`{{$prop->sold_id}}`)">
                                <i class="fas fa-eye p-0" style="font-size: 13px;"></i>
                            </button>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-light btn-floating shadow-0 p-0 btn-sm" id="sendMailBtn"
                                onclick="getDetailsForMail(`{{$prop->sold_id}}`)">
                                <i class="fa-solid fa-paper-plane"></i>
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
                <div class="spinner-border text-danger spinner-border-sm" role="status"><span
                        class="visually-hidden"></span></div>&nbsp;Please wait...
            </div>
        </div>
    </div>
</div>

<!-- Mail Box  -->
<div class="modalBox" style="display: none;">
    <div class="card shadow-8">
        <div class="d-flex justify-content-between align-items-center bg-dark px-2 py-1"
            style="border-radius: 4px 4px 0px 0px;">
            <div>
                <font class="font-weight-bold" style="font-size: 11px; color: rgba(255,255,255,0.9);">Share with...
                </font>
            </div>
            <div>
                <button class="minimize btn btn-light shadow-0 px-1 py-0 m-0" style="position: relative; top: -4px;">
                    <i class="fas fa-caret-down"></i>
                </button>
                <button class="closeMe btn btn-light shadow-0 px-1 py-0 m-0" style="position: relative; top: -4px;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <form actionUrl="/store" method="post" class="my-2 p-2" id="sendMailToDraftment">
            @csrf
            <input type="search" placeholder="Search Mail ID" id="searchMail" name="recEmail" class="p-2"
                autocomplete="off" required>
            <div class="allMails rounded-3 shadow-5" style="display: none; max-height: 100px; overflow-y: auto;">
                @foreach($allMail as $mail)
                <div class="mailId px-2 py-1 rounded-3" onclick="getmail(`{{$mail->email}}`)">{{$mail->aadhar_no}},
                    {{$mail->username}}, {{$mail->email}}</div>
                @endforeach
            </div>
            <div class="mt-3 mb-2">
                <textarea name="mailMessage" id="messageMail" class="p-2"
                    placeholder="Write your message here..."></textarea>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <button class="btn btn-primary text-capitalize shadow-1 py-2" id="addBtn">
                        <i class="fas fa-paper-plane"></i>&nbsp; Send
                    </button>
                </div>
                <div>
                    <button class="btn btn-floating btn-light btn-sm shadow-1" title="Reset/Clear" type="reset"
                        id="trash">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="message alert alert-success py-1 mt-2" style="font-size: 12px; display: none;"></div>
    </div>
</div>

<!-- Sell Property List  -->
<div class="listPropertiesContainer" style="display: none;">
    <div class="d-flex align-items-center justify-content-between p-2 bg-dark text-light">
        <div style="font-size: 12px;">
            Select properties
        </div>
        <div>
            <button class="minimizePropContainer btn btn-light shadow-0 px-1 py-0 m-0"
                style="position: relative; top: -4px;">
                <i class="fas fa-caret-down"></i>
            </button>
            <button class="closePropContainer btn btn-danger shadow-0 px-1 py-0 m-0"
                style="position: relative; top: -4px;">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="lstedProperties">
        <!-- All props will appear here...  -->
    </div>
</div>

<!-- Upload Registry Modal  -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: block;" aria-modal="true" role="dialog"> -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Registry</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/updateSoldReg" method="post" class="p-0 m-0" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Sold To</label>
                        <input type="text" id="sold_id" name="sold_id" style="display: none;">
                        <input type="text" class="formFields" disabled id="buyer">
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

@endsection
