@extends('base')

@section('content')

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">Proveedor nuevo</h2>
                    <h4 class="card-title">Crear un nuevo proveedor</h4>

                    {!! Form::open(['url' => route('suppliers.store'), 'method' => 'post']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name', null, ['class'  => ' form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Aceptar', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('suppliers.index') !!}" class="btn btn-secondary">Cancelar</a>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        {{--<div class="col-lg-4">--}}
            {{--<div class="card">--}}

                {{--<div class="card-body">--}}
                    {{--<h3 class="card-title">Últimos presupuestos</h3>--}}
                    {{--<ul>--}}
                        {{--@foreach($budgets as $budget)--}}
                            {{--<li>--}}
                                {{--@if($budget->model_file)--}}
                                    {{--<a href="{{ route('projects.seepdf', $budget->model_file) }}" title="VER PDF" target="_blank">--}}
                                        {{--@if($budget->state->slug == 'pendiente')--}}
                                            {{--<i class="mdi mdi-file-pdf text-warning" title="PENDIENTE"></i>--}}
                                        {{--@elseif($budget->state->slug == 'aprobado')--}}
                                            {{--<i class="mdi mdi-file-pdf text-success" title="APROBADO"></i>--}}
                                        {{--@elseif($budget->state->slug == 'rechazado')--}}
                                            {{--<i class="mdi mdi-file-pdf text-danger" title="RECHAZADO"></i>--}}
                                        {{--@endif--}}
                                        {{--{!! $budget->model_file !!}--}}
                                    {{--</a>--}}
                                {{--@else--}}
                                    {{--{!! $budget->project->title.' (sin PDF)' !!}--}}
                                {{--@endif--}}
                                {{--<span style="float:right">{!! $budget->created_at_parse !!}</span>--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>


@endsection