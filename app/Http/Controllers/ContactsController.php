<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Contact;
use Vdm\Models\Project;

class ContactsController extends Controller
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
        return view('index');
    }

    public function store(Request $request)
    {
        $project = Project::find($request->project_id);

        $data['contact'] = Contact::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'remarks' => $request->remarks
        ]);

        if(!$data['contact'])
            return redirect()->back()->withErrors('No se pudo crear el contacto.');

        $project->contacts()->attach($data['contact']);

        return redirect()->back();
    }
}
