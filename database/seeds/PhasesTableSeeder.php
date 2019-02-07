<?php

use Illuminate\Database\Seeder;

class PhasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phases')->insert([
            ['name' => 'Presupuesto'],
            ['name' => 'Análisis'],
            ['name' => 'Desarrollo'],
            ['name' => 'Testing'],
            ['name' => 'Capacitación'],
            ['name' => 'Producción']
        ]);
    }
}
