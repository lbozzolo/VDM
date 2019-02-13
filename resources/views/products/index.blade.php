@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="display-4">Productos</h2>

                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-outline-primary mt-3" >Agregar Producto<i class="mdi mdi-plus"></i></a>

                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Proveedor</th>
                                            <th>Importe</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{!! $product->name !!}</td>
                                            <td>{!! config('system.servers.type.'.$product->type) !!}</td>
                                            <td>{!! ($product->supplier)? $product->supplier->name : '-' !!}</td>
                                            <td>{!! ($product->fee)? '$'.$product->fee : '-' !!}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection