<?php

use Illuminate\Database\Seeder;
//namespace de la aplicacion \ el modelo que  se va a utilizar
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creacion de un nuevo rol
        $role = new Role();
        $role->name = "admin";
        $role->descripcion = "Administrador";
        $role->save();
        
        $role = new Role();
        $role->name = "user";
        $role->descripcion = "User";
        $role->save();
    }
}
