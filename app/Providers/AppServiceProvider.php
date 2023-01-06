<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        if (!app()->environment("production")) {
            if (!config("mail.develop")) {
                Log::error("L'adresse email de développment n'est pas configurée dans le fichier .env (MAIL_DEVELOP)");
                return abort(500);
            }
            Mail::alwaysTo(config("mail.develop"));
        }
    }
}
