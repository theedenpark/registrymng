@extends('layouts.layout')

@section('title')
    Dashboard - Registry Management | Ewen Realtors
@endsection

@section('body')
    
    @if(session('theme') == 1)
    <div class="row m-0 align-items-center justify-content-between fixed-top bg-white shadow-5 p-2 text-dark alertReload" style="display: none;">
        <div style="font-size: 12px;" class="col-md-10">
            <i class="fas fa-redo px-2"></i> Reload required. Changes will take place after a reload of this page.
        </div>
        <div class="col-md-2 text-end">
            <button class="btn btn-primary border-1 rounded-pill text-capitalize btn-sm shadow-0" onclick="window.location.reload()" style="font-weight: 400 !important;">Okay</button>
            <button class="btn btn-outline-primary border-1 rounded-pill text-capitalize btn-sm shadow-0 mx-1" onclick="$('.alertReload').fadeOut();" style="font-weight: 400 !important;">Later</button>
        </div>
    </div>
    @else
    <div class="row m-0 align-items-center justify-content-between fixed-top bg-dark shadow-5 p-2 text-light alertReload" style="display: none;">
        <div style="font-size: 12px;" class="col-md-10">
            <i class="fas fa-redo px-2"></i> Reload required. Changes will take place after a reload of this page.
        </div>
        <div class="col-md-2 text-end">
            <button class="btn btn-info border-1 rounded-pill text-capitalize btn-sm shadow-0" onclick="window.location.reload()" style="font-weight: 400 !important;">Okay</button>
            <button class="btn btn-outline-info border-1 rounded-pill text-capitalize btn-sm shadow-0 mx-1" onclick="$('.alertReload').fadeOut();" style="font-weight: 400 !important;">Later</button>
        </div>
    </div>
    @endif

    <div class="row m-0">
        <div class="col-lg-2 p-0" id="sidebar">
            @include('Dashboard.sidebar')
        </div>
        <div class="col-lg-10 p-0 bodyOfDash">
            <div class="shadow-5 px-md-5 py-3 mb-4 sticky-top naviBar">
                <div class="d-flex m-0 justify-content-between align-items-center px-4">
                    <div class="hamburger">
                            <button class="btn btn-outline-dark border-1 py-2 px-3 rounded-2" id="toggleSidebar">
                                <i class="fas fa-arrow-left"></i>
                            </button>
                    </div>
                    <div class="d-flex align-items-center" style="overflow-x: auto;">
                        <div class="px-1">
                            <a href="https://bhulekh.uk.gov.in/public/public_ror/Public_ROR.jsp" target="_blank">
                                <button id="toolbar_btn" class="btn-floating ripple" title="Bhulekh - Uttarakhand">
                                    <img src="/assets/images/bhulekh_uk.svg" alt="Bhulekh">
                                </button>
                            </a>
                        </div>
                        <div class="px-1">
                            <a href="http://online.eregistrationukgov.in/e_search/default2.aspx" target="_blank">
                                <button id="toolbar_btn" class="py-1 px-3 rounded-pill ripple" title="eSearch - Stamp & Registeration">
                                    <img src="/assets/images/eSearch.png " alt="eSearch">
                                </button>
                            </a>
                        </div>
                        <div class="px-1">
                            <button class="btn-floating ripple openCalculator" title="Calculator">
                                <img src="/assets/icons/calculator.png" alt="" style="height: 25px;">
                            </button>
                        </div>
                        <div class="px-2">
                            <form actionUrl="/changeTheme" method="post" id="themeChange">
                                @csrf
                                @if(session('theme') == 1)
                                <input type="text" value="2" name="theme" style="display: none;">
                                @else
                                <input type="text" value="1" name="theme" style="display: none;">
                                @endif
                                <button class="toggleTheme btn btn-floating shadow-0 p-0" type="submit">
                                    @if(session('theme') == 1)
                                        <!-- <i class="fas fa-sun" title="Switch To Dark Mode"></i> -->
                                        <img src="/assets/icons/moon.png" alt="" style="height: 20px;" title="Switch To Dark Mode">
                                    @else
                                        <!-- <i class="fas fa-moon" title="Switch To Light Mode"></i> -->
                                        <img src="/assets/icons/sun.png" alt="" style="height: 20px;" title="Switch To Light Mode">
                                    @endif
                                </button>
                            </form>
                        </div>
                        <div class="profile">
                            <div class="d-flex align-items-center py-1 px-3 rounded-pill" id="userButton">
                                <div>
                                    <img src="/assets/icons/user.png" alt="" id="user_icon">
                                </div>
                                <div class="px-2 greetingOne" style="font-size: 11px;">
                                    Hi, {{session('userName')}}
                                </div>
                                <div class="px-2 greetingTwo" style="font-size: 11px; display: none;">
                                    Hi, {{session('userId')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-md-5 py-md-3">
                @yield("dashboardContent")
            </div>
        </div>
    </div>

    <div id="calculator" style="display: none;">
        <div class="d-flex justify-content-between align-items-center py-1 px-2 bg-dark" style="border-radius: 7px 7px 0px 0px; cursor: move;">
            <div style="font-size: 12px; color: lightgray;"><i class="fa-solid fa-calculator"></i> Calculator</div>
            <div>
            <button class="closeCalculator btn btn-danger shadow-0 px-1 py-0 m-0"
                style="position: relative; top: -4px;">
                <i class="fas fa-times"></i>
            </button>
            </div>
        </div>
			<div id="result">
				<div id="history">
					<p id="history-value"></p>
				</div>
				<div id="output">
					<p id="output-value"></p>
				</div>
			</div>
			<div id="keyboard" class="text-center">
				<button class="operator" id="clear">C</button>
				<button class="operator" id="backspace">CE</button>
				<button class="operator" id="%">%</button>
				<button class="operator" id="÷">&#247;</button>
				<button class="number" id="7">7</button>
				<button class="number" id="8">8</button>
				<button class="number" id="9">9</button>
				<button class="operator" id="×">&times;</button>
				<button class="number" id="4">4</button>
				<button class="number" id="5">5</button>
				<button class="number" id="6">6</button>
				<button class="operator" id="-">-</button>
				<button class="number" id="1">1</button>
				<button class="number" id="2">2</button>
				<button class="number" id="3">3</button>
				<button class="operator" id="+">+</button>
				<button class="empty" id="empty"></button>
				<button class="number" id="0">0</button>
				<button class="empty" id="empty"></button>
				<button class="operator" id="=">=</button>
			</div>
		</div>
@endsection
