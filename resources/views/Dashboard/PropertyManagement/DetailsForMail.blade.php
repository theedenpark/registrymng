@foreach($DetailsForMail as $value)
<b>Basra No:</b> {{$value->s_basra_no}}<br>
<b>Khet No:</b> {{$value->s_khet_no}}<br>
<b>Buyer Name:</b> {{$value->s_buyer_id}}<br>
<b>Address:</b> {{$value->s_village}}, {{$value->s_tehsil}}, {{$value->s_district}}, {{$value->s_state}}<br>
<b>Sold Area:</b> {{$value->sold_area}} Sq.ft.<br>
<b>Witness:</b> {{$value->witnesses}}<br>
<b>Return Rate:</b> ₹{{$value->s_return_rate}}<br>
<b>Cancellation Terms:</b> {{$value->s_cancellation_terms}}<br>
<b>Amount:</b> ₹{{$value->s_total_amount}}
@endforeach

<p>Thanks & Regards,<br>
Ewen Realtors Private Limited</p>