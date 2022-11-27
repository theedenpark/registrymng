
    @foreach($getPropDetails as $value)
    <div class="d-flex justify-content-between shadow-4 p-3">
        <div>
            <p class="p-0 m-0"><i class="fas fa-building"></i> &nbsp;Property Details</p>
        </div>
        {{-- <div>
            <h5 class="p-0 m-0"> Basra No: {{$value->basra_no}} </h5>
        </div> --}}
    </div>
    <div style="height: 90vh; overflow: auto;" class="p-3">
        <table class="table table-sm table-hover table-responsive" style="font-size: 12px;">
            {{-- <tr class="text-danger">
                <td class="font-weight-bold">Khata Number</td>
                <td>
                    {{$value->khata_no}}
                </td>
            </tr>
            <tr class="text-danger">
                <td class="font-weight-bold">Khet Number</td>
                <td>
                    {{$value->khet_no}}
                </td>
            </tr> --}}
            <tr>
                <td class="font-weight-bold">Property Acquisation Status</td>
                <td>{{$value->prop_acq_status}}</td>
            </tr>   
            <tr>
                <td class="font-weight-bold">Property Type</td>
                <td>{{$value->prop_type_id}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Property Name</td>
                <td>{{$value->prop_name}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Property Location</td>
                <td>{{$value->prop_location}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Road Connectivity</td>
                <td>{{$value->road_conn}}</td>
            </tr>
            {{-- <tr class="text-danger">
                <td class="font-weight-bold">Khet Area</td>
                <td>{{$_GET['area']}} Sq.ft.</td>
            </tr>    --}}
            <tr>
                <td class="font-weight-bold">Address</td>
                <td>{{$value->p_village}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">PIN</td>
                <td>{{$value->pin}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Longitude/Latitude</td>
                <td>{{$value->long_lat}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Landmark</td>
                <td>{{$value->landmark}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Property Account</td>
                <td>{{$value->prop_acc}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Seller</td>
                <td>
                    {{str_replace('"', ' ' ,$value->seller_id)}}
                </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Witnesses</td>
                <td>{{str_replace('"', ' ' ,$value->witness1_id)}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Date of Registration</td>
                <td>{{$value->date_of_reg}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Registration Number</td>
                <td>{{$value->reg_no}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Actual Value</td>
                <td>₹{{$value->actual_value}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Registration Value</td>
                <td>₹{{$value->reg_value}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Registration Rate</td>
                <td>₹{{$value->return_rate}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Registration Value Unit</td>
                <td>{{$value->reg_val_unit}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Cancellation Terms</td>
                <td>{{$value->cancellation_terms}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Agent ID</td>
                <td>{{$value->agent_id}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Agent Expense</td>
                <td>₹{{$value->agent_exp}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Draftmen ID</td>
                <td>{{$value->draftmen_id}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Draftmen Expense</td>
                <td>₹{{$value->draftmen_exp}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Stamp Duty</td>
                <td>{{$value->stamp_duty}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Registration Fees</td>
                <td>₹{{$value->reg_fees}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">No. of Electronic Files</td>
                <td>{{$value->electronic_files}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Electronic File Fees</td>
                <td>₹{{$value->electronic_files_fee}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Expense Description</td>
                <td>{{$value->description}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Deposit Date</td>
                <td>{{$value->deposit_date}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Total Amount</td>
                <td>₹{{$value->total_amount}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Payment Mode</td>
                <td>{{str_replace('"', ' ' ,$value->pay_mode)}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Payment Mode Amount</td>
                <td>{{str_replace('"', ' ' ,$value->pay_mode_amount)}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Transaction ID</td>
                <td>{{str_replace('"', ' ' ,$value->transaction_id)}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Payment Description</td>
                <td>{{$value->pay_desc}}</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Registry File</td>
                <td>
                    @if($value->reg_file != 0)
                    <a href="{{$value->reg_file}}" target="_blank">
                        <button class="btn btn-info py-1 px-2 btn-sm text-sm shadow-0 text-capitalize" style="font-weight: 400;">
                            <i class="far fa-eye"></i> View Registry
                        </button>
                    </a>
                    @else
                    <span class="badge bg-danger">Not Available</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Added On</td>
                <td>{{$value->added_on}}</td>
            </tr>
        </table>
    </div>
    @endforeach


