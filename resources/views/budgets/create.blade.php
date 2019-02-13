@extends('base')

@section('content')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">Presupuesto nuevo</h2>
                    <h4 class="card-title">Crear un nuevo presupuesto</h4>

                    {!! Form::open(['url' => route('budgets.store'), 'method' => 'post']) !!}

                    <div class="row">
                        <div class="form-group col-lg-6">
                            {!! Form::label('project_id', 'Proyecto') !!}
                            {!! Form::select('project_id', $projects, null, ['class'  => ' selectize', 'placeholder' => '']) !!}
                        </div>
                        <div class="form-group col-lg-6">
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
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            {!! Form::label('payment_method', 'Forma de pago') !!}
                            {!! Form::text('payment_method', null, ['class'  => 'form-control', 'placeholder' => 'Efectivo', 'id' => 'budget-payment']) !!}
                        </div>
                        <div class="form-group col-lg-6">
                            {!! Form::label('model_file', 'Archivo PDF') !!}
                            {!! Form::file('model_file', ['class' => 'form-control', 'id' => 'budget-file']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Aceptar', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('budgets.index') !!}" class="btn btn-secondary">Cancelar</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">

                <div class="card-body">
                    <h3 class="card-title">Últimos presupuestos</h3>
                    <ul>
                        @foreach($budgets as $budget)
                            <li>
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
                                <span style="float:right">{!! $budget->created_at_parse !!}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')

    <script>


        $('.selectize').selectize({
            create: true,
            sortField: 'text'
        });

        $('.datepicker').datepicker({
            format: 'd/m/yyyy',
            language: 'es',
            todayHighLight: true
        });



    </script>

@endsection