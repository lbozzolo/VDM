@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <h2 class="display-4">{!! $customer->fullname !!}</h2>
                    <h4 class="card-title">Descripción del cliente</h4>

                    <ul class="list-arrow">
                        <li>
                            <span class="font-weight-bold">Nombre:</span>
                            {!! ($customer->fullname)? $customer->fullname : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">Username:</span>
                            {!! ($customer->username)? $customer->username : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">Email:</span>
                            {!! ($customer->email)? $customer->email : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">URL:</span>
                            {!! ($customer->url)? $customer->url : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">Teléfono:</span>
                            {!! ($customer->phone)? $customer->phone : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">Dirección:</span>
                            {!! ($customer->address)? $customer->address : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">CUIT:</span>
                            {!! ($customer->cuit)? $customer->cuit : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">CUIL:</span>
                            {!! ($customer->cuil)? $customer->cuil : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                        <li>
                            <span class="font-weight-bold">Observaciones:</span>
                            {!! ($customer->remarks)? $customer->remarks : '<small class="text-muted">sin datos</small>' !!}
                        </li>
                    </ul>


                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Proyectos</h3>
                    <ul>
                        @forelse($customer->projects as $project)
                            <li>{!! $project->title !!}</li>
                        @empty
                            <p class="text-muted">Todavía no hay nigún proyecto.</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection