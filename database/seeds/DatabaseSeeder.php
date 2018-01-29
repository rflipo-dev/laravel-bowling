<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = [
        'users',
        'games',
        'frames',
        'launches',
        'game_user',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->cleanDatabase();
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(GameTableSeeder::class);
        $this->call(FrameTableSeeder::class);
        $this->call(LaunchTableSeeder::class);

        if (config('app.env') == 'local') {
            $this->call(DevEnvSeeder::class);
        }

        Model::reguard();
    }

    private function cleanDatabase() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
