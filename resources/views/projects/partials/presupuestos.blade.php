<div class="card mt-3">
    <div class="card-body">

        <div id="budget-list">
            <table class="table table-sm">
                @if($project->budgets->count())
                    <caption class="text-muted">Sólo puede haber un presupuesto aprobado por proyecto.</caption>
                    <thead>
                        <tr>
                            <th>Presupuesto</th>
                            <th>Importe</th>
                            <th>Forma de pago</th>
                            <th>Cambiar estado</th>
                            <th class="text-left">Eliminar</th>
                        </tr>
                    </thead>
                @endif
                <tbody>
                @forelse($project->budgets as $budget)
                    {{--<li><a href=""><i class="mdi mdi-file-pdf"></i> {!! $budget->model_file !!}</a></li>--}}
                    <tr>
                        <td>
                            @if($budget->model_file == '')
                                <i class="mdi mdi-file-pdf" title="No hay pdf para este presupuesto"></i>
                            @else
                                <a href="{{ route('projects.seepdf', $budget->model_file) }}" title="VER PDF" target="_blank">
                                    @if($budget->state->slug == 'pendiente')
                                        <i class="mdi mdi-file-pdf text-warning" title="PENDIENTE"></i>
                                    @elseif($budget->state->slug == 'aprobado')
                                        <i class="mdi mdi-file-pdf text-success" title="APROBADO"></i>
                                    @elseif($budget->state->slug == 'rechazado')
                                        <i class="mdi mdi-file-pdf text-danger" title="RECHAZADO"></i>
                                    @endif
                                    {!! $budget->model_file !!}
                                </a>
                            @endif
                        </td>
                        <td>${!! $budget->fee !!}</td>
                        <td>{!! $budget->payment_method !!}</td>
                        <td>

                            {!! Form::open(['url' => route('projects.state.budget', $budget->id), 'method' => 'put']) !!}
                            {!! Form::hidden('project_id', $project->id) !!}
                            <div class="input-group col-xs-12">
                                {!! Form::select('state_id', $states, $budget->state_id, ['class' => 'form-control']) !!}
                                <span class="input-group-append">
                                  <button class="file-upload-browse btn btn-primary btn-xs" type="submit">
                                      <i class="mdi mdi-backup-restore" title="Cambiar estado"></i>
                                  </button>
                                </span>
                            </div>
                            {!! Form::close() !!}

                        </td>
                        <td class="text-left">
                            <button title="Eliminar" type="button" data-toggle="modal" data-target="#eliminar{!! $budget->id !!}" class="btn btn-xs btn-danger">
                                <i class="mdi mdi-delete"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="eliminar{!! $budget->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" ><i class="mdi mdi-alert-circle text-danger"></i> Eliminar presupuesto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Desea eliminar este presupuesto?</p>
                                            <p class="lead text-primary"> {!! $budget->model_file !!}</p>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::open(['url' => route('expirations.destroy'), 'method' => 'delete']) !!}

                                            {!! Form::hidden('budget_id', $budget->id) !!}
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
                        <td colspan="2">
                            <span class="text-muted">No hay ningún presupuesto adjuntado a este proyecto.</span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div id="add-budget" style="display: none">
            <h4 class="card-title">Agregar presupuesto</h4>
            {!! Form::open(['url' => route('projects.store.budget', $project->id), 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

            <div class="form-group">
                {!! Form::label('fee', 'Importe') !!}

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    {!! Form::number('fee', null, ['class'  => 'form-control', 'id' => 'budget-fee']) !!}
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('payment_method', 'Forma de pago') !!}
                {!! Form::text('payment_method', null, ['class'  => 'form-control', 'placeholder' => 'Efectivo', 'id' => 'budget-payment']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('model_file', 'Archivo PDF') !!}
                {!! Form::file('model_file', ['class' => 'form-control', 'id' => 'budget-file']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Aceptar', ['class' => 'btn btn-primary']) !!}
                <button type="button" class="btn btn-secondary" id="cancel-add-budget">Cancelar</button>
            </div>

            {!! Form::close() !!}
        </div>

    </div>
</div>