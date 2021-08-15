<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'ci'=>'12345',
            'nombre'=> 'chumacero',
            'sexo'=> 'm',
            'telefono'=> '72182456',
            'email'=> 'chumacero@gmail.com',
        ]);
    }
}
