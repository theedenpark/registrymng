@extends('Invoice/Dashboard.index')

@section('dashboardContent')
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css'>
<div class="col-md-12 py-4 px-2">
    <h3 class="text-dark">All Receipts</h3>
    <table class="table table-sm my-3 table-hover" style="font-size: 11px;" id="myDataTable">
        <thead>
            <tr style="background: #eee;">
                <th>Type</th>
                <th>Plot_No.</th>
                <th>Receipt_No.</th>
                <th>R_Date</th>
                <th>Next_Installment</th>
                <th class="text-center">Next_Payment_status</th>
                <th>Customer</th>
                {{-- <th>Plot</th> --}}
                <th>Phone</th>
                <th>Phase</th>
                <th>Amount</th>
                <th class="text-center">Edit</th>
                <th class="text-center">View</th>
                <th class="text-center">Download</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all as $data)
            <tr style="font-size: 12px;">
                <td>
                    @if($data->receipt_type == 1)
                    Booking
                    @elseif($data->receipt_type == 2)
                    Installment
                    @endif
                </td>
                <td class="text-center font-weight-bold">{{$data->plot_no}}</td>
                <td>{{$data->receipt_format}}{{$data->receipt_no}}</td>
                <td>{{$data->receipt_date}}</td>
                <td class="text-center">
                    @php
                        $cDate = time();
                        $expiry = strtotime($data->next_installment);
                    @endphp
                    @if($cDate > $expiry)
                    {{-- if expired  --}}
                        <font class="text-dark">
                            {{ date("F j, Y", $expiry) }}
                        </font>
                    @else
                    {{-- if not expired  --}}
                        <font class="text-danger">
                            {{ date("F j, Y", $expiry) }}
                        </font>
                    @endif
                    {{-- {{$data->next_installment}} --}}
                </td>
                <td class="text-center">
                    @if ($data->next_pay_status == 0)
                        <font class="text-danger">Pending</font>
                    @elseif ($data->next_pay_status == 1)
                        <font class="text-success">Paid</font>
                    @endif
                </td>
                <td>
                    @if($data->secondary_customer != "") 
                    {{$data->secondary_customer}}
                    @else
                    {{$data->primary_customer}}
                    @endif
                </td>
                {{-- <td>{{$data->plot_no}}</td> --}}
                <td>{{$data->mobile}}</td>
                <td>{{$data->phase}}</td>
                <td>₹{{number_format($data->payment_amount)}}</td>
                <td class="text-center">
                    <a href="/receipt/all/edit?id={{$data->receipt_id}}" target="_blank">
                        <i class="fa-solid fa-edit text-primary" style="cursor: pointer;" title="Edit"></i>
                    </a>
                </td>
                <td class="text-center">
                    <i class="fa-regular fa-eye text-primary" 
                    onclick="viewDetails(
                                `{{$data->receipt_id}}`,
                                `{{$data->receipt_format}}`,
                                `{{$data->receipt_no}}`, 
                                `{{$data->receipt_date}}`,
                                `{{$data->primary_customer}}`,
                                `{{$data->secondary_customer}}`,
                                `{{$data->plot_no}}`,
                                `{{$data->email}}`,
                                `{{$data->mobile}}`,
                                `{{$data->address}}`,
                                `{{$data->phase}}`,
                                `{{$data->units}}`,
                                `{{$data->payment_amount}}`,
                                `{{$data->amount_words}}`,
                                `{{$data->payment_desc}}`,
                                `{{$data->unit_size}}`,
                                `{{$data->generated_on}}`,
                            )" 
                    style="cursor: pointer;" title="View Details"></i>
                </td>
                <td class="text-center">
                    <a href="/receipt/all/print?id={{$data->receipt_id}}" target="_blank">
                        <i class="fa-solid fa-download text-primary" style="cursor: pointer;" title="Download Receipt"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- Modal Overlay  -->
<div class="modal__Overlay" style="display: none;"></div>

<!-- Modal  -->
<div class="my__Modal" style="display: none;">
    <div class="d-flex justify-content-between align-items-center bg-primary p-3 text-light" style="border-radius: 10px 10px 0px 0px;">
        <div class="font-weight-bold">Details</div>
        <div>
            <button class="btn btn-light btn-floating btn-sm shadow-0" onclick="close_my__Modal()">
                <i class="fa-solid fa-times"></i>
            </button>
        </div>
    </div>

    <div class="my-3 px-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 id="username" class="text-uppercase text-dark" style="font-weight: 900;"></h3>
            </div>
            <div>
                <h4 class="text-success"><span id="receipt_no"></span></h4>
            </div>
        </div>
        <div class="col-6 mt-2 mb-4">
            <p id="receipt_date" class="text-dark p-0 m-0"></p>
        </div>
        <div class="row m-0 align-items-center p-0">
            <div class="col-6 p-0 pb-3">
                <p id="email" class="text-dark p-0 m-0" style="font-size: 12px;"></p>
            </div>
            <div class="col-6 p-0 pb-3">
                <p id="phone" class="text-primary p-0 m-0" style="font-size: 12px;"></p>
            </div>
            <div class="col-6 p-0 pb-3">
                <p id="phase" class="text-dark p-0 m-0" style="font-size: 12px;"></p>
            </div>
            <div class="col-3 p-0 pb-3">
                <p id="plot" class="text-dark p-0 m-0" style="font-size: 12px;"></p>
            </div>
            <div class="col-3 p-0 pb-3">
                <p id="size" class="text-dark p-0 m-0" style="font-size: 12px;"></p>
            </div>
            <div class="col-12 p-0 pb-3">
                <p id="address" class="text-dark p-0 m-0" style="font-size: 12px;"></p>
            </div>
            <div class="col-6 p-0 pb-3">
                <p class="text-dark p-0 m-0 font-weight-bold" id="desc" style="font-size: 12px;"></p>
            </div>
            <div class="col-6 p-0 pb-3 text-end">
                <h1 id="amount" class="text-dark p-0 m-0" style="font-weight: 900;"></h1>
            </div>
            <div class="col-10 p-0 pb-3 text-capitalize">
                <!-- <label for="" style="font-size: 12px;">In Words</label> -->
                <h4 id="words" class="text-dark p-0 m-0" style="font-weight: 900;"></h4>
            </div>
            <div class="col-2 p-0 pb-3 text-end" id="download"></div>
        </div>
    </div>
</div>


<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js'></script>
<script id="rendered-js" >
    $(document).ready(function () {
        $('#myDataTable').DataTable({ 
            order: [[2, 'desc']], 
            // pageLength : 1,
            // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
        });
    });
</script>
@endsection