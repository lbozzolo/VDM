<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Product;
use Vdm\Models\Project;
use Vdm\Models\Supplier;

class ProductsController extends Controller
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
        $data['products'] = Product::all();
        return view('products.index')->with($data);
    }

    public function create()
    {
        $data['suppliers'] = Supplier::pluck('name', 'id');
        $data['ip_class'] = config('system.servers.ip_class');
        $data['processor'] = config('system.servers.processor');
        $data['ram'] = config('system.servers.ram');
        $data['storage'] = config('system.servers.storage');
        $data['connectivity'] = config('system.servers.connectivity');
        $data['direct_admin'] = config('system.servers.direct_admin');
        $data['backbone_shared'] = config('system.servers.backbone_shared');
        $data['so'] = config('system.servers.so');
        $data['additional_bandwidth'] = config('system.servers.additional_bandwidth');
        $data['admin_access'] = config('system.servers.admin_access');
        $data['storage_backup'] = config('system.servers.storage_backup');
        $data['type'] = config('system.servers.type');

        //dd($data);

        return view('products.create')->with($data);
    }

    public function store(Request $request)
    {

        $data['product'] = Product::create([
            'name' => $request->name,
            'fee' => $request->fee,
            'ip_address' => $request->ip_address,
            'ip_class' => $request->ip_class,
            'username' => $request->username,
            'password' => $request->password,
            'port' => $request->port,
            'processor' => $request->processor,
            'ram' => $request->ram,
            'storage' => $request->storage,
            'connectivity' => $request->connectivity,
            'direct_admin' => $request->direct_admin,
            'backbone_shared' => $request->backbone_shared,
            'so' => $request->so,
            'additional_bandwidth' => $request->additional_bandwidth,
            'admin_access' => $request->admin_access,
            'storage_backup' => $request->storage_backup,
            'type' => $request->type,
            'supplier_id' => $request->supplier_id,
        ]);

        if(!$data['product'])
            return redirect()->back()->withErrors('No se pudo agregar el producto');

        return redirect()->route('products.index')->with('ok', 'Producto agregado con éxito');
    }

    public function show($id)
    {
        $data['product'] = Product::find($id);

        if(!$data['product'])
            return redirect()->back()->withErrors('No se pudo encontrar el proveedor');

        return view('products.show')->with($data);
    }

    public function edit($id)
    {
        $data['product'] = Product::find($id);

        if(!$data['product'])
            return redirect()->back()->withErrors('No se pudo encontrar el proveedor');

        return view('products.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $data['product'] = Product::find($id);

        if(!$data['product'])
            return redirect()->back()->withErrors('No se pudo encontrar el proveedor');

        $data['product']->name =  $request->name;
        $data['product']->email = $request->email;

        $data['product']->save();

        return redirect()->route('products.index')->with('ok', 'Proveedor editado con éxito');
    }

    public function destroy(Request $request)
    {
        $data['product'] = Product::find($request->supplier_id);

        if(!$data['product'])
            return redirect()->back()->withErrors('No se pudo eliminar el proveedor');

        $data['product']->delete();

        return redirect()->route('products.index')->with('ok', 'Proveedor eliminado con éxito');
    }
}
