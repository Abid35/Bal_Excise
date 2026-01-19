<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\API\FBRVehicleInfoController;
use App\Http\Controllers\API\PralVehicleInfoController;
use App\Http\Controllers\API\QuettaSaveCityController;
use App\Http\Controllers\API\PralNadraController;
use App\Http\Controllers\API\NadraController;
use App\Http\Controllers\API\SmartCardController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CnicController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/1.0/Payments/BillInquiry', [APIController::class, 'inquiry']);
Route::post('/1.0/Payments/BillPayment', [APIController::class, 'payment']);
Route::post('/1.0/Bank/Challan', [APIController::class, 'bank_challan']);
Route::post('/1.0/Customer/Challan', [APIController::class, 'customerVoucher']);
Route::post('/1.0/Customer/Challan/Status', [APIController::class, 'customerVoucherStatus']);
Route::post('/1.0/vehicle/Info', [APIController::class, 'vehicleInfo']);
Route::post('/1.0/Customer/Info', [APIController::class, 'customerDetail']);

// Pral
Route::post('/1.0/beto/Vehicle/Info', [PralVehicleInfoController::class, 'betoVehicleInfo']);

// fbr
Route::post('/1.0/fbr/Vehicle/Info', [FBRVehicleInfoController::class, 'fbrVehicleInfo']);

// quetta save city
Route::post('/1.0/quetta-save-city/Vehicle/Info', [QuettaSaveCityController::class, 'index']);

// pral nadra
Route::post('/1.0/pral-nadra/Vehicle/Info', [PralNadraController::class, 'index']);

// nadra
//Route::post('/1.0/nadra/Vehicle-Info', [NadraController::class, 'index']);
Route::prefix('1.0/nadra')->group(function () {
    Route::post('/Vehicle-Info', [NadraController::class, 'index']);
    Route::post('SmartCard', [SmartCardController::class, 'smartCards']);
    Route::post('update/SmartCardStatus', [SmartCardController::class, 'updateSmartCardRequestStatus']);
});

// smartcard
Route::post('/1.0/smart-card/vehicle-info', [SmartCardController::class, 'index']);
Route::post('/1.0/smart-card/paid-vehicles', [SmartCardController::class, 'fetchSmartCardFeePaidVehicles']);
Route::post('/1.0/smart-card/update/SmartCardStatus', [SmartCardController::class, 'updateSmartCardStatus']);


Route::post('register', [AuthController::class, 'register']); 
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']); // <--- added
    Route::post('search-cnic', [CnicController::class, 'searchCnic']);
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
