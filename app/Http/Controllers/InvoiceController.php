<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request, DB;

class InvoiceController extends Controller
{
    public function logout()
    {
        if(session()->has('InvoiceAdminID'))
        {
            session()->pull('InvoiceAdminID');
            return redirect('/receipt');
        }
        else
        {
            return redirect('/receipt');
        }
    }

    public function Home(){
        if(session()->has('InvoiceAdminID'))
        {
            $totalReceipt = DB::table('z_invoice_all')
                            ->where('receipt_no', '!=', 999)
                            ->count();
            $totalBookings = DB::table('z_invoice_all')
                            ->where('receipt_type', 1)
                            ->count();
            $totalInstallments = DB::table('z_invoice_all')
                            ->where('receipt_type', 2)
                            ->count();
            $totalCustomers = DB::table('z_invoice_all')
                            ->distinct('email')
                            ->count();
            $totalBAmount = DB::table('z_invoice_all')
                            ->where('receipt_type', 1)
                            ->sum('payment_amount');
            $totalIAmount = DB::table('z_invoice_all')
                            ->where('receipt_type', 2)
                            ->sum('payment_amount');
            return view('/Invoice/Dashboard.dashboard', [
                'totalReceipt' => $totalReceipt,
                'totalBookings' => $totalBookings, 
                'totalInstallments' => $totalInstallments,
                'totalCustomers' => $totalCustomers,
                'totalBAmount' => $totalBAmount,
                'totalIAmount' => $totalIAmount,
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
            $sales = DB::table('x_employee')
                        ->where('group_id', 1)
                        ->orderBy('e_name', 'asc')
                        ->get();
            $guides = DB::table('x_employee')
                        ->where('group_id', '!=', 2)
                        ->orderBy('e_name', 'asc')
                        ->get();
            return view('/Invoice/Dashboard.new', [
                'profile' => $profile,
                'lastReceipt' =>$getLastReceiptNo,
                'data' => $data,
                'sales' => $sales,
                'guides' => $guides,
            ]);
        }
        else
        {
            return redirect('/receipt');
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
            return redirect('/receipt');
        }
    }

    public function customers(){
        if(session()->has('InvoiceAdminID'))
        {
            $customers = DB::table('z_invoice_all')
                    ->orderBy('generated_on', 'desc')
                    ->where('receipt_no', '!=', 999)
                    ->groupBy('mobile')
                    ->get();
            return view('/Invoice/Dashboard.customers', [
                'customers' => $customers
            ]);
        }
        else
        {
            return redirect('/receipt');
        }
    }

    public function edit(){
        if(session()->has('InvoiceAdminID'))
        {
            $id = $_GET['id'];
            $data = DB::table('z_invoice_all')
                    ->where('receipt_id', $id)
                    ->first();
            return view('/Invoice/Dashboard.edit', [
                'data' => $data
            ]);
        }
        else
        {
            return redirect('/edit');
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
            return redirect('/receipt');
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
            return redirect('/receipt');
        }
    }
}
