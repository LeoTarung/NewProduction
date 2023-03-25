@extends('prod-template')
@section('content')
<h3 class="mt-2">Casting Section</h3>
<div class="row">
    <div class="col">
        {{-- <button class="btn btn-primary mb-2 float-end" ><i class="fa-solid fa-whiskey-glass"></i> Lv Molten</button>
        <button class="btn btn-success mb-2 float-end me-2"><i class="fa-solid fa-fire-burner"></i> Furnace</button>
        <button class="btn btn-warning mb-2 float-end me-2"><i class="fa-solid fa-cart-shopping"></i> Kereta</button> --}}
        <button class="btn btn-danger mb-2 float-end me-2"><i class="fa-solid fa-screwdriver-wrench"></i> Henkaten</button>
    </div>
</div>
<div class="row">
    <div class="col-12 nopadding">
        <div class="card">
            <div class="card-body card-lineCasting">
                <img src="/UI/IMG/line-casting.png" alt="" class="img-line-casting">
                <button class="child-lineCasting btn btn-primary position-absolute">TESTING</button>
            </div>
        </div>
    </div>
    {{-- <div class="col-12 col-lg-6 nopadding">
        <div class="card m-1">
            <div class="card-header bg-warning">
            </div>
            <div class="card-body">
                <a class="btn btn-primary float-end" href="{{ url('/production/melting/Striko-1') }}">Lihat Data</a>
                <p class="fs-4 text-center fw-bold text-decoration-underline">STRIKO - 1</p>
                <div class="chartdiv" id="chartdiv"></div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 nopadding">
        <div class="card m-1">
            <div class="card-header bg-warning">
            </div>
            <div class="card-body">
                <a class="btn btn-primary float-end" href="{{ url('/production/melting/Striko-1') }}">Lihat Data</a>
                <p class="fs-4 text-center fw-bold text-decoration-underline">STRIKO - 2</p>
                <div class="chartdiv" id="chartdiv1"></div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 nopadding">
        <div class="card m-1">
            <div class="card-header bg-warning">
            </div>
            <div class="card-body">
                <a class="btn btn-primary float-end" href="{{ url('/production/melting/Striko-1') }}">Lihat Data</a>
                <p class="fs-4 text-center fw-bold text-decoration-underline">STRIKO - 3</p>
                <div class="chartdiv" id="chartdiv2"></div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 nopadding">
        <div class="card m-1">
            <div class="card-header bg-warning">
            </div>
            <div class="card-body">
                <a class="btn btn-primary float-end" href="{{ url('/production/melting/Striko-1') }}">Lihat Data</a>
                <p class="fs-4 text-center fw-bold text-decoration-underline">SWIF ASIA</p>
                <div class="chartdiv" id="chartdiv3"></div>
            </div>
        </div>
    </div> --}}
</div>

@endsection
