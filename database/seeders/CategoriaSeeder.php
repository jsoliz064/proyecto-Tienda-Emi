<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat1 = new categoria();
        $cat1->nombre = 'Seguridad';
        $cat1->save();
    
        $cat2 = new categoria();
        $cat2->nombre = 'Limpieza';
        $cat2->save();
    
        $cat3 = new categoria();
        $cat3->nombre = 'Tuning Exterior';
        $cat3->save();
    
        $cat4 = new categoria();
        $cat4->nombre = 'Tuning Interior';
        $cat4->save();
    }
}
