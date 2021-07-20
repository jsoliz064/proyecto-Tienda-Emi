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

        Permission::create(['name' => 'home',
                            'description' => 'Ver el Inicio'])->syncRoles($rol1, $rol2);


        Permission::create(['name' => 'users.index',
                            'description' => 'Ver lista de Usuarios'])->syncRoles($rol1);
                            
        Permission::create(['name' => 'users.create',
                            'description' => 'Crear Usuarios'])->syncRoles($rol1);

        Permission::create(['name' => 'users.edit',
                            'description' => 'Editar Usuarios'])->syncRoles($rol1);
        

        Permission::create(['name' => 'clientes.index',
                            'description' => 'Ver lista de Clientes'])->syncRoles($rol1, $rol2);

        Permission::create(['name' => 'clientes.create',
                            'description' => 'Crear clientes'])->syncRoles($rol1, $rol2);

        Permission::create(['name' => 'clientes.edit',
                            'description' => 'Editar Clientes'])->syncRoles($rol1, $rol2);

        Permission::create(['name' => 'clientes.show',
                            'description' => 'Informacion de clientes'])->syncRoles($rol1, $rol2);

        Permission::create(['name' => 'clientes.destroy',
                            'description' => 'Eliminar clientes'])->syncRoles($rol1);

    }
}
