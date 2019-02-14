@extends('base')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">Servicio nuevo</h2>
                    <h4 class="card-title">Crear un nuevo servicio</h4>

                    {!! Form::open(['url' => route('services.store'), 'method' => 'post']) !!}

                    <div class="row">
                        <div class="form-group col-lg-4">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                        </div>
                        <div class="form-group col-lg-4">
                            {!! Form::label('supplier_id', 'Proveedor') !!}
                            {!! Form::select('supplier_id', $suppliers, null, ['class' => 'selectize']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-4">
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
                        <div class="form-group">
                            {!! Form::submit('Aceptar', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('services.index') !!}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>

                    {!! Form::close() !!}
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

    </script>

@endsection