@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="display-4">Servicios</h2>

                    <a href="{{ route('services.create') }}" class="btn btn-sm btn-outline-primary mt-3" >Agregar Servicio<i class="mdi mdi-plus"></i></a>

                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Proveedor</th>
                                        <th>Importe</th>
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($services as $service)
                                        <tr>
                                            <td>{!! $service->name !!}</td>
                                            <td>{!! ($service->supplier)? $service->supplier->name : '-' !!}</td>
                                            <td>{!! ($service->fee)? '$'.$service->fee : '-' !!}</td>
                                            <td width="100">
                                                <a href="{{ route('services.edit', $service->id) }}" title="Editar" class="btn btn-sm text-primary button-action"><i class="mdi mdi-table-edit"></i></a>
                                                <a href="{{ route('services.show', $service->id) }}" title="Detalles" class="btn btn-sm text-info button-action"><i class="mdi mdi-file-document-box"></i></a>
                                                <button title="Eliminar" type="button" data-toggle="modal" data-target="#delete{!! $service->id !!}" class="btn btn-sm  button-action text-danger"><i class="mdi mdi-delete"></i></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="delete{!! $service->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" ><i class="mdi mdi-alert-circle text-danger"></i> Eliminar servicio</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Desea eliminar este servicio?</p>
                                                                <p class="lead">
                                                                    {!! $service->name !!}
                                                                    <small>{!! ($service->supplier)? '('.$service->supplier->name.')' : '' !!}</small>
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                {!! Form::open(['url' => route('services.destroy'), 'method' => 'delete']) !!}

                                                                {!! Form::hidden('service_id', $service->id) !!}
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
                                            <td colspan="4" class="text-muted">No hay ningún servicio cargado</td>
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