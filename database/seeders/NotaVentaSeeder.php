<?php

namespace Database\Seeders;

use App\Models\NotaVenta;
use Illuminate\Database\Seeder;

class NotaVentaSeeder extends Seeder
{
    public function run()
    {
         NotaVenta::create([
            'nroCliente'=>1,
            'importe'=>9000,
            'fecha' => '2021-01-01',
            'hora' => date('H:i')
        ]);

         NotaVenta::create([
            'nroCliente'=>1,
            'importe'=>6000,
            'fecha' => '2021-02-01',
            'hora' => date('H:i')
        ]);

        NotaVenta::create([
            'nroCliente'=>1,
            'importe'=>5000,
            'fecha' => '2021-03-01',
            'hora' => date('H:i')
        ]);

        NotaVenta::create([
            'nroCliente'=>1,
            'importe'=>7000,
            'fecha' => '2021-04-01',
            'hora' => date('H:i')
        ]);

        // NotaVenta::create([
        //     'nroCliente'=>1,
        //     'importe'=>0,
        //     'fecha' => '2021-03-01',
        //     'hora' => date('H:i')
        // ]);

        // NotaVenta::create([
        //     'nroCliente'=>1,
        //     'importe'=>0,
        //     'fecha' => '2021-03-02',
        //     'hora' => date('H:i')
        // ]);

        // NotaVenta::create([
        //     'nroCliente'=>1,
        //     'importe'=>0,
        //     'fecha' => date('Y/m/d'),
        //     'hora' => date('H:i')
        // ]);

        // NotaVenta::create([
        //     'nroCliente'=>1,
        //     'importe'=>0,
        //     'fecha' => date('Y/m/d'),
        //     'hora' => date('H:i')
        // ]);

    }
}
