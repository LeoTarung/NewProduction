@extends('lhp-template')
@section('content')
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }
</style>
<div class="container-fluid">
        {{-- BAGIAN ATAS --}}
        <div class="row mt-3">
            <div class="col-8">
                <div class="card card_form_input">
                    <div class="card-body">
                        <input type="number" class="fw-bold text-end input_berat" name="berat" id="berat"
                            placeholder="Masukkan angka..." autofocus required>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card text-center card_stok-molten">
                            @if ($data->material == 'AC2B')
                            <?php $warna = 'bg-orange text-dark' ?>
                            @elseif($data->material == 'AC4B')
                            <?php $warna = 'bg-ungu' ?>
                            @elseif($data->material == 'AC4CH')
                            <?php $warna = 'text-dark' ?>
                            @elseif($data->material == 'AC2BF')
                            <?php $warna = 'bg-merahBata' ?>
                            @elseif($data->material == 'ADC12')
                            <?php $warna = 'bg-silver text-dark' ?>
                            @elseif($data->material == 'HD-2')
                            <?php $warna = 'bg-warning' ?>
                            @elseif($data->material == 'HD-4')
                            <?php $warna = 'bg-primary' ?>
                            @elseif($data->material == 'YH3R')
                            <?php $warna = 'bg-success' ?>
                            @endif
                            <div class="card-header {{ $warna }} ">STOK MOLTEN</div>
                            <div class="card-body">
                                {{-- <p class="fw-bold stok_molten" id="stok_molten">@FormatRibu($data->stok_molten) KG</p> --}}
                                <p class="fw-bold stok_molten" id="stok_molten"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- BAGIAN BAWAH --}}
        <div class="row">
            <div class="col-8 mt-3">
                <div class="card card-material">
                    <div class="card-body">
                        <p class="fs-1 fw-bold">Material :</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-xl-3 col-4 mb-3"><a class="btn btn-primary shadow fs-4 ms-3" style="width: 160px; height: 60px;" onclick="Confirm('ingot')">INGOT</a></div>
                                    <div class="col-xl-3 col-4 mb-3"><a class="btn btn-primary shadow fs-4 ms-3" style="width: 160px; height: 60px;" onclick="Confirm('exgate')">EXGATE</a></div>
                                    <div class="col-xl-3 col-4 mb-3"><a class="btn btn-primary shadow fs-4 ms-3" style="width: 160px; height: 60px;" onclick="Confirm('reject_parts')">PARTS NG</a></div>
                                    <div class="col-xl-3 col-4 mb-3"><a class="btn btn-warning shadow fs-4 ms-3" style="width: 160px; height: 60px;" onclick="Confirm('tapping')">TAPPING</a></div>
                                    <div class="col-xl-3 col-4 mb-3"><a class="btn btn-primary shadow fs-4 ms-3" style="width: 160px; height: 60px;" onclick="Confirm('alm_treat')">ALM TREAT</a></div>
                                    <div class="col-xl-3 col-4 mb-3"><a class="btn btn-primary shadow fs-4 ms-3" style="width: 160px; height: 60px;" onclick="Confirm('fluxing')">FLUXING</a></div>
                                    <div class="col-xl-3 col-4 mb-3"><a class="btn btn-warning shadow fs-4 ms-3" style="width: 160px; height: 60px;" onclick="Confirm('dross')">DROSS</a></div>
                                    <div class="col-xl-3 col-4 mb-3"><a class="btn btn-warning shadow fs-4 ms-3" style="width: 160px; height: 60px;" onclick="Confirm('gas_akhir')">GAS AKHIR</a></div>
                                    {{-- <div class="col-xl-3 col-4 mb-3"><button type="submit" name="item"
                                            value="basemetal" class="btn btn-primary shadow fs-5 ms-3"
                                            style="width: 160px; height: 60px;"
                                            onclick="Confirm('BASEMETAL')">BASEMETAL</button>
                                    </div> --}}
                                    {{-- <div class="col-xl-3 col-4 mb-3"><button type="submit" name="item"
                                            value="oil_scrap" class="btn btn-primary shadow fs-5 ms-3"
                                            style="width: 160px; height: 60px;"
                                            onclick="Confirm('OIL SCRAP')">OIL
                                            SCRAP</button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card text-center card_total-chg">
                            <div class="card-header {{ $warna }} ">TOTAL CHARGING</div>
                            <div class="card-body">
                                <p class="fw-bold total_charging">@FormatRibu($data->total_charging) KG</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="card-group">
                            <div class="card text-center card-ingot">
                                <h5 class="card-header fs-2 fw-bold {{ $warna }}">INGOT</h5>
                                <div class="card-body card-ingot">
                                    @if ($data->persen_ingot >= 30.0)
                                    <p class="fw-bold font-blinking">{{ $data->persen_ingot }}%</p>
                                    @else
                                    <p class="fw-bold">{{ $data->persen_ingot }}%</p>
                                    @endif

                                </div>
                            </div>
                            <div class="card text-center card-scrap">
                                <h5 class="card-header fs-2 fw-bold {{ $warna }}">SCRAP</h5>
                                <div class="card-body card-ingot">
                                    <p class="fw-bold ">{{ $data->persen_rs }}%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<script>
    function isitimbangan(){
        $.ajax({
            method: "GET",
            dataType: "json",
            url: "{{ url('/api/timbangan/1') }}",
            success: function (data) {
                $("#berat").val(data.berat);
            },
            error: function(status) {
                $("#berat").val("ON LOADING...");
            }
        });
        setTimeout(isitimbangan, 1000);
    }
    isitimbangan()


    function Confirm(material){
        var berat = $("#berat").val();
        var id_lhp = {{ $id }};
        var furnace = "{{ $area }}";
        $.get('/lhp-modal/melting/kereta/{{ $data->material }}', {}, function (data, status) {
                $("#staticBackdropLabel").html('Pilih Berat Kereta'); //Untuk kasih judul di modal
                $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
                $("#page").html(data); //menampilkan view create di dalam id page
                $("#form-tambahan").html(
                        '<input type="hidden" name="material" value="' + material + '">' +
                        '<input type="hidden" name="berat" value="' + berat + '">' +
                        '<input type="hidden" name="id_lhp" value="' + id_lhp + '">' +
                        '<input type="hidden" name="furnace" value="' + furnace + '">'
                );
            });
    }

    function resumeMelting(xx, area){
        $.get('/lhp-modal/resume-melting/'+ xx, {}, function (data, status) {
                $("#staticBackdropLabel").html('Resume Charging ' + area); //Untuk kasih judul di modal
                $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
                $("#page").html(data); //menampilkan view create di dalam id page
            });
    }



</script>
<script>
    $(function(){
    let ip_node = location.hostname;
    let socket_port = '1553';
    let socket = io(ip_node + ':' + socket_port);
    let lokasi = "Kiri" + "{{ $area }}";
    socket.on('connection');
    socket.on(lokasi, (data) => {
        console.log(data)
            if(data.length == 0){
            document.getElementById("stok_molten").innerHTML = "HUB DIGITAL";
            } else {
            document.getElementById("stok_molten").innerHTML = data[0].stok_molten.toLocaleString('de-DE') +" KG";
            }
        })
    });
</script>
@endsection
