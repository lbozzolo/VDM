<div class="card mt-3">

    <div class="card-body">

        <div id="expiration-list">

            <div class="table-responsive">

                <table class="table table-bordered">
                    @if($project->expirations->count())
                        <thead>
                        <tr>
                            <th>Importe</th>
                            <th>Vencimiento</th>
                            <th>Próximo venc.</th>
                            <th>Concepto</th>
                            <th>Eliminar</th>
                        </tr>
                        </thead>
                    @endif
                    @forelse($project->expirations as $expiration)
                        <tr>
                            <td>{!! ($expiration->fee)? '$'.$expiration->fee : '-'!!}</td>
                            <td>{!! $expiration->expiration() !!}</td>
                            <td>{!! $expiration->nextExpiration() !!}</td>
                            {{--<td>{!! ($expiration->expiration_alert)? $expiration->expiration_alert : '-' !!}</td>--}}
                            <td>{!! $expiration->remarks !!}</td>
                            <td>
                                <button title="Eliminar" type="button" data-toggle="modal" data-target="#eliminar{!! $expiration->id !!}" class="btn btn-xs btn-danger">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="eliminar{!! $expiration->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" ><i class="mdi mdi-alert-circle text-danger"></i> Eliminar vencimiento</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Desea eliminar este vencimiento?</p>
                                            </div>
                                            <div class="modal-footer">
                                                {!! Form::open(['url' => route('expirations.destroy'), 'method' => 'delete']) !!}

                                                {!! Form::hidden('expiration_id', $expiration->id) !!}
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
                            <td colspan="3">
                                <span class="text-muted">No hay ningún vencimiento adjuntado a este proyecto.</span>
                            </td>
                        </tr>
                    @endforelse
                </table>

            </div>
        </div>

        <div id="add-expiration" style="display: none">
            <h4 class="card-title">Agregar vencimiento</h4>
            {!! Form::open(['url' => route('expirations.store'), 'method' => 'post']) !!}

            {!! Form::hidden('project_id', $project->id) !!}
            <div class="form-group">
                {!! Form::label('fee', 'Importe') !!}

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    {!! Form::number('fee', null, ['class'  => 'form-control', 'id' => 'expiration-fee']) !!}
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
            </div>
            {{--<div class="form-group">--}}
                {{--{!! Form::label('payment_date', 'Fecha de pago') !!}--}}
                {{--{!! Form::text('payment_date', null, ['class'  => 'form-control datepicker', 'autocomplete' => 'off', 'id' => 'expiration-payment', 'placeholder' => 'Seleccione fecha', 'style' => 'cursor: default']) !!}--}}
            {{--</div>--}}
            <div class="form-group">
                {!! Form::label('expiration_alert', 'Alerta de vencimiento') !!}<br>
                <span>Día</span> {!! Form::select('expiration_alert', $days, ['class' => 'form-control selectize']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('remarks', 'Observaciones') !!}
                {!! Form::textarea('remarks', null, ['class'  => 'form-control', 'id' => 'expiration-remarks', 'rows' => '4']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Aceptar', ['class' => 'btn btn-primary']) !!}
                <button type="button" class="btn btn-secondary" id="cancel-add-expiration">Cancelar</button>
            </div>

            {!! Form::close() !!}
        </div>

    </div>
</div>