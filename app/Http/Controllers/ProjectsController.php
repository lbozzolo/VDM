<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Budget;
use Vdm\Models\Customer;
use Vdm\Models\Phase;
use Vdm\Models\Project;
use Vdm\Models\State;
use Vdm\Models\StateBudget;
use Vdm\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
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
    public function index()
    {
        $data['projects'] = Project::all();
        $data['phases'] = Phase::all()->pluck('name', 'id');

        return view('projects.index')->with($data);
    }

    public function indexTable()
    {
        $data['projects'] = Project::all();
        $data['phases'] = Phase::all()->pluck('name', 'id');

        return view('projects.index-table')->with($data);
    }

    public function create()
    {
        $data['users'] = User::all()->pluck('full_name', 'id');
        $data['customers'] = Customer::all()->pluck('fullname_username', 'id');
        $data['phases'] = Phase::all()->pluck('name', 'id');


        if(!$data['customers']->count())
            return view('customers.create')->with(['info' => 'No se puede crear un proyecto porque todavía no hay ningún cliente cargado. Ingrese un cliente y luego proceda a crear el proyecto', 'primerCliente' => true]);

        return view('projects.create')->with($data);
    }

    public function store(Request $request)
    {
        if($request->deadline)
            $deadline = Carbon::createFromFormat('d/m/Y', $request->deadline)->toDateTimeString();

        $data['project'] = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'owner_id' => $request->owner_id,
            'user_id' => Auth::user()->id,
            'customer_id' => $request->customer_id,
            'period' => $request->period,
            'phase_id' => ($request->phase_id)? $request->phase_id : 1,
            'deadline' => (isset($deadline))? $deadline : null,
            'remarks' => $request->remarks
        ]);

        if(!$data['project'])
            return redirect()->back()->withErrors('No se pudo crear el proyecto');

        return redirect()->route('projects.budgets', $data['project']->id)->with('info', 'Proyecto creado con éxito. ¿Desea agregar un presupuesto?');
    }

    public function show($id)
    {
        $data['project'] = Project::find($id);
        return view('projects.show')->with($data);
    }

    public function edit($id)
    {
        $data['project'] = Project::find($id);
        $data['users'] = User::all()->pluck('full_name', 'id');
        $data['customers'] = Customer::all()->pluck('fullname_username', 'id');
        $data['phases'] = Phase::all()->pluck('name', 'id');
        $data['states'] = StateBudget::all()->pluck('name', 'id');

        return view('projects.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        if(!$project)
            return redirect()->back()->withErrors('No se pudo actualizaar el proyecto');

        if($request->deadline)
            $deadline = Carbon::createFromFormat('d/m/Y', $request->deadline)->toDateTimeString();

        $project->title = $request->title;
        $project->description = $request->description;
        $project->owner_id = $request->owner_id;
        $project->user_id = Auth::user()->id;
        $project->customer_id = $request->customer_id;
        $project->period = $request->period;
        $project->phase_id = $request->phase_id;
        $project->deadline = (isset($deadline))? $deadline : null;
        $project->remarks = $request->remarks;

        $project->save();

        return redirect()->route('projects.index')->with('ok', 'Proyecto creado con éxito');
    }

    public function storeBudget(Request $request, $id)
    {
        $data['budget'] = Budget::create([
            'fee' => $request->fee,
            'payment_method' => $request->payment_method,
            'model_file' => $request->model_file,
            'project_id' => $id,
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

    public function seePdf($file)
    {
        return response()->make(\Illuminate\Support\Facades\File::get(storage_path("app/".$file)),200)
            ->header('Content-Type', 'application/pdf');
    }

    public function stateBudget(Request $request, $id)
    {
        $rejected = StateBudget::where('slug', 'rechazado')->first();
        $aprobado = StateBudget::where('slug', 'aprobado')->first();

        $project = Project::find($request->project_id);
        $budgets = $project->budgets;

        foreach($budgets as $budget){
            if($budget->state){
                if($budget->state->slug == 'aprobado' && $request->state_id == $aprobado->id){
                    $budget->state_id = $rejected->id;
                    $budget->save();
                }
            }

        }

        $data['budget'] = Budget::find($id);
        $data['budget']->state_id = $request->state_id;
        $data['budget']->save();

        $project->fee = $project->feeApprovedBudget();
        $project->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $project = Project::find($request->project_id);
        $project->delete();

        return redirect()->back()->with('ok', 'Proyecto eliminado con éxito');
    }

    // Anexos
                                                                        // HACER TABLA DE CONTACTOS!!!
    public function expirations($id)
    {
        $data['project'] = Project::find($id);
        $data['days'] = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31',];

        if(!$data['project'])
            return redirect()->back()->withErrors('No se encontró el proyecto seleccionado');

        return view('projects.expirations')->with($data);
    }

    public function images($id)
    {
        $data['project'] = Project::find($id);

        if(!$data['project'])
            return redirect()->back()->withErrors('No se encontró el proyecto seleccionado');

        return view('projects.images')->with($data);
    }

    public function budgets($id)
    {
        $data['project'] = Project::find($id);
        $data['states'] = StateBudget::all()->pluck('name', 'id');

        if(!$data['project'])
            return redirect()->back()->withErrors('No se encontró el proyecto seleccionado');

        return view('projects.budgets')->with($data);
    }


}
