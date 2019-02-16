@extends('base')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">{!! $product->name !!}</h2>
                    <h4 class="card-title">Editar producto</h4>

                    {!! Form::model($product, ['url' => route('products.update', $product->id), 'method' => 'put']) !!}

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed">

                                        <tbody>
                                        <tr>
                                            <td><span class="font-weight-bold">Nombre:</span></td>
                                            <td>{!! Form::text('name', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Importe:</span></td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    {!! Form::number('fee', null, ['class'  => 'form-control', 'id' => 'budget-fee']) !!}
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Dirección IP:</span></td>
                                            <td>{!! Form::text('ip_address', null, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Tipo de IP:</span></td>
                                            <td>{!! Form::select('ip_class', $ip_class, null, ['class' => 'selectize']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Username:</span></td>
                                            <td>{!! Form::text('username', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Contraseña:</span></td>
                                            <td>{!! Form::text('password', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Puerto:</span></td>
                                            <td>{!! Form::text('port', null, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Procesador:</span></td>
                                            <td>{!! Form::select('processor', $processor, null, ['class' => 'selectize']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">RAM:</span></td>
                                            <td>{!! Form::select('ram', $ram, null, ['class' => 'selectize']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Almacenamieto:</span></td>
                                            <td>{!! Form::select('storage', $storage, null, ['class' => 'selectize']) !!}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-condensed">
                                        <tbody>
                                        <tr>
                                            <td><span class="font-weight-bold">Conectividad:</span></td>
                                            <td>{!! Form::select('connectivity', $connectivity, null, ['class' => 'selectize']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Panel de control:</span></td>
                                            <td>{!! Form::select('direct_admin', $direct_admin, null, ['class' => 'selectize']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Backbone compartido:</span></td>
                                            <td>{!! Form::select('backbone_shared', $backbone_shared, null, ['class' => 'selectize']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Sistema operativo:</span></td>
                                            <td>{!! Form::select('so', $so, null, ['class' => 'selectize']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Adicional ancho de banda:</span></td>
                                            <td>{!! Form::select('additional_bandwidth', $additional_bandwidth, null, ['class' => 'selectize']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Acceso Admin:</span></td>
                                            <td>{!! Form::select('admin_access', $admin_access, null, ['class' => 'selectize']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Storage backup:</span></td>
                                            <td>{!! Form::select('storage_backup', $storage_backup, null, ['class' => 'selectize']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Tipo:</span></td>
                                            <td>{!! Form::select('type', $type, null, ['class' => 'selectize']) !!}</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Proveedor:</span></td>
                                            <td>{!! Form::select('supplier_id', $suppliers, null, ['class' => 'selectize', 'placeholder' => '']) !!}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group mt-3">
                                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                                    <a href="{!! route('products.index') !!}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>

                        </div>


                    {!! Form::close() !!}



                    {{--{!! Form::model($product, ['url' => route('products.update', $product->id), 'method' => 'put']) !!}--}}

                    {{--<div class="row">--}}
                        {{--<div class="form-group col-lg-4">--}}
                            {{--{!! Form::label('name', 'Nombre') !!}--}}
                            {{--{!! Form::text('name', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-lg-4">--}}
                            {{--{!! Form::label('supplier_id', 'Proveedor') !!}--}}
                            {{--{!! Form::select('supplier_id', $suppliers, null, ['class' => 'selectize', 'placeholder' => '']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-lg-4">--}}
                            {{--{!! Form::label('type', 'Tipo') !!}--}}
                            {{--{!! Form::select('type', $type, null, ['class' => 'selectize']) !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="row">--}}
                        {{--<div class="form-group col-lg-1">--}}
                            {{--{!! Form::label('ip_class', 'IP tipo') !!}--}}
                            {{--{!! Form::select('ip_class', $ip_class, null, ['class' => 'selectize']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-lg-2">--}}
                            {{--{!! Form::label('ip', 'Dirección IP') !!}--}}
                            {{--{!! Form::text('ip', null, ['class' => 'form-control']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-lg-1">--}}
                            {{--{!! Form::label('port', 'Puerto') !!}--}}
                            {{--{!! Form::text('port', null, ['class' => 'form-control']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-lg-4">--}}
                            {{--{!! Form::label('username', 'Username') !!}--}}
                            {{--{!! Form::text('username', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-lg-4">--}}
                            {{--{!! Form::label('password', 'Password') !!}--}}
                            {{--{!! Form::text('password', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="row">--}}
                        {{--<div class="form-group col-lg-4">--}}
                            {{--{!! Form::label('processor', 'Procesador') !!}--}}
                            {{--{!! Form::select('processor', $processor, null, ['class' => 'selectize']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-lg-2">--}}
                            {{--{!! Form::label('ram', 'RAM') !!}--}}
                            {{--{!! Form::select('ram', $ram, null, ['class' => 'selectize']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-lg-2">--}}
                            {{--{!! Form::label('storage', 'Storage') !!}--}}
                            {{--{!! Form::select('storage', $storage, null, ['class' => 'selectize']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-lg-2">--}}
                            {{--{!! Form::label('direct_admin', 'Panel de control') !!}--}}
                            {{--{!! Form::select('direct_admin', $direct_admin, null, ['class' => 'selectize']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-lg-2">--}}
                            {{--{!! Form::label('backbone_shared', 'Backbone compartido') !!}--}}
                            {{--{!! Form::select('backbone_shared', $backbone_shared, null, ['class' => 'selectize']) !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="row">--}}
                        {{--<div class="form-group col-lg-2">--}}
                            {{--{!! Form::label('so', 'Sistema operativo') !!}--}}
                            {{--{!! Form::select('so', $so, null, ['class' => 'selectize']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-lg-2">--}}
                            {{--{!! Form::label('additional_bandwidth', 'Adicional ancho de banda') !!}--}}
                            {{--{!! Form::select('additional_bandwidth', $additional_bandwidth, null, ['class' => 'selectize']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-lg-2">--}}
                            {{--{!! Form::label('connectivity', 'Conectividad') !!}--}}
                            {{--{!! Form::select('connectivity', $connectivity, null, ['class' => 'selectize']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-lg-2">--}}
                            {{--{!! Form::label('admin_access', 'Acceso administrador') !!}--}}
                            {{--{!! Form::select('admin_access', $admin_access, null, ['class' => 'selectize']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-lg-2">--}}
                            {{--{!! Form::label('storage_backup', 'Storage para backup') !!}--}}
                            {{--{!! Form::select('storage_backup', $storage_backup, null, ['class' => 'selectize']) !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="row">--}}
                        {{--<div class="form-group col-lg-4">--}}
                            {{--{!! Form::label('fee', 'Importe') !!}--}}

                            {{--<div class="input-group">--}}
                                {{--<div class="input-group-prepend">--}}
                                    {{--<span class="input-group-text">$</span>--}}
                                {{--</div>--}}
                                {{--{!! Form::number('fee', null, ['class'  => 'form-control', 'id' => 'budget-fee']) !!}--}}
                                {{--<div class="input-group-append">--}}
                                    {{--<span class="input-group-text">.00</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="form-group">--}}
                            {{--{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}--}}
                            {{--<a href="{!! route('products.index') !!}" class="btn btn-secondary">Cancelar</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--{!! Form::close() !!}--}}
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