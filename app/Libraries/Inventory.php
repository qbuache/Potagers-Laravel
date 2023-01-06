<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Http;

class Inventory {

    private $response = NULL;

    public function exists($inventory) {
        $this->response = Http::get(config("services.inventory.path") . "?exists=1&idInvent={$inventory}");
        return $this;
    }

    public function response() {
        return $this->response;
    }

    public function data() {
        return $this->response->body();
    }

    public function json() {
        return $this->response->json();
    }
}
