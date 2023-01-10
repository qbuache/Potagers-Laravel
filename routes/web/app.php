<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get("/dashboard", [AppController::class, "dashboard"])
    ->name("app.dashboard")
    ->breadcrumb("Accueil");

Route::get("/info", [AppController::class, "info"])
    ->name("app.info")
    ->breadcrumb("Informations");

Route::get("/profil", [AppController::class, "profil"])
    ->name("app.profil")
    ->breadcrumb("Profil");
