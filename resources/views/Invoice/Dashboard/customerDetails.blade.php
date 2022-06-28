@foreach($user as $value)
<div class="col-md-6 p-2">
    <label for="">Primary Customer</label>
    <input type="text" name="primary_customer" class="form-control" readonly required value="{{$value->primary_customer}}">
</div>
<div class="col-md-6 p-2">
    <label for="">Secondary Customer</label>
    <input type="text" name="secondary_customer" class="form-control" readonly required value="{{$value->secondary_customer}}">
</div>
<div class="col-md-6 p-2">
    <label for="">Email</label>
    <input type="email" name="email" class="form-control" readonly required value="{{$value->email}}">
</div>
<div class="col-md-6 p-2">
    <label for="">Mobile No.</label>
    <input type="tel" name="mobile" class="form-control" readonly required value="{{$value->mobile}}">
</div>
<div class="col-md-12 p-2">
    <label for="">Address</label>
    <textarea name="address" class="form-control" readonly required>{{$value->address}}</textarea>
</div>
@endforeach