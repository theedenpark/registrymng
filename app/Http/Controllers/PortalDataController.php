<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PortalDataController extends Controller
{
    //Add New Property
    public function AddNewProp()
    {
        $allPropTypes = DB::table('property_type')
                        ->where('p_vlg', 1)
                        ->get();
        $PropAcc = DB::table('individual_management')
                        ->where('user_type', 1)
                        ->where('user_status', 1)
                        ->get();
        $Sellers = DB::table('individual_management')
                        ->where('user_type', 3)
                        ->where('user_status', 1)
                        ->get();
        $Witnesses = DB::table('individual_management')
                        ->where('user_type', 5)
                        ->where('user_status', 1)
                        ->get();
        $Agents = DB::table('individual_management')
                        ->where('user_type', 2)
                        ->where('user_status', 1)
                        ->get();
        $Draftmens = DB::table('individual_management')
                        ->where('user_type', 6)
                        ->where('user_status', 1)
                        ->get();
        $allRevVillages = DB::table('revenue_village')->get();
        $allUnits = DB::table('units')->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/PropertyManagement.add-new-property', [
                'allPropTypes' => $allPropTypes,
                'allUnits' => $allUnits,
                'allRevVillages' => $allRevVillages,
                'PropAcc' => $PropAcc,
                'Sellers' => $Sellers,
                'Witnesses' => $Witnesses,
                'Agents' => $Agents,
                'Draftmens' => $Draftmens,
                'allProperties' => $allProperties,
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }

    public function propDetails()
    {
        $id = $_GET['id'];
        $getPropDetails = DB::table('properties')
                        ->leftJoin('khet', 'properties.reg_no', '=', 'khet.p_reg_no')
                        ->get();
        if(session()->has('userId'))
        {
            // return $getPropDetails;
            return view('Dashboard/PropertyManagement.viewPropDetails', [
            'getPropDetails' => $getPropDetails
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }

    public function sellProperty()
    {
        $allRevVillages = DB::table('revenue_village')->get();
        $Buyers = DB::table('individual_management')
                        ->where('user_type', 4)
                        ->where('user_status', 1)
                        ->get();
        $Witnesses = DB::table('individual_management')
                        ->where('user_type', 5)
                        ->where('user_status', 1)
                        ->get();
        $Agents = DB::table('individual_management')
                        ->where('user_type', 2)
                        ->where('user_status', 1)
                        ->get();
        $Draftmens = DB::table('individual_management')
                        ->where('user_type', 6)
                        ->where('user_status', 1)
                        ->get();

        $banks = DB::table('bank_details')->get();

        $allMail = DB::table('individual_management')
        ->where('user_type', 6)
        ->get();

        // Get Data Of All Sold Properties
        $soldProps = DB::table('sold_properties')
                    ->get();

        if(session()->has('userId'))
        {
            return view('Dashboard/PropertyManagement.sellProperty', [
                'allRevVillages' => $allRevVillages,
                'Buyers'=>$Buyers,
                'Witnesses' => $Witnesses,
                'Agents' => $Agents,
                'Draftmens' => $Draftmens,
                'soldProps' => $soldProps,
                'banks' => $banks,
                'allMail' => $allMail
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }

    public function getTehsil()
    {
        $dist = $_GET['dist'];
        $tehsils = DB::table('revenue_village')
            ->where('district', $dist)
            ->groupBy('tehsil')
            ->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/PropertyManagement/DependentData.tehsil', [
            'tehsils' => $tehsils
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }

    public function getVillage()
    {
        $tehsil = $_GET['tehsil'];
        $villages = DB::table('revenue_village')
            ->where('tehsil', $tehsil)
            ->groupBy('village')
            ->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/PropertyManagement/DependentData.village', [
            'villages' => $villages
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }

    //get properties to sell
    public function getPropeties()
    {
        $village = $_GET['village'];
        $tehsil = $_GET['tehsil'];
        $district = $_GET['district'];

        $allProps = DB::table('properties')
                    ->where('p_village', $village)
                    ->where('p_tehsil', $tehsil)
                    ->where('p_district', $district)
                    ->leftJoin('khet', 'properties.reg_no', '=', 'khet.p_reg_no')
                    ->get();

        if(session()->has('userId'))
        {
            return view('Dashboard/PropertyManagement/DependentData.availableProperties', [
            'allProps' => $allProps
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }

    public function soldPropDetails()
    {
        $getPropDetails = DB::table('sold_properties')->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/PropertyManagement.soldPropDetails', [
            'getPropDetails' => $getPropDetails
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }

    public function DetailsForMail()
    {
        $id = $_GET['id'];
        $DetailsForMail = DB::table('sold_properties')->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/PropertyManagement.DetailsForMail', [
            'DetailsForMail' => $DetailsForMail
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }

    public function combineProperty()
    {
        $properties = DB::table('properties')
                    ->get();
        $combinedProperties = DB::table('combined_properties')
                    ->get();           
        if(session()->has('userId'))
        {
            return view('Dashboard/PropertyManagement.combineProperties', [
                'properties' => $properties,
                'combinedProperties' => $combinedProperties,
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }

    //Property Type
    public function PropertyType()
    {
        $allPropTypes = DB::table('property_type')->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/Settings.property-type', [
                'allPropTypes' => $allPropTypes
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }
    //Document Type
    public function DocumentType()
    {
        $allDocTypes = DB::table('document_type')->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/Settings.document-type', [
                'allDocTypes' => $allDocTypes
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }
    //Banks
    public function Banks()
    {
        $banks = DB::table('banks')->get();
        $bankUsers = DB::table('bank_details')
                    ->orderBy('bank_name', 'ASC')
                    ->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/Settings.banks', [
                'banks' => $banks,
                'bankUsers' => $bankUsers
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }
    //Units
    public function units()
    {
        $allUnits = DB::table('units')->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/Settings.units', [
                'allUnits' => $allUnits
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }
    //Revenue Village
    public function revenueVillage()
    {
        $allReveneueVillage = DB::table('revenue_village')->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/Settings.revenue-village', [
                'allReveneueVillage' => $allReveneueVillage
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }
    //Add New User
    public function addNewUser()
    {
        $allUsers = DB::table('user_table')->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/UserManagement.add-new-user', [
                'allUsers' => $allUsers
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }
    //Property Accounts
    public function propAccounts()
    {
        $Users = DB::table('individual_management')
                ->where('user_type', 1)
                ->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/IndividualManagement.property-accounts', [
                'Users'=>$Users
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }
    //Agents Accounts
    public function agents()
    {
        $Users = DB::table('individual_management')
                ->where('user_type', 2)
                ->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/IndividualManagement.agents', [
                'Users'=>$Users
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }
    //Sellers Accounts
    public function sellers()
    {
        $Users = DB::table('individual_management')
                ->where('user_type', 3)
                ->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/IndividualManagement.sellers', [
                'Users'=>$Users
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }
    //Buyers Accounts
    public function buyers()
    {
        $Users = DB::table('individual_management')
                ->where('user_type', 4)
                ->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/IndividualManagement.buyers', [
                'Users'=>$Users
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }
    //Witness Accounts
    public function witness()
    {
        $Users = DB::table('individual_management')
                ->where('user_type', 5)
                ->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/IndividualManagement.witness', [
                'Users'=>$Users
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }
    //Draftmen Accounts
    public function draftmens()
    {
        $Users = DB::table('individual_management')
                ->where('user_type', 6)
                ->get();
        if(session()->has('userId'))
        {
            return view('Dashboard/IndividualManagement.draftmens', [
                'Users'=>$Users
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }

    //Backup
    public function backup()
    {
        if(session()->has('userId'))
        {
            $data = DB::table('backup_history')
                    ->orderBy('generated_on', 'DESC')
                    ->get();
            return view('Dashboard/Settings.Backup', [
                'data'=>$data
            ]);
        }
        else
        {
            return Redirect('/');
        }
    }

    //Acitvity Log
    public function activityLog()
    {
        if(session('userType') == 1)
        {
            $logs = DB::table('login_activity')
                    ->orderBy('generated_at', 'DESC')
                    ->get();
            return view('Dashboard/UserManagement.ActivityLog', [
                'logs'=>$logs
            ]);
        }
        elseif(session('userType') == 2)
        {
            $user = session('userId');
            $logs = DB::table('login_activity')
                    ->where('user_id', $user)
                    ->orderBy('generated_at', 'DESC')
                    ->get();
            return view('Dashboard/UserManagement.ActivityLog', [
                'logs'=>$logs
            ]);
        }
    }
}
