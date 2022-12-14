<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\WorkingDaysController;
use App\Models\Event;
use App\Models\Gift;
use App\Models\Menu;
use App\Models\WorkingDays;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    $menus = Menu::all();
    $hours = WorkingDays::first()->get()[0];
    return view('app', ["menus" => $menus, "hours" => $hours]);
});
Route::post('/voucher/add', function (Request $request) {
    $gift = new Gift();
    $gift->name = $request->name;
    $gift->email = $request->email;
    $gift->message = $request->message;
    $gift->save();
    return redirect()->back();
})->name("voucher");
Route::get('/events', function () {
    $hours = WorkingDays::first()->get()[0];

    $events = Event::all();
    return view('events', ["events" => $events,"hours" => $hours]);
});
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view("dashboard.dashboard");
    });
    Route::resource("menus", MenuController::class);
    Route::resource("events", EventController::class);
    Route::resource("working-days", WorkingDaysController::class);
    Route::get("vouchers", function (Request $request) {
        $vouchers = Gift::all();
        return view("dashboard.vouchers", ['vouchers' => $vouchers]);
    })->name("adminVouchers");
    Route::delete("vouchers", function (Request $request) {
        $voucher = Gift::find($request->id);
        $voucher->delete();
        return redirect()->back();
    })->name("deleteVoucher");
});
Auth::routes();
