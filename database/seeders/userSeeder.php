<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'role' => 2,
                'phone'=>'081290904081',
                'password'=>bcrypt('admin1234'),
                'alamat'=>'tangerang selatan',
            ],
            [
                'name' => 'staff User',
                'email' => 'staff@gmail.com',
                'role' => 1,
                'phone'=>'081290907660',
                'password'=>bcrypt('staff1234'),
                'alamat'=>'tangerang selatan',
            ],
            [
                'name' => 'member User',
                'email' => 'member@gmail.com',
                'role' => 0,
                'phone'=>'081290907661',
                'password'=>bcrypt('member1234'),
                'alamat'=>'tangerang selatan',
            ]
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
