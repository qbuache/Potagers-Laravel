<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PotagerFactory extends Factory {

    public function definition() {
        return [
            "jardin_id" => 1,
            "name" => $this->faker->safeColorName(),
            "size" => $this->faker->numberBetween(2, 10),
        ];
    }
}
