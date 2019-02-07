<div class="card mt-3">
    <div class="card-body">

        {!! Form::open(['url' => route('images.store', $project->id), 'method' => 'post', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}

            <div class="input-group input-group-sm">
                {!! Form::file('img', ['class' => 'form-control inputImage']) !!}
                <span class="input-group-btn">
                    {!! Form::submit('Subir', ['class' => 'btn btn-info btn-flag']) !!}
                </span>
            </div>

        {!! Form::close() !!}

        <div class="card">
            <div class="card-body">

                @forelse($project->images as $imagen)
                    <span style="border: {!! ($imagen->main == 1)? '1px solid #1ABC9C' : '1px dashed lightgrey' !!}; padding: 5px 10px; display: inline-block">
                        <span style="display: inline-block">
                            @if($imagen->main == 1)
                                <img src="{{ route('images.see', $imagen->path) }}" height="80px">
                            @else
                                <img src="{{ route('images.see', $imagen->path) }}" height="80px" style="opacity: 0.3">
                            @endif
                        </span>
                        <span style="display: inline-block">
                            <button class="non-styled-button" style="width: 100%" title="Eliminar foto" data-toggle="modal" data-target="#modalDeleteImage{!! $imagen->id !!}"><i class="mdi mdi-delete-circle text-danger"></i> </button>
                            {{-- VENTANA MODAL DELETE IMAGEN --}}
                            <div class="modal fade" id="modalDeleteImage{!! $imagen->id !!}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" ><i class="mdi mdi-alert-circle text-danger"></i> Eliminar imagen</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Desea eliminar esta imagen?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left cancelar" data-dismiss="modal">Cancelar</button>
                                            {!! Form::open(['method' => 'DELETE', 'url' => route('images.delete', $imagen->id)]) !!}
                                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- FIN VENTANA MODAL DELETE IMAGEN --}}
                            @if($imagen->main == 0)
                                <a href="{{ route('images.main', ['id' => $imagen->id, 'model' => 'Project', 'modelId' => $project->id ]) }}" class="" title="Marcar como principal" style="display: block"><i class="mdi mdi-checkbox-marked-circle text-primary"></i></a>
                            @else
                                <a href="#" class="" disabled title="Marcar como principal" style="display: block"><i class="mdi mdi-checkbox-marked-circle text-primary"></i></a>
                            @endif
                        </span>
                    </span>
                @empty

                    <small class="text-muted">No hay ninguna foto para mostrar</small>

                @endforelse

            </div>
        </div>

    </div>
</div>