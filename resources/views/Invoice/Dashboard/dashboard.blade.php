@extends('Invoice/Dashboard.index')

@section('dashboardContent')
<div class="container col-md-12">
    <h3 class="text-dark">Dashboard</h3>

    {{-- <div class="row m-0" style="height: 85vh;">
        <div class="col-md-4 p-0">
            <div style="display: flex; flex-direction: column; height: 100%;">
                <div class="p-2" style="height: 50%;">
                    <a href="receipt/new">
                        <div class="d-flex align-items-center justify-content-center bg-primary shadow-lg rounded-4" style="height: 100%;">
                            <i class="fa-solid fa-plus fa-8x text-light"></i>
                        </div>
                    </a>
                </div>
                <div class="p-2" style="height: 50%;">
                    <div class="card p-5 shadow-lg" style="height: 100%;">
                        <p style="font-size: 8em; line-height: 120px;" class="mt-3 text-dark font-weight-bold text-dark">{{$totalReceipt}}</p>
                        <p class="p-0 m-0 text-uppercase text-dark font-weight-bold" style="font-size: 20px;">Total Receipts</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-0">
            <div style="display: flex; flex-direction: column; height: 100%;">
                <div class="p-2" style="height: 50%;">
                    <div class="card p-2 shadow-lg px-5 pt-4" style="height: 100%;">
                        <p style="font-size: 8em; line-height: 120px;" class="mt-3 text-dark font-weight-bold text-dark">{{$totalCustomers}}</p>
                        <p style="font-size: 40px;" class="text-uppercase text-dark font-weight-bold">Customers</p>
                    </div>
                </div>
                <div class="p-2" style="height: 50%;">
                    <div style="display: flex; justify-content: space-between; flex-direction: column; height: 100%;">
                        <div class="card p-2 shadow-lg px-5 pt-4" style="height: 47%;">
                            <p style="font-size: 40px;" class="text-uppercase text-danger font-weight-bold">₹ {{number_format($totalBAmount)}}</p>
                            <p class="m-0 p-0 text-uppercase text-dark"> Booking Amount Received</p>
                        </div>
                        <div class="card p-2 shadow-lg px-5 pt-4" style="height: 47%;">
                            <p style="font-size: 40px;" class="text-uppercase text-dark font-weight-bold">₹ {{number_format($totalIAmount)}}</p>
                            <p class="m-0 p-0 text-uppercase text-dark"> Installment Amount Received</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-0">
            <div style="display: flex; flex-direction: column; height: 100%;">
                <div class="p-2" style="height: 50%;">
                    <div class="card p-5 shadow-lg" style="height: 100%;">
                        <p style="font-size: 8em; line-height: 120px;" class="mt-3 text-dark font-weight-bold text-dark">{{$totalBookings}}</p>
                        <p class="p-0 m-0 text-uppercase text-dark font-weight-bold" style="font-size: 20px;">Total Bookings</p>
                    </div>
                </div>
                <div class="p-2" style="height: 50%;">
                    <div class="card p-5 shadow-lg" style="height: 100%;">
                        <p style="font-size: 8em; line-height: 120px;" class="mt-3 text-dark font-weight-bold text-dark">{{$totalInstallments}}</p>
                        <p class="p-0 m-0 text-uppercase text-dark font-weight-bold" style="font-size: 20px;">Total Installments</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <a href="/receipt/new">
        <div class="card py-2 px-3 my-3 bg-info">
            <div class="d-flex align-items-center justify-content-between">
                <div class="text-light">
                    Add New Receipt
                </div>
                <div class="text-light">
                        <i class="fas fa-plus"></i>
                </div>
            </div>
        </div>
    </a>

    <div class="card py-2 px-3 my-3" style="font-size: 11px; border: 1px solid #eee;">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <i class="fas fa-file-alt"></i>&nbsp; Total Receipts
            </div>
            <div class="" style="font-size: 15px;">
                {{$totalReceipt}}
            </div>
        </div>
    </div>

    <div class="card py-2 px-3 my-3" style="font-size: 11px; border: 1px solid #eee;">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <i class="fas fa-user-group"></i>&nbsp; Total Customers
            </div>
            <div class="" style="font-size: 15px;">
                {{$totalCustomers}}
            </div>
        </div>
    </div>

    <div class="card py-2 px-3 my-3" style="font-size: 11px; border: 1px solid #eee;">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <i class="fas fa-file-invoice"></i>&nbsp; Total No. of Bookings
            </div>
            <div class="" style="font-size: 15px;">
                {{$totalBookings}}
            </div>
        </div>
    </div>

    <div class="card py-2 px-3 my-3" style="font-size: 11px; border: 1px solid #eee;">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <i class="fas fa-indian-rupee-sign"></i>&nbsp; Total Booking Amount Received
            </div>
            <div class="text-info" style="font-size: 15px;">
                ₹{{number_format($totalBAmount)}}
            </div>
        </div>
    </div>

    <div class="card py-2 px-3 my-3" style="font-size: 11px; border: 1px solid #eee;">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <i class="fas fa-file-invoice"></i>&nbsp; Total No. of Installments
            </div>
            <div class="" style="font-size: 15px;">
                {{$totalInstallments}}
            </div>
        </div>
    </div>

    <div class="card py-2 px-3 my-3" style="font-size: 11px; border: 1px solid #eee;">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <i class="fas fa-indian-rupee-sign"></i>&nbsp; Total Installment Amount Received
            </div>
            <div class="text-primary" style="font-size: 15px;">
                ₹{{number_format($totalIAmount)}}
            </div>
        </div>
    </div>

    <div class="card py-2 px-3 my-3" style="font-size: 11px; border: 1px solid #eee;">
        <div class="d-flex align-items-center justify-content-between font-weight-bold">
            <div class="">
                <i class="fas fa-wallet"></i>&nbsp; Total Amount Received
            </div>
            <div class="text-success" style="font-size: 15px;">
                ₹{{number_format($totalAmount)}}
            </div>
        </div>
    </div>

</div>
@endsection