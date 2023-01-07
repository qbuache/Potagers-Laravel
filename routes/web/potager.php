<?php

use App\Http\Controllers\PotagerController;
use App\Models\Potager;
use App\Permissions\Permissions;
use Illuminate\Support\Facades\Route;

Route::get("/", [PotagerController::class, "index"])
    ->name("potagers.index")
    ->can(Permissions::READ_POTAGERS)
    ->breadcrumb("Potagers");

Route::get("/create", [PotagerController::class, "create"])
    ->name("potagers.create")
    ->can(Permissions::CREATE_POTAGERS)
    ->breadcrumb("Nouveau potager", "potagers.index");

Route::get("/{potager}", [PotagerController::class, "show"])
    ->name("potagers.show")
    ->can(Permissions::READ_POTAGERS)
    ->breadcrumb(fn (Potager $potager) => "Potager n°$potager->name", "jardins.show", fn (Potager $potager) => $potager->jardin);

Route::get("/{potager}/edit", [PotagerController::class, "edit"])
    ->name("potagers.edit")
    ->can(Permissions::EDIT_POTAGERS, "potager")
    ->whereNumber("potager")
    ->breadcrumb("Modification", "potagers.show");

Route::get("/{potager}/jardinier", [PotagerController::class, "jardinier"])
    ->name("potagers.jardinier")
    ->can(Permissions::GIVE_POTAGERS, "potager")
    ->whereNumber("potager")
    ->breadcrumb("Jardinier", "potagers.show");

Route::post("/", [PotagerController::class, "store"])
    ->name("potagers.store")
    ->can(Permissions::CREATE_POTAGERS);

Route::patch("/{potager}", [PotagerController::class, "update"])
    ->name("potagers.update")
    ->can(Permissions::EDIT_POTAGERS, "potager")
    ->whereNumber("potager");

Route::patch("/{potager}/jardinier", [PotagerController::class, "update_jardinier"])
    ->name("potagers.update_jardinier")
    ->can(Permissions::GIVE_POTAGERS, "potager")
    ->whereNumber("potager");

Route::delete("/{potager}", [PotagerController::class, "destroy"])
    ->name("potagers.destroy")
    ->can(Permissions::DELETE_POTAGERS, "potager")
    ->whereNumber("potager");
