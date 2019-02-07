@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="display-4">Fases</h2>

                    <h3 class="card-title">Crear nueva fase</h3>
                    {!! Form::open(['url' => route('phases.store'), 'method' => 'post']) !!}

                    <div class="row">
                        <div class="col-lg-10">{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}</div>
                        <div class="col-lg-2">{!! Form::submit('crear', ['class' => 'btn btn-primary btn-sm']) !!}</div>
                    </div>

                    {!! Form::close() !!}

                    <div class="table-responsive mt-5">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($phases as $id => $name)
                                <tr>
                                    <td>{!! $name !!}</td>
                                    <td class="text-center">
                                        {!! Form::open(['url' => route('phases.delete'), 'method' => 'delete']) !!}
                                        {!! Form::hidden('phase_id', $id) !!}
                                        <button type="submit" class="text-danger"><i class="mdi mdi-delete"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">
                                        <span class="text-muted">No hay ninguna fase cargada</span>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection