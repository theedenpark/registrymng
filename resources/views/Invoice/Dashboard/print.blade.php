@extends('Invoice.layout')

@section('body')
<script>
    $(document).ready(function(){
        window.print();
    })
</script>
<div class="col-md-12">
    <div style="border: 3px solid #000; font-size: 13px !important; color: #000 !important;" class="p-4 m-4">
        <div class="text-center font-weight-bolder" style="font-size: 1.7em;">
            PAYMENT RECEIPT
        </div>

        <div class="d-flex my-2 align-items-center justify-content-between">
            <div>
                @foreach($profile as $company)
                <b>{{$company->company_name}}</b>
                <p class="my-1">{{$company->address_line_one}}<br>{{$company->address_line_two}}<br>Haldwani, Uttarakhand 263126</p>
                <p class="font-weight-bolder m-0">GSTIN - {{$company->gstin_no}}<br/>CIN - {{$company->cin_no}}</p>
                @endforeach
            </div>
            <div>
                <img src="/assets/logo/logo.svg" alt="" style="height: 150px;">
            </div>
        </div>

        @foreach($data as $value)
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div>Date : &nbsp;</div>
                <div>
                    {{$value->receipt_date}}
                </div>
            </div>
            <div class="d-flex align-items-center px-3">
                <div>Receipt No. : &nbsp;</div>
                <div>
                {{$value->receipt_format}}{{$value->receipt_no}}
                </div>
            </div>
        </div>

        <div class="mt-3">
            <b>ISSUED TO</b>
            <div class="d-flex mb-2">
                <div class="col-md-1 font-weight-bold">Name :&nbsp;</div>
                <div class="col-md-11">
                    {{$value->customer_name}}
                </div>
            </div>
            <div class="d-flex mb-2">
                <div class="col-md-1 font-weight-bold">Address :&nbsp;</div>
                <div class="col-md-11">
                    {{$value->address}}
                </div>
            </div>
            <div class="d-flex mb-2">
                <div class="col-md-1 font-weight-bold">Mobile No. :&nbsp;</div>
                <div class="col-md-11">
                    {{$value->mobile}}
                </div>
            </div>
            <div class="d-flex mb-2">
                <div class="col-md-1 font-weight-bold">Email ID. :&nbsp;</div>
                <div class="col-md-11">
                    {{$value->email}}
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <div class="col-6">
                <div class="d-flex align-items-center">
                    <div class="col-2 font-weight-bold">PHASE :</div>
                    <div class="col-10">
                        The Ewen Park - {{$value->phase}}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex mb-2 justify-content-end align-items-center">
                    <div class="col-md-2 font-weight-bold">Plot No.</div>
                    <div class="col-md-3">
                        {{$value->plot_no}}
                    </div>
                </div>
            </div>
        </div>

        <div class="my-3">
            <table class="table table-bordered table-sm">
                <thead>
                    <th width="50%">DESCRIPTION</th>
                    <th width="220px" class="text-center">UNIT PRICE</th>
                    <th width="120px" class="text-center">QTY</th>
                    <th class="text-center">AMOUNT</th>
                </thead>
                <tbody id="tableInvoice">
                    <tr>
                        <td class="p-0 px-1">
                            {{$value->payment_desc}}
                        </td>
                        <td class="p-0 text-center">
                            ₹{{$value->payment_amount}}
                        </td>
                        <td class="p-0 text-center">
                            1
                        </td>
                        <td class="p-0 text-center">
                            ₹{{$value->payment_amount}}
                        </td>
                    </tr>
                    <tr>
                        <td class="p-0 px-1" style="font-size: 11px">
                            (Unit Size: {{$value->unit_size}} Sq.Yards)
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                    </tr>

                    <tr>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1">&nbsp;</td>
                        <td class="p-1 font-weight-bold text-center">Total</td>
                        <td class="p-0 text-center"><font class="px-2 totalValue font-weight-bold">₹{{$value->payment_amount}}</font></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex align-items-center mt-3">
            <div class="font-weight-bold">Amount : &nbsp;</div>
            <div>
                <span id="words" class="text-capitalize">{{$value->amount_words}}</span>&nbsp;Rupees Only
            </div>
        </div>
        @endforeach

        <div class="mt-2 text-end">
            <p class="font-weight-bold m-0">EWEN REALTORS PVT. LTD.</p>
            <img src="/invoice_assets/images/autorized_signature.jpg" alt="" style="height: 70px">
            <p class="font-weight-bold">Authorised Signatory</p>
        </div>
    </div>
    <p class="p-0 mx-4" style="font-size: 9px">
        *According  to our company norms, you can apply for a refund within 7 days of your Pre-booking.<br/>
        *If the visit was held by Ewen Realtors, that amount can be deducted + an additional 2% of the total amount as a processing fee.
    </p>
    <p class="p-0 m-0 font-weight-bold text-center text-capitalize">This is a computer generated receipt.</p>
</div>

@endsection