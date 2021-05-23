<?php

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

Route::get('/case', [CaseReportsController::class, 'index']);
Route::get('/case/{caseReport}', [CaseReportsController::class, 'show']);
Route::post('/case', [CaseReportsController::class, 'store']);
Route::put('/case/{caseReport}', [CaseReportsController::class, 'update']);
Route::delete('/case/{caseReport}', [CaseReportsController::class, 'destroy']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
