<?php

namespace App\Http\Controllers;

use App\Models\Jardin;
use App\Models\Potager;
use App\Models\User;

class AppController extends Controller {

    public function dashboard() {
        return view("app.dashboard", [
            "countJardins" => Jardin::count(),
            "countPotagers" => Potager::count(),
            "countJardiniers" => User::count(),
        ]);
    }

    public function info() {
        return view("app.info");
    }

    public function profil() {
        return view("app.profil", [
            "user" => auth()->user(),
        ]);
    }
}
