<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AppProd extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "app:prod
    {--update-dependencies : Mettre à jour les dépendances Composer et NPM}
    {--build-frontend : Créer les pages frontend}
    ";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Met à jour la prod";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $updateDependencies = $this->option("update-dependencies");
        $buildFrontend = $updateDependencies || $this->option("build-frontend");
        $setInMaintenance = $updateDependencies || $buildFrontend;

        system("git pull");
        if ($setInMaintenance) {
            Artisan::call("down", ["--render" => "maintenance-update", "--refresh" => 20]);
            if ($updateDependencies) {
                $this->updateDependencies();
            }
            if ($buildFrontend) {
                $this->buildFrontend();
            }
        }
        Artisan::call("cache:clear");
        Artisan::call("view:cache");
        Artisan::call("config:cache");
        Artisan::call("up");
        return 0;
    }

    private function updateDependencies() {
        system("npm update");
        system("echo 'yes' | composer update");
        system("echo 'yes' | composer dump-autoload");
    }

    private function buildFrontend() {
        $public = public_path();
        system("rm -f $public/css/* && rm -f $public/js/* && rm -f $public/mix-manifest.json");
        system("npm run prod");
    }
}
