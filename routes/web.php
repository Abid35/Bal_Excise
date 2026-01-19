<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterVehicleController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\AlterationController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\GetDataController;
use App\Http\Controllers\NBIController;
use App\Http\Controllers\NewNoPlateController;
use App\Http\Controllers\RoutePermitController;
use App\Http\Controllers\StolenVehicleController;
use App\Models\register;
use App\Http\Controllers\NOCController;
use App\Http\Controllers\ArrivalController;
use App\Http\Controllers\EtauserController;
use App\Http\Controllers\ETOLocationController;
use App\Http\Controllers\JurisdictionController;
use App\Http\Controllers\TypeofBodyController;
use App\Http\Controllers\CategoryOfVehicleController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\SmartCardRequestController;
use App\Http\Controllers\VanityPlateController;
use App\Http\Controllers\UnregisteredNumberController;
use App\Http\Controllers\NumberPatternController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\FilerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return redirect(route('login'));
});

Auth::routes();


Route::middleware(['auth'])->group(function () {

    Route::resource('etausers', 'App\Http\Controllers\EtauserController');

    Route::get('eto/locations/create', [ETOLocationController::class, 'create'])->name('eto.location.create');
    Route::post('eto/locations/create', [ETOLocationController::class, 'store']);

    Route::get('jurisdiction/create', [JurisdictionController::class, 'create'])->name('jurisdiction.create');
    Route::post('jurisdiction/create', [JurisdictionController::class, 'store']);

    Route::get('typeofbody/create', [TypeofBodyController::class, 'create'])->name('typeofbody.create');
    Route::post('typeofbody/create', [TypeofBodyController::class, 'store']);

    Route::get('categoryofvehicle/create', [CategoryOfVehicleController::class, 'create'])->name('categoryofvehicle.create');
    Route::post('categoryofvehicle/create', [CategoryOfVehicleController::class, 'store']);


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/new_registration', RegisterVehicleController::class)->middleware('role');

    Route::get('/combinedata',  [App\Http\Controllers\RegisterVehicleController::class, 'combinedata'])->middleware('role');


    Route::resource('/procurement', ProcurementController::class)->middleware('role');

    Route::get('/DEO/{type}', [App\Http\Controllers\GetDataController::class, 'data'])->middleware('role');

    Route::get('/CheckChassisNo', [App\Http\Controllers\GetDataController::class, 'CheckChassisNo'])->middleware('role');

    Route::any('/Search', [App\Http\Controllers\RegisterVehicleController::class, 'Search'])->middleware('role');

    Route::resource('/alteration', AlterationController::class)->middleware('role');

// Route::resource('/arrival', ArrivalController::class)->middleware('role');

    Route::resource('/transfer', TransferController::class)->middleware('role');

    Route::resource('/voucher', VoucherController::class)->middleware('role');

    Route::post('/SaveExcludedTax', [App\Http\Controllers\VoucherController::class, 'SaveExcludedTax'])->middleware('role');

    Route::post('/old_record', [App\Http\Controllers\VoucherController::class, 'old_record'])->name('old_record')->middleware('role');

    Route::get('/vehicle-info', [App\Http\Controllers\VoucherController::class, 'new_voucher'])->name('new_voucher')->middleware('role');


    Route::post('/conversion_save', [App\Http\Controllers\SendDataController::class, 'conversion'])->middleware('role');

    Route::post('/cancellation_save', [App\Http\Controllers\SendDataController::class, 'cancellation'])->middleware('role');

    Route::post('/AddCloseForTranscation', [App\Http\Controllers\SendDataController::class, 'AddCloseForTranscation'])->middleware('role');


    Route::get('/Conversion', [App\Http\Controllers\GetDataController::class, 'conversion_get'])->middleware('role');

    Route::get('/bank', [App\Http\Controllers\GetDataController::class, 'bank'])->middleware('role');

    Route::get('/banksearch/{registration_no}', [App\Http\Controllers\GetDataController::class, 'banksearch'])->middleware('role');


    Route::get('/paid/{id}', [App\Http\Controllers\VoucherController::class, 'paid'])->middleware('role');



    Route::get('/Cancellation', [App\Http\Controllers\GetDataController::class, 'cancellation_get'])->middleware('role');

    Route::resource('/NBI', NBIController::class)->middleware('role');

    Route::resource('/NPI', RoutePermitController::class)->middleware('role');

    Route::resource('/StolenVehicle', StolenVehicleController::class)->middleware('role');

    Route::resource('/NNPI', NewNoPlateController::class)->middleware('role');

    Route::resource('/NOC', NOCController::class)->middleware('role');

    Route::resource('/Arrival', ArrivalController::class)->middleware('role');

    Route::get('/tax321', [App\Http\Controllers\TaxController::class, 'tax'])->middleware('role');

    Route::get('/exist', [App\Http\Controllers\TaxController::class, 'exist'])->middleware('role');

    Route::get('/para/{table}/{value}/{type}', [App\Http\Controllers\TaxController::class, 'get_para'])->middleware('role');

    Route::get('/StolenVehicle/{id}/recover', [App\Http\Controllers\StolenVehicleController::class, 'recover'])->middleware('role');


    Route::post('/tax_val', [App\Http\Controllers\TaxController::class, 'tax_val'])->middleware('role');

    Route::get('/check_dup', [App\Http\Controllers\RegisterVehicleController::class, 'check_dup'])->middleware('role');

    Route::get('/settrans', [App\Http\Controllers\RegisterVehicleController::class, 'settrans'])->middleware('role');


    Route::post('/tax_dis', [App\Http\Controllers\TaxController::class, 'tax_dis'])->middleware('role');

    Route::get('/senddata', [App\Http\Controllers\SendDataController::class, 'senddata'])->middleware('role');

    Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->middleware('role');
    Route::get('/history/store', [App\Http\Controllers\HistoryController::class, 'store'])->middleware('role');


    Route::get('/smart-cards', [SmartCardRequestController::class, 'index'])->name('smart-cards.index');
    Route::get('/smart-cards/create', [SmartCardRequestController::class, 'create'])->name('smart-cards.create');
    Route::post('/smart-cards', [SmartCardRequestController::class, 'store'])->name('smart-cards.store');
    Route::get('/smart-cards/{id}/edit', [SmartCardRequestController::class, 'edit'])->name('smart-cards.edit');
    Route::put('/smart-cards/{id}', [SmartCardRequestController::class, 'update']);
    Route::delete('/smart-cards/{id}', [SmartCardRequestController::class, 'destroy'])->name('smart-cards.destroy');
    Route::post('/smart-cards/verify', [SmartCardRequestController::class, 'verify'])->name('smart-cards.verify');

// ----------------------------------------

    Route::get('/add_conversion', function () {
        return view('Conversion/add_conversion');
    })->middleware('role');


    Route::get('/add_Cancellation', function () {
        return view('Cancellation/add_Cancellation');
    })->middleware('role');

    Route::get('/oldrecord_voucher', function () {
        return view('voucher_management/oldrecord_voucher');
    })->middleware('role');

    Route::get('/CFT', function () {
        $data=register::where('vehicle_status',0)->latest('id')->paginate(10);
        return view('CloseForTransection/CFT')->with('data', $data);
    })->middleware('role');

    Route::get('/add_CFT', function () {
        return view('CloseForTransection/add_CFT');
    })->middleware('role');



    // ----------------------------------------

    //ultrasoft changes
    // route to call vouchercontroller getchallandata
    Route::get('/voucher/challan/{id}', [VoucherController::class, 'getChallanData'])->name('voucher.print.challan');

    // route for vehicle taxes report view and excel export
    Route::get('reports/index', [ReportController::class, 'index'])->name('reports.index');
    Route::post('reports/export', [ReportController::class, 'exportReport'])->name('reports.export');
    Route::get('reports/generate', [ReportController::class, 'generateReport'])->name('reports.generate');

    //add change password button route for etausers view
    Route::get('etausers/{id}/change-password', [EtauserController::class, 'changePasswordForm'])
        ->name('etausers.changePasswordForm');
    Route::post('etausers/{id}/change-password', [EtauserController::class, 'changePassword'])
        ->name('etausers.changePassword');

    //route for forcefully change password when new user created by admin
//    Route::middleware('auth')->group(function () {
        Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
        Route::post('/change-password', [ChangePasswordController::class, 'updatePassword'])->name('password.update');
//    });

    //route for montly filer/non-filer report view and excel export
    Route::get('filer/index', [FilerController::class, 'index'])->name('filer.index');
    Route::get('filer/generate', [FilerController::class, 'generateReport'])->name('filer.generate');
    Route::post('filer/export', [FilerController::class, 'exportExcel'])->name('filer.export');
    Route::get('/filer/body-types-by-district', [FilerController::class, 'getBodyTypesByDistrict'])->name('filer.bodyTypesByDistrict');

    //route for active vehicle status check by cnic
    Route::get('/CheckCnic', [App\Http\Controllers\GetDataController::class, 'CheckCnic'])->middleware('role');
    Route::match(['get', 'post'], 'SearchCnic', [RegisterVehicleController::class, 'SearchCnic'])->middleware('role');




    Route::prefix('vanity')->name('vanity.')->group(function () {
        Route::get('/', [VanityPlateController::class, 'index'])->name('index');
        Route::get('/create', [VanityPlateController::class, 'create'])->name('create');
        Route::post('/store', [VanityPlateController::class, 'store'])->name('store');
        Route::get('/vanity-plates/{id}/edit', [VanityPlateController::class, 'edit'])->name('edit');
        Route::put('/{vanity}', [VanityPlateController::class, 'update'])->name('update');
        Route::delete('/{vanity}', [VanityPlateController::class, 'destroy'])->name('destroy');
    });

    Route::get('/unregistered-numbers', [UnregisteredNumberController::class, 'index'])->name('unregistered.index');
    Route::post('/search-vehicle-cnic', [UnregisteredNumberController::class, 'searchByCnic'])->name('vehicle.search');

    Route::prefix('number-patterns')->group(function () {
        Route::get('/', [NumberPatternController::class, 'index'])->name('number_patterns.index');
        Route::get('/create', [NumberPatternController::class, 'create'])->name('number_patterns.create');
        Route::post('/store', [NumberPatternController::class, 'store'])->name('number_patterns.store');
        Route::get('/{id}/edit', [NumberPatternController::class, 'edit'])->name('number_patterns.edit');
        Route::put('/{number_pattern}', [NumberPatternController::class, 'update'])->name('number_patterns.update');
        Route::delete('/{number_pattern}', [NumberPatternController::class, 'destroy'])->name('number_patterns.destroy');
        Route::get('/{id}/generate', [NumberPatternController::class, 'generateNumber'])->name('number_patterns.generate');
        Route::get('/get-type-of-body', [NumberPatternController::class, 'getTypeOfBody'])->name('getTypeOfBody');

    });



});





// ----------------------------------------



