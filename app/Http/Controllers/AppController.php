<?php

namespace App\Http\Controllers;

use App\Models\Jardin;
use App\Models\Potager;
use App\Models\User;

class AppController extends Controller {

    public function home() {
        return view("app.home", [
            "countJardins" => Jardin::count(),
            "countPotagers" => Potager::count(),
            "countJardiniers" => User::count(),
        ]);
    }

    public function info() {
        return view("app.info");
    }

    public function profil() {
        /** @var App\Models\ShibbolethUser   $user */
        $user = auth()->user();
        return view("app.profil", [
            "user" => $user->load(["potagers.jardin", "roles"]),
        ]);
    }
}
