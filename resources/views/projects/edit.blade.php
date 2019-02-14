@extends('base')

@section('content')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">{!! $project->title !!}</h2>



                    <div class="btn-group" role="group" aria-label="Basic example" style="float: right">
                        <a href="{{ route('projects.expirations', $project->id) }}"  class="btn btn-outline-secondary">
                            <i class="mdi mdi-clock-alert"></i> vencimientos
                        </a>
                        <a href="{{ route('projects.images', $project->id) }}" class="btn btn-outline-secondary">
                            <i class="mdi mdi-image-album"></i> imágenes
                        </a>
                        <a href="{{ route('projects.budgets', $project->id) }}" class="btn btn-outline-secondary">
                            <i class="mdi mdi-file-document-box"></i> presupuestos
                        </a>
                        <a href="{{ route('projects.edit', $project->id) }}" title="Editar Proyecto" class="btn btn-outline-secondary">
                            <i class="mdi mdi-rename-box"></i>
                        </a>
                    </div>

                    <h4 class="card-title">Editar proyecto</h4>


                    {!! Form::model($project,['url' => route('projects.update', $project->id), 'method' => 'put']) !!}
                    <div class="form-group">
                        <label for="title">Título <span class="text-danger">*</span> </label>
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Mi primer proyecto']) !!}
                    </div>

                    <div class="form-group">
                        <label for="description">
                            Descripción <small style="color: gray">(opcional)</small>
                        </label>
                        {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Sistema de gestión de contenidos']) !!}
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="exampleInputName1">Responsable</label>
                            {!! Form::select('owner_id', $users, Auth::user()->id, ['class' => 'selectize']) !!}
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="exampleInputName1">Cliente</label>
                            {!! Form::select('customer_id', $customers, null, ['class' => 'selectize']) !!}
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Fase del proyecto</label><br>
                                {!! Form::select('phase_id', $phases, null, ['class' => 'selectize']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('period', 'Plazo de entrega') !!}
                                {!! Form::text('period', null, ['class' => 'form-control', 'placeholder' => 'Tres meses']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('deadline', 'Fecha de entrega') !!}
                                {!! Form::text('deadline', $project->deadline_date, ['class' => 'form-control datepicker', 'style' => 'cursor: default']) !!}
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            {!! Form::label('remarks', 'Observaciones') !!}
                            {!! Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => '12']) !!}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning mr-2">Actualizar</button>
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-lg-4">

            @include('projects.partials.contact')

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

            $('#add-contact-button').click(function () {
                $('#add-contact').show();
                $('#contacts-list').hide();
                $('#existing-contacts').show();
                $(this).hide();
            });

            $('#cancel-add-contact').click(function () {

                $('#contacts-list').show();
                $('#add-contact').hide();
                $('#add-contact-button').show();
                $('#existing-contacts').hide();

            });

        });

    </script>

@endsection