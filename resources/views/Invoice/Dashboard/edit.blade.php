@extends('Invoice/Dashboard.index')

@section('dashboardContent')

{{-- Style  --}}
<style>
    label
    {
        font-size: 11px;
    }
</style>

<!-- DatePicker  -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>


<div class="container col-md-9 py-4 px-2">
    <h3 class="text-dark"><i class="fa-solid fa-edit"></i>
    @if ($data->secondary_customer != "")
    {{$data->secondary_customer}}
    @else
    {{$data->primary_customer}}
    @endif - ({{$data->receipt_format}}{{$data->receipt_no}})
    </h3>
    
    <div class="my-4">
        <form actionUrl="/receipt/all/edit/update" id="updateReceipt" method="post">
        @csrf
            <div class="row m-0 p-0">
                <div class="col-md-6 p-2">
                    <label for="">Receipt Type <font style="font-size: 10px;">(1=Booking, 2=Installment)</font></label>
                    <input type="text" class="form-control" value="{{$data->receipt_type}}" name="receipt_type">
                </div>
                <div class="col-md-6 p-2">
                    <label for="">Receipt Date</label>
                    <input type="text" class="form-control" value="{{$data->receipt_date}}" name="receipt_date" id="datepicker" autocomplete="off" required>
                </div>
                <div class="col-md-4 p-2">
                    <label for="">Next Installment Date</label>
                    <input type="text" class="form-control" value="{{$data->next_installment}}" name="next_installment" id="nextInstallment" autocomplete="off" required>
                </div>
                <div class="col-md-4 p-2">
                    <label for="">Next Payment Status <i class="fas fa-circle text-danger"></i> <i class="fas fa-circle text-success"></i></label>
                    <select name="next_pay_status" id="" class="form-select" style="padding: 4px 10px;">
                        <option disabled>Select Payment Status</option>
                        @if ($data->next_pay_status == 0)
                            <option value="0" selected class="text-danger" style="font-weight: 500;">Pending</option>
                            <option value="1" class="text-success" style="font-weight: 500;">Paid</option>
                        @elseif ($data->next_pay_status == 1)
                            <option value="0" class="text-danger" style="font-weight: 500;">Pending</option>
                            <option value="1" class="text-success" style="font-weight: 500;" selected>Paid</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-4 p-2">
                    <label for="">Receipt No</label>
                    <input type="text" class="form-control" value="{{$data->receipt_no}}" readonly name="receipt_no">
                </div>
                <div class="col-md-6 p-2">
                    <label for="">Primary Customer</label>
                    <input type="text" class="form-control" value="{{$data->primary_customer}}" name="primary_customer">
                </div>
                <div class="col-md-6 p-2">
                    <label for="">Secondary Customer</label>
                    <input type="text" class="form-control" value="{{$data->secondary_customer}}" name="secondary_customer">
                </div>
                <div class="col-md-2 p-2">
                    <label for="">Plot No.</label>
                    <input type="text" class="form-control" value="{{$data->plot_no}}" name="plot_no">
                </div>
                <div class="col-md-2 p-2">
                    <label for="">Unit Size</label>
                    <input type="text" class="form-control" value="{{$data->unit_size}}" name="unit_size">
                </div>
                <div class="col-md-4 p-2">
                    <label for="">Email</label>
                    <input type="text" class="form-control" value="{{$data->email}}" name="email">
                </div>
                <div class="col-md-4 p-2">
                    <label for="">Mobile</label>
                    <input type="text" class="form-control" value="{{$data->mobile}}" name="mobile">
                </div>
                <div class="col-md-12 p-2">
                    <label for="">Address</label>
                    <input type="text" class="form-control" value="{{$data->address}}" name="address">
                </div>
                <div class="col-md-12 p-2">
                    <label for="">Phase</label>
                    <input type="text" class="form-control" value="{{$data->phase}}" name="phase">
                </div>
                <div class="col-md-4 p-2">
                    <label for="">No. of Units</label>
                    <input type="number" name="units" class="form-control quantity" value="{{$data->units}}" readonly required>
                </div>
                <div class="col-md-4 p-2">
                    <label for="">Unit Price</label>
                    <input type="number" name="unit_price" class="form-control unitPrice" required value="{{$data->unit_price}}">
                </div>
                <div class="col-md-4 p-2">
                    <label for="">Payment Amount</label>
                    <input type="text" class="form-control amount" name="payment_amount" value="{{$data->payment_amount}}">
                </div>
                <div class="col-md-12 p-2">
                    <label for="">Payment Amount (In Words)</label>
                    <input type="text" class="form-control" value="{{$data->amount_words}}" id="words" name="amount_words">
                </div>
                <div class="col-md-12 p-2">
                    <label for="">Payment Description</label>
                    <input type="text" class="form-control" value="{{$data->payment_desc}}" name="payment_desc">
                </div>
                <div class="p-2">
                    <button class="btn btn-primary shadow-0 text-capitalize" id="updateBtn"><i class="fa-solid fa-upload"></i> &nbsp;Update</button>
                </div>
            </div>
        </form>
    
        <div class="alert alert-danger failed mt-3" style="display: none;">
            <i class="fas fa-times"></i> &nbsp;Update Failed
        </div>
        <div class="alert alert-success success" style="display: none;">
            <i class="fas fa-check"></i> &nbsp;Update Successfull
        </div>
    </div>

</div>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
    });
</script>
<script>
    $('.unitPrice').keyup(function(){
        $unitPrice = $(this).val();
        $quantity = $('.quantity').val();
        $total = $unitPrice * $quantity;

        $('.amount').val($total);
    })

    var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
    var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

    function inWords (num) {
        if ((num = num.toString()).length > 9) return 'overflow';
        n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
        if (!n) return; var str = '';
        str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
        str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
        str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
        str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
        str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) : '';
        return str;
    }
    $('.unitPrice').keyup(function () {
        $('#words').val(inWords($('.amount').val()));
    });
    $('.amount').keyup(function () {
        $('#words').val(inWords($(this).val()));
    });

    //DatePicker
    $(function() {
      $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
      $( "#nextInstallment" ).datepicker({ dateFormat: 'dd-mm-yy' });
    });
</script>
@endsection