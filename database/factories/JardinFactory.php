<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JardinFactory extends Factory {

    public function definition() {
        return [
            "name" => $this->faker->safeColorName(),
            "description" => $this->faker->paragraph()
        ];
    }
}
