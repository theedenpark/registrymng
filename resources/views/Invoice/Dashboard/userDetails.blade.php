<div class="d-flex h-100">
    <div class="col-8" style="overflow-y: auto; border-right: 1px solid #ddd;">
        @foreach($userHistory as $value)
        <div>
            <div class="text-center my-2">
                <span class="badge badge-info" style="font-weight: 400; font-size: 11px;">
                    <i class="fa-regular fa-clock" style="color: rgba(0,0,0,0.65);"></i> {{date('d-M-y', strtotime($value->generated_on))}} at {{date('h:i a', strtotime($value->generated_on))}}
                </span>
            </div>
            <div class="px-2 py-1 rounded-4 m-2" style="background: #eef; width: fit-content; font-size: 13px;">
                <p class="p-0 m-0 font-weight-bold">
                    @if($value->receipt_type == 1) 
                    Pre-Booking
                    @elseif($value->receipt_type == 2) 
                    Installment
                    @endif
                    - {{$value->payment_desc}}
                </p>
                <p class="p-0 m-0">Receipt No: <b>{{$value->receipt_format}}{{$value->receipt_no}}</b></p>
                <p class="p-0 m-0">Customer: {{$value->customer_name}}</p>
                <p class="p-0 m-0">Phase : The Ewen Park - {{$value->phase}}</p>
                <p class="p-0 m-0">Plot No. : {{$value->plot_no}}</p>
                <p class="p-0 m-0">Plot Size : {{$value->unit_size}} Sq.Yards</p>
            </div>
            <div class="px-2 py-1 rounded-4 m-2" style="background: #eef; width: fit-content; font-size: 13px;">
                <p class="p-0 m-0">Amount : <b>₹{{$value->payment_amount}}/-</b></p>
            </div>
            <a href="/receipt/all/print?id={{$value->receipt_id}}" target="_blank">
                <button class="btn btn-outline-primary border-1 mx-2 text-capitalize shadow-0"><i class="fa-solid fa-download"></i> &nbsp;Download Receipt</button>
            </a>

        </div>
        @endforeach
    </div>
    <div class="col-4">
        <div class="d-flex align-items-center py-2" style="border-bottom: 1px solid #ddd;">
            <div class="px-2">
                <i class="fa-solid fa-info-circle"></i>
            </div>
            <div class="font-weight-bold">Details</div>
        </div>
        <div class="text-center mt-4">
            <i class="fa-solid fa-user-circle fa-8x"></i>
            <p class="pt-2 mb-0 text-dark font-weight-bold" style="font-size: 24px;">{{$user->customer_name}}</p>
            <p><i class="fa-solid fa-phone"></i> +91 {{$user->mobile}}</p>
        </div>
        <div class="d-flex align-items-center">
            <div class="col-2 px-3 text-center">
                <i class="fa-regular fa-envelope"></i>
            </div>
            <div style="font-size: 13px;">
                {{$user->email}}
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="col-2 px-3 text-center">
                <i class="fa-regular fa-map"></i>
            </div>
            <div style="font-size: 13px;">
                {{$user->address}}
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="col-2 px-3 text-center">
                <i class="fa-solid fa-indian-rupee-sign"></i>
            </div>
            <div style="font-size: 13px;" class="font-weight-bold">
                {{number_format($userTotal)}} /- ( Total Paid )
            </div>
        </div>
    </div>
</div>