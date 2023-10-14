<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientGroupTestController;
use App\Http\Controllers\GroupTestController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\SendingMassageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Client;
use App\Models\ClientGroupTest;
use App\Models\SendingMassage;
use App\Models\Test;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\Configuration\GroupCollection;
use Spatie\Permission\Contracts\Role;

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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();
Route::get('/home',function(){
    return view('f');
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class)->middleware('auth');

Route::resource("client", ClientController::class)->middleware('auth');

Route::resource("group-test", GroupTestController::class)->middleware('auth');

Route::resource('lab_tests', TestController::class)->middleware('auth');

Route::resource("cl", ClientGroupTestController::class)->middleware('auth');

Route::controller(ClientGroupTestController::class)->group(function () {
    Route::prefix('cll')->group(function () {
        Route::get('/finish', 'finish')->name('cl.finish');
        Route::get('/notfinish', 'notfinish')->name('cl.notfinish');
        Route::get("cancel/{cgt}","cancel")->name("cl.cancel");
        Route::post('update-result/{cgt}',"update_result")->name('cll.update.result');
    })->middleware('auth');
});

Route::controller(SendingMassageController::class)->group(function () {
    Route::prefix('message')->group(function () {
        Route::get('/', 'index')->name('message.index');
        Route::get("/{id}","client_message")->name("message.client_message");
        Route::post("send","send")->name('message.send');
    })->middleware('auth');
});

Route::controller(MobileController::class)->group(function(){
    Route::get('mobile','index')->name("mobile");
    Route::post('logusers',"login")->name('mobile.login');
    Route::get("mobile/test/{id}","test")->name("mobile.test");
    Route::get('mobile/chat',"Chating")->name('mobile.chat');
    Route::get('leave',"leave")->name("mobile.leave");
});

