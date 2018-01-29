<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory('Bowling\Entity\User', 10)->create();

        // factory('Bowling\Entity\User')->create([
        //     'firstname' => 'custom',
        //     'lastname' => 'custom',
        //     'username' => 'custom',
        // ]);
        factory('Bowling\Entity\User')->create([
            'email' => 'admin@admin.com',
            'password' => 'admin',
        ])->assignRole('admin');

    }
}
