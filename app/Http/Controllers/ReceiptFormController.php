<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request, DB;

class ReceiptFormController extends Controller
{
    public function generateReceipt(Request $req){
        if(session()->has('InvoiceAdminID'))
        {
            $dataset = [
                'receipt_type' => $req->receipt_type,
                'phase' => $req->phase,
                'plot_no' => $req->plot_no,
                'receipt_date' => $req->receipt_date,
                'receipt_no' => $req->receipt_no,
                'customer_name' => $req->customer_name,
                'email' => $req->email,
                'mobile' => $req->mobile,
                'address' => $req->address,
                'units' => $req->units,
                'unit_price' => $req->unit_price,
                'payment_amount' => $req->payment_amount,
                'amount_words' => $req->amount_words,
                'payment_desc' => $req->payment_desc,
                'unit_size' => $req->unit_size
            ];
            $q = DB::table('z_invoice_all')
                ->insert($dataset);

            if($q)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return view('/Invoice.index');
        }
    }

    public function plots(Request $req)
    {
        if(session()->has('InvoiceAdminID'))
        {
            $phase = $_GET['phase'];
            $plots = DB::table('z_invoice_all')
                ->where('phase', $phase)
                ->where('receipt_type', 1)
                ->get();
            if($plots)
            {
                return view('Invoice/Dashboard.plots', [
                    'plots' => $plots
                    ]);
            }
            else
            {
                return 'No Plots Available';
            }
        }
        
    }

    public function checkPlotAvailability(Request $req)
    {
        if(session()->has('InvoiceAdminID'))
        {
            $plot = $_GET['plot'];
            $phase = $_GET['phase'];
            $plots = DB::table('z_invoice_all')
                ->where('plot_no', $plot)
                ->where('phase', $phase)
                ->get();
            if($plots->isEmpty())
            {
                return false;
            }
            else
            {
                return true;
            }
        } 
    }

    public function checkPlotUser(Request $req)
    {
        if(session()->has('InvoiceAdminID'))
        {
            $plot = $_GET['plot'];
            $phase = $_GET['phase'];
            $user = DB::table('z_invoice_all')
                ->where('plot_no', $plot)
                ->where('phase', $phase)
                ->where('receipt_type', 1)
                ->get();
            if($user)
            {
                return view('Invoice/Dashboard.customerDetails', [
                    'user' => $user
                    ]);
            }
            else
            {
                return false;
            }
        } 
    }

    public function getDetails(Request $req)
    {
        if(session()->has('InvoiceAdminID'))
        {
            $mobile = $_GET['mobile'];
            $user = DB::table('z_invoice_all')
                ->where('mobile', $mobile)
                ->first();
            $userHistory = DB::table('z_invoice_all')
                            ->where('mobile', $mobile)
                            ->orderBy('generated_on', 'desc')
                            ->get();
            $userTotal = DB::table('z_invoice_all')
                            ->where('mobile', $mobile)
                            ->sum('payment_amount');
            if($user)
            {
                return view('Invoice/Dashboard.userDetails', [
                    'user' => $user,
                    'userHistory' => $userHistory,
                    'userTotal' => $userTotal
                    ]);
            }
            else
            {
                return false;
            }
        } 
    }

}
