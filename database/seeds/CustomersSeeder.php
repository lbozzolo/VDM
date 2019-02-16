<?php

use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dody = \Vdm\Models\Agent::where('username', 'Dody')->first();

        DB::table('customers')->insert([
            [
                'name' => '',
                'last_name' => '',
                'username' => 'Rizoma',
                'head' => '',
                'email' => 'info@rizomagroup.com.ar',
                'url' => 'http://www.rizomagroup.com.ar/public/web',
                'address' => 'Cucha Cucha 1736',
                'phone' => '+11 - 4585-7774/5',
                'cuit' => '',
                'cuil' => '',
                'remarks' => '',
                'agent_id' => $dody->id,
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],
        ]);
    }
}
