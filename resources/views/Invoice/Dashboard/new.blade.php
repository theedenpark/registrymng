@extends('Invoice/Dashboard.index')

@section('dashboardContent')
    <!-- DatePicker  -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<div class="container col-md-9 py-4">
    <h3 class="text-dark">Generate New Receipt</h3>
    <form actionUrl="/receipt/new/generate" id="newBillForm" method="post">
        @csrf
        <div class="row m-0">
            <div class="col-md-6 p-2">
                <label for="">Receipt Type</label>
                <select name="receipt_type" id="forPlot" class="form-select">
                    <option disabled selected>Select Receipt Type</option>
                    <option value="1">Booking</option>
                    <option value="2">Installment</option>
                </select>
            </div>
            <div class="col-md-6 p-2">
                <label for="">Select Phase</label>
                <select name="phase" id="phaseSelect" class="form-select">
                    <option disabled selected>Select Phase</option>
                    <option value="Royal Villas">Royal Villas</option>
                    <option value="Royal Avenue">Royal Avenue</option>
                    <option value="Hill Village">Hill Village</option>
                </select>
            </div>
 
            <div class="col-md-12 p-2" id="plot" style="display: none;">
                <label for="">Plot No.</label>
                <input type="number" min="0" name="plot_no" class="form-control" id="plot_input">
                <div id="result" style="font-size: 11px !important;"></div>
            </div>

            <div class="col-md-12 p-2" id="receipts" style="display: none;">
                <label for="">Installment For</label>
                <select class="form-select" name="installment_for" id="receiptList"> 
                    <option disabled selected>Select Receipt</option>
                </select>
            </div>
            <div class="col-md-3 p-2">
                <label for="">Receipt Date</label>
                <input type="text" name="receipt_date" class="form-control" id="datepicker" autocomplete="off" required>
            </div>
            <div class="col-md-3 p-2">
                <label for="">Next Installment Date</label>
                <input type="text" name="next_installment" class="form-control" id="nextInstallment" autocomplete="off" required>
            </div>
            <div class="col-md-6 p-2">
                <label for="">Receipt No.</label>
                <input type="text" name="receipt_no" class="form-control" value='{{$lastReceipt->receipt_no+1}}' readonly required>
            </div>
            
            <div class="col-md-12 p-0 mt-2 font-weight-bold">
                Issued To
            </div>
        </div>
        
        <!-- Customer Details  -->
        <div class="row m-0" id="formBody" style="display: ;"></div>

        <div class="row m-0">
            <div class="col-md-12 p-0 mt-2 font-weight-bold">
                Units & Payment
            </div>

            <div class="col-md-4 p-2">
                <label for="">No. of Units</label>
                <input type="number" name="units" class="form-control quantity" value="1" readonly required>
            </div>
            <div class="col-md-4 p-2">
                <label for="">Unit Price</label>
                <input type="number" name="unit_price" class="form-control unitPrice" required>
            </div>
            <div class="col-md-4 p-2">
                <label for="">Payment Amount</label>
                <input type="text" name="payment_amount" class="form-control amount" readonly required>
            </div>
            <div class="col-md-12 p-2">
                <label for="">Payment Amount In Words</label>
                <input type="text" name="amount_words" class="form-control text-capitalize" id="words" readonly required>
            </div>
            <div class="col-md-12 p-2">
                <label for="">Payment Description</label>
                <input type="text" name="payment_desc" class="form-control" required>
            </div>
            <div class="col-md-12 p-2">
                <label for="">Unit Size in Sq. Yards</label>
                <input type="text" name="unit_size" class="form-control" required>
            </div>
            {{-- <div class="col-md-6 p-2">
                <label for="">Select Sales Person</label>
                <select name="salesperson_id" id="" class="form-select">
                    <option selected disabled>Select Employee</option>
                    @foreach ($sales as $sale)
                        <option value="{{$sale->employee_id}}">{{$sale->e_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 p-2">
                <label for="">Select Guide</label>
                <select name="guide_id" id="" class="form-select">
                    <option selected disabled>Select Guide</option>
                    @foreach ($guides as $guide)
                        <option value="{{$guide->employee_id}}">{{$guide->e_name}}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="col-md-12 p-2">
                <button class="btn btn-primary btn-lg text-capitalize" id="generateBtn">Generate Receipt</button>
                <button class="btn btn-link btn-lg text-capitalize mx-2" type="reset"><i class="fas fa-redo-alt"></i>&nbsp; Reset</button>
            </div>

            <div class="alert alert-danger failed mt-3" style="display: none;">
                <i class="fas fa-times"></i> &nbsp;Receipt Failed
            </div>
            <div class="alert alert-success success" style="display: none;">
                <i class="fas fa-check"></i> &nbsp;Receipt Generated Successfull
            </div>

        </div>
    </form>
</div>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
  });
</script>
<script>
    $('.quantity').keyup(function(){
        $unitPrice = $('.unitPrice').val();
        $quantity = $(this).val();
        $total = $unitPrice * $quantity;

        $('.amount').val($total);
    })
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
    $('.quantity').keyup(function () {
        $('#words').val(inWords($('.amount').val()));
    });

    //DatePicker
    $(function() {
      $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
      $( "#nextInstallment" ).datepicker({ dateFormat: 'dd-mm-yy' });
    });
</script>
@endsection