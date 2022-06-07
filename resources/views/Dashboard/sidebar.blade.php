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
                        <div class="col-1 text-center">
                            <img src="/assets/icons/dashboard.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Dashboard</div>
                    </div>    
                </a>
            </li>
        </ul>
        <ul>Property Managemet
            <li>
                <a class="" href="{{url('/add-new-property')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/add-property.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Add/View Properties</div>
                    </div>    
                </a>
            </li>
            <!-- @if(session('userType') == 1)
            <li>
                <a class="" href="{{url('/combine-property')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center"><i class="fas fa-map"></i></div>
                        <div class="px-2">Combine Property</div>
                    </div>    
                </a>
            </li>
            @endif -->
            <li>
                <a class="" href="{{url('/sell-property')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/folder.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Sell Property</div>
                    </div>    
                </a>
            </li>
        </ul>
        <ul>Individual Management
            <li>
                <a class="" href="{{url('/property-accounts')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/prop-account.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Property Accounts</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/agents')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/agent.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Agents</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/buyers')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/buyer.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Buyers</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/draftmens')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/draftmen.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Draftmens</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/sellers')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/seller.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Sellers</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/witness')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/witness.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Witness</div>
                    </div>    
                </a>
            </li>
        </ul>
        <ul>Settings
            <li>
                <a class="" href="{{url('/banks')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                        <img src="/assets/icons/bank.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Bank Accounts</div>
                    </div>    
                </a>
            </li>
            <!-- <li>
                <a class="" href="{{url('/document-type')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center"><i class="fas fa-file"></i></div>
                        <div class="px-2">Document Type</div>
                    </div>    
                </a>
            </li> -->
            <li>
                <a class="" href="{{url('/property-type')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/property-type.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Property Type</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/revenue-village')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/rev-village.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Revenue Village</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/units-management')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/units-management.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Units Management</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/backup')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/backup.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Backup</div>
                    </div>    
                </a>
            </li>
        </ul>
        <ul>User Management
            @if(session('userType') == 1)
            <li>
                <a class="" href="{{url('/add-new-user')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/add-user.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Add New User</div>
                    </div>    
                </a>
            </li>
            @endif
            <li>
                <a class="" href="{{url('/activity-log')}}">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/log-format.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Activity Log</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/logout')}}" onclick="return confirm('Are you sure to log out?');">
                    <div class="d-flex align-items-center text-info">
                        <div class="col-1 text-center">
                        <!-- <i class="fa-solid fa-plug-circle-xmark"></i> -->
                        <img src="/assets/icons/logout.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Logout</div>
                    </div>    
                </a>
            </li>
        </ul>

        <div class="mt-3 pt-1 text-center" style="font-size: 9px; color: gray;">
            Developed For Ewen <i class="fas fa-heart" style="color: red;"></i> Realtors
        </div>
    </div>
</div>