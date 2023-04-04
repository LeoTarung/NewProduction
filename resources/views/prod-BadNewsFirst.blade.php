@extends('prod-template')
@section('content')
<h3 class="mt-2">Bad News First</h3>

<div class="card mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col ">
                <button class="btn btn-success mb-2 float-end" onclick="addBnfquality()"><i class="fa-solid fa-plus"></i> Bad News Quality</button>
                <a class="btn btn-sm btn-primary mb-2 float-start" href="{{ url('/tv/BadNewsFirst') }}" target="_blank"><i class="fa-solid fa-tv"></i> See On TV</a>
            </div>
        </div>
        <div class="table-responsive">
            <table id="Table_BNF" class="table table-striped-columns table-hover table-bordered nowrap display" style="overflow-x: scroll">
                <thead  class="text-center">
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL</th>
                        <th>CUSTOMER</th>
                        <th>NAMA PART</th>
                        <th>PROBLEM</th>
                        <th>QTY</th>
                        <th>KATEGORI</th>
                        <th>KEJADIAN</th>
                        <th>PIC</th>
                        <th>STATUS</th>
                        <th nowrap="nowrap">AKSI</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<h3 class="mt-4">Data Delivery</h3>

<div class="card mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col ">
                <button class="btn btn-success mb-2 float-end" onclick="addDeliveryquality()"><i class="fa-solid fa-plus"></i> Data Delivery Quality</button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="Table_DataDelivery" class="table table-striped-columns table-hover table-bordered nowrap display" style="overflow-x: scroll">
                <thead  class="text-center">
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL</th>
                        <th>TOTAL DELIVERY</th>
                        <th nowrap="nowrap">AKSI</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<script>
        $(function () {
        var table = $('#Table_BNF').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/BadNewsFirst') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {data: 'tanggal', name: 'tanggal'},
                {data: 'nama_customer', name: 'nama_customer'},
                {data: 'nama_part', name: 'nama_part'},
                {data: 'problem', name: 'problem'},
                {data: 'total_ng', name: 'total_ng'},
                {data: 'kategori_claim', name: 'kategori_claim'},
                {data: 'kejadian_claim', name: 'kejadian_claim'},
                {data: 'pic', name: 'pic'},
                {data: 'status_bnf', name: 'status_bnf'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });

        $(function () {
        var table = $('#Table_DataDelivery').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/BadNewsFirst/DataDeliveryTable') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {data: 'tanggal', name: 'tanggal'},
                {data: 'all_customer', name: 'all_customer'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });

    function addBnfquality() {
        $.get("/modal/bnfQuality", {}, function (data, status) {
            $("#staticBackdropLabel").html("Add Bad News Quality"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function addDeliveryquality() {
        $.get("/modal/deliveryQuality", {}, function (data, status) {
            $("#staticBackdropLabel").html("Add Delivery Quality"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function editBNF(xx){
        $.get("/modal/bnfQuality", {}, function (data, status) {
        $("#staticBackdropLabel").html("Edit Bad News Quality"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/BadNewsFirst/api') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                    db: 'editbnf',
                },
                success: function (data) {
                    console.log(data);
                    $("form").attr("action", "{{ url('/modal/bnfQuality/update') }}");
                    $("#tanggal").val(data.tanggal);
                    $('#nama_customer').val(data.nama_customer).trigger('change');
                    $('#nama_part').val(data.nama_part).trigger('change');
                    $("#problem").val(data.problem);
                    $("#pic").val(data.pic);
                    $("#pic_qc").val(data.pic_qc);
                    $("#pic_penerima").val(data.pic_penerima);
                    $("#occure_"+data.occure).attr('checked', true);
                    $("#occure_deskripsi").val(data.occure_deskripsi);
                    $("#outflow_"+data.outflow).attr('checked', true);
                    $("#outflow_deskripsi").val(data.outflow_deskripsi);
                    $("#bocor").val(data.bocor);
                    $("#flowline").val(data.flowline);
                    $("#mach_other").val(data.mach_other);
                    $("#no_tap").val(data.no_tap);
                    $("#paint_meler").val(data.paint_meler);
                    $("#paint_tipis").val(data.paint_tipis);
                    $("#dent").val(data.dent);
                    $("#gompal").val(data.gompal);
                    $("#ng_assy").val(data.ng_assy);
                    $("#other").val(data.other);
                    $("#paint_other").val(data.paint_other);
                    $("#porosity").val(data.porosity);
                    $("#dimensi_cast").val(data.dimensi_cast);
                    $("#jamur").val(data.jamur);
                    $("#ng_assy_mach").val(data.ng_assy_mach);
                    $("#o_proses_f").val(data.o_proses_f);
                    $("#paint_peel_off").val(data.paint_peel_off);
                    $("#retak").val(data.retak);
                    $("#dimensi_mach").val(data.dimensi_mach);
                    $("#k_proses_fin").val(data.k_proses_fin);
                    $("#ng_assy_sc").val(data.ng_assy_sc);
                    $("#paint_kotor").val(data.paint_kotor);
                    $("#paint_scratch").val(data.paint_scratch);
                    $("#undercut").val(data.undercut);
                    $("#kategori_claim_"+data.kategori_claim).attr('checked', true);
                    $("#kejadian_claim_"+data.kejadian_claim).attr('checked', true);
                    $("#kategori_claim_market_"+data.kategori_claim_market).attr('checked', true);
                    $("#kategori_claim_market_"+data.kategori_claim_market).attr('checked', true);
                    $("#no_dpwc").val(data.no_dpwc);
                    $("#status_bnf_"+data.status_bnf).attr('checked', true);
                    $("#opl_"+data.opl).attr('checked', true);
                    $("#customer").val(data.customer);
                    $("#selog").val(data.selog);
                    $("#delsi").val(data.delsi);
                    $("#PDC").val(data.PDC);
                    $("#FSCM").val(data.FSCM);
                    $("#NM").val(data.NM);
                    $("#total_ng").val(data.total_ng);
                    $("#stock").val(data.stock);
                    $("#tambahaninputan").html(
                        '<input type="hidden" name="id_bnf" value="' + data.id + '">'
                    );
                },
            });
        });
    }

    function editQualityDelivery(xx){
        $.get("/modal/deliveryQuality", {}, function (data, status) {
        $("#staticBackdropLabel").html("Edit Bad News Quality"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/BadNewsFirst/api') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                    db: 'editqualitydelivery',
                },
                success: function (data) {
                    console.log(data);
                    $("form").attr("action", "{{ url('/modal/deliveryQuality/update') }}");
                    $("#tanggal").val(data.tanggal);
                    $("#all_customer").val(data.all_customer);
                    $("#adm").val(data.adm);
                    $("#ahm_p1").val(data.ahm_p1);
                    $("#ahm_p2").val(data.ahm_p2);
                    $("#ahm_p3").val(data.ahm_p3);
                    $("#ahm_p4").val(data.ahm_p4);
                    $("#ahm_p5").val(data.ahm_p5);
                    $("#ahm_rem").val(data.ahm_rem);
                    $("#aisin").val(data.aisin);
                    $("#aspira").val(data.aspira);
                    $("#cai").val(data.cai);
                    $("#denso").val(data.denso);
                    $("#dnp").val(data.dnp);
                    $("#hino").val(data.hino);
                    $("#hpm").val(data.hpm);
                    $("#igp").val(data.igp);
                    $("#j_tekt").val(data.j_tekt);
                    $("#kawasaki").val(data.kawasaki);
                    $("#kubota").val(data.kubota);
                    $("#kayaba").val(data.kayaba);
                    $("#mhask").val(data.mhask);
                    $("#mii").val(data.mii);
                    $("#mkm").val(data.mkm);
                    $("#nissan").val(data.nissan);
                    $("#nki").val(data.nki);
                    $("#okamoto").val(data.okamoto);
                    $("#suzuki").val(data.suzuki);
                    $("#skc").val(data.skc);
                    $("#tmmin").val(data.tmmin);
                    $("#toyoda_gosai").val(data.toyoda_gosai);
                    $("#yamaha").val(data.yamaha);
                    $("#yutaka").val(data.yutaka);
                    $("#tambahaninputan").html(
                        '<input type="text" name="id_deliveryQuality" value="' + data.id + '">'
                    );
                },
            });
        });
    }
</script>
{{-- <script type="text/javascript">
    var data = [
        {'gambar' : 'assembling.jpg'},
        {'gambar' : 'casting.jpg'},
        {'gambar' : 'melting.jpg'},
        {'gambar' : 'machining.jpg'},
        {'gambar' : 'painting.jpg'},
    ]

    var jangka = 20000 ;
    var inter;
    function showdata(){
        for (let i = 0; i < data.length; i++) {
            setTimeout(function() {
                console.log(data[i]);
                // $("#text").html(data[i].gambar)
                $("#text").html(
                    '<img src="/UI/IMG/'+data[i].gambar+'" class="img-fluid" alt="'+data[i].gambar+'" >'
                )
            }, jangka * i); // mengatur jeda waktu dengan mengalikan 1000 (1 detik) dengan indeks i
            inter = jangka * i;
        }
    }
    showdata()
    setInterval(showdata, inter+inter);
</script> --}}
@endsection
