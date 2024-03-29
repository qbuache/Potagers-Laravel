<?php

use App\Http\Controllers\JardinController;
use App\Permissions\Permissions;
use Illuminate\Support\Facades\Route;

Route::get("/", [JardinController::class, "index"])
    ->name("jardins.index")
    ->can(Permissions::READ_JARDINS)
    ->breadcrumb("Les jardins");

Route::get("/create", [JardinController::class, "create"])
    ->name("jardins.create")
    ->can(Permissions::CREATE_JARDINS)
    ->breadcrumb("Nouveau jardin", "jardins.index");

Route::get("/{jardin:slug}", [JardinController::class, "show"])
    ->name("jardins.show")
    ->can(Permissions::READ_JARDINS)
    ->breadcrumb(fn ($jardin) => $jardin->name, "jardins.index");

Route::get("/{jardin:slug}/edit", [JardinController::class, "edit"])
    ->name("jardins.edit")
    ->can(Permissions::EDIT_JARDINS, "jardin")
    ->breadcrumb("Modification", "jardins.show");

Route::get("/{jardin:slug}/define-potagers", [JardinController::class, "define_potagers"])
    ->name("jardins.define-potagers")
    ->can(Permissions::EDIT_JARDINS, "jardin")
    ->breadcrumb("Définition des potagers", "jardins.show");

Route::post("/{jardin:slug}/define-potagers", [JardinController::class, "store_define_potagers"])
    ->name("jardins.store-define-potagers")
    ->can(Permissions::CREATE_JARDINS);

Route::post("/", [JardinController::class, "store"])
    ->name("jardins.store")
    ->can(Permissions::CREATE_JARDINS);

Route::patch("/{jardin:slug}", [JardinController::class, "update"])
    ->name("jardins.update")
    ->can(Permissions::EDIT_JARDINS, "jardin");

Route::delete("/{jardin:slug}", [JardinController::class, "destroy"])
    ->name("jardins.destroy")
    ->can(Permissions::DELETE_JARDINS, "jardin");
