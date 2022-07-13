<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request, DB;

class EmployeeFormController extends Controller
{
    public function addGroup(Request $req){
        if(session()->has('InvoiceAdminID'))
        {
            $dataset = [
                'group_name' => $req->group_name
            ];
            $q = DB::table('x_groups')
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

    public function addEmployee(Request $req){
        if(session()->has('InvoiceAdminID'))
        {
            $dataset = [
                'e_name' => $req->e_name,
                'e_email' => $req->e_email,
                'e_mobile' => $req->e_mobile,
                'group_id' => $req->group_id,
                'percentage_share' => $req->percentage_share,
                'joined_on' => $req->joined_on
            ];
            $q = DB::table('x_employee')
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
}
