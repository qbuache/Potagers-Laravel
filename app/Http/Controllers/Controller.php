<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getFilters(string $cookieName, array $storeInCookie, ?array $defaultFilters = []): array {
        $request = request()->all();
        $cookieData = array_merge(
            $defaultFilters,
            json_decode(request()->cookie($cookieName, "[]"), TRUE),
        );
        $filters = array_merge($cookieData, $request);
        $this->setCookie($cookieName, collect($filters)->only($storeInCookie)->toArray());
        return $filters;
    }

    protected function setCookie(string $cookieName, $data, int $duration = NULL) {
        $duration ??= config("myConfig.cookieDuration");
        Cookie::queue($cookieName, json_encode($data), $duration);
    }
}
