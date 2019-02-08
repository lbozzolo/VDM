<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Budget;

class BudgetsController extends Controller
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
    public function destroy(Request $request)
    {
        $budget = Budget::find($request->budget_id);

        if(!$budget)
            return redirect()->back()->withErrors('No se pudo eliminar el presupuesto');

        $budget->delete();

        return redirect()->back()->with('ok', 'Presupuesto eliminado con éxito');
    }
}
