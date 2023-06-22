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
                    var  myHTML = '';
                    myHTML +=
                    '<input type="hidden" name="id_raw_lhp" value="'+data[0].id+'">' +
                    '<input type="hidden" name="mesin" value="'+data[0].mesin+'">';
                    $("#tambahaninputan").html(myHTML)
                },
            });
        });
    }

    function DetailsHenkaten(xx){
        $.get('/modal/addhenkatenMelting', {}, function (data, status) {
            $("#staticBackdropLabel").html("Edit Henkaten"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/api/henkaten') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    $("form").attr("action", "{{ url('/modal/henkatenMelting/update') }}");
                    $("#furnace").val(data.mesin);
                    if(data.jenis_henkaten == 'MAN'){
                        $("#MAN").addClass("active", "active");
                        $("#MAN").removeAttr("disabled", "disabled");
                        $("#MACHINE").removeClass("active", "active");
                        $("#MACHINE").attr("disabled", "disabled");
                        $("#MATERIAL").removeClass("active", "active");
                        $("#MATERIAL").attr("disabled", "disabled");
                        $("#METHODE").removeClass("active", "active");
                        $("#METHODE").attr("disabled", "disabled");
                        $("#form-tambahan").html(
                            '<input type="hidden" name="jenis_henkaten" value="' + data.jenis_henkaten + '">'+
                            '<input type="hidden" name="id_henkaten" value="' + data.id + '">'+
                            '<div class="mb-3">'+
                                '<label for="safety">Safety <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="safety_yes" name="safety" value="yes" checked/>'+
                                    '<label for="safety_yes">SAFETY</label>'+
                                    '<input type="radio" id="safety_no" name="safety" value="no" />'+
                                    '<label for="safety_no">UNSAFETY</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="mb-3">'+
                                '<label for="kakotora">Kakotora <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="kakotora_yes" name="kakotora" value="yes" checked/>'+
                                    '<label for="kakotora_yes">YA</label>'+
                                    '<input type="radio" id="kakotora_no" name="kakotora" value="no" />'+
                                    '<label for="kakotora_no">TIDAK</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="mb-3">'+
                                '<label for="job_setup">Job_setup <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="job_setup_yes" name="job_setup" value="yes" checked/>'+
                                    '<label for="job_setup_yes">SUDAH</label>'+
                                    '<input type="radio" id="job_setup_no" name="job_setup" value="no" />'+
                                    '<label for="job_setup_no">BELUM</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="mb-3">'+
                                '<label for="wi_proses">WI proses & IK Check 100% <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="wi_proses_yes" name="wi_proses" value="yes" checked/>'+
                                '<label for="wi_proses_yes">SUDAH</label>'+
                                    '<input type="radio" id="wi_proses_no" name="wi_proses" value="no" />'+
                                    '<label for="wi_proses_no">BELUM</label>'+
                                '</div>'+
                            '</div>');
                        $("#form-tambahan1").html('');
                        $("#furnace").attr("disabled", "disabled");
                        $("#deskripsi").html(data.deskripsi);
                        $("#problem").html(data.problem);
                        $("#countermeasure").html(data.countermeasure);
                        $("#status_"+data.status).attr("checked", "checked");
                        $("#plan_"+data.plan).attr("checked", "checked");
                        $("#safety_"+data.safety).attr("checked", "checked");
                        $("#kakotora_"+data.kakotora).attr("checked", "checked");
                        $("#job_setup_"+data.job_setup).attr("checked", "checked");
                        $("#wi_proses_"+data.wi_proses).attr("checked", "checked");
                    }else if(data.jenis_henkaten == 'MACHINE'){
                        $("#MAN").removeClass("active", "active");
                        $("#MAN").attr("disabled", "disabled");
                        $("#MACHINE").addClass("active", "active");
                        $("#MACHINE").removeAttr("disabled", "disabled");
                        $("#MATERIAL").removeClass("active", "active");
                        $("#MATERIAL").attr("disabled", "disabled");
                        $("#METHODE").removeClass("active", "active");
                        $("#METHODE").attr("disabled", "disabled");
                        $("#form-tambahan").html('');
                        $("#form-tambahan1").html(
                            '<input type="hidden" name="jenis_henkaten" value="' + data.jenis_henkaten + '">'+
                            '<input type="hidden" name="id_henkaten" value="' + data.id + '">'+
                            '<div class="mb-3">'+
                                '<label for="safety">Safety <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="safety_yes" name="safety" value="yes" checked/>'+
                                    '<label for="safety_yes">SAFETY</label>'+
                                    '<input type="radio" id="safety_no" name="safety" value="no" />'+
                                    '<label for="safety_no">UNSAFETY</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="mb-3">'+
                                '<label for="kakotora">Kakotora <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="kakotora_yes" name="kakotora" value="yes" checked/>'+
                                    '<label for="kakotora_yes">YA</label>'+
                                    '<input type="radio" id="kakotora_no" name="kakotora" value="no" />'+
                                    '<label for="kakotora_no">TIDAK</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="mb-3">'+
                                '<label for="trial_ns">Trial NS <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="trial_ns_yes" name="trial_ns" value="yes" checked/>'+
                                    '<label for="trial_ns_yes">SUDAH</label>'+
                                    '<input type="radio" id="trial_ns_no" name="trial_ns" value="no" />'+
                                    '<label for="trial_ns_no">BELUM</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="mb-3">'+
                                '<label for="cp_cpk">CP & CPK <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="cp_cpk_yes" name="cp_cpk" value="yes" checked/>'+
                                    '<label for="cp_cpk_yes">SUDAH</label>'+
                                    '<input type="radio" id="cp_cpk_no" name="cp_cpk" value="no" />'+
                                    '<label for="cp_cpk_no">BELUM</label>'+
                                '</div>'+
                            '</div>'
                        );
                        $("#furnace").attr("disabled", "disabled");
                        $("#deskripsi").html(data.deskripsi);
                        $("#problem").html(data.problem);
                        $("#countermeasure").html(data.countermeasure);
                        $("#status_"+data.status).attr("checked", "checked");
                        $("#plan_"+data.plan).attr("checked", "checked");
                        $("#safety_"+data.safety).attr("checked", "checked");
                        $("#kakotora_"+data.kakotora).attr("checked", "checked");
                        $("#trial_ns_"+data.trial_ns).attr("checked", "checked");
                        $("#cp_cpk_"+data.cp_cpk).attr("checked", "checked");
                    }else if(data.jenis_henkaten == 'MATERIAL'){
                        $("#MAN").removeClass("active", "active");
                        $("#MAN").attr("disabled", "disabled");
                        $("#MACHINE").removeClass("active", "active");
                        $("#MACHINE").attr("disabled", "disabled");
                        $("#MATERIAL").addClass("active", "active");
                        $("#MATERIAL").removeAttr("disabled", "disabled");
                        $("#METHODE").removeClass("active", "active");
                        $("#METHODE").attr("disabled", "disabled");
                        $("#form-tambahan").html('');
                        $("#form-tambahan1").html(
                            '<input type="hidden" name="jenis_henkaten" value="' + data.jenis_henkaten + '">'+
                            '<input type="hidden" name="id_henkaten" value="' + data.id + '">'+
                            '<div class="mb-3">'+
                                '<label for="job_setup">Job_setup <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="job_setup_yes" name="job_setup" value="yes" checked/>'+
                                    '<label for="job_setup_yes">SUDAH</label>'+
                                    '<input type="radio" id="job_setup_no" name="job_setup" value="no" />'+
                                    '<label for="job_setup_no">BELUM</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="mb-3">'+
                                '<label for="trial_ns">Trial NS <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="trial_ns_yes" name="trial_ns" value="yes" checked/>'+
                                    '<label for="trial_ns_yes">SUDAH</label>'+
                                    '<input type="radio" id="trial_ns_no" name="trial_ns" value="no" />'+
                                    '<label for="trial_ns_no">BELUM</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="mb-3">'+
                                '<label for="cp_cpk">CP & CPK <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="cp_cpk_yes" name="cp_cpk" value="yes" checked/>'+
                                    '<label for="cp_cpk_yes">SUDAH</label>'+
                                    '<input type="radio" id="cp_cpk_no" name="cp_cpk" value="no" />'+
                                    '<label for="cp_cpk_no">BELUM</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="mb-3">'+
                                '<label for="trial_proses">Trial Proses <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="trial_proses_yes" name="trial_proses" value="yes" checked/>'+
                                    '<label for="trial_proses_yes">SUDAH</label>'+
                                    '<input type="radio" id="trial_proses_no" name="trial_proses" value="no" />'+
                                    '<label for="trial_proses_no">BELUM</label>'+
                                '</div>'+
                            '</div>'
                        );
                        $("#furnace").attr("disabled", "disabled");
                        $("#deskripsi").html(data.deskripsi);
                        $("#problem").html(data.problem);
                        $("#countermeasure").html(data.countermeasure);
                        $("#status_"+data.status).attr("checked", "checked");
                        $("#plan_"+data.plan).attr("checked", "checked");
                        $("#job_setup_"+data.job_setup).attr("checked", "checked");
                        $("#trial_ns_"+data.trial_ns).attr("checked", "checked");
                        $("#cp_cpk_"+data.cp_cpk).attr("checked", "checked");
                        $("#trial_proses_"+data.trial_proses).attr("checked", "checked");
                        }else if(data.jenis_henkaten == 'METHODE'){
                        $("#MAN").removeClass("active", "active");
                        $("#MAN").attr("disabled", "disabled");
                        $("#MACHINE").removeClass("active", "active");
                        $("#MACHINE").attr("disabled", "disabled");
                        $("#MATERIAL").removeClass("active", "active");
                        $("#MATERIAL").attr("disabled", "disabled");
                        $("#METHODE").addClass("active", "active");
                        $("#METHODE").removeAttr("disabled", "disabled");
                        $("#form-tambahan").html('');
                        $("#form-tambahan1").html(
                            '<input type="hidden" name="jenis_henkaten" value="' + data.jenis_henkaten + '">'+
                            '<input type="hidden" name="id_henkaten" value="' + data.id + '">'+
                            '<div class="mb-3">'+
                                '<label for="safety">Safety <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="safety_yes" name="safety" value="yes" checked/>'+
                                    '<label for="safety_yes">SAFETY</label>'+
                                    '<input type="radio" id="safety_no" name="safety" value="no" />'+
                                    '<label for="safety_no">UNSAFETY</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="mb-3">'+
                                '<label for="job_setup">Job_setup <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="job_setup_yes" name="job_setup" value="yes" checked/>'+
                                    '<label for="job_setup_yes">SUDAH</label>'+
                                    '<input type="radio" id="job_setup_no" name="job_setup" value="no" />'+
                                    '<label for="job_setup_no">BELUM</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="mb-3">'+
                                '<label for="trial_proses">Trial Proses <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="trial_proses_yes" name="trial_proses" value="yes" checked/>'+
                                    '<label for="trial_proses_yes">SUDAH</label>'+
                                    '<input type="radio" id="trial_proses_no" name="trial_proses" value="no" />'+
                                    '<label for="trial_proses_no">BELUM</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="mb-3">'+
                                '<label for="cycle_time">Cycle Time <sup>*</sup></label>'+
                                '<div class="switch-field">'+
                                    '<input type="radio" id="cycle_time_yes" name="cycle_time" value="yes" checked/>'+
                                    '<label for="cycle_time_yes">SESUAI</label>'+
                                    '<input type="radio" id="cycle_time_no" name="cycle_time" value="no" />'+
                                    '<label for="cycle_time_no">BELUM SESUAI</label>'+
                                '</div>'+
                            '</div>'
                        );
                        $("#furnace").attr("disabled", "disabled");
                        $("#deskripsi").html(data.deskripsi);
                        $("#problem").html(data.problem);
                        $("#countermeasure").html(data.countermeasure);
                        $("#status_"+data.status).attr("checked", "checked");
                        $("#plan_"+data.plan).attr("checked", "checked");
                        $("#safety_"+data.safety).attr("checked", "checked");
                        $("#job_setup_"+data.job_setup).attr("checked", "checked");
                        $("#trial_proses_"+data.trial_proses).attr("checked", "checked");
                        $("#cycle_time_"+data.cycle_time).attr("checked", "checked");
                    }
                },
            });
        });
    }
</script>
@endsection
