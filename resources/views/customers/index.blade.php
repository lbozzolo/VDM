@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">Clientes</h2>
                    <a href="{{ route('customers.create') }}" class="btn btn-sm btn-outline-primary mt-3" >Agregar cliente<i class="mdi mdi-plus"></i></a>

                    <div class="table-responsive mt-5">
                        <table class="table table-striped">
                            @if($customers->count())
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Username</th>
                                    <th>Responsable</th>
                                    <th>Email</th>
                                    <th>URL</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{!! ($customer->fullname)? $customer->fullname : '-' !!}</td>
                                        <td>{!! ($customer->username)? $customer->username : '-' !!}</td>
                                        <td>{!! ($customer->head)? $customer->head : '-' !!}</td>
                                        <td>{!! ($customer->email)? $customer->email : '-' !!}</td>
                                        <td>{!! ($customer->url)? $customer->url : '-' !!}</td>
                                        <td>{!! ($customer->address)? $customer->address : '-' !!}</td>
                                        <td>{!! ($customer->phone)? $customer->phone : '-' !!}</td>
                                        <td>
                                            <a href="{{ route('customers.edit', $customer->id) }}" title="Editar" class="btn btn-sm text-primary button-action"><i class="mdi mdi-table-edit"></i></a>
                                            <a href="{{ route('customers.show', $customer->id) }}" title="Detalles" class="btn btn-sm text-info button-action"><i class="mdi mdi-file-document-box"></i></a>
                                            <button title="Eliminar" type="button" data-toggle="modal" data-target="#eliminar{!! $customer->id !!}" class="btn btn-sm button-action text-danger"><i class="mdi mdi-delete"></i></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="eliminar{!! $customer->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" ><i class="mdi mdi-alert-circle text-danger"></i> Eliminar cliente</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Desea eliminar este cliente?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {!! Form::open(['url' => route('customers.destroy'), 'method' => 'delete']) !!}

                                                            {!! Form::hidden('customer_id', $customer->id) !!}
                                                            <button title="Eliminar" type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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