<?php

use Illuminate\Database\Seeder;

class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agents')->insert([
            [
                'name' => 'Dody',
                'last_name' => 'Beati',
                'username' => 'Dody',
                'head' => '',
                'email' => 'dody@cuartocreativo.com.ar',
                'url' => 'www.cuartocreativo.com.ar',
                'address' => '',
                'phone' => '54 9 11 6714-9205',
                'cuit' => '',
                'cuil' => '',
                'remarks' => '',
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],
        ]);
    }
}
