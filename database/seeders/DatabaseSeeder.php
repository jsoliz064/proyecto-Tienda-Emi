<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Personal;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\Categoria;
//use App\Models\Marca;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this -> call( CategoriaSeeder::class);
        $this -> call(RoleSeeder::class);
        $this -> call(UserSeeder::class);
        $this -> call(ProductoSeeder::class);
        $this -> call(ProveedorSeeder::class);
        $this -> call(SalidaSeeder::class);
        $this -> call(ClienteSeeder::class);
        $this -> call(NotaVentaSeeder::class);
        $this -> call(DetalleVentaSeeder::class);
            

        $personal1=new personal();
        $personal1->ci= 1234567;
        $personal1->nombre="Carmen Velasquez Suarez";
        $personal1->sexo="F";
        $personal1->telefono=78945128;
        $personal1->email="carmencitaVS@gmail.com";
        $personal1->domicilio="Av. Las Lomas";
        $personal1->save();


        $personal2=new personal();
        $personal2->ci= 94465;
        $personal2->nombre="Pedro Paramo Chavez";
        $personal2->sexo="M";
        $personal2->telefono=78454619;
        $personal2->email="PedroP@gmail.com";
        $personal2->domicilio="Av. santos dumont #458";
        $personal2->save();

        $personal3=new personal();
        $personal3->ci= 842;
        $personal3->nombre="Barry Allen Parker";
        $personal3->sexo="M";
        $personal3->telefono=64859782;
        $personal3->email="theFastestB@gmail.com";
        $personal3->domicilio="Plan 3000 Calle Los Tuquesis";
        $personal3->save();

        $personal4=new personal();
        $personal4->ci= 942413;
        $personal4->nombre="Estefani Cuellar Martinez";
        $personal4->sexo="F";
        $personal4->telefono=72164649;
        $personal4->email="estefaniCuelllar@gmail.com";
        $personal4->domicilio="Seonane Esq. España";
        $personal4->save();
        
        $cliente1= new cliente();
        $cliente1->ci= 284841; 
        $cliente1->nombre= "Melania Zamora Peña";
        $cliente1->sexo="F";
        $cliente1->telefono=62344566;
        $cliente1->email="MelaniZa@gmail.com";
        $cliente1->save();

        $cliente2= new cliente();
        $cliente2->ci= 487456; 
        $cliente2->nombre= "Victor Manuel Ledesma";
        $cliente2->sexo="M";
        $cliente2->telefono=75221931;
        $cliente2->email="VictorZaz@gmail.com";
        $cliente2->save();

        $cliente3= new cliente();
        $cliente3->ci= 845469; 
        $cliente3->nombre= "Alberto Sandoval Mamani ";
        $cliente3->sexo="F";
        $cliente3->telefono=67452144;
        $cliente3->email="AlbertoSM@gmail.com";
        $cliente3->save();

        $cliente4= new cliente();
        $cliente4->ci= 456481; 
        $cliente4->nombre= "Leopoldo Roldan Llanos";
        $cliente4->sexo="M";
        $cliente4->telefono=78132943;
        $cliente4->email="RoldanLeo@gmail.com";
        $cliente4->save();

        $proveedor1=new proveedor();
        $proveedor1->nombre="Empresa Todo Auto";
        $proveedor1->telefono=75456896;
        $proveedor1->direccion="Zona Norte,Esq.Tajibo";
        $proveedor1->email="todoauto@gmail.com";
        $proveedor1->save();

        
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

        // $marca1=new marca();
        // $marca1->descripcion="Ferrari";
        // $marca1->save();
    }
}
