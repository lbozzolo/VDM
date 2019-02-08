@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="display-4">Proyectos</h2>
                    <span style="float: right" title="Tabla"><a href="{{ route('projects.index.table') }}"><i class="mdi mdi-table"></i> </a></span>
                    <span style="float: right" title="Lista"><i class="mdi mdi-view-list text-muted"></i></span>
                    <a href="{{ route('projects.create') }}" class="btn btn-success btn-sm" >Nuevo Proyecto<i class="mdi mdi-plus"></i></a>

                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title mb-4">Administrar proyectos</h5>
                            <div class="fluid-container">

                                @forelse($projects as $project)
                                <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
                                    <div class="col-md-1">
                                        @if($project->images->count())
                                            @foreach($project->images as $image)
                                                @if($image->main == 1)
                                                    <img class="img-sm rounded-circle mb-4 mb-md-0" src="{{ route('images.see', $image->path) }}" >
                                                @endif
                                            @endforeach
                                        @else
                                            <img class="img-sm rounded-circle mb-4 mb-md-0" src="{{ asset('img/project-img-default.png') }}" alt="profile image">
                                        @endif
                                    </div>
                                    <div class="ticket-details col-md-9">
                                        <div class="d-flex">
                                            <label class="label badge fase fase-{!! str_slug($project->phase->name, '-') !!} mr-3">{!! $project->phase->name !!}</label>
                                            <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">{!! $project->title !!}</p>
                                            <p class="text-primary mr-1 mb-0">[#{!! $project->id !!}]</p>
                                            <p class="mb-0 ellipsis">{!! $project->description !!}.</p>
                                        </div>
                                        <p class="text-gray ellipsis mb-2">{!! $project->remarks !!}</p>
                                        <div class="row text-gray d-md-flex d-none">
                                            <div class="col-4 d-flex">
                                                <small class="mb-0 mr-2 text-muted text-muted">Fecha de entrega :</small>
                                                <small class="Last-responded mr-2 mb-0 text-muted text-muted">{!! $project->deadline_date !!}</small>

                                            </div>
                                            <div class="col-4 d-flex">
                                                <small class="Last-responded mr-2 mb-0 text-muted text-muted">
                                                    <i class="mdi mdi-account"></i>{!! $project->owner->fullname !!}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-actions col-md-2">
                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Administrar
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                                <a href="{{ route('projects.show', $project->id) }}" title="Detalles" class="dropdown-item">
                                                    <i class="mdi mdi-file-document-box"></i> Detalles
                                                </a>
                                                <a href="{{ route('projects.edit', $project->id) }}" title="Editar" class="dropdown-item">
                                                    <i class="mdi mdi-rename-box"></i> Editar
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <button title="Eliminar" type="button" data-toggle="modal" data-target="#eliminar{!! $project->id !!}" class="dropdown-item text-danger">
                                                    <i class="mdi mdi-delete"></i> Eliminar
                                                </button>
                                                <a class="dropdown-item" href="#">
                                                    <i class="mdi mdi-folder"></i> Archivar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                <p class="lead text-primary"> {!! $project->title !!}</p>
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

                                @empty

                                    <span class="text-muted">Todavía no hay nigún proyecto cargado</span>

                                @endforelse


                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection