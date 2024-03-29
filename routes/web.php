<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MejaController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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

// Home Routes
Route::get("/", [HomeController::class, "index"])->name('/');
Route::get("/redirects", [HomeController::class, "redirects"]);

// Admin Routes
Route::get("/users", [AdminController::class, "user"]);
Route::get("/deleteuser/{id}", [AdminController::class, "deleteuser"]);

Route::get("/foodmenu", [AdminController::class, "foodmenu"]);
Route::get("/deletemenu/{id}", [AdminController::class, "deletemenu"]);
Route::get("/updateview/{id}", [AdminController::class, "updateview"]);
Route::post("/update/{id}", [AdminController::class, "update"]);
Route::post("/uploadfood", [AdminController::class, "upload"]);

Route::post("/reservation", [AdminController::class, "reservation"]);
Route::get("/viewreservation", [AdminController::class, "viewreservation"]);

Route::get("/viewchef", [AdminController::class, "viewchef"]);
Route::post("/uploadchef", [AdminController::class, "uploadchef"]);
Route::get("/updatechef/{id}", [AdminController::class, "updatechef"]);
Route::post("/updatefoodchef/{id}", [AdminController::class, "updatefoodchef"]);
Route::get("/deletechef/{id}", [AdminController::class, "deletechef"]);


// Home Cart Routes
Route::post("/addcart/{id}", [HomeController::class, "addcart"]);
Route::get("/showcart/{id}", [HomeController::class, "showcart"]);
Route::delete('/remove/{id}', [HomeController::class, 'remove'])->name('remove');


// Authentication Routes
Route::get('/auth', [LoginController::class, 'showLoginForm'])->name('auth');
Route::post('/auth', [LoginController::class, 'auth']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout1');


Route::post("/orderconfirm", [HomeController::class, "orderconfirm"]);
Route::get("/orders", [AdminController::class, "orders"]);

Route::post("/statusfood/{id}", [AdminController::class, "statusfood"])->name('statusfood');
Route::resource('/meja', MejaController::class);

// Authenticated User Dashboard Route
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get("/dashboard", [DashboardController::class, "index"]);
});
