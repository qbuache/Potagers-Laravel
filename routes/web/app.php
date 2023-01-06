<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

// "can:viewAny.computers"
Route::middleware("auth")->group(function () {

    Route::get("/info", [AppController::class, "info"])
        ->name("app.info")
        ->breadcrumb("Informations");

    Route::get("/profil", [AppController::class, "profil"])
        ->name("app.profil")
        ->breadcrumb("Profil");
});
