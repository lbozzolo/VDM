@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">Intermediarios</h2>
                    <a href="{{ route('agents.create') }}" class="btn btn-sm btn-outline-primary mt-3" >Agregar intermediario<i class="mdi mdi-plus"></i></a>

                    <div class="table-responsive mt-5">
                        <table class="table table-striped">
                            @if($agents->count())
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Username</th>
                                        <th>Responsable</th>
                                        <th>Email</th>
                                        <th>URL</th>
                                        <th>Teléfono</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($agents as $agent)
                                    <tr>
                                        <td>{!! ($agent->fullname)? $agent->fullname : '-' !!}</td>
                                        <td>{!! ($agent->username)? $agent->username : '-' !!}</td>
                                        <td>{!! ($agent->head)? $agent->head : '-' !!}</td>
                                        <td>{!! ($agent->email)? $agent->email : '-' !!}</td>
                                        <td>
                                            @if($agent->url)
                                                <a href="http://{!! $agent->url !!}" target="_blank" class="btn btn-sm btn-secondary">visitar</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{!! ($agent->phone)? $agent->phone : '-' !!}</td>
                                        <td>
                                            <a href="{{ route('agents.edit', $agent->id) }}" title="Editar" class="btn btn-sm text-primary button-action"><i class="mdi mdi-table-edit"></i></a>
                                            <a href="{{ route('agents.show', $agent->id) }}" title="Detalles" class="btn btn-sm text-info button-action"><i class="mdi mdi-file-document-box"></i></a>
                                            <button title="Eliminar" type="button" data-toggle="modal" data-target="#delete{!! $agent->id !!}" class="btn btn-sm button-action text-danger"><i class="mdi mdi-delete"></i></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="delete{!! $agent->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" ><i class="mdi mdi-alert-circle text-danger"></i> Eliminar intermediario</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Desea eliminar este intermediario?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {!! Form::open(['url' => route('agents.destroy'), 'method' => 'delete']) !!}

                                                            {!! Form::hidden('agent_id', $agent->id) !!}
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
                            @else
                                <tbody>
                                <tr>
                                    <td colspan="8">
                                        <span class="text-muted">No hay ninguna intermediario cargado</span>
                                    </td>
                                </tr>
                                </tbody>
                            @endif

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection