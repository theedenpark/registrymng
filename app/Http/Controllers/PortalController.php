<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ZipArchive;
use File;

class PortalController extends Controller
{
    public function home()
    {
        if(session()->has('userId'))
        {
            $addedProps = DB::table('properties')->count();

            $combinedProps = DB::table('combined_properties')->count();

            $soldProps = DB::table('sold_properties')->count();

            $propAcc = DB::table('individual_management')->where('user_type', 1)->count();

            $agentAcc = DB::table('individual_management')->where('user_type', 2)->count();

            $sellerAcc = DB::table('individual_management')->where('user_type', 3)->count();

            $buyerAcc = DB::table('individual_management')->where('user_type', 4)->count();

            $witnessAcc = DB::table('individual_management')->where('user_type', 5)->count();

            $draftmenAcc = DB::table('individual_management')->where('user_type', 6)->count();

            $banksAcc = DB::table('bank_details')->where('user_status', 1)->count();

            $docType = DB::table('document_type')->count();

            $propType = DB::table('property_type')->count();

            $revVill = DB::table('revenue_village')->count();

            $units = DB::table('units')->count();

            $totalPurchasedArea = DB::table('khet')->sum('khet_area');
            $totalSoldArea = DB::table('sold_khet')->sum('sold_area');
            $totalPurchaseValue = DB::table('properties')->sum('total_amount');
            $totalSoldValue = DB::table('sold_properties')->sum('s_total_amount');

            return view('Dashboard.dashData', [
                'addedProps' => $addedProps,
                'combinedProps' => $combinedProps,
                'soldProps' => $soldProps,
                'propAcc' => $propAcc,
                'agentAcc' => $agentAcc,
                'buyerAcc' => $buyerAcc,
                'draftmenAcc' => $draftmenAcc,
                'sellerAcc' => $sellerAcc,
                'witnessAcc' => $witnessAcc,
                'banksAcc' => $banksAcc,
                'docType' => $docType,
                'propType' => $propType,
                'revVill' => $revVill,
                'units' => $units,
                'totalPurchasedArea' => $totalPurchasedArea,
                'totalSoldArea' => $totalSoldArea,
                'totalPurchaseValue' => $totalPurchaseValue,
                'totalSoldValue' => $totalSoldValue,
            ]);
        }
        else
        {
            return view('login');
        }
    }

    public function logout()
    {
        if(session()->has('userId'))
        {
            $logout_log = DB::table('login_activity')->insert([
                'user_id' => session()->get('userId'),
                'activity_type' => 2
            ]);
            if($logout_log)
            {
                session()->pull('userId');
                session()->pull('userName');
                session()->pull('userType');
                session()->pull('theme');
                return redirect('/');
            }
        }
        else
        {
            return redirect('/');
        }
    }

    public function changeTheme(Request $req)
    {
        $email = session()->get('userId');
        $theme = $req->theme;
        $query = DB::table('user_table')
                ->where('email', $email)
                ->update(['theme'=>$theme]);
        if($query)
        {
            if(session()->put('theme', $theme))
            return true;
        }
    }

    public function addNewProperty(Request $req)
    {
        
        $path = "reg/purchased";
        $idProof = $req->file('reg_file');
        if($idProof == "")
        {
            $reg_file = 0;
        }
        else
        {
            $extensionFS = $idProof->getClientOriginalName();
            $reg_file = $req->long_lat.$extensionFS;
            $reg_file = $idProof->move($path, $reg_file);
        }

        $basra_no = $req->basra_no;
        $khata_no = $req->khata_no;
        $khet_no = $req->khet_no;
        $khet_area = $req->khet_area;
        $seller_id = implode(', ', $req->seller_id);
        $witness_id = implode(', ', $req->witness_id);
        $pay_mode = implode(', ', $req->pay_mode);
        $pay_mode_amount = implode(', ', $req->pay_mode_amount);
        $transaction_id = implode(', ', $req->transaction_id);

        foreach($khet_no as $key=>$insert)
        {
            $dataset = [
                'basra_no' => $basra_no[$key],
                'khata_no' => $khata_no[$key],
                'khet_no' => $khet_no[$key],
                'khet_area' => $khet_area[$key],
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
            "reg_file" => $reg_file
        ];

        $query = DB::table('properties')->insert($dataImport);

        if($query)
        {
            return redirect()->back()->with('message', 'Added Successfully!');
        }
        else
        {
            return redirect()->back()->with('message', 'Error Occured');
        }

    }

    public function addPropertyType(Request $req)
    {
        $addPropType = DB::table('property_type')->insert([
            'property_type'=>$req->property_name
        ]);
        if($addPropType)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function addDocumentType(Request $req)
    {
        $addDocType = DB::table('document_type')->insert([
            'document_type'=>$req->document_name
        ]);
        if($addDocType)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function addNewBankUser(Request $req)
    {
        $addNewBankUser = DB::table('bank_details')->insert([
            'bank_name'=>$req->bank_name,
            'acc_name'=>$req->acc_name,
            'acc_number'=>$req->acc_number,
            'bank_ifsc'=>$req->bank_ifsc,
        ]);
        if($addNewBankUser)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function addNewUnit(Request $req)
    {
        $addNewUnit = DB::table('units')->insert([
            'unit_name'=>$req->unit_name,
            'unit_value'=>$req->unit_value
        ]);
        if($addNewUnit)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function addPortalUser(Request $req)
    {
        $addNewUser = DB::table('user_table')->insert([
            'username'=>$req->username,
            'email'=>$req->email,
            'password'=>$req->password,
            'user_type'=>$req->user_type
        ]);
        if($addNewUser)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function addRevenueVillage(Request $req)
    {
        $addRevenueVillage = DB::table('revenue_village')->insert([
            'village'=>$req->village,
            'tehsil'=>$req->tehsil,
            'district'=>$req->district,
            'state'=>$req->state
        ]);
        if($addRevenueVillage)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function addNewAcc(Request $req)
    {
        $path = "IndividualAccountID/";
        // File::makeDirectory($path, $mode = 0777, true, true);

        $idProof = $req->file('id_proof');
        $extensionFS = $idProof->getClientOriginalName();
        // $fileWithoutExtFS  = str_replace(".","",basename($idProof, $extensionFS));  
        // $updated_ID = $fileWithoutExtFS."_".rand(0,99).".".$extensionFS;

        $newname = $req->username.$req->mobile.'.png';
        $idProof_certificate = $idProof->move($path, $newname);

        $query = DB::table('individual_management')
                ->insert([
                    'aadhar_no'=>$req->aadhar,
                    'email'=>$req->email,
                    'username'=>$req->username,
                    'mobile'=>$req->mobile,
                    'gender'=>$req->gender,
                    'dob'=>$req->dob,
                    'address'=>$req->address,
                    'city'=>$req->city,
                    'state'=>$req->state,
                    'pin'=>$req->pin,
                    'user_type'=>$req->user_type,
                    'user_status'=>1,
                    'id_proof'=>$idProof_certificate
                ]);

        if($query)
        {
            return redirect()->back()->with('message', 'Added Successfully!');
        }
        else
        {
            return redirect()->back()->with('message', 'Error Occured');
        }
    }

    public function sellNewProperty(Request $req)
    {
        $khetId = $req->khet_id;

        
        
        //for sold properties table
        $buyers = implode(', ', $req->buyer_id);
        $witnesses = implode(', ', $req->witness_id);
        $pay_mode = implode(', ', $req->pay_mode);
        $pay_mode_amount = implode(', ', $req->pay_mode_amount);
        $transaction_id = implode(', ', $req->transaction_id);
        
        //insert in sold khet table
        $basra = $req->basra_no;
        $khet = $req->khet_no;
        $prev = $req->prev_area;
        $sold = $req->sold_area;

        foreach($khet as $key=>$insert)
        {
            $store = [
                'sk_basra_no' => $basra[$key],
                'sk_khet_no' => $khet[$key],
                'prev_area' => $prev[$key],
                'sold_area' => $sold[$key]
            ];
            DB::table('sold_khet')->insert($store);
        }

        //update remaining area in khet table
        $remArea = $req->rem_area;
        foreach($khetId as $key=>$update)
        {
            DB::table('khet')
            ->where('khet_id', $khetId[$key])
            ->update([
                'khet_area' => $remArea[$key]
            ]);
        }

        $basraforSoldTable = implode(', ',$basra);
        $khetforSoldTable = implode(', ',$khet);
        $dataset = [
            "s_basra_no" => $basraforSoldTable,
            "s_khet_no" => $khetforSoldTable,
            "sold_area" => $req->total_sold_area,
            "s_buyer_id" => $buyers,
            "s_state" => $req->s_state,
            "s_district" => $req->s_district,
            "s_tehsil" => $req->s_tehsil,
            "s_village" => $req->s_village,
            "witnesses" => $witnesses,
            "s_return_rate" => $req->return_rate,
            "s_ret_val_unit" => $req->ret_val_unit,
            "s_cancellation_terms" => $req->cancellation_terms,
            "s_agent_id" => $req->agent_id,
            "s_agent_exp" => $req->agent_exp,
            "s_draftmen_id" => $req->draftmen_id,
            "s_draftmen_exp" => $req->draftmen_exp,
            "s_stamp_duty" => $req->stamp_duty,
            "s_reg_fees" => $req->reg_fees,
            "s_electronic_files" => $req->electronic_files,
            "s_electronic_files_fee" => $req->electronic_files_fee,
            "s_description" => $req->description,
            "s_deposit_date" => $req->deposit_date,
            "s_total_amount" => $req->total_amount,
            "s_bank_detail_id" => $req->bank_detail_id,
            "s_pay_mode" => $pay_mode,
            "s_pay_mode_amount" => $pay_mode_amount,
            "s_transaction_id" => $transaction_id,
            "s_pay_desc" => $req->pay_desc,
        ];

        $query = DB::table('sold_properties')->insert($dataset);

        if($query)
        {
            return redirect()->back()->with('message', 'Added Successfully!');
        }
        else
        {
            return redirect()->back()->with('message', 'Error Occured');
        }
    }

    public function combineNewProperty(Request $req)
    {
        $prop_ids = json_encode($req->prop_ids);
        $c_khet_no = json_encode($req->c_khet_no);
        $query = DB::table('combined_properties')->insert([
            'prop_ids' => $prop_ids,
            'c_khet_no' => $c_khet_no,
        ]);
        if($query)
        {
            return redirect()->back()->with('message', 'Combined Successfully!');
        }
        else
        {
            return redirect()->back()->with('message', 'Error Occured');
        }
    }

    public function pBackup(Request $req)
    {
        $query = DB::table('backup_history')->insert([
                'backup_type' => $req->backup_type,
                'user_id' => $req->user
        ]);
        if($query)
        {
            $zip = new ZipArchive;
            $filename = 'purchased_backup.zip';

            if($zip->open(public_path($filename), ZipArchive::CREATE) === TRUE)
            {
                $files = File::files(public_path('reg/purchased'));
                foreach($files as $key => $value)
                {
                    $relativeNameInZipFile = basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }
                $zip->close();
            }
            return response()->download(public_path($filename));
        }
        else
        {
            return false;
        }
    }

    public function sBackup(Request $req)
    {
        $query = DB::table('backup_history')->insert([
                'backup_type' => $req->backup_type,
                'user_id' => $req->user
        ]);
        if($query)
        {
            $zip = new ZipArchive;
            $filename = 'sold_backup.zip';

            if($zip->open(public_path($filename), ZipArchive::CREATE) === TRUE)
            {
                $files = File::files(public_path('reg/sold'));
                foreach($files as $key => $value)
                {
                    $relativeNameInZipFile = basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }
                $zip->close();
            }
            return response()->download(public_path($filename));
        }
        else
        {
            return false;
        }
    }

    public function updateSoldReg(Request $req)
    {
        $id = $req->sold_id;
        $path = "reg/sold";
        $idProof = $req->file('reg_file');
        if($idProof == "")
        {
            $reg_file = 0;
        }
        else
        {
            $extensionFS = $idProof->getClientOriginalName();
            $reg_file = $req->long_lat.$extensionFS;
            $reg_file = $idProof->move($path, $reg_file);
        }
        $q = DB::table('sold_properties')
            ->where('sold_id', $id)
            ->update([
                's_reg_file' => $reg_file
            ]);
        if($q)
        {
            return redirect()->back()->with('message', 'Uploaded Successfully.');
        }
        else
        {
            return redirect()->back()->with('message', 'Oops! Error Occured.');
        }
    }

    public function uploadMyRegBtn(Request $req)
    {
        $id = $req->prop_id;
        $path = "reg/purchased";
        $idProof = $req->file('reg_file');
        if($idProof == "")
        {
            $reg_file = 0;
        }
        else
        {
            $extensionFS = $idProof->getClientOriginalName();
            $reg_file = $req->long_lat.$extensionFS;
            $reg_file = $idProof->move($path, $reg_file);
        }
        $q = DB::table('properties')
            ->where('prop_id', $id)
            ->update([
                'reg_file' => $reg_file
            ]);
        if($q)
        {
            return redirect()->back()->with('message', 'Uploaded Successfully.');
        }
        else
        {
            return redirect()->back()->with('message', 'Oops! Error Occured.');
        }
    }
}
