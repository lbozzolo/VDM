@extends('base')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">{!! $product->name !!}</h2>
                    <h4 class="card-title">Descripción del producto</h4>


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