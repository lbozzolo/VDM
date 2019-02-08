<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Budget;
use Vdm\Models\Expiration;
use Vdm\Models\Project;
use Carbon\Carbon;

class ExpirationsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->has('project_id'))
            return redirect()->back()->withErrors('No se econtró el proyecto seleccionado');

        $project = Project::find($request->project_id);

        if($request->payment_date)
            $paymentDate = Carbon::createFromFormat('d/m/Y', $request->payment_date)->toDateTimeString();

        $expiration = Expiration::create([
            'project_id' => $project->id,
            'customer_id' => $project->customer->id,
            'fee' => $request->fee,
            'payment_date' => (isset($paymentDate))? $paymentDate : null,
            'expiration_alert' => $request->expiration_alert,
            'remarks' => $request->remarks
        ]);

        if(!$expiration)
            return redirect()->back()->withErrors('No se pudo agregar el vencimiento');

        return redirect()->back()->with('ok', 'Vencimiento agregado correctamente');
    }

    public function update($id)
    {
        $expiration = Expiration::find($id);
        dd($expiration);
    }

    public function destroy(Request $request)
    {
        $expiration = Expiration::find($request->expiration_id);

        if(!$expiration)
            return redirect()->back()->withErrors('No se pudo eliminar el vencimiento');

        $expiration->delete();

        return redirect()->back()->with('ok', 'Vencimiento eliminado con éxito');
    }

}
