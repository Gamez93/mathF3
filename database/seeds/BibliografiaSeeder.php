<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BibliografiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bibliografia')->insert([
          'materia_id' => 1,
          'descripcion' => 'material de apoyo 1',
          'URL' => 'http://personales.unican.es/gonzaleof/ciencias_1/conicas.pdf',
          'estado' => 1,
        ]);
        DB::table('bibliografia')->insert([
          'materia_id' => 1,
          'descripcion' => 'material de apoyo 2',
          'URL' => 'http://www.geoan.com',
          'estado' => 1,
        ]);
        DB::table('bibliografia')->insert([
          'materia_id' => 1,
          'descripcion' => 'material de apoyo 3',
          'URL' => 'http://quiz.uprm.edu/tutorials_master/complejos/num_complejos_right.xhtml',
          'estado' => 1,
        ]);
        DB::table('bibliografia')->insert([
          'materia_id' => 1,
          'descripcion' => 'material de apoyo 4',
          'URL' => 'http://thales.cica.es/rd/Recursos/rd99/ed99-0289-02/ed99-0289-02.html',
          'estado' => 1,
        ]);
    }
}
