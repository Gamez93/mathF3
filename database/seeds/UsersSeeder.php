<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Administrador MathF3',
        'email' => 'admin.user@gmail.com',
        'password' => bcrypt('12345678'),
        'isAdmin' => 1
      ]);

      DB::table('users')->insert([
        'name' => 'Normal User MathF3',
        'email' => 'normal.user@gmail.com',
        'password' => bcrypt('12345678'),
        'isAdmin' => 0
      ]);
    }
}
