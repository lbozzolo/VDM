@extends('base')

@section('content')


    <div class="row">

        <div class="col-lg-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('products.edit', $product->id) }}" title="Editar Producto" class="btn btn-outline-primary btn-xs" style="float:right">
                        <i class="mdi mdi-rename-box"></i>
                    </a>
                    <h2 class="display-4">{!! $product->name !!}</h2>
                    <h4 class="card-title">Descripción del producto</h4>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">

                                            <tbody>
                                            <tr>
                                                <td><span class="font-weight-bold">Nombre:</span></td>
                                                <td>{!! ($product->name)? $product->name : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Importe:</span></td>
                                                <td>{!! ($product->fee)? '$ '.$product->fee : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Dirección IP:</span></td>
                                                <td>{!! ($product->ip_address)? $product->ip_address : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Tipo de IP:</span></td>
                                                <td>{!! ($product->ip_class)? $product->ip_class : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Username:</span></td>
                                                <td>{!! ($product->username)? $product->username : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Contraseña:</span></td>
                                                <td>{!! ($product->password)? $product->password : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Puerto:</span></td>
                                                <td>{!! ($product->port)? $product->port : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Procesador:</span></td>
                                                <td>{!! ($product->processor)? $product->processor_parse : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">RAM:</span></td>
                                                <td>{!! ($product->ram)? $product->ram_parse : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Almacenamieto:</span></td>
                                                <td>{!! ($product->storage)? $product->storage_parse : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                            <tr>
                                                <td><span class="font-weight-bold">Conectividad:</span></td>
                                                <td>{!! ($product->connectivity)? $product->connectivity_parse : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Direct Admin:</span></td>
                                                <td>{!! ($product->direct_admin)? $product->direct_admin_parse : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Backbone compartido:</span></td>
                                                <td>{!! ($product->backbone_shared)? $product->backbone_shared_parse : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Sistema operativo:</span></td>
                                                <td>{!! ($product->so)? $product->so_parse : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Adicional ancho de banda:</span></td>
                                                <td>{!! ($product->additional_bandwidth)? $product->additional_bandwidth_parse : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Acceso Admin:</span></td>
                                                <td>{!! ($product->admin_access)? $product->admin_access_parse : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Storage backup:</span></td>
                                                <td>{!! ($product->storage_backup)? $product->storage_backup_parse : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Tipo:</span></td>
                                                <td>{!! ($product->type)? $product->type_parse : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Proveedor:</span></td>
                                                <td>{!! ($product->supplier)? $product->supplier->name : '<small class="text-muted">sin datos</small>' !!}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

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