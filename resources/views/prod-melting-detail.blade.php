@extends('prod-template')
@section('content')
<h3 class="mt-2 text-center">{{ $title }} DATA</h3>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-paste"></i> Laporan Harian Produksi</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="Table_LHPMELTING" class="table table-striped-columns table-hover table-bordered nowrap display" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">TANGGAL</th>
                                <th class="text-center">SHIFT</th>
                                <th class="text-center">MATERIAL</th>
                                <th class="text-center">TOTAL CHARGING (KG)</th>
                                <th class="text-center">TAPPING (KG)</th>
                                <th class="text-center">INGOT (%)</th>
                                <th class="text-center">BUKAN INGOT (%)</th>
                                <th class="text-center">LOSSES (%)</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-screwdriver-wrench"></i> Riwayat Henkaten</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="Table_HenkatenMELTING" class="table table-striped-columns table-hover table-bordered display" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">TANGGAL</th>
                                <th class="text-center">SHIFT</th>
                                <th class="text-center">JENIS</th>
                                <th class="text-center">DESKRIPSI</th>
                                <th class="text-center">PROBLEM</th>
                                <th class="text-center">COUNTERMEASURE</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        var table = $('#Table_LHPMELTING').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/prod/melting/') }}" + "/" + "{{ $title }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {data: 'tanggal', name: 'tanggal'},
                {data: 'shift', name: 'shift'},
                {data: 'material', name: 'material'},
                {data: 'total_charging', name: 'total_charging'},
                {data: 'tapping', name: 'tapping'},
                {data: 'persen_ingot', name: 'persen_ingot'},
                {data: 'persen_rs', name: 'persen_rs'},
                {data: 'persen_losdros_material', name: 'persen_losdros_material'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
    $(function () {
        var table = $('#Table_HenkatenMELTING').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/prod/meltingHenkaten/') }}" + "/" + "{{ $title }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {data: 'tanggal', name: 'tanggal'},
                {data: 'shift', name: 'shift'},
                {data: 'jenis_henkaten', name: 'jenis_henkaten'},
                {data: 'deskripsi', name: 'deskripsi'},
                {data: 'problem', name: 'problem'},
                {data: 'countermeasure', name: 'countermeasure'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });


    function lihatLhp(xx){
        $.get("/modal/detail-lhp", {}, function (data, status) {
            $("#staticBackdropLabel").html("Details Input LHP"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/lhp/meltingRAW/api') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id_lhp: xx,
                },
                success: function (data) {
                    var wrapper = document.getElementById("tbody");
                        var  myHTML = '';
                        for (var i = 0; i < data.length; i++) {
                            myHTML +=
                                '<tr>' +
                                    '<td>' + data[i].jam + '</td>' +
                                    '<td>' + data[i].ingot + '</td>' +
                                    '<td>' + data[i].exgate + '</td>' +
                                    '<td>' + data[i].reject_parts + '</td>' +
                                    '<td>' + data[i].alm_treat + '</td>' +
                                    '<td>' + data[i].fluxing + '</td>' +
                                    '<td>' + data[i].tapping + '</td>' +
                                    '<td>' + data[i].dross + '</td>' +
                                    '<td> <a class="btn btn-warning" onClick="editdetails(' + data[i].id +')">edit</a> </td>' +
                                '</tr>';
                            }
                    wrapper.innerHTML = myHTML;
                },
            });
        });
    }

    function editdetails(xx){
        $.get("/modal/edit-detail-lhp", {}, function (data, status) {
            $("#staticBackdropLabel").html("Edit Details Input LHP"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/lhp/melting/api') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    console.log(data)
                    $("#ingot").val(data[0].ingot)
                    $("#exgate").val(data[0].exgate)
                    $("#reject_parts").val(data[0].reject_parts)
                    $("#alm_treat").val(data[0].alm_treat)
                    $("#fluxing").val(data[0].fluxing)
                    $("#tapping").val(data[0].tapping)
                    $("#dross").val(data[0].dross)
                },
            });
        });
    }
</script>
@endsection
