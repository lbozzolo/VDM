@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">Clientes</h2>
                    <a href="{{ route('customers.create') }}" class="btn btn-success btn-sm" >Nuevo cliente<i class="mdi mdi-plus"></i></a>

                    <div class="table-responsive mt-5">
                        <table class="table table-striped">
                            @if($customers->count())
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Username</th>
                                    <th>Responsable</th>
                                    <th>Email</th>
                                    <th>URL</th>
                                    <th>Dirección</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">
                                            {!! Form::open(['url' => route('customers.destroy'), 'method' => 'delete']) !!}
                                            {!! Form::hidden('customer_id', $customer->id) !!}
                                            <button type="submit" class="text-danger"><i class="mdi mdi-delete"></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <tbody>
                                <tr>
                                    <td colspan="8">
                                        <span class="text-muted">No hay ninguna cliente cargado</span>
                                    </td>
                                </tr>
                                </tbody>
                            @endif

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection