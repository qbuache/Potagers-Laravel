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

Route::get("/", function () {
    return view("welcome");
});

require __DIR__ . "/auth.php";

Route::middleware("auth")->group(function () {
    Route::get("/dashboard", function () {
        return view("dashboard");
    })->name("dashboard")->breadcrumb("Accueil");

    Route::prefix("")->group(__DIR__ . "/web/app.php");
    Route::prefix("jardins")->group(__DIR__ . "/web/jardin.php");
    Route::prefix("potagers")->group(__DIR__ . "/web/potager.php");
    Route::prefix("users")->group(__DIR__ . "/web/user.php");
});
