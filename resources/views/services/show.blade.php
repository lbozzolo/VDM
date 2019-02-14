@extends('base')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">{!! $service->name !!}</h2>
                    <h4 class="card-title">Descripción del servicio</h4>

                </div>
            </div>
        </div>

    </div>


@endsection