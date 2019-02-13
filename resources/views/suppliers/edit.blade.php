@extends('base')

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">{!! $supplier->name !!}</h2>
                    <h4 class="card-title">Editar proveedor</h4>

                    {!! Form::model($supplier, ['url' => route('suppliers.update', $supplier->id), 'method' => 'put']) !!}

                        <div class="row">

                            <div class="form-group col-lg-6">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', null, ['class'  => ' form-control']) !!}
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::label('email', 'Email') !!}
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>

                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('suppliers.index') !!}" class="btn btn-secondary">Cancelar</a>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-3">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Productos</h3>

                    <button type="button" id="add-product-button" class="btn btn-sm btn-outline-primary mt-3">Agregar producto<i class="mdi mdi-plus"></i></button>

                    <div id="products-list">

                    </div>
                    <div id="add-product" style="display: none" class="mt-5">

                        {!! Form::open(['url' => route('products.store'), 'method' => 'post']) !!}

                            {!! Form::hidden('supplier_id', $supplier->id) !!}

                            <div class="row">

                                <div class="form-group col-lg-12">
                                    {!! Form::label('name', 'Nombre') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-lg-12">
                                    {!! Form::label('fee', 'Importe') !!}
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        {!! Form::number('fee', null, ['class'  => 'form-control']) !!}
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    {!! Form::label('ip', 'IP') !!}
                                    {!! Form::text('ip', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-lg-6">
                                    {!! Form::label('port', 'Puerto') !!}
                                    {!! Form::text('port', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-lg-12">
                                    {!! Form::label('username', 'Username') !!}
                                    {!! Form::text('username', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-lg-12">
                                    {!! Form::label('password', 'Password') !!}
                                    {!! Form::text('password', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-lg-12">
                                    {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
                                    <button type="button" class="btn btn-secondary" id="cancel-add-product">Cancelar</button>
                                </div>

                            </div>

                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Servicios</h3>

                </div>
            </div>
        </div>

    </div>


@endsection

@section('js')

    <script>

        $(document).ready(function() {

            $('.selectize').selectize({
                create: true,
                sortField: 'text'
            });

            $('.datepicker').datepicker({
                format: 'd/m/yyyy',
                language: 'es',
                todayHighLight: true
            });

            $('#add-product-button').click(function () {
                $('#add-product').show();
                $('#product-list').hide()
            });

            $('#cancel-add-product').click(function () {

                $('#product-list').show()
                $('#add-product').hide();
                $('#product-fee').val('');

            });

        });

    </script>

@endsection