<?php

namespace App\Http\Controllers;

class AppController extends Controller {

    public function info() {
        return view("app/info");
    }

    public function profil() {
        return view("app.profil", [
            "user" => auth()->user(),
        ]);
    }
}
