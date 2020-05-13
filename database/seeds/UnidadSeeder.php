<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidad')->insert([
          'materia_id' => 1,
          'nombre' => 'UNIDAD 1',
          'descripcion' => 'ELEMENTOS DE LÓGICA SIMBÓLICA',
          'objetivo' => 'Que el alumno aplique los elementos básicos de lógica matemática en sus razonamientos y
                          argumentaciones, y diversos métodos de demostración en el desarrollo de la teoría matemática.',
        ]);

        DB::table('unidad')->insert([
          'materia_id' => 1,
          'nombre' => 'UNIDAD 2',
          'descripcion' => 'FUNCIONES REALES DE VARIABLE REAL',
          'objetivo' => 'Que el estudiante explore el comportamiento de una función a partir de su definición, a partir
de sus diversas representaciones y a partir de diversas operaciones que la puedan generar.',
        ]);

        DB::table('unidad')->insert([
          'materia_id' => 1,
          'nombre' => 'UNIDAD 3',
          'descripcion' => 'LÍMITES DE LAS FUNCIONES Y SUS PROPIEDADES',
          'objetivo' => 'Que el estudiante aplique la teoría de límites para describir la tendencia en el comportamiento
de una función según el comportamiento de la variable independiente.',
        ]);

        DB::table('unidad')->insert([
          'materia_id' => 1,
          'nombre' => 'UNIDAD 4',
          'descripcion' => 'DERIVADAS',
          'objetivo' => 'Que el estudiante encuentre la derivada de una función real de variable real mediante la
aplicación de las diversas reglas y técnicas de diferenciación, interpretando adecuadamente sus resultados.',
        ]);

        DB::table('unidad')->insert([
          'materia_id' => 1,
          'nombre' => 'UNIDAD 5',
          'descripcion' => 'APLICACIONES DE LA DERIVADA',
          'objetivo' => 'Que el estudiante aplique la teoría de la diferenciación para resolver problemas de aplicación en
la ingeniería.',
        ]);

        DB::table('unidad')->insert([
          'materia_id' => 1,
          'nombre' => 'UNIDAD 6',
          'descripcion' => 'TRAZADO DE CURVAS',
          'objetivo' => 'Que el estudiante identifique las características importantes en el comportamiento de una
función mediante el análisis de su gráfica, para modelar diversos fenómenos y aplicaciones en ingeniería.',
        ]);
    }
}
