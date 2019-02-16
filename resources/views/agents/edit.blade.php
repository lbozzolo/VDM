@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">{!! $agent->fullname !!}</h2>
                    <h4 class="card-title">Editar intermediario</h4>

                    {!! Form::model($agent, ['url' => route('agents.update', $agent->id), 'method' => 'put']) !!}

                    <div class="row">
                        <div class="form-group col-lg-6">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-lg-6">
                            {!! Form::label('last_name', 'Apellido') !!}
                            {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-lg-6">
                            {!! Form::label('username', 'Username') !!}
                            {!! Form::text('username', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-lg-6">
                            {!! Form::label('phone', 'Teléfono') !!}
                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-lg-6">
                            {!! Form::label('head', 'Responsable') !!}
                            {!! Form::text('head', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-lg-6">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-lg-6">
                            {!! Form::label('url', 'URL') !!}
                            {!! Form::text('url', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-lg-6">
                            {!! Form::label('cuit', 'CUIT') !!}
                            {!! Form::text('cuit', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-lg-6">
                            {!! Form::label('cuil', 'CUIL') !!}
                            {!! Form::text('cuil', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-lg-12">
                            {!! Form::label('address', 'Dirección') !!}
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-lg-12">
                            {!! Form::label('remarks', 'Observaciones') !!}
                            {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-lg-12">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('agents.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">

                <div class="card-body">
                    <h3 class="card-title">Otra información</h3>
                </div>
            </div>
        </div>
    </div>

@endsection