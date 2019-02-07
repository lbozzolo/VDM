<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Phase;

class PhasesController extends Controller
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
        $data['phases'] = Phase::all()->pluck('name', 'id');
        return view('phases.index')->with($data);
    }

    public function store(Request $request)
    {
        $phase = Phase::create(['name' => $request->name]);

        if(!$phase)
            return redirect()->back()->withErrors('No se pudo guardar la fase correctamente');

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $phase = Phase::find($request->phase_id);
        $phase->delete();

        return redirect()->back();
    }

}
