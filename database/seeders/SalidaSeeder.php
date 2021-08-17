<?php

namespace Database\Seeders;

use App\Models\Salida;
use Illuminate\Database\Seeder;

class SalidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s1 = new Salida();
        $s1->fecha = '2021-07-01';
        $s1->hora = '10:06:21';
        $s1->save();
        //relacionar con producto
        $s1->productos()->attach([1,2], ['cantidad'=>20]);

        $s2 = new Salida();
        $s2->fecha = '2021-07-02';
        $s2->hora = '12:06:21';   
        $s2->save();
        $s2->productos()->attach(1, ['cantidad'=>10]);

        $s3 = new Salida();
        $s3->fecha = '2021-07-03';
        $s3->hora = '13:06:21';   
        $s3->save();
        $s3->productos()->attach([1,2], ['cantidad'=>10]);

        $s4 = new Salida();
        $s4->fecha = '2021-07-04';
        $s4->hora = '14:06:21';   
        $s4->save();
    }
}
