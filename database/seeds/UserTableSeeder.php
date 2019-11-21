<?php

use Illuminate\Database\Seeder;
//colocar los dos
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Se le va a pedir al modelo que traiga
        el nombre del usuario cumpliendo los :: */
        $role_user = Role::where('name','user')->first();
        /*Se le va a pedir al modelo que traiga
        el nombre del usuario cumpliendo los :: */
        $role_admin = Role::where('name','admin')->first();

        //ahora que se tienen los dos roles se le va a asignar
        //a un usuario

        //se van a crear dos usuarios el comun y el adm

        $user = new User();
        $user->name = "User";
        $user->email = "user@gmail.com";
        //bcrypt funcion de laravel para encriptar
        $user->password = bcrypt('query');
        $user->roles = 2;
        $user->save();

        $user->roles()->attach($role_user);

        $user->save();
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@gmail.com";
        //bcrypt funcion de laravel para encriptar
        $user->password = bcrypt('query');
        $user->roles = 1;

        $user->save();

        //ahora se va asignar el rol con el usuario
        //OJO:relacion de muchos a muchos
        //tener en cuenta como se va a relacionar una rol con usuario con una relacio de muchos a muchos
        //para esto laravel provee eloquent
        $user->roles()->attach($role_admin);
    }
}
