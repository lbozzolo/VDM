@extends('base')

@section('content')

    <div class="row">
        <div class="col-lg-12">
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

                    <h4>Presupuestos</h4>
                    <button type="button" id="add-budget-button" class="btn btn-sm btn-outline-primary mt-3">+ Agregar presupuesto</button>

                    @include('projects.partials.presupuestos')

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

            $('#add-budget-button').click(function () {
                $('#add-budget').show();
                $('#budget-list').hide()
            });

            $('#cancel-add-budget').click(function () {

                $('#budget-list').show()
                $('#add-budget').hide();
                $('#budget-fee').val('');
                $('#budget-payment').val('');
                $('#budget-file').val('');

            });

            $('#add-expiration-button').click(function () {
                $('#add-expiration').show();
                $('#expiration-list').hide()
            });

            $('#cancel-add-expiration').click(function () {

                $('#expiration-list').show()
                $('#add-expiration').hide();
                $('#expiration-fee').val('');
                $('#expiration-payment').val('');
                $('#expiration-alert').val('');
                $('#expiration-remarks').val('');

            });

        });

    </script>

@endsection