    @foreach($getPropDetails as $value)
    <div class="shadow-4 p-3">
        <div>
            <p class="p-0 m-0">Sold To: {{$value->s_buyer_id}}</p>
        </div>
    </div>
    <div style="height: 90vh; overflow: auto;" class="p-3">
        <table class="table table-sm table-hover table-responsive" style="font-size: 12px;">
            <tbody>
                <tr>
                    <th class="text-center bg-light text-dark" colspan="3">Sold Details</th>
                </tr>
                <tr>
                    <td class="font-weight-bold">Basra No.</td>
                    <td colspan="2">{{$value->s_basra_no}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Khet No.</td>
                    <td colspan="2">{{$value->s_khet_no}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Sold Area</td>
                    <td colspan="2">{{$value->sold_area}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Location</td>
                    <td colspan="2">{{$value->s_village}}, {{$value->s_tehsil}}, {{$value->s_district}}, {{$value->s_state}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Witnesses</td>
                    <td colspan="2">{{$value->witnesses}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Return {{$value->s_ret_val_unit}}</td>
                    <td colspan="2">₹{{number_format($value->s_return_rate)}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Cancellation Terms</td>
                    <td colspan="2">{{$value->s_cancellation_terms}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Agent</td>
                    <td>{{$value->s_agent_id}}</td>
                    <td>₹{{$value->s_agent_exp}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Draftmen</td>
                    <td>{{$value->s_draftmen_id}}</td>
                    <td>₹{{$value->s_draftmen_exp}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Stamp Duty</td>
                    <td colspan="2">{{$value->s_stamp_duty}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Registration Fees</td>
                    <td colspan="2">{{$value->s_reg_fees}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">No. Electronic Files</td>
                    <td colspan="2">{{$value->s_electronic_files}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Electronic Files Fees</td>
                    <td colspan="2">{{$value->s_electronic_files_fee}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Description</td>
                    <td colspan="2">{{$value->s_description}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Deposit Date</td>
                    <td colspan="2">{{$value->s_deposit_date}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Total Amount</td>
                    <td colspan="2">{{$value->s_total_amount}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Bank Details</td>
                    <td colspan="2">{{$value->s_bank_detail_id}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Payment Modes</td>
                    <td colspan="2">{{$value->s_pay_mode}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Payment Modes Amount</td>
                    <td colspan="2">{{$value->s_pay_mode_amount}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Transaction ID</td>
                    <td colspan="2">{{$value->s_transaction_id}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Payment Description</td>
                    <td colspan="2">{{$value->s_pay_desc}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Sold Registry File</td>
                    <td colspan="2">
                    @if($value->s_reg_file != 0)
                    <a href="{{$value->s_reg_file}}" target="_blank">
                        <button class="btn btn-info py-1 px-2 btn-sm text-sm shadow-0 text-capitalize" style="font-weight: 400;">
                            <i class="far fa-eye"></i> View Registry
                        </button>
                    </a>
                    @else
                    <span class="badge bg-danger">Not Available</span>
                    @endif
                </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach
