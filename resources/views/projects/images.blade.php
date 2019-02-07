@extends('base')

@section('content')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">{!! $project->title !!}</h2>

                    <div class="btn-group" role="group" aria-label="Basic example" style="float: right">
                        <a href="{{ route('projects.expirations', $project->id) }}"  class="btn btn-outline-secondary">
                            <i class="mdi mdi-clock-alert"></i> vencimientos
                        </a>
                        <a href="{{ route('projects.images', $project->id) }}" class="btn btn-outline-secondary">
                            <i class="mdi mdi-image-album"></i> imágenes
                        </a>
                        <a href="{{ route('projects.budgets', $project->id) }}" class="btn btn-outline-secondary">
                            <i class="mdi mdi-file-document-box"></i> presupuestos
                        </a>
                        <a href="{{ route('projects.edit', $project->id) }}" title="Editar Proyecto" class="btn btn-outline-secondary">
                            <i class="mdi mdi-rename-box"></i>
                        </a>
                    </div>

                    <h4>Imágenes</h4>

                    @include('projects.partials.imagenes')

                </div>
            </div>
        </div>
    </div>


@endsection
