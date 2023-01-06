<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AppSetup extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "app:setup
    {--migrate : Effectue la première migration de la base de données}
    {--seed : Définit les informations minimales du site, effectue aussi la migration}
    ";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Met en place le site web en préparant des dossiers et, si demandé, en remplissant la base de données";

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
        $seed = $this->option("seed");
        $migrate = $seed || $this->option("migrate");

        system("chown -R apache:apache " . storage_path());
        Artisan::call("key:generate");
        Artisan::call("config:cache");
        Artisan::call("view:cache");
        Artisan::call("storage:link");
        if ($migrate) {
            Artisan::call("migrate");
        }
        if ($seed) {
            Artisan::call("db:seed --class=SetupSeeder");
        }
        return 0;
    }
}
