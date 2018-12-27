<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '0',
            'name'  =>  'Anônimo',
            'email' => '',
            'password' => '',
        ]);
        DB::table('users')->insert([
            'id' => '1',
            'name'  =>  'Administrador',
            'email' => 'admin@admin.com',
            'password' => '123456',
        ]);
    }
}
