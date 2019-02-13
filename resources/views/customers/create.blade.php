@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    @if(!isset($primerCliente))
                    <h2 class="display-4">Cliente nuevo</h2>
                    <h4 class="card-title">Crear un nuevo cliente</h4>
                    @else
                        <h2 class="display-4">¿Desea crear un nuevo cliente?</h2>
                        <h4 class="card-title">Todavía no hay ningún cliente ingresado en el sistema. Ingrese el primero</h4>
                    @endif

                    {!! Form::open(['url' => route('customers.store'), 'method' => 'post']) !!}

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
                            {!! Form::submit('Crear cliente', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                     </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">

                <div class="card-body">
                    <h3 class="card-title">Últimos clientes</h3>
                </div>
            </div>
        </div>
    </div>

@endsection