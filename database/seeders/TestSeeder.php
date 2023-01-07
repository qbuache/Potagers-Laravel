<?php

namespace Database\Seeders;

use App\Models\User;
use App\Permissions\Permissions;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call([
            SetupSeeder::class,
        ]);

        $user = User::create([
            "name" => "qb",
            "email" => "qb@email.ch",
            "password" => '$2y$10$UPUlrQBt2gCqzxzKM6Hh6.0CkbNn/gkVS9Cnrqi3jsDebVfq3XYnm',
            "created_at" => "2023-01-07 21:01:33",
            "updated_at" => "2023-01-07 21:01:33",
        ]);
        $user->assignRole(Permissions::ADMIN);
    }
}
