<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
          'users',
          'materia',
          'unidad',
          'clase',
          'video',
          'bibliografia',
        ]);

        $this->call(UsersSeeder::class);
        $this->call(MateriasSeeder::class);
        $this->call(UnidadSeeder::class);
        $this->call(ClaseSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(BibliografiaSeeder::class);
    }

    protected function truncateTables(array $tables){
      DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

      foreach($tables as $table){
        DB::table($table)->truncate();
      }

      DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
