
{{-- Errores --}}
@if ($errors->count() > 0)

    <span class="d-block d-md-flex align-items-center bg-danger text-white">
        @if ($errors->count() > 1)
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @else
            {{ $errors->first() }}
        @endif
        <i class="mdi mdi-close popup-dismiss d-none d-md-block ml-auto text-white"></i>
    </span>

@endif

{{-- Success --}}
@if (session()->has('ok') || isset($ok))

    <span class="d-block d-md-flex align-items-center bg-success text-white">
        @if (session()->has('ok'))
            <p class="text-white">{!! session('ok') !!}</p>
        @else
            <p class="text-white">{!! $ok !!}</p>
        @endif
        <i class="mdi mdi-close popup-dismiss d-none d-md-block ml-auto text-white"></i>
    </span>

@endif

{{-- Info --}}
@if (session()->has('info') || isset($info))

    <span class="d-block d-md-flex align-items-center bg-warning text-white">
        @if (session()->has('info'))
            <p class="text-white">{!! session('info') !!}</p>
        @else
            <p class="text-white">{!! $info !!}</p>
        @endif
        <i class="mdi mdi-close popup-dismiss d-none d-md-block ml-auto text-white"></i>
    </span>

@endif



