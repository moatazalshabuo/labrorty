<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientGroupTestController;
use App\Http\Controllers\GroupTestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\SendingMassageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Client;
use App\Models\ClientGroupTest;
use App\Models\GroupTest;
use App\Models\SendingMassage;
use App\Models\Test;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\Configuration\GroupCollection;
use Spatie\Permission\Contracts\Role;
use Vonage\Client as VonageClient;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;

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
Route::get('/home', function () {
    $test = GroupTest::all();
    return view('f', compact('test'));
})->name("ho");

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class)->middleware('auth');

Route::resource("client", ClientController::class)->middleware('auth');

Route::resource("group-test", GroupTestController::class)->middleware('auth');

Route::resource('lab_tests', TestController::class)->middleware('auth');

Route::resource("cl", ClientGroupTestController::class)->middleware('auth');

Route::get('about', function () {
    return view('about');
})->name('about');
Route::get('about-mobile', function () {
    return view('about2');
})->name('about1');
Route::controller(ClientGroupTestController::class)->group(function () {
    Route::prefix('cll')->group(function () {
        Route::get('/finish', 'finish')->name('cl.finish');
        Route::get('/notfinish', 'notfinish')->name('cl.notfinish');
        Route::get("cancel/{cgt}", "cancel")->name("cl.cancel");
        Route::post('update-result/{cgt}', "update_result")->name('cll.update.result');
    })->middleware('auth');
});

Route::controller(SendingMassageController::class)->group(function () {
    Route::prefix('message')->group(function () {
        Route::get('/', 'index')->name('message.index');
        Route::get("/{id}", "client_message")->name("message.client_message");
        Route::post("send", "send")->name('message.send');
    })->middleware('auth');
});

Route::controller(MobileController::class)->group(function () {
    Route::get('mobile', 'index')->name("mobile");
    Route::post('logusers', "login")->name('mobile.login');
    Route::get("mobile/test/{id}", "test")->name("mobile.test");
    Route::get('mobile/chat', "Chating")->name('mobile.chat');
    Route::get('leave', "leave")->name("mobile.leave");
});

Route::get('Charts/data', [HomeController::class, 'get_charts'])->name('data_charts');
Route::get('Charts/data/2', [HomeController::class, 'get_g_charts'])->name('data_chart');
Route::get('Charts', [HomeController::class, 'charts'])->name('charts');

Route::get('message', function () {
    $basic  = new \Vonage\Client\Credentials\Basic('666b321f', 'izJW5PMsjwqA6Eck');
    $client = new \Vonage\Client($basic);
    $response = $client->sms()->send(
        new \Vonage\SMS\Message\SMS("+218926772981", "BRAND_NAME", 'A text message sent using the Nexmo SMS API')
    );
    
    $message = $response->current();
    
    if ($message->getStatus() == 0) {
        echo "The message was sent successfully\n";
    } else {
        echo "The message failed with status: " . $message->getStatus() . "\n";
    }
});
