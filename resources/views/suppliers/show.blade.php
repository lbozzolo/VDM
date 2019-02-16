@extends('base')

@section('content')


    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">{!! $supplier->name !!} {!! ($supplier->email)? '<span class="text-muted "> / '.$supplier->email.'</span>' : '' !!} </h2>
                    <h4 class="card-title">
                        Descripción del proveedor
                    </h4>
                    <a href="{{ route('suppliers.index') }}" class="btn btn-outline-primary  " >ver todos</a>

                </div>
            </div>
        </div>

    </div>
    <div class="row mt-3">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Productos</h3>
                    <ul class="list-unstyled">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Importe</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($supplier->products as $product)
                                    <tr>
                                        <td><a href="{{ route('products.show', $product->id) }}">{!! $product->name !!}</a></td>
                                        <td>{!! config('system.servers.type.'.$product->type) !!}</td>
                                        <td>{!! ($product->fee)? '$ '.$product->fee : '-' !!}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-muted">No hay productos cargados en este proveedor</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Servicios</h3>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Importe</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($supplier->services as $service)
                                <tr>
                                    <td><a href="{{ route('services.show', $service->id) }}">{!! $service->name !!}</a></td>
                                    <td>{!! ($service->fee)? '$ '.$service->fee : '-' !!}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-muted">No hay servicios cargados en este proveedor</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection