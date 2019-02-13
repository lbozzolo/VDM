<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Budget;
use Vdm\Models\Project;
use Vdm\Models\StateBudget;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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

    public function index()
    {
        $data['states'] = StateBudget::all()->pluck('name', 'id');
        $data['budgets'] = Budget::all();
        return view('budgets.index')->with($data);
    }

    public function create()
    {
        $data['projects'] = Project::pluck('title', 'id');
        $data['budgets'] = Budget::all()->sortByDesc('id');

        return view('budgets.create')->with($data);
    }

    public function store(Request $request)
    {
        $data['budget'] = Budget::create([
            'fee' => $request->fee,
            'payment_method' => $request->payment_method,
            'model_file' => $request->model_file,
            'project_id' => $request->project_id,
        ]);

        $pendiente = StateBudget::where('slug', 'pendiente')->first();

        if($request->file('model_file')){
            $file = $request->file('model_file');
            $nombre = $file->getClientOriginalName();
            Storage::disk('local')->put($nombre,  File::get($file));

            $data['budget']->model_file = $nombre;
            $data['budget']->state_id = $pendiente->id;
            $data['budget']->save();
        }

        if(!$data['budget'])
            return redirect()->back()->withErrors('No se pudo agregar el presupuesto');

        return redirect()->back()->with('ok', 'Presupuesto agregado con éxito');
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
