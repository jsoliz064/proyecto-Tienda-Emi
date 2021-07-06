<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user5 = new user();
        $user5->name = 'harold';
        $user5->email= 'harold@gmail.com';
        $user5->password = bcrypt('12345678');
        //$user5->assignRole('Admin');
        $user5->save();

        $user6 = new user();
        $user6->name = 'daniel';
        $user6->email= 'jsoliz064@gmail.com';
        $user6->password = bcrypt('12345678');
        $user6->save();
    }
}
