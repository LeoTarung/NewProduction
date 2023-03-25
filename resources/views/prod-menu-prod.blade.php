@extends('prod-template')
@section('content')

<div class="position-relative" style="height: 3.8rem;">
    <div class="position-absolute top-0 end-0"><img src="/UI/IMG/list-top.png"></div>
    <div class="position-absolute top-0 end-0"><p class="fs-2 me-5">PRODUCTION</p> </div>
</div>

<div class="row justify-content-center">

    <div class="col-12 col-md-6 col-lg-4 prod-menu mt-2 px-1">
        <a href="prod/melting/">
            <div class="card text-center">
                <img src="{{ url('/UI/IMG/melting.jpg') }}" alt="">
                <div class="descriptions text-center">
                    <div class="font-white font-desc fs-1">MELTING</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-md-6 col-lg-4 prod-menu mt-2 px-1">
        <a href="prod/casting">
            <div class="card ">
                <img src="{{ url('/UI/IMG/casting.jpg') }}" alt="">
                <div class="descriptions text-center">
                    <div class="font-white font-desc fs-2">CASTING</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-md-6 col-lg-4 prod-menu mt-2 px-1">
        <a href="http://10.14.20.212:3333/">
            <div class="card ">
                <img src="{{ url('/UI/IMG/machining.jpg') }}" alt="">
                <div class="descriptions text-center">
                    <div class="font-white font-desc fs-2">MACHINING</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-md-6 col-lg-4 prod-menu mt-2 px-1">
        <a href="">
            <div class="card ">
                <img src="{{ url('/UI/IMG/painting.jpg') }}" alt="">
                <div class="descriptions text-center">
                    <div class="font-white font-desc fs-2">PAINTING</div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-md-6 col-lg-4 prod-menu mt-2 px-1">
        <a href="">
            <div class="card ">
                <img src="{{ url('/UI/IMG/assembling.jpg') }}" alt="">
                <div class="descriptions text-center">
                    <div class="font-white font-desc fs-2">ASSEMBLING</div>
                </div>
            </div>
        </a>
    </div>

</div>

@endsection
