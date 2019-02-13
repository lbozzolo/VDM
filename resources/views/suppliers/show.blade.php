@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">{!! $supplier->name !!}</h2>
                    <h4 class="card-title">Descripción del proveedor</h4>

                    <ul class="list-arrow">
                        <li>
                            <span class="font-weight-bold">Email:</span>
                            {!! ($supplier->email)? $supplier->email : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Productos</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Servicios</h3>
                </div>
            </div>
        </div>

    </div>

@endsection