@extends('Invoice.layout')

@section('title')
    Dashboard - Receipt Management | Ewen Realtors
@endsection

@section('body')

    <div class="row m-0">
        <div class="col-lg-10 p-0 bodyDash">
            <div class="px-md-5 py-md-3">
                @yield("dashboardContent")
            </div>
        </div>
        <div class="col-lg-2 p-0 sidebar_column" id="sidebar">
            @include('Invoice/Dashboard.sidebar')
        </div>
    </div>

@endsection