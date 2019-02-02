<?php

use Illuminate\Database\Seeder;
use Vdm\User;

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
            [
                'name' => 'Lucas',
                'last_name' => 'Bozzolo',
                'email' => 'lucas@verticedigital.com.ar',
                'password' => bcrypt('golf'),
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],
            [
                'name' => 'Fernando',
                'last_name' => 'Alfonso',
                'email' => 'fernando@verticedigital.com.ar',
                'password' => bcrypt('1234'),
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],
        ]);

        $lucas = User::where('email', '=', 'lucas@verticedigital.com.ar')->first();
        $pelado = User::where('email', '=', 'fernando@verticedigital.com.ar')->first();

        $lucas->assignRole('superadmin');
        $pelado->assignRole('superadmin');
    }
}
