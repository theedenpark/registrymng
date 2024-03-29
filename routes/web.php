<?php

use App\Http\Controllers\PortalController;
use App\Http\Controllers\PortalDataController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeFormController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserLogin;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', [PortalController::class, 'home']);
    Route::post('/login', [UserLogin::class, 'login']);
    
    Route::get('/logout', [PortalController::class, 'logout']);

    //// theme ////
    Route::post('/changeTheme', [PortalController::class, 'changeTheme']);

    // Dashboard //

    ////////////////////////// Property Management ///////////////////////////

    Route::get('/add-new-property', [PropertyController::class, 'addProperty']);
    Route::get('/listProps', [PropertyController::class, 'listProps']);
    Route::get('/checkReg', [PropertyController::class, 'checkReg']);
    Route::get('/individual', [PropertyController::class, 'individual']);
    Route::post('/addMyProperty', [PropertyController::class, 'addMyProperty']);
    Route::get('/changeIndividual', [PropertyController::class, 'changeIndividual']);


    //Add or View Property
    // Route::get('/add-new-property', [PortalDataController::class, 'AddNewProp']);
    Route::get('/propDetails', [PortalDataController::class, 'propDetails']);
    
    //update Added registry
    Route::post('/uploadMyRegBtn', [PortalController::class, 'uploadMyRegBtn']);
    //update 143
    Route::post('/uploadoft', [PortalController::class, 'uploadoft']);

    //Sell Properties
    Route::get('/sell-property', [PortalDataController::class, 'sellProperty']);
    Route::post('/sellNewProperty', [PortalController::class, 'sellNewProperty']);
    Route::get('/soldPropDetails', [PortalDataController::class, 'soldPropDetails']);
    Route::get('/DetailsForMail', [PortalDataController::class, 'DetailsForMail']);
    Route::post('/store', [MailController::class, 'store']);

    Route::get('/getTehsil', [PortalDataController::class, 'getTehsil']);
    Route::get('/getVillage', [PortalDataController::class, 'getVillage']);
    Route::get('/getPropeties', [PortalDataController::class, 'getPropeties']);

    //update sold registry
    Route::post('/updateSoldReg', [PortalController::class, 'updateSoldReg']);

    //Combine Properties
    Route::get('/combine-property', [PortalDataController::class, 'combineProperty']);
    Route::post('/combineNewProperty', [PortalController::class, 'combineNewProperty']);
         
    ///////////////////// Individual Management ////////////////////

    //add new account
    Route::post('/addNewAcc', [PortalController::class, 'addNewAcc']);

    Route::get('/property-accounts', [PortalDataController::class, 'propAccounts']);
    Route::get('/agents', [PortalDataController::class, 'agents']);
    Route::get('/sellers', [PortalDataController::class, 'sellers']);
    Route::get('/buyers', [PortalDataController::class, 'buyers']);
    Route::get('/witness', [PortalDataController::class, 'witness']);
    Route::get('/draftmens', [PortalDataController::class, 'draftmens']);


    ///////////////////////////////// Settings ////////////////////////////////

    //Property Type
    Route::get('/property-type', [PortalDataController::class, 'PropertyType']);
    Route::post('/addNewPropType', [PortalController::class, 'addPropertyType']);

    //Document Type
    Route::get('/document-type', [PortalDataController::class, 'DocumentType']);
    Route::post('/addNewDocType', [PortalController::class, 'addDocumentType']);

    //Banks
    Route::get('/banks', [PortalDataController::class, 'Banks']);
    Route::post('/addNewBankUser', [PortalController::class, 'addNewBankUser']);

    //Units
    Route::get('/units-management', [PortalDataController::class, 'Units']);
    Route::post('/addNewUnit', [PortalController::class, 'addNewUnit']);
    
    //Revenue Village
    Route::get('/revenue-village', [PortalDataController::class, 'revenueVillage']);
    Route::post('/addRevenueVillage', [PortalController::class, 'addRevenueVillage']);
 
    //Backup
    Route::get('/backup', [PortalDataController::class, 'backup']);
    Route::post('/newBackup', [PortalController::class, 'newBackup']);
    
    //////////////////////////// User Management //////////////////////////////
    //Add new user
    Route::get('/add-new-user', [PortalDataController::class, 'addNewUser']);
    Route::post('/addPortalUser', [PortalController::class, 'addPortalUser']);

    ///////zip /////////
    Route::post('/pBackup', [PortalController::class, 'pBackup']);
    Route::post('/sBackup', [PortalController::class, 'sBackup']);

    /////// activity log ///////////
    Route::get('/activity-log', [PortalDataController::class, 'activityLog']);
    
});

Route::prefix('/employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'Home']);
    Route::get('/all', [EmployeeController::class, 'all']);
    Route::get('/groups', [EmployeeController::class, 'Groups']);

    //forms
    Route::post('/addGroup', [EmployeeFormController::class, 'addGroup']);
    Route::post('/addEmployee', [EmployeeFormController::class, 'addEmployee']);

});