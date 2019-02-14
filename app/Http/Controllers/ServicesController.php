<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Project;
use Vdm\Models\Service;
use Vdm\Models\Supplier;

class ServicesController extends Controller
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
        $data['services'] = Service::all();
        return view('services.index')->with($data);
    }

    public function create()
    {
        $data = config('system.servers');
        $data['suppliers'] = Supplier::pluck('name', 'id');

        return view('services.create')->with($data);
    }

    public function store(Request $request)
    {

        $data['service'] = Service::create([
            'name' => $request->name,
            'fee' => $request->fee,
            'supplier_id' => $request->supplier_id,
        ]);

        if(!$data['service'])
            return redirect()->back()->withErrors('No se pudo agregar el servicio');

        return redirect()->route('services.index')->with('ok', 'Servicio agregado con éxito');
    }

    public function show($id)
    {
        $data['service'] = Service::find($id);

        if(!$data['service'])
            return redirect()->back()->withErrors('No se pudo encontrar el servicio');

        return view('services.show')->with($data);
    }

    public function edit($id)
    {
        $data = config('system.servers');
        $data['suppliers'] = Supplier::pluck('name', 'id');
        $data['service'] = Service::find($id);

        if(!$data['service'])
            return redirect()->back()->withErrors('No se pudo encontrar el servicio');

        return view('services.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $data['service'] = Service::find($id);

        if(!$data['service'])
            return redirect()->back()->withErrors('No se pudo encontrar el servicio');

        $data['service']->name =  $request->name;
        $data['service']->fee = $request->fee;
        $data['service']->supplier_id = $request->supplier_id;

        $data['service']->save();

        return redirect()->route('services.index')->with('ok', 'Servicio editado con éxito');
    }

    public function destroy(Request $request)
    {
        $data['service'] = Service::find($request->service_id);

        if(!$data['service'])
            return redirect()->back()->withErrors('No se pudo eliminar el servicio');

        $data['service']->delete();

        return redirect()->route('services.index')->with('ok', 'Servicio eliminado con éxito');
    }
}
