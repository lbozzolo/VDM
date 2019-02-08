@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('projects.edit', $project->id) }}" title="Editar Proyecto" class="btn btn-outline-primary btn-xs" style="float:right">
                        <i class="mdi mdi-rename-box"></i>
                    </a>
                    <h2 class="display-4">
                        {!! $project->title !!}
                    </h2>

                    <span class="text-muted">{!! $project->description !!}</span>
                    <h4 class="card-title mt-1">
                        <span class="text-primary">{!! ($project->feeApprovedBudget())? '$'.$project->feeApprovedBudget() : '<small class="text-muted">sin datos</small>' !!}</span>
                    </h4>
                    <label class="label badge fase fase-{!! str_slug($project->phase->name, '-') !!} mr-3">{!! $project->phase->name !!}</label>

                    <ul class="list-arrow">
                        <li>
                            <span class="font-weight-bold">Responsable:</span>
                            {!! ($project->owner)? $project->owner->fullname : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">Cliente:</span>
                            {!! ($project->customer)? $project->customer->fullname : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">Fecha de creación:</span>
                            {!! $project->created_date !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">Fecha de entrega:</span>
                            {!! ($project->deadline)? $project->deadline_date : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">Plazo de entrega:</span>
                            {!! ($project->period)? $project->period : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                    </ul>

                    <div style="border: 1px solid #f2f2f2;" class="card-body">
                        <span class="font-weight-bold">Observaciones</span>
                        <p>{!! ($project->remarks)? $project->remarks : '<small class="text-muted">sin datos</small>' !!}</p>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="row">

                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Vencimientos</h3>

                            <div class="table-responsive">

                                <table class="table table-bordered">
                                    @if($project->expirations->count())
                                        <thead>
                                        <tr>
                                            <th>Importe</th>
                                            <th>Vencimiento</th>
                                            <th>Próximo venc.</th>
                                            <th>Concepto</th>
                                        </tr>
                                        </thead>
                                    @endif
                                    @forelse($project->expirations as $expiration)
                                        <tr>
                                            <td>{!! ($expiration->fee)? '$'.$expiration->fee : '-'!!}</td>
                                            <td>{!! $expiration->expiration() !!}</td>
                                            <td>{!! $expiration->nextExpiration() !!}</td>
                                            <td>{!! $expiration->remarks !!}</td>
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
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-6 mt-3">

                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Presupuestos</h3>
                            <ul class="list-unstyled">
                                @foreach($project->budgets as $budget)
                                    @if($budget->model_file == '')
                                        <li><i class="mdi mdi-file-pdf" title="No hay pdf para este presupuesto"></i></li>
                                    @else
                                        <li>
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
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h3 class="card-title">Imágenes</h3>
                            @forelse($project->images as $imagen)
                                <span style="border: {!! ($imagen->main == 1)? '1px solid #1ABC9C' : '1px dashed lightgrey' !!}; padding: 5px 10px; display: inline-block">
                                    @if($imagen->main == 1)
                                        <img src="{{ route('images.see', $imagen->path) }}" height="80px">
                                    @else
                                        <img src="{{ route('images.see', $imagen->path) }}" height="80px" style="opacity: 0.3">
                                    @endif
                                </span>
                            @empty

                                <small class="text-muted">No hay ninguna foto para mostrar</small>

                            @endforelse
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 mt-3">

                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Contactos</h3>
                            <ul class="list-unstyled">

                                @forelse($project->contacts as $contact)

                                    <li>
                                        <a href="">{!! $contact->fullname !!}</a><br>
                                        <small class="text-muted">{!! $contact->email !!}</small>
                                        <small class="text-muted">{!! ($contact->phone)? ' - tel '.$contact->phone : '' !!}</small>
                                    </li>

                                @empty

                                    <li><span class="text-muted">No hay ningún contacto adjuntado a este proyecto.</span></li>

                                @endforelse
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </div>




    </div>

@endsection