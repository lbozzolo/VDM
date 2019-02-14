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
                                            <th class="text-center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{!! $product->name !!}</td>
                                            <td>{!! config('system.servers.type.'.$product->type) !!}</td>
                                            <td>{!! ($product->supplier)? $product->supplier->name : '-' !!}</td>
                                            <td>{!! ($product->fee)? '$'.$product->fee : '-' !!}</td>
                                            <td width="100">
                                                <a href="{{ route('products.edit', $product->id) }}" title="Editar" class="btn btn-sm text-primary button-action"><i class="mdi mdi-table-edit"></i></a>
                                                <a href="{{ route('products.show', $product->id) }}" title="Detalles" class="btn btn-sm text-info button-action"><i class="mdi mdi-file-document-box"></i></a>
                                                <button title="Eliminar" type="button" data-toggle="modal" data-target="#delete{!! $product->id !!}" class="btn btn-sm  button-action text-danger"><i class="mdi mdi-delete"></i></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="delete{!! $product->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" ><i class="mdi mdi-alert-circle text-danger"></i> Eliminar producto</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Desea eliminar este producto?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                {!! Form::open(['url' => route('products.destroy'), 'method' => 'delete']) !!}

                                                                {!! Form::hidden('product_id', $product->id) !!}
                                                                <button title="Eliminar" type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
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