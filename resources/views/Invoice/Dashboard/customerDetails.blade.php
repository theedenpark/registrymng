@foreach($user as $value)
<div class="col-md-12 p-2">
    <label for="">Customer Name</label>
    <input type="text" name="customer_name" class="form-control" readonly required value="{{$value->customer_name}}">
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