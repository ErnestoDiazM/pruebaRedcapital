<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        
        DB::table('users')->insert([

            'nombre' => 'JUANITO',
            'apellido' => 'PEREZ',
            'privilegio' => 'ADMINISTRADOR',
            'email' => '1@2.cl',
            'password' =>bcrypt('12345'),
            'remember_token' => Str::random(10),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
            
        ]);
    }
}
