<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('Bowling\Entity\Role')->create([
            'name' => 'admin',
            'label' => 'Administrator'
        ]);
        factory('Bowling\Entity\Role')->create([
            'name' => 'moderator',
            'label' => 'Moderator'
        ]);
        factory('Bowling\Entity\Role')->create([
            'name' => 'company',
            'label' => 'Company'
        ]);
        factory('Bowling\Entity\Role')->create([
            'name' => 'user',
            'label' => 'User'
        ]);
    }
}
