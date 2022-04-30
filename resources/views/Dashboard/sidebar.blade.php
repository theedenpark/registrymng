<div class="side__bar shadow-5">
    <div class="nav__logo text-center py-3">
        <a href="{{url('/')}}">
            @if(session('theme') == 1)
            <img src="/assets/logo/logo.svg" alt="">
            @elseif(session('theme') == 2)
            <img src="/assets/logo/logo_white.svg" alt="">
            @endif
        </a>
    </div>
    <div class="text-center goBack">
        <button class="btn btn-light shadow-5">
            <i class="fas fa-caret-left"></i> Go Back
        </button>
    </div>
    <div class="nav__list">
        <ul>
            <li>
                <a class="" href="{{url('/')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-cube"></i></div>
                        <div class="px-2">Dashboard</div>
                    </div>    
                </a>
            </li>
        </ul>
        <ul>Property Managemet
            <li>
                <a class="" href="{{url('/add-new-property')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-plus"></i></div>
                        <div class="px-2">Add/View Properties</div>
                    </div>    
                </a>
            </li>
            <!-- @if(session('userType') == 1)
            <li>
                <a class="" href="{{url('/combine-property')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-map"></i></div>
                        <div class="px-2">Combine Property</div>
                    </div>    
                </a>
            </li>
            @endif -->
            <li>
                <a class="" href="{{url('/sell-property')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-suitcase"></i></div>
                        <div class="px-2">Sell Property</div>
                    </div>    
                </a>
            </li>
        </ul>
        <ul>Individual Management
            <li>
                <a class="" href="{{url('/property-accounts')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-user"></i></div>
                        <div class="px-2">Property Accounts</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/agents')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-user-secret"></i></div>
                        <div class="px-2">Agents</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/buyers')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-users"></i></div>
                        <div class="px-2">Buyers</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/draftmens')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-users"></i></div>
                        <div class="px-2">Draftmens</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/sellers')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-users"></i></div>
                        <div class="px-2">Sellers</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/witness')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-users"></i></div>
                        <div class="px-2">Witness</div>
                    </div>    
                </a>
            </li>
        </ul>
        <ul>Settings
            <li>
                <a class="" href="{{url('/banks')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-bank"></i></div>
                        <div class="px-2">Bank Accounts</div>
                    </div>    
                </a>
            </li>
            <!-- <li>
                <a class="" href="{{url('/document-type')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-file"></i></div>
                        <div class="px-2">Document Type</div>
                    </div>    
                </a>
            </li> -->
            <li>
                <a class="" href="{{url('/property-type')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-layer-group"></i></div>
                        <div class="px-2">Property Type</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/revenue-village')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-chart-area"></i></div>
                        <div class="px-2">Revenue Village</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/units-management')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-cubes"></i></div>
                        <div class="px-2">Units Management</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/backup')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-database"></i></div>
                        <div class="px-2">Backup</div>
                    </div>    
                </a>
            </li>
        </ul>
        <ul>User Management
            @if(session('userType') == 1)
            <li>
                <a class="" href="{{url('/add-new-user')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-user-plus"></i></div>
                        <div class="px-2">Add New User</div>
                    </div>    
                </a>
            </li>
            @endif
            <li>
                <a class="" href="{{url('/activity-log')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center"><i class="fas fa-list"></i></div>
                        <div class="px-2">Activity Log</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/logout')}}" onclick="return confirm('Are you sure to log out?');">
                    <div class="d-flex text-danger">
                        <div class="col-1 text-center"><i class="fas fa-power-off"></i></div>
                        <div class="px-2">Logout</div>
                    </div>    
                </a>
            </li>
        </ul>

        <div class="mt-3 pt-1 text-center" style="font-size: 9px; color: gray;">
            Developed By Abhishek For Ewen <i class="fas fa-heart" style="color: red;"></i> Realtors
        </div>
    </div>
</div>