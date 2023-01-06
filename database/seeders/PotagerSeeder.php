<?php

namespace Database\Seeders;

use App\Models\Potager;
use Illuminate\Database\Seeder;

class PotagerSeeder extends Seeder {

    public function run() {
        Potager::factory()->count(15)->create();
    }
}
