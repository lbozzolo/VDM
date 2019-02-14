<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Contact;
use Vdm\Models\Customer;
use Vdm\Models\Phase;
use Vdm\Models\Project;
use Vdm\User;

class CustomersController extends Controller
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
        $data['customers'] = Customer::all();
        return view('customers.index')->with($data);
    }

    public function create()
    {
        $data = '';
        return view('customers.create')->with($data);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $data['customer'] = Customer::create([
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

        if(!$data['customer'])
            return redirect()->back()->withErrors('No se pudo crear el cliente.');

        return redirect()->route('customers.show', $data['customer']->id)->with('ok', 'Cliente creado con éxito');
    }

    public function show($id)
    {
        $data['customer'] = Customer::find($id);

        if(!$data['customer'])
            return redirect()->back()->withErrors('No se pudo encontrar el cliente');

        $data['contacts'] = Contact::all()->pluck('fullname', 'id');

        return view('customers.show')->with($data);
    }

    public function edit($id)
    {
        $data['customer'] = Customer::find($id);

        if(!$data['customer'])
            return redirect()->back()->withErrors('No se pudo encontrar el cliente');

        return view('customers.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $data['customer'] = Customer::find($id);

        if(!$data['customer'])
            return redirect()->back()->withErrors('No se pudo encontrar el cliente');

        $data['customer']->name =  $request->name;
        $data['customer']->last_name = $request->last_name;
        $data['customer']->username = $request->username;
        $data['customer']->head = $request->head;
        $data['customer']->email = $request->email;
        $data['customer']->url = $request->url;
        $data['customer']->address = $request->address;
        $data['customer']->phone = $request->phone;
        $data['customer']->cuit = $request->cuit;
        $data['customer']->cuil = $request->cuil;
        $data['customer']->remarks = $request->remarks;

        $data['customer']->save();

        return redirect()->route('customers.index')->with('ok', 'Cliente editado con éxito');
    }

    public function destroy(Request $request)
    {
        $data['customer'] = Customer::find($request->customer_id);

        if(!$data['customer'])
            return redirect()->back()->withErrors('No se pudo eliminar el cliente');

        $data['customer']->delete();

        return redirect()->route('customers.index')->with('ok', 'Cliente eliminado con éxito');
    }

}
