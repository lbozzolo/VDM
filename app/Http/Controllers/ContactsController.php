<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Contact;
use Vdm\Models\Customer;
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

        if($request->has('project_id')){
            $project = Project::find($request->project_id);
            $project->contacts()->attach($data['contact']);
        }

        if($request->has('customer_id')){
            $customer = Customer::find($request->customer_id);
            $customer->contacts()->attach($data['contact']);
        }

        return redirect()->back();
    }

    public function attach(Request $request)
    {
        if($request->has('customer_id')){
            $customer = Customer::find($request->customer_id);
            $customer->contacts()->attach($request->contact_id);
        }

        if($request->has('project_id')){
            $project = Project::find($request->project_id);
            $project->contacts()->attach($request->contact_id);
        }

        return redirect()->back();
    }

    public function detach(Request $request, $id)
    {
        $data['contact'] = Contact::find($id);

        if(!$data['contact'])
            return redirect()->back()->withErrors('No se pudo desvincular el contacto.');

        if($request->has('customer_id')){
            $customer = Customer::find($request->customer_id);
            $customer->contacts()->detach($data['contact']);
        }

        if($request->has('project_id')){
            $project = Project::find($request->project_id);
            $project->contacts()->detach($data['contact']);
        }

        return redirect()->back();
    }
}
