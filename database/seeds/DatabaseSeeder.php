<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //$this->call(UsersTableSeeder::class);
        //un comengtario
        
        DB::table('users')->insert([
            'name' => 'Moises',
            'lastname' => 'Serrano',
            'email' => 'moycs777@gmail.com',
            'password' => bcrypt('12345678'),
            'estado' => 'a',
            'profile' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Josefina',
            'lastname' => 'Gonzalez',
            'email' => 'fixpina21@gmail.com',
            'password' => bcrypt('12345678'),
            'estado' => 'a',
            'profile' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'DevTeam',
            'lastname' => 'Bolivar',
            'email' => 'dev@team.com',
            'password' => bcrypt('12345678'),
            'estado' => 'a'
        ]);
        DB::table('clientes')->insert([
            'name' => 'Moises',
            'lastname' => 'Serrano',
            'email' => 'moycs777@gmail.com',
            'password' => bcrypt('12345678')
        ]);
         DB::table('categoria_producto')->insert([
            'descripcion' => 'Lubricantes',
            'estado' => 'a',
            'slug' => 'Lubricantes',
            'id_categoria_padre' => 0
        ]);
         DB::table('categoria_producto')->insert([
            'descripcion' => 'Comestible',
            'estado' => 'a',
            'slug' => 'Comestible',
            'id_categoria_padre' => 1]);
         DB::table('categoria_producto')->insert([
            'descripcion' => 'Lubricante de Chocolate',
            'estado' => 'a',
            'slug' => 'Lubricante-de-Chocolate',
            'id_categoria_padre' => 2
        ]);
        DB::table('categoria_producto')->insert([
            'descripcion' => 'No comestible',
            'estado' => 'a',
            'slug' => 'No-comestible',
            'id_categoria_padre' => 1
        ]);
         DB::table('categoria_producto')->insert([
            'descripcion' => 'Locion humectante',
            'estado' => 'a',
            'slug' => 'Locion-humectante',
            'id_categoria_padre' => 4
        ]);
        
        DB::table('categoria_producto')->insert([
            'descripcion' => 'Ropa',
            'estado' => 'a',
            'slug' => 'ropa',
            'id_categoria_padre' => 0
        ]);
        DB::table('categoria_producto')->insert([
            'descripcion' => 'Hombre',
            'estado' => 'a',
            'slug' => 'hombre',
            'id_categoria_padre' => 6
        ]);
         DB::table('categoria_producto')->insert([
            'descripcion' => 'Boxer',
            'estado' => 'a',
            'slug' => 'boxer',
            'id_categoria_padre' => 7
        ]);
         DB::table('categoria_producto')->insert([
            'descripcion' => 'Mujer',
            'estado' => 'a',
            'slug' => 'mujer',
            'id_categoria_padre' => 6
        ]);       
         DB::table('categoria_producto')->insert([
            'descripcion' => 'Bra',
            'estado' => 'a',
            'slug' => 'bra',
            'id_categoria_padre' => 9
        ]);
        DB::table('categoria_post')->insert([
            'descripcion' => 'Categoria Post Padre',
            'estado' => 'a',
            'id_categoria_padre' => 0,
            'created_at' => date('2015-03-15')
        ]); 
        DB::table('categoria_post')->insert([
            'descripcion' => 'Hijo Multimedia',
            'estado' => 'a',
            'id_categoria_padre' => 1
        ]);
        DB::table('categoria_post')->insert([
            'descripcion' => 'Nieto Multimedia',
            'estado' => 'a',
            'id_categoria_padre' => 2
        ]);

          
              
    }
}
