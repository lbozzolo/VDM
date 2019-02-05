@extends('layouts.vdm')

@section('body')

    @include('partials.navbar')

    <div class="container-fluid page-body-wrapper">

        @include('partials.sidebar')

        <div class="main-panel">

            <div class="content-wrapper">

                <div class="row purchace-popup">
                    <div class="col-12">
                        @include('layouts.partials.messages')
                    </div>
                </div>
                @yield('content')
            </div>

            @include('partials.footer')

        </div>

    </div>

@endsection