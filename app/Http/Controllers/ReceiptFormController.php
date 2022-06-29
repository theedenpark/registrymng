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
                'installment_for' => $req->installment_for,
                'receipt_date' => $req->receipt_date,
                'next_installment' => $req->next_installment,
                'receipt_no' => $req->receipt_no,
                'primary_customer' => $req->primary_customer,
                'secondary_customer' => $req->secondary_customer,
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

    public function update(Request $req){
        if(session()->has('InvoiceAdminID'))
        {
            $dataset = [
                'receipt_type' => $req->receipt_type,
                'receipt_date' => $req->receipt_date,
                'next_installment' => $req->next_installment,
                'primary_customer' => $req->primary_customer,
                'secondary_customer' => $req->secondary_customer,
                'plot_no' => $req->plot_no,
                'unit_size' => $req->unit_size,
                'email' => $req->email,
                'mobile' => $req->mobile,
                'address' => $req->address,
                'phase' => $req->phase,
                'unit_price' => $req->unit_price,
                'payment_amount' => $req->payment_amount,
                'amount_words' => $req->amount_words,
                'payment_desc' => $req->payment_desc,
            ];
            $q = DB::table('z_invoice_all')
                ->where('receipt_no', $req->receipt_no)
                ->update($dataset);

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

    public function receipts(Request $req)
    {
        if(session()->has('InvoiceAdminID'))
        {
            $phase = $_GET['phase'];
            $receipts = DB::table('z_invoice_all')
                ->where('phase', $phase)
                ->where('receipt_type', 1)
                ->get();
            if($receipts)
            {
                return view('Invoice/Dashboard.receipts', [
                    'receipts' => $receipts
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
            $receipt = $_GET['receipt'];
            $phase = $_GET['phase'];
            $user = DB::table('z_invoice_all')
                ->where('receipt_no', $receipt)
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
            // $userHistory = DB::table('z_invoice_all')
            //                 ->where('mobile', $mobile)
            //                 ->orderBy('generated_on', 'desc')
            //                 ->get();
            $userTotal = DB::table('z_invoice_all')
                            ->where('mobile', $mobile)
                            ->sum('payment_amount');

            $userBookings = DB::table('z_invoice_all')
                            ->where('mobile', $mobile)
                            ->where('receipt_type', 1)
                            ->orderBy('generated_on', 'desc')
                            ->get();

            $allReceipts = DB::table('z_invoice_all')
                            ->orderBy('generated_on', 'desc')
                            ->get();

            if($user)
            {
                return view('Invoice/Dashboard.userDetails', [
                    'user' => $user,
                    // 'userHistory' => $userHistory,
                    'userTotal' => $userTotal,
                    'userBookings' => $userBookings,
                    'allReceipts' => $allReceipts
                    ]);
            }
            else
            {
                return false;
            }
        } 
    }

}
