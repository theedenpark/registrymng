@foreach ($rec_data as $value)
<div class="p-3">
    <div class="font-weight-bolder">
        @if ($value->receipt_type == 1)
            <i class="fas fa-circle fa-sm text-danger"></i>&nbsp;   
        @elseif ($value->receipt_type == 2)
            <i class="fas fa-circle fa-sm text-success"></i>&nbsp;   
        @endif
        {{$value->receipt_format}}{{$value->receipt_no}}
    </div>
    <hr/>
    <div class="m-0 mb-1 p-0" style="font-size: 12px;">
        <b>Receipt Date :</b> {{$value->receipt_date}}
    </div>
    <div class="m-0 mb-1 p-0" style="font-size: 12px;">
        <b>Next Installment Date :</b> {{$value->next_installment}}
    </div>
    <div class="m-0 mb-1 p-0" style="font-size: 12px;">
        <b>Phase/Plot :</b> {{$value->phase}} - {{$value->plot_no}}
    </div>
    <div class="m-0 mb-1 p-0" style="font-size: 12px;">
        <b>Customer Name :</b> 
        @if ($value->secondary_customer != "")
        {{$value->secondary_customer}}
        @else
        {{$value->primary_customer}}
        @endif
    </div>
    <div class="m-0 mb-1 p-0" style="font-size: 12px;">
        <b>Mobile :</b> {{$value->mobile}}
    </div>
    <div class="m-0 mb-1 p-0" style="font-size: 12px;">
        <b>Email :</b> {{$value->email}}
    </div>
    <div class="m-0 mb-1 p-0" style="font-size: 12px;">
        <b>Address :</b> {{$value->address}}
    </div>
    <div class="m-0 mb-1 p-0" style="font-size: 12px;">
        <b>Description :</b> {{$value->payment_desc}}
    </div>
    <div class="m-0 mb-2 p-0" style="font-size: 12px;">
        <b>Amount :</b> ₹{{number_format($value->payment_amount)}}/-
    </div>
    <div class="m-0 mb-1 p-0" style="font-size: 12px;">
        <a href="/receipt/all/print?id={{$value->receipt_id}}" target="_blank" class="text-primary">
            <button class="btn btn-primary btn-sm shadow-0 text-capitalize" style="font-weight: 400;">
                <i class="fas fa-download fa-sm"></i>&nbsp;Download Receipt
            </button>
        </a>
    </div>
</div>
    
@endforeach