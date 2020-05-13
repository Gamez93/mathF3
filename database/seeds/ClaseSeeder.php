<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clase')->insert([
          'users_id' => 1,
          'tema' => 'Clase I',
          'contenido' => 'contenido de clase I',
          'estado' => 1,
        ]);

        DB::table('clase')->insert([
          'users_id' => 1,
          'tema' => 'Clase II',
          'contenido' => 'contenido de clase II',
          'estado' => 1,
        ]);

        DB::table('clase')->insert([
          'users_id' => 1,
          'tema' => 'Clase III',
          'contenido' => 'contenido de clase III',
          'estado' => 1,
        ]);

        DB::table('clase')->insert([
          'users_id' => 2,
          'tema' => 'Clase I',
          'contenido' => 'contenido de clase I',
          'estado' => 1,
        ]);

        DB::table('clase')->insert([
          'users_id' => 2,
          'tema' => 'Clase II',
          'contenido' => 'contenido de clase II',
          'estado' => 1,
        ]);

        DB::table('clase')->insert([
          'users_id' => 2,
          'tema' => 'Clase III',
          'contenido' => 'contenido de clase III',
          'estado' => 1,
        ]);
    }
}
