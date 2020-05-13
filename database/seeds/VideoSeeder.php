<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //unidad 1
        DB::table('video')->insert([
          'unidad_id' => 1,
          'descripcion' => 'video unidad 1',
          'URL' => 'https://www.youtube.com/watch?v=6isDhahJve0',
          'estado' => 1,
        ]);
        DB::table('video')->insert([
          'unidad_id' => 1,
          'descripcion' => 'video unidad 1',
          'URL' => 'https://www.youtube.com/watch?v=gNdrxk5yTWU',
          'estado' => 1,
        ]);

        //unidad 2
        DB::table('video')->insert([
          'unidad_id' => 2,
          'descripcion' => 'video unidad 2',
          'URL' => 'https://www.youtube.com/watch?v=fYMKkcqY7f0',
          'estado' => 1,
        ]);
        DB::table('video')->insert([
          'unidad_id' => 2,
          'descripcion' => 'video unidad 2',
          'URL' => 'https://www.youtube.com/watch?v=o2UTk8bsLS0',
          'estado' => 1,
        ]);
    }
}
