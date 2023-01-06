<?php

namespace Database\Seeders;

use App\Permissions\Permissions;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $permissions = Permissions::getPermissions();
        foreach ($permissions as $permission) {
            Permission::create(["name" => $permission]);
        }

        Role::create(["name" => Permissions::ADMIN]);

        $responsablePotagerRole = Role::create(["name" => Permissions::RESPONSABLE_POTAGER]);
        $responsablePotagerRole->givePermissionTo($permissions);

        $superJardinierRole = Role::create(["name" => Permissions::SUPER_JARDINIER]);
        $superJardinierRole->givePermissionTo([
            Permissions::READ_JARDINS,
            Permissions::READ_POTAGERS,
            Permissions::READ_USERS,
        ]);

        $jardinierRole = Role::create(["name" => Permissions::JARDINIER]);
        $jardinierRole->givePermissionTo([
            Permissions::READ_JARDINS,
            Permissions::READ_POTAGERS,
        ]);
    }
}
