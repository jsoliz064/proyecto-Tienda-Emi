<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1 = Role::create(['name' => 'Admin']);
        $rol2 = Role::create(['name' => 'Venta']);

        Permission::create(['name' => 'home'])->syncRoles($rol1, $rol2);


        Permission::create(['name' => 'users.index'])->syncRoles($rol1);
        Permission::create(['name' => 'users.edit'])->syncRoles($rol1);
        Permission::create(['name' => 'users.update'])->syncRoles($rol1);

        Permission::create(['name' => 'clientes.index'])->syncRoles($rol1, $rol2);
        Permission::create(['name' => 'clientes.create'])->syncRoles($rol1, $rol2);
        Permission::create(['name' => 'clientes.edit'])->syncRoles($rol1, $rol2);
        Permission::create(['name' => 'clientes.destroy'])->syncRoles($rol1, $rol2);

    }
}
