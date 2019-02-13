@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="display-4">Proveedores</h2>

                    <a href="{{ route('suppliers.create') }}" class="btn btn-sm btn-outline-primary mt-3" >Agregar Proveedor<i class="mdi mdi-plus"></i></a>

                    <div class="card">
                        <div class="card-body">

                            <div id="budget-list">
                                <table class="table table-sm">
                                    @if($suppliers->count())
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Fecha</th>
                                            <th>Opciones</th>
                                        </tr>
                                        </thead>
                                    @endif
                                    <tbody>
                                    @forelse($suppliers as $supplier)
                                        <tr>
                                            <td>{!! ($supplier->name)? $supplier->name : '' !!}</td>
                                            <td>{!! $supplier->email !!}</td>
                                            <td>{!! $supplier->created_at !!}</td>
                                            <td class="text-left">
                                                <a href="{{ route('suppliers.edit', $supplier->id) }}" title="Editar" class="btn btn-sm text-primary button-action"><i class="mdi mdi-table-edit"></i></a>
                                                <a href="{{ route('suppliers.show', $supplier->id) }}" title="Detalles" class="btn btn-sm text-info button-action"><i class="mdi mdi-file-document-box"></i></a>
                                                <button title="Eliminar" type="button" data-toggle="modal" data-target="#delete{!! $supplier->id !!}" class="btn btn-xs btn-danger">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="delete{!! $supplier->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" ><i class="mdi mdi-alert-circle text-danger"></i> Eliminar proveedor</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Desea eliminar este proveedor?</p>
                                                                <p class="lead text-primary"> {!! $supplier->name !!}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                {!! Form::open(['url' => route('suppliers.destroy'), 'method' => 'delete']) !!}

                                                                {!! Form::hidden('supplier_id', $supplier->id) !!}
                                                                <button title="Eliminar" type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                <span class="text-muted">Todavía no hay ningún proveedor en el sistema.</span>
                                            </td>
                                        </tr>
                                    @endforelse
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