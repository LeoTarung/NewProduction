@extends('prod-template')
@section('content')
<h3 class="mt-2">Shipping Section</h3>
<div class="row">
    <div class="col">
        <a class="btn btn-sm btn-secondary  mb-2 float-start" href="{{ url('/tv/shipping') }}" target="_blank"><i class="fa-solid fa-tv"></i> Monitoring Delivery</a>
        {{-- <a class="btn btn-sm btn-success ms-2 mb-2 float-start" href=""><i class="fa-solid fa-calendar-week"></i> Schedule Delivery</a> --}}

    </div>
</div>
<div class="row">
    <div class="col">
        <a class="btn btn-warning mb-2 float-start" onclick="ToScanWeb()"><i class="fa-solid fa-qrcode"></i> Scan QR Delivery</a>
        <a class="btn btn-primary ms-2 mb-2 float-start" href="{{'/prod/shipping/history'}}"><i class="fa-solid fa-book-open"></i> History Delivery</a>
        {{-- <a class="btn btn-sm btn-warning mb-2 float-start" href="{{'/prod/shipping/scan'}}"><i class="fa-solid fa-qrcode"></i> Scan QR Delivery</a> --}}
    </div>
</div>
<div class="row justify-content-center text-center fw-bold ms-auto my-auto">
    <div class="col-12">
        <h1>BELUM ADA IDE YANG BISA DITUANGKAN <br> MOHON DIBANTU</h1>
    </div>
</div>
<script>
        function ToScanWeb() {
        $.get("/modal/toscan", {}, function (data, status) {
            $("#staticBackdropLabel").html("Piliah Docking"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }
</script>
@endsection
