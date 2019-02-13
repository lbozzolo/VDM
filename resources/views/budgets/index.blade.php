@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="display-4">Presupuestos</h2>

                    <a href="{{ route('budgets.create') }}" class="btn btn-sm btn-outline-primary mt-3" >Agregar Presupuesto<i class="mdi mdi-plus"></i></a>

                    <div class="card">
                        <div class="card-body">

                            <div id="budget-list">
                                <table class="table table-sm">
                                    @if($budgets->count())
                                    <thead>
                                        <tr>
                                            <th>Presupuesto</th>
                                            <th>Importe</th>
                                            <th>Forma de pago</th>
                                            <th>Fecha</th>
                                            <th>Cambiar estado</th>
                                            <th class="text-left">Eliminar</th>
                                        </tr>
                                    </thead>
                                    @endif
                                    <tbody>
                                    @forelse($budgets as $budget)
                                        <tr>
                                            <td>
                                                @if($budget->model_file)
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
                                                @else
                                                    {!! $budget->project->title.' (sin PDF)' !!}
                                                @endif
                                            </td>
                                            <td>${!! $budget->fee !!}</td>
                                            <td>{!! $budget->payment_method !!}</td>
                                            <td>{!! $budget->created_at_parse !!}</td>
                                            <td>
                                                {!! Form::open(['url' => route('projects.state.budget', $budget->id), 'method' => 'put']) !!}
                                                {!! Form::hidden('project_id', $budget->project_id) !!}
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
                                                                {!! Form::open(['url' => route('budgets.destroy'), 'method' => 'delete']) !!}

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

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection