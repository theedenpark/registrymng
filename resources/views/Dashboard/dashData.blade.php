@extends('Dashboard.dashboard')

@section('dashboardContent')
<div class="p-0">
    <p class="px-3" style="font-size: 12px; color: #1abbff;"><i class="fas fa-cube"></i> Dashboard</p>

    <div class="row m-0">
        <div class="col-md-3 pb-3">
            <div class="card rounded-4 p-4" style="height: 230px;">
                <p class="p-0 m-0">
                    <font style="font-size: 2rem; font-weight: 900; color: #1abbff;">{{number_format($totalKhet)}}</font><br>
                    <font style="font-size: 10px; color: gray; position: relative; top: -10px;">Total number of khet</font>
                </p>
                <a href="/add-new-property">
                    <button class="my-2 btn btn-block rounded-pill text-light shadow-1" style="font-size: 9px !important; letter-spacing: 0.5px; background: #1abbff;">
                        Add Property
                    </button>
                </a>
                <div class="d-flex justify-content-between mt-3" style="font-size: 10px;">
                    <div style="color: lightgray;">Total Area</div>
                    <div>{{number_format($totalPurchasedArea)}} Sq.ft.</div>
                </div>
                <div class="d-flex justify-content-between mt-1" style="font-size: 10px;">
                    <div style="color: lightgray;">Sold Area</div>
                    <div>{{number_format($totalSoldArea)}} Sq.ft.</div>
                </div>
            </div>
        </div>

        <!-- Shortcuts  -->
        <div class="col-md-6 pb-3">
            <div class="card rounded-4 p-2" style="height: 230px; overflow-y: auto;">
                <div class="row m-0">
                    <div class="col-md-3 p-2">
                        <a href="{{url('add-new-property')}}" target="_blank">
                            <div class="card shortcutCard shadow-2 rounded-2 p-2 border-1" style="height: 55px;">
                                <p class="m-0 font-weight-bolder" style="font-size: 13px;">{{$addedProps}}</p>
                                Properties
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 p-2">
                        <a href="{{url('sell-property')}}" target="_blank">
                            <div class="card shortcutCard shadow-2 rounded-2 p-2 border-1" style="height: 55px;">
                                <p class="m-0 font-weight-bolder" style="font-size: 13px;">{{$soldProps}}</p>
                                Sold
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 p-2">
                        <a href="{{url('property-accounts')}}" target="_blank">
                            <div class="card shortcutCard shadow-2 rounded-2 p-2 border-1" style="height: 55px;">
                                <p class="m-0 font-weight-bolder" style="font-size: 13px;">{{$propAcc}}</p>
                                Property Accounts
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 p-2">
                        <a href="{{url('agents')}}" target="_blank">
                            <div class="card shortcutCard shadow-2 rounded-2 p-2 border-1" style="height: 55px;">
                            <p class="m-0 font-weight-bolder" style="font-size: 13px;">{{$agentAcc}}</p>    
                            Agents
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 p-2">
                        <a href="{{url('buyers')}}" target="_blank">
                            <div class="card shortcutCard shadow-2 rounded-2 p-2 border-1" style="height: 55px;">
                            <p class="m-0 font-weight-bolder" style="font-size: 13px;">{{$buyerAcc}}</p>    
                                Buyers
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 p-2">
                        <a href="{{url('draftmens')}}" target="_blank">
                            <div class="card shortcutCard shadow-2 rounded-2 p-2 border-1" style="height: 55px;">
                            <p class="m-0 font-weight-bolder" style="font-size: 13px;">{{$draftmenAcc}}</p>    
                                Draftmens
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 p-2">
                        <a href="{{url('sellers')}}" target="_blank">
                            <div class="card shortcutCard shadow-2 rounded-2 p-2 border-1" style="height: 55px;">
                            <p class="m-0 font-weight-bolder" style="font-size: 13px;">{{$sellerAcc}}</p>    
                                Sellers
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 p-2">
                        <a href="{{url('witness')}}" target="_blank">
                            <div class="card shortcutCard shadow-2 rounded-2 p-2 border-1" style="height: 55px;">
                            <p class="m-0 font-weight-bolder" style="font-size: 13px;">{{$witnessAcc}}</p>    
                                Witness
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 p-2">
                        <a href="{{url('banks')}}" target="_blank">
                            <div class="card shortcutCard shadow-2 rounded-2 p-2 border-1" style="height: 55px;">
                            <p class="m-0 font-weight-bolder" style="font-size: 13px;">{{$banksAcc}}</p>    
                                Bank Accounts
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 p-2">
                        <a href="{{url('property-type')}}" target="_blank">
                            <div class="card shortcutCard shadow-2 rounded-2 p-2 border-1" style="height: 55px;">
                            <p class="m-0 font-weight-bolder" style="font-size: 13px;">{{$propType}}</p>    
                                Property Types
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 p-2">
                        <a href="{{url('revenue-village')}}" target="_blank">
                            <div class="card shortcutCard shadow-2 rounded-2 p-2 border-1" style="height: 55px;">
                            <p class="m-0 font-weight-bolder" style="font-size: 13px;">{{$revVill}}</p>    
                                Revenue Villages
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 p-2">
                        <a href="{{url('units-management')}}" target="_blank">
                            <div class="card shortcutCard shadow-2 rounded-2 p-2 border-1" style="height: 55px;">
                            <p class="m-0 font-weight-bolder" style="font-size: 13px;">{{$units}}</p>    
                                Units
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Units  -->
        <div class="col-md-3 pb-3">
            <div class="card rounded-4 p-3" style="height: 230px; font-size: 11px !important;">
                <div class="d-flex justify-content-between">
                    <div>
                        <font class="font-weight-bolder">Units (1)</font>
                    </div>
                    <div>
                        <font class="font-weight-bolder">In Sq.ft.</font>
                    </div>
                </div>
                <div style="overflow-y: auto; height: 95%; padding-right: 5px;">
                    <div class="d-flex justify-content-between mt-2" style="color: #1abbff; border-bottom: 1px solid #eee;">
                        <div>Sq.ft</div>
                        <div>1</div>
                    </div>
                    @foreach($allUnits as $unit)
                    <div class="d-flex justify-content-between mt-2" style="border-bottom: 1px solid #eee;">
                        <div>{{$unit->unit_name}}</div>
                        <div>{{number_format($unit->unit_value)}}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Cards  -->
        <div class="col-md-3 pb-3">
            <div class="card rounded-4 p-2 text-center">
                <p class="my-2" style="font-size: 12px;">Available Area</p>
                <p style="font-weight: 900; font-size: 19px; color: #1abbff;"><i class="fa-solid fa-caret-up"></i> {{number_format($totalPurchasedArea)}} Sq.ft.</p>
                <img src="/assets/images/2811029.svg" alt="" style="width: 100%; height: 70px; object-fit: cover; border-radius: 0px 0px 5px 5px;">
            </div>
        </div>
        <div class="col-md-3 pb-3">
            <div class="card rounded-4 p-2 text-center">
                <p class="my-2" style="font-size: 12px;">Sold Area</p>
                <p style="font-weight: 900; font-size: 19px; color: #ffbf52;"><i class="fa-solid fa-caret-up"></i> {{number_format($totalSoldArea)}} Sq.ft.</p>
                <img src="/assets/images/1831029.svg" alt="" style="width: 100%; height: 70px; object-fit: cover; border-radius: 0px 0px 5px 5px;">
            </div>
        </div>
        <div class="col-md-3 pb-3">
            <div class="card rounded-4 p-2 text-center">
                <p class="my-2" style="font-size: 12px;">Purchase Value</p>
                <p style="font-weight: 900; font-size: 19px; color: #42e2cf;"><i class="fa-solid fa-indian-rupee-sign"></i> {{number_format($totalPurchaseValue)}}</p>
                <img src="/assets/images/2831029.svg" alt="" style="width: 100%; height: 70px; object-fit: cover; border-radius: 0px 0px 5px 5px;">
            </div>
        </div>
        <div class="col-md-3 pb-3">
            <div class="card rounded-4 p-2 text-center">
                <p class="my-2" style="font-size: 12px;">Sold Value</p>
                <p style="font-weight: 900; font-size: 19px; color: #42e2cf;"><i class="fa-solid fa-indian-rupee-sign"></i> {{number_format($totalSoldValue)}}</p>
                <img src="/assets/images/2831029.svg" alt="" style="width: 100%; height: 70px; object-fit: cover; border-radius: 0px 0px 5px 5px;">
            </div>
        </div>
    </div>

</div>
@endsection
