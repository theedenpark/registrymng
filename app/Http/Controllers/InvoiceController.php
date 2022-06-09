<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request, DB;

class InvoiceController extends Controller
{
    public function Home(){
        if(session()->has('InvoiceAdminID'))
        {
            $totalReceipt = DB::table('z_invoice_all')
                            ->count();
            $totalBookings = DB::table('z_invoice_all')
                            ->where('receipt_type', 1)
                            ->count();
            $totalInstallments = DB::table('z_invoice_all')
                            ->where('receipt_type', 2)
                            ->count();
            $totalCustomers = DB::table('z_invoice_all')
                            ->groupBy('mobile')
                            ->count();
            $totalAmount = DB::table('z_invoice_all')
                            ->sum('payment_amount');
            return view('/Invoice/Dashboard.dashboard', [
                'totalReceipt' => $totalReceipt,
                'totalBookings' => $totalBookings,
                'totalInstallments' => $totalInstallments,
                'totalCustomers' => $totalCustomers,
                'totalAmount' => $totalAmount,
            ]);
        }
        else
        {
            return view('/Invoice.index');
        }
    }

    //Login
    public function login(Request $req)
    {
        $userInfo = DB::table('z_invoice_admin')
        ->where('email','=', $req->email)
        ->where('password','=', $req->password)
        ->first();

        if($userInfo)
        {
            if($userInfo->password == $req->password)
            {
                session()->put('InvoiceAdminID', $userInfo->email);
                session()->put('InvoiceAdminName', $userInfo->username);
                return true;
            }
            else
            { 
                return false;
            }
        }
        else{
            return false;
        }
    }

    public function NewInvoice(){
        if(session()->has('InvoiceAdminID'))
        {
            $profile = DB::table('z_invoice_profile')->get();
            $data = DB::table('z_invoice_all')
            ->get();
            $getLastReceiptNo = DB::table('z_invoice_all')
                                ->orderBy('receipt_id', 'desc')
                                ->first();

            return view('/Invoice/Dashboard.new', [
                'profile' => $profile,
                'lastReceipt' =>$getLastReceiptNo,
                'data' => $data
            ]);
        }
        else
        {
            return view('/Invoice.index');
        }
    }

    public function all(){
        if(session()->has('InvoiceAdminID'))
        {
            $all = DB::table('z_invoice_all')
                    ->orderBy('receipt_no', 'asc')
                    ->where('receipt_no', '!=', 999)
                    ->get();
            return view('/Invoice/Dashboard.all', [
                'all' => $all
            ]);
        }
        else
        {
            return view('/Invoice.index');
        }
    }

    public function customers(){
        if(session()->has('InvoiceAdminID'))
        {
            $customers = DB::table('z_invoice_all')
                    ->orderBy('customer_name', 'asc')
                    ->where('receipt_no', '!=', 999)
                    ->groupBy('mobile')
                    ->get();
            return view('/Invoice/Dashboard.customers', [
                'customers' => $customers
            ]);
        }
        else
        {
            return view('/Invoice.index');
        }
    }

    public function print(){
        if(session()->has('InvoiceAdminID'))
        {
            $id = $_GET['id'];
            $data = DB::table('z_invoice_all')
                    ->where('receipt_id', $id)
                    ->get();
            $profile = DB::table('z_invoice_profile')
                    ->get();
            return view('/Invoice/Dashboard.print', [
                'data' => $data,
                'profile' => $profile
            ]);
        }
        else
        {
            return view('/Invoice.index');
        }
    }

    public function Profile(){
        if(session()->has('InvoiceAdminID'))
        {
            $profile = DB::table('z_invoice_profile')->get();
            return view('/Invoice/Dashboard.profile', [
                'profile' => $profile
            ]);
        }
        else
        {
            return view('/Invoice.index');
        }
    }
}
