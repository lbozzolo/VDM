@extends('base')

@section('content')


    <div class="row">
        <div class="col-lg-4">
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

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Proyectos de {!! $customer->fullname !!}</h3>

                    <div class="fluid-container" style="margin-top: 30px">

                        @forelse($customer->projects as $project)
                            <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
                                <div class="col-md-1">
                                    @if($project->images->count())
                                        @foreach($project->images as $image)
                                            @if($image->main == 1)
                                                <img class="img-md rounded-circle mb-4 mb-md-0" style="border: 1px solid lightgrey" src="{{ route('images.see', $image->path) }}" >
                                            @endif
                                        @endforeach
                                    @else
                                        <img class="img-md rounded-circle mb-4 mb-md-0" src="{{ asset('img/project-img-default.png') }}" alt="profile image">
                                    @endif
                                </div>
                                <div class="ticket-details col-md-9">
                                    <div class="d-flex">
                                        <label class="label badge fase fase-{!! str_slug($project->phase->name, '-') !!} mr-3">{!! $project->phase->name !!}</label>
                                        <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">{!! $project->title !!}</p>
                                        <p class="text-primary mr-1 mb-0">[#{!! $project->id !!}]</p>
                                        <p class="mb-0 ellipsis">{!! $project->description !!}.</p>
                                    </div>
                                    <p class="text-gray ellipsis mb-2">{!! $project->remarks !!}</p>
                                    <div class="row text-gray d-md-flex d-none">
                                        <div class="col-4 d-flex">
                                            <small class="mb-0 mr-2 text-muted text-muted">Fecha de entrega :</small>
                                            <small class="Last-responded mr-2 mb-0 text-muted text-muted">{!! $project->deadline_date !!}</small>

                                        </div>
                                        <div class="col-4 d-flex">
                                            <small class="Last-responded mr-2 mb-0 text-muted text-muted">
                                                <i class="mdi mdi-account"></i>{!! $project->owner->fullname !!}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket-actions col-md-2">
                                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                </div>
                            </div>


                        @empty

                            <span class="text-muted">Todavía no hay nigún proyecto cargado</span>

                        @endforelse


                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection