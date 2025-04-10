<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryRequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DeliveryRequestController::class, 'create']);
Route::get('/delivery-request/create', [DeliveryRequestController::class, 'create'])->name('delivery-request.create');
Route::post('/delivery-request', [DeliveryRequestController::class, 'store'])->name('delivery-request.store');
Route::get('/delivery-requests', [DeliveryRequestController::class, 'index'])->name('delivery-request.index');
Route::post('/delivery-request/{id}/cancel', [\App\Http\Controllers\DeliveryRequestController::class, 'cancel'])->name('delivery-request.cancel');


Route::get('/delivery-request/vue', function () {
    return view('delivery-request.vue');
})->name('delivery-request.vue');
