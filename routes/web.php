<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.home.home');
})->name('ticket-home');

Route::group(['prefix' => 'ticket', 'middleware' => 'cors'], function(){
    Route::get('get-list', [\App\Http\Controllers\TicketController::class, 'indexData'])->name('ticket-index-data');
    Route::get('index', [\App\Http\Controllers\TicketController::class, 'index'])->name('ticket-index');

    Route::group(['prefix'=> 'about', 'middleware' => 'cors'], function() {
        Route::get('/', function(){
            return \Illuminate\Support\Facades\View::make('pages.about.index');
        })->name('ticket-about');
    });
});
