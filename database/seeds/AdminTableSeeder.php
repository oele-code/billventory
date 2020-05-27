<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'number'   => '0000000001',
                'name'     => 'Administrador',
                'email'    => 'admin@email.com',
                'mobile'   => '300123456',
                'password' => bcrypt('secret'),
                'type'     => '1',
        ]);
    }
}
