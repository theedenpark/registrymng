<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request, DB;

class EmployeeController extends Controller
{
    public function Home(){
        if(session()->has('InvoiceAdminID'))
        {
            return view('/Employee.dashboard');
        }
        else
        {
            return view('/Invoice.index');
        }
    }
    public function Groups(){
        if(session()->has('InvoiceAdminID'))
        {
            $groups = DB::table('x_groups')
                    ->get();
            return view('/Employee.groups', [
                'groups' => $groups
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
            $employees = DB::table('x_employee')
                    ->get();
            $groups = DB::table('x_groups')
                    ->get();
            return view('/Employee.employees', [
                'employees' => $employees,
                'groups' => $groups
            ]);
        }
        else
        {
            return view('/Invoice.index');
        }
    }
}
