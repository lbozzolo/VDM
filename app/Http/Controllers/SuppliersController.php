<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Supplier;

class SuppliersController extends Controller
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
        $data['suppliers'] = Supplier::all();
        return view('suppliers.index')->with($data);
    }

    public function create()
    {
        $data['suppliers'] = Supplier::pluck('name', 'id');

        return view('suppliers.create')->with($data);
    }

    public function store(Request $request)
    {
        $data['supplier'] = Supplier::create([
            'name' => $request->name,
            'email' => $request->email
        ]);

        if(!$data['supplier'])
            return redirect()->back()->withErrors('No se pudo agregar el proveedor');

        return redirect()->route('suppliers.index')->with('ok', 'Proveedor agregado con éxito');
    }

    public function show($id)
    {
        $data['supplier'] = Supplier::find($id);

        if(!$data['supplier'])
            return redirect()->back()->withErrors('No se pudo encontrar el proveedor');

        return view('suppliers.show')->with($data);
    }

    public function edit($id)
    {
        $data['supplier'] = Supplier::find($id);

        if(!$data['supplier'])
            return redirect()->back()->withErrors('No se pudo encontrar el proveedor');

        return view('suppliers.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $data['supplier'] = Supplier::find($id);

        if(!$data['supplier'])
            return redirect()->back()->withErrors('No se pudo encontrar el proveedor');

        $data['supplier']->name =  $request->name;
        $data['supplier']->email = $request->email;

        $data['supplier']->save();

        return redirect()->route('suppliers.index')->with('ok', 'Proveedor editado con éxito');
    }

    public function destroy(Request $request)
    {
        $data['supplier'] = Supplier::find($request->supplier_id);

        if(!$data['supplier'])
            return redirect()->back()->withErrors('No se pudo eliminar el proveedor');

        $data['supplier']->delete();

        return redirect()->route('suppliers.index')->with('ok', 'Proveedor eliminado con éxito');
    }
}
