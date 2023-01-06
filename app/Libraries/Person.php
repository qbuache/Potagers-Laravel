<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Person {

    private $response = NULL;

    private function config($headers = []) {
        return Http::withHeaders($headers);
    }

    private function post($url, $data, $headers = []) {
        try {
            return $this->config($headers)
                ->asForm()
                ->post(config("services.person.path") . $url, $data);
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }

    public function find($payload, $headers = []) {
        $this->response = $this->post(
            "",
            [
                "filters" => $payload,
                "attributes" => [
                    "email",
                    "firstname",
                    "lastname",
                    "phone",
                    "ou",
                ],
                "greediness" => "^$"
            ],
            $headers
        );
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
