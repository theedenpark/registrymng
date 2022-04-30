@extends('Dashboard.dashboard')

@section('dashboardContent')
<div class="px-4">
    <h4 class="px-3"><i class="fas fa-cube"></i> Dashboard</h4>

    <div class="row mt-3 mb-4 px-2">
        <div class="col-md-6 p-2">
            <div class="card py-2 px-3 rounded-2 shadow-1" style="font-size: 11px;">
                <div class="d-flex justify-content-between">
                    <div>Total Available Area</div>
                    <div class="text-success">
                        <i class="fas fa-caret-up"></i>&nbsp;
                        {{number_format($totalPurchasedArea)}} Sq.ft.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="card py-2 px-3 rounded-2 shadow-1" style="font-size: 11px;">
                <div class="d-flex justify-content-between">
                    <div>Total Sold Area</div>
                    <div class="text-danger">
                        <i class="fas fa-caret-up"></i>&nbsp;{{number_format($totalSoldArea)}} Sq.ft.</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="card py-2 px-3 rounded-2 shadow-1" style="font-size: 11px;">
                <div class="d-flex justify-content-between">
                    <div>Total Purchase Value</div>
                    <div class="text-danger">
                        <i class="fas fa-caret-up"></i>&nbsp;{{number_format($totalPurchaseValue)}} INR</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="card py-2 px-3 rounded-2 shadow-1" style="font-size: 11px;">
                <div class="d-flex justify-content-between">
                    <div>Total Sold Value</div>
                    <div class="text-success">
                        <i class="fas fa-caret-up"></i>&nbsp;{{number_format($totalSoldValue)}} INR</div>
                </div>
            </div>
        </div>
    </div>

    <!-- dashboard  -->
    <div class="row m-0 dashCards">
        
        <h4 class="px-3">Quick Links</h4>
        <div class="col-md-12">
            <div class="pb-3">1. Property Management</div>
        </div>
        <div class="col-md-6 px-3">
            <div class="card mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        Added Properties <br>
                        <a href="{{url('add-new-property')}}" id="view_link"><i class="far fa-eye"></i> View</a>
                    </div>
                    <div class="count_no">
                        {{$addedProps}}
                    </div>
                </div>
            </div>
        </div>
        <!-- @if(session('userType') == 1)
        <div class="col-md-6 px-3">
            <div class="card mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        Combined Properties <br>
                        <a href="{{url('combine-property')}}" id="view_link"><i class="far fa-eye"></i> View</a>
                    </div>
                    <div class="count_no">
                        {{$combinedProps}}
                    </div>
                </div>
            </div>
        </div>
        @endif -->
        <div class="col-md-6 px-3">
            <div class="card mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        Sold Properties <br>
                        <a href="{{url('sell-property')}}" id="view_link"><i class="far fa-eye"></i> View</a>
                    </div>
                    <div class="count_no">
                        {{$soldProps}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="py-3">2. Individual Management</div>
        </div>
        <div class="col-md-4 px-3">
            <div class="card mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">Property Accounts <br>
                        <a href="{{url('property-accounts')}}" id="view_link"><i class="far fa-eye"></i> View</a></div>
                    <div class="count_no">
                        {{$propAcc}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 px-3">
            <div class="card mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">Agents <br>
                        <a href="{{url('agents')}}" id="view_link"><i class="far fa-eye"></i> View</a></div>
                    <div class="count_no">
                        {{$agentAcc}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 px-3">
            <div class="card mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">Buyers <br>
                        <a href="{{url('buyers')}}" id="view_link"><i class="far fa-eye"></i> View</a></div>
                    <div class="count_no">
                        {{$buyerAcc}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 px-3">
            <div class="card mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">Draftmens <br>
                        <a href="{{url('draftmens')}}" id="view_link"><i class="far fa-eye"></i> View</a></div>
                    <div class="count_no">
                        {{$draftmenAcc}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 px-3">
            <div class="card mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">Sellers <br>
                        <a href="{{url('sellers')}}" id="view_link"><i class="far fa-eye"></i> View</a></div>
                    <div class="count_no">
                        {{$sellerAcc}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 px-3">
            <div class="card mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">Witness <br>
                        <a href="{{url('witness')}}" id="view_link"><i class="far fa-eye"></i> View</a></div>
                    <div class="count_no">
                        {{$witnessAcc}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="py-3">3. Settings</div>
        </div>
        <div class="col-md-4 px-3">
            <div class="card mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">Banks Accounts <br>
                        <a href="{{url('banks')}}" id="view_link"><i class="far fa-eye"></i> View</a></div>
                    <div class="count_no">{{$banksAcc}}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 px-3">
            <div class="card mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">Property Types <br>
                        <a href="{{url('property-type')}}" id="view_link"><i class="far fa-eye"></i> View</a></div>
                    <div class="count_no">{{$propType}}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 px-3">
            <div class="card mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">Revenue Villages <br>
                        <a href="{{url('revenue-village')}}" id="view_link"><i class="far fa-eye"></i> View</a></div>
                    <div class="count_no">{{$revVill}}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 px-3">
            <div class="card mb-3 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">Units <br>
                        <a href="{{url('units-management')}}" id="view_link"><i class="far fa-eye"></i> View</a></div>
                    <div class="count_no">{{$units}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
