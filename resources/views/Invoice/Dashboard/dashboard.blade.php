@extends('Invoice/Dashboard.index')

@section('dashboardContent')
<div class="container col-md-12">
    <h3 class="text-dark">Dashboard</h3>

    <div class="row m-0" style="height: 85vh;">
        <div class="col-md-4 p-0">
            <div style="display: flex; flex-direction: column; height: 100%;">
                <div class="p-2" style="height: 50%;">
                    <a href="receipt/new">
                        <div class="d-flex align-items-center justify-content-center shadow-lg rounded-4" style="height: 100%;">
                            <i class="fa-solid fa-plus fa-8x text-primary"></i>
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
                            <p style="font-size: 40px;" class="text-uppercase text-success font-weight-bold">₹ {{number_format($totalAmount)}}</p>
                        </div>
                        <div class="card p-2 shadow-lg px-5 pt-4" style="height: 47%;">
                            <p style="font-size: 40px;" class="text-uppercase text-success font-weight-bold">₹ {{number_format($totalAmount)}}</p>
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
    </div>
</div>
@endsection