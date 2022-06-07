@extends('Invoice.layout')

@section('title')
    Login - Invoice Management | Ewen Realtors
@endsection

@section('body')
    <div class="row m-0 align-items-center">

        <div class="col-3 d-flex align-items-center bg-danger text-light justify-content-center loginSidebar" style="height: 100vh;">
            <div>
                <!-- <img src="/assets/images/Files.svg" alt="" style="z-index: 1000; height: 95vh; position: relative; left: -150px;"> -->
                <h1 class="m-0" style="font-size: 9em; opacity: 0.5; writing-mode: vertical-lr;text-orientation: upright; letter-spacing: -40px; font-weight: 900;">LOGIN</h1>
            </div>
        </div>

        <div class="col-md-9 align-items-center p-5 row m-0 align-items-center bg-light loginForm" style="height: 100vh;">
            <div class="container col-md-6">
                <div class="card p-4 rounded-9">
                    <img src="/assets/logo/logo.svg" alt="" style="height: 70px;">
                    <h2 class="text-center text-danger mt-1 mb-4">Receipt Management Tool</h2>
                    <div class="alert alert-danger failed" style="display: none;">
                        <i class="fas fa-times"></i> &nbsp;Login Failed
                    </div>
                    <div class="alert alert-success success" style="display: none;">
                        <i class="fas fa-check"></i> &nbsp;Login Successfull
                    </div>
                    <form actionUrl="/receipt/login" method="post" id="loginForm">
                        @csrf
                        <div class="mb-4">
                            <label for="">User ID</label><br>
                            <input type="email" name="email" placeholder="Enter Your User ID" class="loginFields">
                        </div>
                        <div class="d-flex align-items-center my-4 loginFields p-0">
                            <div class="col-11">
                                <input type="password" name="password" placeholder="Enter Your Password" class="p-2 w-100 border-0 rounded-4" style="outline: none;" id="password">
                            </div>
                            <div class="text-center col-1">
                                <i class="far fa-eye-slash" id="eye" style="cursor: pointer;"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-danger btn-lg shadow-none" id="loginBtn">
                                <i class="fas fa-unlock"></i> Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection