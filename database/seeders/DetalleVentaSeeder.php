<?php

namespace Database\Seeders;

use App\Models\DetalleVenta;
use Illuminate\Database\Seeder;

class DetalleVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetalleVenta::create([
            'notaVenta_id'=>1,
            'producto_id'=>1,
            'precio'=>200,
            'cantidad'=>10,
            'importe'=>2000,
        ]);

        DetalleVenta::create([
            'notaVenta_id'=>1,
            'producto_id'=>2,
            'precio'=>200,
            'cantidad'=>15,
            'importe'=>3000,
        ]);

        DetalleVenta::create([
            'notaVenta_id'=>1,
            'producto_id'=>3,
            'precio'=>200,
            'cantidad'=>20,
            'importe'=>4000,
        ]);
        //---------------------------------------------------------------------------
        DetalleVenta::create([
            'notaVenta_id'=>2,
            'producto_id'=>1,
            'precio'=>200,
            'cantidad'=>10,
            'importe'=>2000,
        ]);

        DetalleVenta::create([
            'notaVenta_id'=>2,
            'producto_id'=>3,
            'precio'=>200,
            'cantidad'=>20,
            'importe'=>4000,
        ]);
        //---------------------------------------------------------------------------

        DetalleVenta::create([
            'notaVenta_id'=>3,
            'producto_id'=>1,
            'precio'=>200,
            'cantidad'=>10,
            'importe'=>2000,
        ]);

        DetalleVenta::create([
            'notaVenta_id'=> 3,
            'producto_id'=> 2,
            'precio'=>200,
            'cantidad'=>15,
            'importe'=>3000,
        ]);


        //---------------------------------------------------------------------------
        DetalleVenta::create([
            'notaVenta_id'=>4,
            'producto_id'=>2,
            'precio'=>200,
            'cantidad'=>15,
            'importe'=>3000,
        ]);

        DetalleVenta::create([
            'notaVenta_id'=>4,
            'producto_id'=>3,
            'precio'=>200,
            'cantidad'=>20,
            'importe'=>4000,
        ]);

        //---------------------------------------------------------------------------


        //---------------------------------------------------------------------------


        //---------------------------------------------------------------------------


        //---------------------------------------------------------------------------


        //---------------------------------------------------------------------------


        //---------------------------------------------------------------------------


        //---------------------------------------------------------------------------

        //---------------------------------------------------------------------------


        //---------------------------------------------------------------------------


        //---------------------------------------------------------------------------

    }
}
