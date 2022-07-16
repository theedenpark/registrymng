<div class="side__bar shadow-lg bg-light">
    <div class="nav__logo text-center p-3">
        <a href="{{url('/receipt')}}">
            <img src="/assets/logo/logo.svg" alt="">
            <!-- Receipt Manager -->
        </a>
    </div>
    <div class="nav__list">
        <ul>
            <li>
                <a class="" href="{{url('/receipt')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/dashboard.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Dashboard</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/receipt/new')}}">
                    <div class="d-flex"> 
                        <div class="col-1 text-center">
                            <img src="/assets/icons/add-property.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">New Receipt</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/receipt/all')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/folder.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">All Receipt</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/receipt/customers')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/witness.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">All Customers</div>
                    </div>    
                </a>
            </li>
            <li class="mt-5">
                <a class="" href="{{url('/receipt/profile')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/add-user.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Profile</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/employee')}}" target="_blank">
                    <div class="d-flex">
                        <div class="col-1 text-center">
                            {{-- <img src="/assets/icons/add-user.png" alt="" style="height: 18px;"> --}}
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="px-2">Employee Management</div>
                    </div>    
                </a>
            </li>
            <li class="mb-5 pb-5">
                <a class="" href="{{url('/receipt/logout')}}" onclick="return confirm('Are you sure to log out?')">
                    <div class="d-flex">
                        <div class="col-1 text-center">
                            <img src="/assets/icons/logout.png" alt="" style="height: 18px;">
                        </div>
                        <div class="px-2">Logout</div>
                    </div>    
                </a>
            </li>
        </ul>

        <div class="mt-5 pt-5 text-center" style="font-size:10px;">
            Receipt Manager<sup>&copy;</sup> EwenRealtors.
        </div>
    </div>
</div>

<button class="btn btn-primary btn-floating btn-lg" id="toggleBtn">
<i class="fa-solid fa-arrow-right"></i>
</button>