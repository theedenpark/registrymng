<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request, DB;

class PropertyController extends Controller
{
    public function addProperty()
    {
        $allPropTypes = DB::table('property_type')
                    ->where('p_vlg', 1)
                    ->get();

        $allUnits = DB::table('units')->get();

        return view('Dashboard.PropertyManagement.addProperty',[
            'allPropTypes' => $allPropTypes,
            'allUnits' => $allUnits
        ]);
    }

    public function listProps()
    {
        $allProperties = DB::table('properties')
                        ->orderBy('added_on', 'desc')
                        ->get();

        return view('Dashboard.PropertyManagement.allProperties', [
            'allProperties' => $allProperties
        ]);
    }

    public function checkReg()
    {
        $reg_no = $_GET['reg_no'];
        $jild_no = $_GET['jild_no'];
        $page_no = $_GET['page_no'];
        $q = DB::table('properties')
            ->where('reg_no', $reg_no)
            ->where('jild_no', $jild_no)
            ->where('page_no', $page_no)
            ->count();
        if($q > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function individual()
    {
        $user_type = $_GET['user_type'];
        $q = DB::table('individual_management')
            ->where('user_type', $user_type)
            ->get();

        return view('Dashboard.PropertyManagement.selectIndividual', [
            'data' => $q,
        ]);
    }

    public function addMyProperty(Request $req)
    {
        // $path = "reg/purchased";
        // $idProof = $req->file('reg_file');
        // if($idProof == "")
        // {
        //     $reg_file = 0;
        // }
        // else
        // {
        //     $extensionFS = $idProof->getClientOriginalName();
        //     $reg_file = $req->long_lat.$extensionFS;
        //     $reg_file = $idProof->move($path, $reg_file);
        // }

        $seller_id = isset($req->seller_id) && is_array($req->seller_id) ? $req->seller_id : [];
        $witness_id = isset($req->witness_id) && is_array($req->witness_id) ? $req->witness_id : [];
        $pay_mode = isset($req->pay_mode) && is_array($req->pay_mode) ? $req->pay_mode : [];
        $pay_mode_amount = isset($req->pay_mode_amount) && is_array($req->pay_mode_amount) ? $req->pay_mode_amount : [];
        $transaction_id = isset($req->transaction_id) && is_array($req->transaction_id) ? $req->transaction_id : [];

        $basra_no = $req->basra_no;
        $khata_no = $req->khata_no;
        $khet_no = $req->khet_no;
        $khet_area = $req->khet_area;
        $madhya = $req->madhya;
        $seller_id = implode(', ', $seller_id);
        $witness_id = implode(', ', $witness_id);
        $pay_mode = implode(', ', $pay_mode);
        $pay_mode_amount = implode(', ', $pay_mode_amount);
        $transaction_id = implode(', ', $transaction_id);

        foreach($khet_no as $key=>$insert)
        {
            $dataset = [
                'basra_no' => $basra_no[$key],
                'khata_no' => $khata_no[$key],
                'khet_no' => $khet_no[$key],
                'khet_area' => $khet_area[$key],
                'madhya' => $madhya[$key],
                'p_reg_no' => $req->reg_no
            ];
            DB::table('khet')->insert($dataset);
        }

        $dataImport = [
            "prop_acq_status" => $req->prop_acq_status,
            "prop_type_id" => $req->prop_type_id,
            "prop_name" => $req->prop_name,
            "prop_location" => $req->prop_location,
            "road_conn" => $req->road_conn,
            "p_state" => $req->p_state,
            "p_district" => $req->p_district,
            "p_tehsil" => $req->p_tehsil,
            "p_village" => $req->p_village,
            "pin" => $req->pin,
            "long_lat" => $req->long_lat,
            "landmark" => $req->landmark,
            "prop_acc" => $req->prop_acc,
            "seller_id" => $seller_id,
            "witness1_id" => $witness_id,
            "date_of_reg" => $req->date_of_reg,
            "reg_no" => $req->reg_no,
            "jild_no" => $req->jild_no,
            "page_no" => $req->page_no,
            "actual_value" => $req->actual_value,
            "reg_value" => $req->reg_value,
            "return_rate" => $req->return_rate,
            "reg_val_unit" => $req->reg_val_unit,
            "cancellation_terms" => $req->cancellation_terms,
            "agent_id" => $req->agent_id,
            "agent_exp" => $req->agent_exp,
            "draftmen_id" => $req->draftmen_id,
            "draftmen_exp" => $req->draftmen_exp,
            "stamp_duty" => $req->stamp_duty,
            "reg_fees" => $req->reg_fees,
            "electronic_files" => $req->electronic_files,
            "electronic_files_fee" => $req->electronic_files_fee,
            "description" => $req->description,
            "deposit_date" => $req->deposit_date,
            "total_amount" => $req->total_amount,
            "pay_mode" => $pay_mode,
            "pay_mode_amount" => $pay_mode_amount,
            "transaction_id" => $transaction_id,
            "pay_desc" => $req->pay_desc,
            // "reg_file" => $reg_file
        ];

        $query = DB::table('properties')->insert($dataImport);

        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
}
