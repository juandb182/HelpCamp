<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    //esta clase se encarga de arrancar de manera ordenada cada seeder
    //primero arrancar el rol,sino daria error debido a que es lo q primero se asigna
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
