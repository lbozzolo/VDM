<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states_budgets')->insert([
            [
                'name' => 'Pendiente',
                'slug' => 'pendiente'
            ],
            [
                'name' => 'Aprobado',
                'slug' => 'aprobado'
            ],
            [
                'name' => 'Rechazado',
                'slug' => 'rechazado'
            ]
        ]);
    }
}
