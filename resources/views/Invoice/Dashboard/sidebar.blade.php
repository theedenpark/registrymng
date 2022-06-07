<div class="side__bar shadow-lg bg-light">
    <div class="nav__logo text-center p-3">
        <a href="{{url('/')}}">
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
                            <i class="fas fa-th-large"></i>
                        </div>
                        <div class="px-2">Dashboard</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/receipt/new')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="px-2">New Receipt</div>
                    </div>    
                </a>
            </li>
            <li>
                <a class="" href="{{url('/receipt/all')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <div class="px-2">All Receipt</div>
                    </div>    
                </a>
            </li>
            <!-- <li>
                <a class="" href="{{url('/receipt/clients')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="px-2">All Customers</div>
                    </div>    
                </a>
            </li> -->
            <li class="mt-5">
                <a class="" href="{{url('/receipt/profile')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="px-2">Profile</div>
                    </div>    
                </a>
            </li>
            <li class="mb-5 pb-5">
                <a class="" href="{{url('/receipt/logout')}}">
                    <div class="d-flex">
                        <div class="col-1 text-center">
                            <i class="fas fa-power-off"></i>
                        </div>
                        <div class="px-2">Logout</div>
                    </div>    
                </a>
            </li>
        </ul>

        <div class="mt-5 pt-5 text-center" style="font-size:10px;">
            Receipt Manager &copy;EwenRealtors.
        </div>
    </div>
</div>

<button class="btn btn-primary btn-floating btn-lg" id="toggleBtn">
<i class="fa-solid fa-arrow-right"></i>
</button>