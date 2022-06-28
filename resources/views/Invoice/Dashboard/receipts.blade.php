<option selected disabled>Select Receipt</option>
@foreach($receipts as $receipt)
    <option value="{{$receipt->receipt_no}}">{{$receipt->receipt_format}}{{$receipt->receipt_no}}</option>
@endforeach