@extends('Invoice/Dashboard.index')

@section('dashboardContent')

<div class="container p-0">
    <a href="/receipt/customers">
        <h3 class="text-dark">Customers</h3>
    </a>
    <div class="d-flex mt-3 border" id="allCustomersContainer">
        <div class="col-3 p-0" style="border-right: 1px solid #eee;">
        <div class="customers">
            <div class="d-flex align-items-center m-0 p-2" id="search" style="background: none; border-bottom: 1px solid #ddd;">
                <div class="px-1">
                    <i class="fa-solid fa-search"></i>
                </div>
                <div style="flex: 1;">
                    <input type="text" placeholder="Search"  class="border-0 w-100" style="outline: none; background: none;" id="myinput">
                </div>
            </div> 

            <!-- All Customers  -->
            <div id="listCustomers">
            @foreach($customers as $customer)
                <div class="row m-0 align-items-center p-2" id="user" onclick="getDetails(`{{$customer->mobile}}`)">
                    <div class="col-2 p-0">
                        <i class="fa-solid fa-user-circle fa-3x"></i>
                    </div>
                    <div class="col-9 px-2">
                        <p class="m-0 p-0 text-dark" style="line-height: 20px; font-weight: 700;">
                            {{$customer->customer_name}}
                        </p>
                        <p class="m-0 p-0" style="line-height: 10px;">
                            <font style="font-size: 12px;">+91 {{$customer->mobile}}</font>
                        </p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>

        </div>
        <div class="col-9 p-0" id="customerDetails">
            <div class="d-flex h-100 w-100 align-items-center justify-content-center" style="background: #fff;">
                <img src="/invoice_assets/images/hi.jpg" alt="" style="height: 500px;">
            </div>
        </div>
    </div>
</div>

@endsection