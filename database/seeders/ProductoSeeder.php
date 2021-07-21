<?php

namespace Database\Seeders;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prod1 = new Producto();
        $prod1->idCategoria = 1;
        $prod1->codigo = 'MAT-110 XD';
        $prod1->nombre = 'PARACHOQUES 3000';
        $prod1->precioU = 200;
        $prod1->precioM = 150;
        $prod1->costoPromedio = 200;
        $prod1->descripcion = 'moderno, y atractivo para las elfas';
        $prod1->stock = 0;
        $prod1->save();

        $prod2 = new Producto();
        $prod2->idCategoria = 2;
        $prod2->codigo = 'FIS-110 XD';
        $prod2->nombre = 'AROMANTIZANTES';
        $prod2->precioU = 50;
        $prod2->precioM = 30;
        $prod2->costoPromedio = 50;
        $prod2->descripcion = 'impresiona a tu elfa con el olor de tu esta rica aroma';
        $prod2->stock = 0;
        $prod2->save();
    }
}
