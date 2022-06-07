@extends('Invoice/Dashboard.index')

@section('dashboardContent')
<div class="container col-md-6">
    <h3>Profile</h3>
    <!-- <div class="my-4">
        <label for="" class="pb-2">Company Logo</label><br/>
        <img src="/assets/logo/logo.svg" alt="" style="height: 100px;" class="border rounded-3">
    </div> -->
    @foreach($profile as $value)
    <div class="my-4">
        <label for="" class="pb-2">Company Name</label><br/>
        <input type="text" class="loginFields" value='{{$value->company_name}}' disabled>
    </div>
    <div class="my-4">
        <label for="" class="pb-2">GSTIN</label><br/>
        <input type="text" class="loginFields" value='{{$value->gstin_no}}' disabled>
    </div>
    <div class="my-4">
        <label for="" class="pb-2">CIN</label><br/>
        <input type="text" class="loginFields" value='{{$value->cin_no}}' disabled>
    </div>
    <div class="my-4">
        <label for="" class="pb-2">Address Line 1</label><br/>
        <input type="text" class="loginFields" value='{{$value->address_line_one}}' disabled>
    </div>
    <div class="my-4">
        <label for="" class="pb-2">Address Line 2</label><br/>
        <input type="text" class="loginFields" value='{{$value->address_line_two}}' disabled>
    </div>
    <div class="my-4">
        <a href="/receipt">
            <button class="btn btn-link btn-lg text-capitalize"><i class="fas fa-arrow-left"></i> Back To Dashboard</button>
        </a>
    </div>
    @endforeach
</div>
@endsection