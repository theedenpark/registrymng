<div class="d-flex h-100">
    <div class="col-8">
        <div style="display: flex; flex-direction: column; height: 100%;">
            <div class="d-flex p-2 align-items-center text-dark" style="border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">
                <div class="userIcon">
                    <i class="fa-solid fa-user-circle fa-lg"></i>
                </div>
                <div class="userName px-2" style="font-size: 17px;">
                    {{$user->primary_customer}}
                </div>
            </div>
            <div style="flex: 1; overflow-y: auto; border-right: 1px solid #ddd; background: rgb(243, 243, 243);">
                @foreach($userHistory as $value)
                <div class="userChat">
                    <div class="text-center my-2">
                        <span class="badge badge-warning shadow-2" style="font-weight: 400; font-size: 11px;">
                            <i class="fa-regular fa-clock" style="color: rgba(0,0,0,0.65);"></i> {{date('d-M-y', strtotime($value->generated_on))}} at {{date('h:i a', strtotime($value->generated_on))}}
                        </span>
                    </div>
                    <div class="card shadow-2 mx-3 my-2 px-2 py-1" style="color: #000; width: fit-content; font-size: 13px;">
                        <p class="p-0 m-0 font-weight-bold">
                            @if($value->receipt_type == 1) 
                            Pre-Booking
                            @elseif($value->receipt_type == 2) 
                            Installment
                            @endif
                            - {{$value->payment_desc}}
                        </p>
                        <p class="p-0 m-0">Receipt No: {{$value->receipt_format}}{{$value->receipt_no}}</p>
                        <p class="p-0 m-0">Customer: 
                            @if($value->secondary_customer != "") 
                            {{$value->secondary_customer}}
                            @else
                            {{$value->primary_customer}}
                            @endif
                        </p>
                        <p class="p-0 m-0">Phase : The Ewen Park - {{$value->phase}}</p>
                        <p class="p-0 m-0">Plot No. : {{$value->plot_no}}</p>
                        <p class="p-0 m-0">Plot Size : {{$value->unit_size}} Sq.Yards</p>
                    </div>
                    <div class="card shadow-2 mx-3 my-2 px-2 py-1" style="color: #000; width: fit-content; font-size: 13px;">
                        <p class="p-0 m-0">Amount : <b>₹{{number_format($value->payment_amount)}}/-</b></p>
                    </div>
                    <a href="/receipt/all/print?id={{$value->receipt_id}}" target="_blank">
                        <button class="btn border-1 mx-3 text-capitalize shadow-2 text-primary bg-light"><i class="fa-solid fa-download"></i> &nbsp;Download Receipt</button>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="p-0">
                <div class="d-flex align-items-center justify-content-between p-2 m-0" style="height: 100%; border-right: 1px solid #ddd; border-top: 1px solid #eee;">
                    <div class="px-2">
                        <i class="fas fa-search"></i></div>    
                    <div style="flex: 1;" class="px-2">
                        <input type="text" class="border-0 h-100 w-100 searchChat" placeholder="Search..." style="outline: none;" onkeyup="searchChat($(this).val())">    
                    </div>    
                </div> 
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="d-flex align-items-center py-2 text-dark" style="border-bottom: 1px solid #ddd; font-size: 17px;">
            <div class="px-2">
                <i class="fa-solid fa-info-circle"></i>
            </div>
            <div>Details</div>
        </div>
        <div class="text-center mt-4">
            <i class="fa-solid fa-user-circle fa-8x"></i>
            <p class="pt-2 mb-0 text-dark font-weight-bold" style="font-size: 24px;">{{$user->primary_customer}}</p>
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