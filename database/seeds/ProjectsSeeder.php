<?php

use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phase = \Vdm\Models\Phase::where('name', 'Testing')->first();
        $rizoma = \Vdm\Models\Customer::where('username', 'Rizoma')->first();
        $dody = \Vdm\Models\Agent::where('username', 'Dody')->first();
        $lucas = \Vdm\User::where('email', 'lucas@verticedigital.com.ar')->first();

        DB::table('projects')->insert([
            [
                'title' => 'Rizoma Group',
                'description' => 'Web para empresa dedicada a la creación de imagen, identidad, diseño, organización de ferias, congresos, jornadas a campo, eventos, diseño y construcción de stands y espacios interactivos.',
                'fee' => null,
                'period' => '',
                'deadline' => null,
                'remarks' => '',
                'phase_id' => $phase->id,
                'customer_id' => $rizoma->id,
                'agent_id' => $dody->id,
                'owner_id' => $lucas->id,
                'user_id' => $lucas->id,
                'created_at' => date_create(),
                'updated_at' => date_create()
            ],
        ]);
    }
}
