<option value="">Select Tehsil</option>
@foreach($tehsils as $tehsil)
    <option value="{{$tehsil->tehsil}}">{{$tehsil->tehsil}}</option>
@endforeach