<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user4 = new User();
        $user4->name = 'admin';
        $user4->email= 'admin@gmail.com';
        $user4->password = bcrypt('admin');
        $user4->assignRole('Admin');
        $user4->save();

        $user5 = new User();
        $user5->name = 'harold';
        $user5->email= 'harold@gmail.com';
        $user5->password = bcrypt('124');
        $user5->assignRole('Admin');
        $user5->save();

        $user6 = new user();
        $user6->name = 'daniel';
        $user6->email= 'jsoliz064@gmail.com';
        $user6->password = bcrypt('1234');
        $user6->assignRole('Admin');
        $user6->save();
        
        User::create([
            'name' => 'darwin',
            'email'=> 'darwinjr40@gmail.com',
            'password' => bcrypt('12345678')  
        ])->assignRole('Admin');
            
        $user8 = new user();
        $user8->name = 'Maria';
        $user8->email= 'mariaLance@gmail.com';
        $user8->password = bcrypt('87654321');
        $user8->assignRole('Admin');
        $user8->save();

        User::create([
            'name' => 'mark',
            'email'=> 'mark123@gmail.com',
            'password' => bcrypt('12345678')  
        ])->assignRole('Admin');

        User::create([
            'name' => 'raul',
            'email'=> 'raul123@gmail.com',
            'password' => bcrypt('12345678')  
        ])->assignRole('Venta');
    }
}
