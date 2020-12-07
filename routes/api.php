<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::name('api.v1.')->group(function () {
    Route::group(['namespace' => 'App\Http\Controllers\API\v1', 'prefix' => 'v1'], function() {
        Route::apiResource('clients', 'ClientsController')->only(['store']);

        Route::apiResource('complaints', 'ComplaintsController')->only(['store']);
        Route::get('complaints/client/{client_id}', 'ComplaintsController@showComplaintsByClientId')
            ->name('complaints.showByClientId');
        Route::put('complaints/{id}', 'ComplaintsController@takeToWork')
            ->name('complaints.takeToWork');
    });
});

