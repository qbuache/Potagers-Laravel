<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use App\Permissions\Permissions;
use Illuminate\Support\Facades\Route;

Route::get("/", [UserController::class, "index"])
    ->name("users.index")
    ->can(Permissions::READ_USERS)
    ->breadcrumb("Les jardiniers");

Route::get("/create", [UserController::class, "create"])
    ->name("users.create")
    ->can(Permissions::CREATE_USERS)
    ->breadcrumb("Nouveau jardinier", "users.index");

Route::get("/{user}", [UserController::class, "show"])
    ->name("users.show")
    ->can(Permissions::READ_USERS)
    ->breadcrumb(fn (User $user) => $user->name, "users.index");

Route::get("/{user}/edit", [UserController::class, "edit"])
    ->name("users.edit")
    ->can(Permissions::EDIT_USERS, "user")
    ->whereNumber("user")
    ->breadcrumb("Modification", "users.show");

Route::get("/{user}/permissions", [UserController::class, "permissions"])
    ->name("users.permissions")
    ->can(Permissions::GIVE_PERMISSIONS, "user")
    ->whereNumber("user")
    ->breadcrumb("Permissions de la personne", "users.show");

Route::post("/", [UserController::class, "store"])
    ->name("users.store")
    ->can(Permissions::CREATE_USERS);

Route::patch("/{user}", [UserController::class, "update"])
    ->name("users.update")
    ->can(Permissions::EDIT_USERS, "user")
    ->whereNumber("user");

Route::patch("/{user}/permissions", [UserController::class, "update_permissions"])
    ->name("users.update_permissions")
    ->can(Permissions::GIVE_PERMISSIONS, "user")
    ->whereNumber("user");

Route::delete("/{user}", [UserController::class, "destroy"])
    ->name("users.destroy")
    ->can(Permissions::DELETE_USERS, "user")
    ->whereNumber("user");
