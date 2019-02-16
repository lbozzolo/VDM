@extends('base')

@section('content')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">Proyecto nuevo</h2>
                    <h4 class="card-title">Crear un nuevo proyecto</h4>
                    {{--<p class="card-description">--}}
                        {{--Basic form elements--}}
                    {{--</p>--}}
                        {!! Form::open(['url' => route('projects.store'), 'method' => 'post']) !!}
                        <div class="form-group">
                            <label for="title">Título <span class="text-danger">*</span> </label>
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Mi primer proyecto']) !!}
                        </div>

                        <div class="form-group">
                            <label for="description">
                                Descripción <small style="color: gray">(opcional)</small>
                            </label>
                            {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Sistema de gestión de contenidos']) !!}
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="exampleInputName1">Responsable</label>
                                {!! Form::select('owner_id', $users, Auth::user()->id, ['class' => 'selectize']) !!}
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="exampleInputName1">Cliente</label>
                                {!! Form::select('customer_id', $customers, null, ['class' => 'selectize']) !!}
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Fase del proyecto</label><br>
                                    {!! Form::select('phase_id', $phases, null, ['class' => 'selectize']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('period', 'Plazo de entrega') !!}
                                    {!! Form::text('period', null, ['class' => 'form-control', 'placeholder' => 'Tres meses']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('deadline', 'Fecha de entrega') !!}
                                    {!! Form::text('deadline', null, ['class' => 'form-control datepicker', 'style' => 'cursor: default', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Intermediario</label><br>
                                    {!! Form::select('agent_id', $agents, null, ['class' => 'selectize']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('remarks', 'Observaciones') !!}
                                    {!! Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => '6']) !!}
                                </div>
                            </div>
                        </div>

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('remarks', 'Observaciones') !!}--}}
                            {{--{!! Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => '4']) !!}--}}
                        {{--</div>--}}
                        <button type="submit" class="btn btn-primary mr-2">Crear proyecto</button>
                        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancelar</a>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">

                <div class="card-body">
                    <h3 class="card-title">Últimos proyectos</h3>
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