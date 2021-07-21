<?php

namespace Database\Seeders;
use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prov1 = new proveedor();
        $prov1->nombre = 'proveedor 1';
        $prov1->telefono = '111111111';
        $prov1->direccion = 'SANT CRUZ BOLIVIA';
        $prov1->email = 'proveedor1@gmail.com';
        $prov1->save();
    
        $prov2 = new proveedor();
        $prov2->nombre = 'proveedor 2';
        $prov2->telefono = '222222';
        $prov2->direccion = 'LA PAZ BOLIVIA';
        $prov2->email = 'proveedor2@gmail.com';
        $prov2->save();

        $prov3 = new proveedor();
        $prov3->nombre = 'proveedor 3';
        $prov3->telefono = '333333';
        $prov3->direccion = 'BENI BOLIVIA';
        $prov3->email = 'proveedor3@gmail.com';
        $prov3->save();

        $proveedor2=new proveedor();
        $proveedor2->nombre="Mariela Añez Palacios";
        $proveedor2->telefono=6985522;
        $proveedor2->direccion="2to anillo,Calle. Barrientos";
        $proveedor2->email="marielAz@gmail.com";
        $proveedor2->save();

        $proveedor3=new proveedor();
        $proveedor3->nombre="Andrea Martinez Pinto";
        $proveedor3->telefono=7415964;
        $proveedor3->direccion="6to anillo,Calle.Argentina";
        $proveedor3->email="andreaMart@gmail.com";
        $proveedor3->save();

        $proveedor4=new proveedor();
        $proveedor4->nombre="Toborochi Accesories";
        $proveedor4->telefono=6985522;
        $proveedor4->direccion="Pampa de la Isla,Calle 3";
        $proveedor4->email="accessoriesT@gmail.com";
        $proveedor4->save();
    }
}
