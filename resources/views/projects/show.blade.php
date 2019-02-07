@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">
                        {!! $project->title !!}
                    </h2>
                    <span class="text-muted">{!! $project->description !!}</span>
                    <h4 class="card-title mt-1">
                        Importe:
                        <span class="text-primary">{!! ($project->feeApprovedBudget())? '$'.$project->feeApprovedBudget() : '<small class="text-muted">sin datos</small>' !!}</span>
                    </h4>

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
                            <span class="font-weight-bold">Fase del proyecto:</span>
                            {!! ($project->phase)? $project->phase->name : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">Plazo de entrega:</span>
                            {!! ($project->period)? $project->period : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">Fecha de entrega:</span>
                            {!! ($project->deadline)? $project->deadline_date : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">Importe:</span>
                            {!! ($project->feeApprovedBudget())? '$'.$project->feeApprovedBudget() : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">Observaciones:</span>
                            {!! ($project->remarks)? $project->remarks : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                    </ul>



                </div>
            </div>
        </div>

        <div class="col-lg-4">

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
                                        {{--<i class="mdi mdi-file-pdf"></i> --}}
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
                    <ul>

                    </ul>
                </div>
            </div>

        </div>
        <div class="col-lg-4">

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

@endsection