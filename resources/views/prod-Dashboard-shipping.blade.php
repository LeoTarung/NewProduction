@extends('prod-template')
@section('content')
<h3 class="mt-2">Shipping Section</h3>
<div class="row">
    <div class="col">
        <a class="btn btn-sm btn-secondary mb-2 float-start" href=""><i class="fa-solid fa-calendar-week"></i> Schedule Delivery</a>
        <a class="btn btn-sm btn-primary ms-2 mb-2 float-start" href="{{'/prod/shipping/history'}}"><i class="fa-solid fa-book-open"></i> History Delivery</a>
    </div>
</div>
<div class="row">
    <div class="col">
        <a class="btn btn-sm btn-warning mb-2 float-start" href="{{'/prod/shipping/scan'}}"><i class="fa-solid fa-qrcode"></i> Scan QR Delivery</a>
    </div>
</div>
<div class="row justify-content-center text-center fw-bold ms-auto my-auto">
    <div class="col-12">
        <h1>BELUM ADA IDE YANG BISA DITUANGKAN <br> MOHON DIBANTU</h1>
    </div>
</div>
@endsection
