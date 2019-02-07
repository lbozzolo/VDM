@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="display-4">Proyectos</h2>
                    <span style="float: right" title="Tabla"><i class="mdi mdi-table text-muted"></i></span>
                    <span style="float: right"><a href="{{ route('projects.index') }}"><i class="mdi mdi-view-list"></i> </a></span>
                    <a href="{{ route('projects.create') }}" class="btn btn-success btn-sm" >Nuevo Proyecto<i class="mdi mdi-plus"></i></a>

                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title mb-4">Administrar proyectos</h5>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>Proyecto</th>
                                        <th>Cliente</th>
                                        <th>Fecha límite</th>
                                        <th>Fase</th>
                                        <th>Responsable</th>
                                        <th>Importe</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($projects as $project)
                                        <tr>
                                            <td>
                                                <span>{!! $project->title !!}</span><br>
                                                <small class="text-muted mt-2" style="display: inline-block">{!! $project->description !!}</small>
                                            </td>
                                            <td>{!! $project->customer->fullname !!}</td>
                                            <td>
                                                <span>{!! $project->deadline_date !!}</span><br>
                                                <small class="text-muted mt-2" style="display: inline-block">{!! $project->period !!}</small>
                                            </td>
                                            <td>
                                                <label class="label badge fase fase-{!! str_slug($project->phase->name, '-') !!}">{!! $project->phase->name !!}</label>
                                            </td>
                                            <td>{!! $project->owner->fullname !!}</td>
                                            <td>
                                                {!! ($project->feeApprovedBudget())? '$'.$project->feeApprovedBudget() : '-' !!}
                                            </td>
                                            <td>
                                                <a href="{{ route('projects.edit', $project->id) }}" title="Editar" class="btn btn-sm text-primary button-action"><i class="mdi mdi-table-edit"></i></a>
                                                <a href="{{ route('projects.show', $project->id) }}" title="Detalles" class="btn btn-sm text-info button-action"><i class="mdi mdi-file-document-box"></i></a>
                                                <!-- Button trigger modal -->
                                                <button title="Eliminar" type="button" data-toggle="modal" data-target="#eliminar{!! $project->id !!}" class="btn btn-sm button-action text-danger"><i class="mdi mdi-delete"></i></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="eliminar{!! $project->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" ><i class="mdi mdi-alert-circle text-danger"></i> Eliminar proyecto</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Desea eliminar este proyecto?</p>
                                                                <mark class="lead"> {!! $project->title !!}</mark>
                                                            </div>
                                                            <div class="modal-footer">
                                                                {!! Form::open(['url' => route('projects.destroy'), 'method' => 'delete']) !!}

                                                                {!! Form::hidden('project_id', $project->id) !!}
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
                                            <td colspan="7">
                                                <span class="text-muted">No hay ningún proyecto cargado todavía</span>
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