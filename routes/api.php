<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BedReportsController;
use App\Http\Controllers\ReportVerificationsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\VaccineReportsController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CaseReportsController;
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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/permissions', [AuthController::class, 'permissions']);
    Route::get('/profile', [AuthController::class, 'logout']);
    Route::get('/roles', [RolesController::class, 'getRoles']);


    Route::middleware(['role:admin'])->group(function () {
        Route::get('/users', [AuthController::class, 'index']);
        Route::post('/users', [AuthController::class, 'register']);
        Route::put('/users/{user}', [AuthController::class, 'update']);
        Route::get('/case', [CaseReportsController::class, 'index']);
    });

    Route::middleware(['role:inserter'])->group(function () {
        Route::get('/case/{caseReport}', [CaseReportsController::class, 'show']);
        Route::post('/case', [CaseReportsController::class, 'store']);
        Route::put('/case/{caseReport}', [CaseReportsController::class, 'update']);
        Route::delete('/case/{caseReport}', [CaseReportsController::class, 'destroy']);

        Route::get('/vaccine', [VaccineReportsController::class, 'index']);
        Route::get('/vaccine/{vaccineReport}', [VaccineReportsController::class, 'show']);
        Route::post('/vaccine', [VaccineReportsController::class, 'store']);
        Route::put('/vaccine/{vaccineReport}', [VaccineReportsController::class, 'update']);
        Route::delete('/vaccine/{vaccineReport}', [VaccineReportsController::class, 'destroy']);

        Route::get('/bed', [BedReportsController::class, 'index']);
        Route::get('/bed/{bedReport}', [BedReportsController::class, 'show']);
        Route::post('/bed', [BedReportsController::class, 'store']);
        Route::put('/bed/{bedReport}', [BedReportsController::class, 'update']);
        Route::delete('/bed/{bedReport}', [BedReportsController::class, 'destroy']);

        Route::get('/report-verification', [ReportVerificationsController::class, 'index']);
        Route::get('/report-verification/{reportVerification}', [ReportVerificationsController::class, 'show']);
        Route::post('/report-verification', [ReportVerificationsController::class, 'store']);
        Route::put('/report-verification/{reportVerification}', [ReportVerificationsController::class, 'update']);
        Route::delete('/report-verification/{verificationReport}', [ReportVerificationsController::class, 'destroy']);
    });



});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
