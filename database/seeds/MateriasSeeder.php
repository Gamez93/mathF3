<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materia')->insert([
          'nombre' => 'Matematica I',
          'codigo_materia' => '010113',
          'descripcion' => 'Matemática I es una asignatura de las ciencias básicas que proporciona la base conceptual y procedimental
                            del cálculo diferencial para funciones reales de una variable real: una introducción a la lógica simbólica y
                            métodos de demostración, tipos de funciones, límites, continuidad, derivadas y sus aplicaciones más
                            importantes en ingeniería. Estos conocimientos y habilidades le ayudarán a los estudiantes a comprender
                            los modelos matemáticos univariados que deben enfrentar a lo largo de su carrera.',
          'objetivo_general'=>'Que el estudiante sea capaz de aplicar las técnicas del cálculo diferencial univariado para modelar
                            fenómenos, analizar situaciones representadas mediante funciones reales de una variable real, y para
                            resolver problemas relativos a diversas aplicaciones en ingeniería.',
          'estado' => 1,
          'numeroDeOrden' => 2,
          'prerrequisito'=>'Admision',
          'horasPorCiclo'=>85,
          'horasTeoricasSemanales'=>4,
          'horasPracticasSemanales'=>1,
          'cicloEnSemanas'=>17,
          'horaClase'=>50,
          'unidadesValorativas'=>4,
          'identificacionCiclo'=>1,
        ]);

        DB::table('materia')->insert([
          'nombre' => 'Matematica II',
          'codigo_materia' => '010115',
          'descripcion' => 'Matemática I es una asignatura de las ciencias básicas que proporciona la base conceptual y procedimental
                            del cálculo diferencial para funciones reales de una variable real: una introducción a la lógica simbólica y
                            métodos de demostración, tipos de funciones, límites, continuidad, derivadas y sus aplicaciones más
                            importantes en ingeniería. Estos conocimientos y habilidades le ayudarán a los estudiantes a comprender
                            los modelos matemáticos univariados que deben enfrentar a lo largo de su carrera.',
          'objetivo_general'=>'Que el estudiante sea capaz de aplicar las técnicas del cálculo diferencial univariado para modelar
                            fenómenos, analizar situaciones representadas mediante funciones reales de una variable real, y para
                            resolver problemas relativos a diversas aplicaciones en ingeniería.',
          'estado' => 1,
          'numeroDeOrden' => 2,
          'prerrequisito'=>'Admision',
          'horasPorCiclo'=>85,
          'horasTeoricasSemanales'=>4,
          'horasPracticasSemanales'=>1,
          'cicloEnSemanas'=>17,
          'horaClase'=>50,
          'unidadesValorativas'=>4,
          'identificacionCiclo'=>2,
        ]);
    }
}
