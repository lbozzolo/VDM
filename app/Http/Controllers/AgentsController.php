<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Agent;

class AgentsController extends Controller
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
        $data['agents'] = Agent::all();
        return view('agents.index')->with($data);
    }

    public function create()
    {
        $data = '';
        return view('agents.create')->with($data);
    }

    public function store(Request $request)
    {
        $data['agent'] = Agent::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'head' => $request->head,
            'email' => $request->email,
            'url' => $request->url,
            'address' => $request->address,
            'phone' => $request->phone,
            'cuit' => $request->cuit,
            'cuil' => $request->cuil,
            'remarks' => $request->remarks
        ]);

        if(!$data['agent'])
            return redirect()->back()->withErrors('No se pudo crear el intermediario.');

        return redirect()->route('agents.show', $data['agent']->id)->with('ok', 'Intermediario creado con éxito');
    }

    public function show($id)
    {
        $data['agent'] = Agent::find($id);

        if(!$data['agent'])
            return redirect()->back()->withErrors('No se pudo encontrar el intermediario');


        return view('agents.show')->with($data);
    }

    public function edit($id)
    {
        $data['agent'] = Agent::find($id);

        if(!$data['agent'])
            return redirect()->back()->withErrors('No se pudo encontrar el intermediario');

        return view('agents.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $data['agent'] = Agent::find($id);

        if(!$data['agent'])
            return redirect()->back()->withErrors('No se pudo encontrar el intermediario');

        $data['agent']->name =  $request->name;
        $data['agent']->last_name = $request->last_name;
        $data['agent']->username = $request->username;
        $data['agent']->head = $request->head;
        $data['agent']->email = $request->email;
        $data['agent']->url = $request->url;
        $data['agent']->address = $request->address;
        $data['agent']->phone = $request->phone;
        $data['agent']->cuit = $request->cuit;
        $data['agent']->cuil = $request->cuil;
        $data['agent']->remarks = $request->remarks;

        $data['agent']->save();

        return redirect()->route('agents.index')->with('ok', 'Intermediario editado con éxito');
    }

    public function destroy(Request $request)
    {
        $data['agent'] = Agent::find($request->agent_id);

        if(!$data['agent'])
            return redirect()->back()->withErrors('No se pudo eliminar el intermediario');

        $data['agent']->delete();

        return redirect()->route('agents.index')->with('ok', 'Intermediario eliminado con éxito');
    }

}
