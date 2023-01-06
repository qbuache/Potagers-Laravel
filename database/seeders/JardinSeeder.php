<?php

namespace Database\Seeders;

use App\Models\Jardin;
use Illuminate\Database\Seeder;

class JardinSeeder extends Seeder {

    public function run() {
        $jardins = [
            ["id" => 1, "name" => "Pioche qui rit", "coordinates" => ""],
            ["id" => 2, "name" => "Rateau Heureux", "coordinates" => ""],
            ["id" => 3, "name" => "Brouette Rieuse", "coordinates" => ""],
            ["id" => 4, "name" => "Rateau Laveur", "coordinates" => ""],
            ["id" => 5, "name" => "Merle Planteur", "coordinates" => ""],
            ["id" => 6, "name" => "Pie Hocheuse", "coordinates" => ""],
            ["id" => 7, "name" => "Pot'Apéro", "coordinates" => ""],
        ];

        foreach ($jardins as $jardin) {
            Jardin::create($jardin);
        }
        //Jardin::factory()->count(5)->create();
    }
}
