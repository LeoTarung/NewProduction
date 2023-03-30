@extends('prod-template')
@section('content')
<h3 class="mt-2">Melting Section</h3>
<a class="btn btn-sm btn-primary mb-2 float-start" href="{{ url('/tv/Melting') }}" target="_blank"><i class="fa-solid fa-tv"></i> See On TV</a>
<div class="row">
    <div class="col">
        <button class="btn btn-primary mb-2 float-end" onclick="ButtonSetupMelting('setuplevelMolten')"><i class="fa-solid fa-whiskey-glass"></i> Lv Molten</button>
        <button class="btn btn-success mb-2 float-end me-2" onclick="ButtonSetupMelting('setupFurnace')"><i class="fa-solid fa-fire-burner"></i> Furnace</button>
        <button class="btn btn-warning mb-2 float-end me-2" onclick="ButtonSetupMelting('setupKereta')"><i class="fa-solid fa-cart-shopping"></i> Kereta</button>
        <button class="btn btn-danger mb-2 float-end me-2" onclick="ButtonSetupMelting('setupHenkaten')"><i class="fa-solid fa-screwdriver-wrench"></i> Henkaten</button>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-6 nopadding">
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
    </div>
</div>
<style>
    .chartdiv {
        width: 100%;
        height: 380px;
    }
</style>
<script>
    function ButtonSetupMelting(dataa) {
        var link;
        var judul;
            if(dataa == 'setupHenkaten'){
                link = '/modal/henkatenMelting';
                judul = 'Henkaten';
            } else if(dataa == 'setupFurnace'){
                link = '/modal/furnaceMelting';
                judul = 'Furnace';
            } else if(dataa == 'setuplevelMolten'){
                link = '/modal/levelmoltenMelting';
                judul = 'Level Molten';
            } else if(dataa == 'setupKereta'){
                link = '/modal/keretaMelting';
                judul = 'Kereta Charging';
            }
        $.get(link, {}, function (data, status) {
            $("#staticBackdropLabel").html(judul); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function addFurnace(){
        $.get('/modal/addFurnace', {}, function (data, status) {
            $("#staticBackdropLabel").html("New Furnace"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function editFurnace(xx){
        $.get('/modal/addFurnace', {}, function (data, status) {
            $("#staticBackdropLabel").html("Edit Furnace"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/api/furnace') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    $("form").attr("action", "{{ url('/modal/addFurnace/update') }}");
                    $("#furnace").val(data.furnace);
                    $("#material").val(data.material);
                    $("#tambahaninputan").html(
                        '<input type="hidden" name="id" value="' + data.id + '">'
                    );
                },
            });
        });
    }

    function addKereta(){
        $.get('/modal/addKereta', {}, function (data, status) {
            $("#staticBackdropLabel").html("New Kereta"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function editkereta(xx){
        $.get('/modal/addKereta', {}, function (data, status) {
            $("#staticBackdropLabel").html("Edit Kereta"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/api/kereta') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    $("form").attr("action", "{{ url('/modal/addKereta/update') }}");
                    $("#no_kereta").val(data.no_kereta);
                    $("#berat").val(data.berat);
                    $("#material").val(data.material);
                    $("#tambahaninputan").html(
                        '<input type="hidden" name="id" value="' + data.id + '">'
                    );
                },
            });
        });
    }

    function menuHenkaten(){
        $.get('/modal/addhenkatenMelting', {}, function (data, status) {
            $("#staticBackdropLabel").html("New Henkaten"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function addhenkaten(xx){
        if(xx == 'MAN'){
            $("#form-tambahan").html(
                '<input type="hidden" name="jenis_henkaten" value="' + xx + '">'+
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
        }else if(xx == 'MACHINE'){
            $("#form-tambahan").html('');
            $("#form-tambahan1").html(
                '<input type="hidden" name="jenis_henkaten" value="' + xx + '">'+
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
                '</div>');
        }else if(xx == 'MATERIAL'){
            $("#form-tambahan").html('');
            $("#form-tambahan1").html(
                '<input type="hidden" name="jenis_henkaten" value="' + xx + '">'+
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
                '</div>');
        }else if(xx == 'METHODE'){
            $("#form-tambahan").html('');
            $("#form-tambahan1").html(
                '<input type="hidden" name="jenis_henkaten" value="' + xx + '">'+
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
        }else{
            $("#form-tambahan1").html(
                '<input type="hidden" name="jenis_henkaten" value="' + xx + '">'+
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
        }
    }

    function edithenkaten(xx){
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
                    $("#furnace").val(data.furnace);
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
{{-- <script>
    am5.ready(function() {
        var data = [];
        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");
        root._logo.dispose();
        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);
        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelY: "none"
        }));
        chart.zoomOutButton.set("forceHidden", true);
        // chart.get("colors").set("step", 2);
        chart.get("colors").set("colors", [
            // orange
            am5.color(0xFB9649),
            // am5.color(0x605CB8), Biru
            // Kuning
            // am5.color(0xFFE680),
            am5.color(0xE64640),
            am5.color(0x53C292)
        ]);
        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
            baseInterval: {
                timeUnit: "day",
                count: 1
            },
            renderer: am5xy.AxisRendererX.new(root, {
                minGridDistance: 50
            }),
            tooltip: am5.Tooltip.new(root, {})
        }));
        var chargingAxisRenderer = am5xy.AxisRendererY.new(root, {});
        chargingAxisRenderer.grid.template.set("forceHidden", true);
        var chargingAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: chargingAxisRenderer,
            tooltip: am5.Tooltip.new(root, {})
        }));

        var ingotAxisRenderer = am5xy.AxisRendererY.new(root, {
            opposite: true
        });
        ingotAxisRenderer.grid.template.set("forceHidden", true);
        var ingotAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: ingotAxisRenderer,
            // forceHidden: true
            numberFormat: "#'%'"
        }));

        // Create series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var chargingSeries = chart.series.push(am5xy.ColumnSeries.new(root, {
            xAxis: xAxis,
            yAxis: chargingAxis,
            valueYField: "charging",
            valueXField: "date",
            tooltip: am5.Tooltip.new(root, {
                labelText: "Total Charging: {valueY} kg"
            })
        }));
        chargingSeries.data.processor = am5.DataProcessor.new(root, {
            dateFields: ["date"],
            dateFormat: "yyyy-MM-dd"
        });
        var lossSeries = chart.series.push(am5xy.LineSeries.new(root, {
            xAxis: xAxis,
            yAxis: ingotAxis,
            valueYField: "loss",
            valueXField: "date",
            tooltip: am5.Tooltip.new(root, {
                labelText: "loss: {valueY}%"
            })
        }));
        lossSeries.strokes.template.setAll({
            strokeWidth: 2
        });
        // Add circle bullet
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/#Bullets
        lossSeries.bullets.push(function() {
            var graphics = am5.Circle.new(root, {
                strokeWidth: 2,
                radius: 5,
                stroke: lossSeries.get("stroke"),
                fill: root.interfaceColors.get("background"),
            });
            graphics.adapters.add("radius", function(radius, target) {
                return target.dataItem.dataContext.townSize;
            })
            return am5.Bullet.new(root, {
                sprite: graphics
            });
        });
        var ingotSeries = chart.series.push(am5xy.LineSeries.new(root, {
            xAxis: xAxis,
            yAxis: ingotAxis,
            valueYField: "ingot",
            valueXField: "date",
            tooltip: am5.Tooltip.new(root, {
                labelText: "ingot: {valueY} %"
            })
        }));
        ingotSeries.strokes.template.setAll({
            strokeWidth: 3
        });
        // Add circle bullet
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/#Bullets
        ingotSeries.bullets.push(function() {
            var graphics = am5.Circle.new(root, {
                width: 5,
                height: 5,
                centerX: am5.p50,
                centerY: am5.p50,
                stroketWidth: 5,
                stroke: ingotSeries.get("stroke"),
                fill: root.interfaceColors.get("background"),
            });
            graphics.adapters.add("radius", function(radius, target) {
                return target.dataItem.dataContext.townSize;
            })
            return am5.Bullet.new(root, {
                sprite: graphics
            });
        });
        // Add cursor
        // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
        chart.set("cursor", am5xy.XYCursor.new(root, {
            xAxis: xAxis,
            yAxis: chargingAxis
        }));
        chargingSeries.data.setAll(data);
        lossSeries.data.setAll(data);
        ingotSeries.data.setAll(data);
        xAxis.data.setAll(data);
        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chargingSeries.appear(1000);
        chart.appear(1000, 100);

        $(function() {
            // let ip_node = location.hostname;
            let ip_node = 10.14.20.212;
            let socket_port = '1553';
            let socket = io(ip_node + ':' + socket_port);
            socket.on('connection');

            socket.on("bulananStriko-1", (datasql) => {
                var data = [];
                var ChartData = document.getElementById("chartdiv").innerHTML;
                for (i = 0; i < datasql.length; i++) {
                    var obj = {};
                    obj['date'] = moment(datasql[i].tanggal).format('MM/DD/YY');
                    obj['charging'] = parseInt(datasql[i].total_chargings);
                    obj['townSize'] = "12";
                    obj["loss"] = parseInt(parseFloat(datasql[i].persen_loss).toFixed(
                        0)); //parseFloat(datasql[i].persen_loss).toFixed(2)
                    obj["ingot"] = parseInt(parseFloat(datasql[i].persen_ingots).toFixed(
                        0)); //parseFloat(datasql[i].persen_ingots).toFixed(2)
                    data.push(obj);
                }
                chargingSeries.data.setAll(data);
                lossSeries.data.setAll(data);
                ingotSeries.data.setAll(data);
                xAxis.data.setAll(data);
            })
        });
    }); // end am5.ready()
</script> --}}
<script>
    am5.ready(function() {

    var data = [{
      "date": "2012-01-01",
      "distance": 227,
      "townName": "New York",
      "townSize": 12,
      "latitude": 40.71,
      "duration": 408
    }, {
      "date": "2012-01-02",
      "distance": 371,
      "townName": "Washington",
      "townSize": 7,
      "latitude": 38.89,
      "duration": 482
    }, {
      "date": "2012-01-03",
      "distance": 433,
      "townName": "Wilmington",
      "townSize": 3,
      "latitude": 34.22,
      "duration": 562
    }, {
      "date": "2012-01-04",
      "distance": 345,
      "townName": "Jacksonville",
      "townSize": 3.5,
      "latitude": 30.35,
      "duration": 379
    }, {
      "date": "2012-01-05",
      "distance": 480,
      "townName": "Miami",
      "townSize": 5,
      "latitude": 25.83,
      "duration": 501
    }, {
      "date": "2012-01-06",
      "distance": 386,
      "townName": "Tallahassee",
      "townSize": 3.5,
      "latitude": 30.46,
      "duration": 443
    }, {
      "date": "2012-01-07",
      "distance": 348,
      "townName": "New Orleans",
      "townSize": 5,
      "latitude": 29.94,
      "duration": 405
    }, {
      "date": "2012-01-08",
      "distance": 238,
      "townName": "Houston",
      "townSize": 8,
      "latitude": 29.76,
      "duration": 309
    }, {
      "date": "2012-01-09",
      "distance": 218,
      "townName": "Dalas",
      "townSize": 8,
      "latitude": 32.8,
      "duration": 287
    }, {
      "date": "2012-01-10",
      "distance": 349,
      "townName": "Oklahoma City",
      "townSize": 5,
      "latitude": 35.49,
      "duration": 485
    }, {
      "date": "2012-01-11",
      "distance": 603,
      "townName": "Kansas City",
      "townSize": 5,
      "latitude": 39.1,
      "duration": 890
    }, {
      "date": "2012-01-12",
      "distance": 534,
      "townName": "Denver",
      "townSize": 9,
      "latitude": 39.74,
      "duration": 810
    }, {
      "date": "2012-01-13",
      "townName": "Salt Lake City",
      "townSize": 6,
      "distance": 425,
      "duration": 670,
      "latitude": 40.75,
      "dashLength": 8,
      "alpha": 0.4
    }, {
      "date": "2012-01-14",
      "latitude": 36.1,
      "duration": 470,
      "townName": "Las Vegas"
    }, {
      "date": "2012-01-15"
    }, {
      "date": "2012-01-16"
    }, {
      "date": "2012-01-17"
    }];

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element

    var root = am5.Root.new("chartdiv");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: false,
      panY: false,
      wheelY: "none"
    }));

    chart.zoomOutButton.set("forceHidden", true);

    chart.get("colors").set("step", 2);

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
      baseInterval: { timeUnit: "day", count: 1 },
      renderer: am5xy.AxisRendererX.new(root, { minGridDistance: 50 }),
      tooltip: am5.Tooltip.new(root, {})
    }));


    var distanceAxisRenderer = am5xy.AxisRendererY.new(root, {});
    distanceAxisRenderer.grid.template.set("forceHidden", true);
    var distanceAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      renderer: distanceAxisRenderer,
      tooltip: am5.Tooltip.new(root, {})
    }));

    var latitudeAxisRenderer = am5xy.AxisRendererY.new(root, {});
    latitudeAxisRenderer.grid.template.set("forceHidden", true);
    var latitudeAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      renderer: latitudeAxisRenderer,
      forceHidden: true
    }));

    var durationAxisRenderer = am5xy.AxisRendererY.new(root, {
      opposite: true
    });
    durationAxisRenderer.grid.template.set("forceHidden", true);
    var durationAxis = chart.yAxes.push(am5xy.DurationAxis.new(root, {
      baseUnit:"minute",
      renderer: durationAxisRenderer,
      extraMax:0.3
    }));

    // Create series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var distanceSeries = chart.series.push(am5xy.ColumnSeries.new(root, {
      xAxis: xAxis,
      yAxis: distanceAxis,
      valueYField: "distance",
      valueXField: "date",
      tooltip:am5.Tooltip.new(root, {
        labelText:"{valueY} miles"
      })
    }));

    distanceSeries.data.processor = am5.DataProcessor.new(root, {
      dateFields: ["date"],
      dateFormat: "yyyy-MM-dd"
    });

    var latitudeSeries = chart.series.push(am5xy.LineSeries.new(root, {
      xAxis: xAxis,
      yAxis: latitudeAxis,
      valueYField: "latitude",
      valueXField: "date",
      tooltip:am5.Tooltip.new(root, {
        labelText:"latitude: {valueY} ({townName})"
      })
    }));

    latitudeSeries.strokes.template.setAll({ strokeWidth: 2 });

    // Add circle bullet
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/#Bullets
    latitudeSeries.bullets.push(function() {
      var graphics = am5.Circle.new(root, {
        strokeWidth: 2,
        radius: 5,
        stroke: latitudeSeries.get("stroke"),
        fill: root.interfaceColors.get("background"),
      });

      graphics.adapters.add("radius", function(radius, target) {
        return target.dataItem.dataContext.townSize;
      })

      return am5.Bullet.new(root, {
        sprite: graphics
      });
    });

    var durationSeries = chart.series.push(am5xy.LineSeries.new(root, {
      xAxis: xAxis,
      yAxis: durationAxis,
      valueYField: "duration",
      valueXField: "date",
      tooltip:am5.Tooltip.new(root, {
        labelText:"duration: {valueY.formatDuration()}"
      })
    }));

    durationSeries.strokes.template.setAll({ strokeWidth: 2 });

    // Add circle bullet
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/#Bullets
    durationSeries.bullets.push(function() {
      var graphics = am5.Rectangle.new(root, {
        width:10,
        height:10,
        centerX:am5.p50,
        centerY:am5.p50,
        fill: durationSeries.get("stroke")
      });

      return am5.Bullet.new(root, {
        sprite: graphics
      });
    });

    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    chart.set("cursor", am5xy.XYCursor.new(root, {
      xAxis: xAxis,
      yAxis: distanceAxis
    }));


    distanceSeries.data.setAll(data);
    latitudeSeries.data.setAll(data);
    durationSeries.data.setAll(data);
    xAxis.data.setAll(data);

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    distanceSeries.appear(1000);
    chart.appear(1000, 100);

    }); // end am5.ready()
</script>
<script>
    am5.ready(function() {

    var data = [{
      "date": "2012-01-01",
      "distance": 227,
      "townName": "New York",
      "townSize": 12,
      "latitude": 40.71,
      "duration": 408
    }, {
      "date": "2012-01-02",
      "distance": 371,
      "townName": "Washington",
      "townSize": 7,
      "latitude": 38.89,
      "duration": 482
    }, {
      "date": "2012-01-03",
      "distance": 433,
      "townName": "Wilmington",
      "townSize": 3,
      "latitude": 34.22,
      "duration": 562
    }, {
      "date": "2012-01-04",
      "distance": 345,
      "townName": "Jacksonville",
      "townSize": 3.5,
      "latitude": 30.35,
      "duration": 379
    }, {
      "date": "2012-01-05",
      "distance": 480,
      "townName": "Miami",
      "townSize": 5,
      "latitude": 25.83,
      "duration": 501
    }, {
      "date": "2012-01-06",
      "distance": 386,
      "townName": "Tallahassee",
      "townSize": 3.5,
      "latitude": 30.46,
      "duration": 443
    }, {
      "date": "2012-01-07",
      "distance": 348,
      "townName": "New Orleans",
      "townSize": 5,
      "latitude": 29.94,
      "duration": 405
    }, {
      "date": "2012-01-08",
      "distance": 238,
      "townName": "Houston",
      "townSize": 8,
      "latitude": 29.76,
      "duration": 309
    }, {
      "date": "2012-01-09",
      "distance": 218,
      "townName": "Dalas",
      "townSize": 8,
      "latitude": 32.8,
      "duration": 287
    }, {
      "date": "2012-01-10",
      "distance": 349,
      "townName": "Oklahoma City",
      "townSize": 5,
      "latitude": 35.49,
      "duration": 485
    }, {
      "date": "2012-01-11",
      "distance": 603,
      "townName": "Kansas City",
      "townSize": 5,
      "latitude": 39.1,
      "duration": 890
    }, {
      "date": "2012-01-12",
      "distance": 534,
      "townName": "Denver",
      "townSize": 9,
      "latitude": 39.74,
      "duration": 810
    }, {
      "date": "2012-01-13",
      "townName": "Salt Lake City",
      "townSize": 6,
      "distance": 425,
      "duration": 670,
      "latitude": 40.75,
      "dashLength": 8,
      "alpha": 0.4
    }, {
      "date": "2012-01-14",
      "latitude": 36.1,
      "duration": 470,
      "townName": "Las Vegas"
    }, {
      "date": "2012-01-15"
    }, {
      "date": "2012-01-16"
    }, {
      "date": "2012-01-17"
    }];

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element

    var root = am5.Root.new("chartdiv1");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: false,
      panY: false,
      wheelY: "none"
    }));

    chart.zoomOutButton.set("forceHidden", true);

    chart.get("colors").set("step", 2);

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
      baseInterval: { timeUnit: "day", count: 1 },
      renderer: am5xy.AxisRendererX.new(root, { minGridDistance: 50 }),
      tooltip: am5.Tooltip.new(root, {})
    }));


    var distanceAxisRenderer = am5xy.AxisRendererY.new(root, {});
    distanceAxisRenderer.grid.template.set("forceHidden", true);
    var distanceAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      renderer: distanceAxisRenderer,
      tooltip: am5.Tooltip.new(root, {})
    }));

    var latitudeAxisRenderer = am5xy.AxisRendererY.new(root, {});
    latitudeAxisRenderer.grid.template.set("forceHidden", true);
    var latitudeAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      renderer: latitudeAxisRenderer,
      forceHidden: true
    }));

    var durationAxisRenderer = am5xy.AxisRendererY.new(root, {
      opposite: true
    });
    durationAxisRenderer.grid.template.set("forceHidden", true);
    var durationAxis = chart.yAxes.push(am5xy.DurationAxis.new(root, {
      baseUnit:"minute",
      renderer: durationAxisRenderer,
      extraMax:0.3
    }));

    // Create series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var distanceSeries = chart.series.push(am5xy.ColumnSeries.new(root, {
      xAxis: xAxis,
      yAxis: distanceAxis,
      valueYField: "distance",
      valueXField: "date",
      tooltip:am5.Tooltip.new(root, {
        labelText:"{valueY} miles"
      })
    }));

    distanceSeries.data.processor = am5.DataProcessor.new(root, {
      dateFields: ["date"],
      dateFormat: "yyyy-MM-dd"
    });

    var latitudeSeries = chart.series.push(am5xy.LineSeries.new(root, {
      xAxis: xAxis,
      yAxis: latitudeAxis,
      valueYField: "latitude",
      valueXField: "date",
      tooltip:am5.Tooltip.new(root, {
        labelText:"latitude: {valueY} ({townName})"
      })
    }));

    latitudeSeries.strokes.template.setAll({ strokeWidth: 2 });

    // Add circle bullet
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/#Bullets
    latitudeSeries.bullets.push(function() {
      var graphics = am5.Circle.new(root, {
        strokeWidth: 2,
        radius: 5,
        stroke: latitudeSeries.get("stroke"),
        fill: root.interfaceColors.get("background"),
      });

      graphics.adapters.add("radius", function(radius, target) {
        return target.dataItem.dataContext.townSize;
      })

      return am5.Bullet.new(root, {
        sprite: graphics
      });
    });

    var durationSeries = chart.series.push(am5xy.LineSeries.new(root, {
      xAxis: xAxis,
      yAxis: durationAxis,
      valueYField: "duration",
      valueXField: "date",
      tooltip:am5.Tooltip.new(root, {
        labelText:"duration: {valueY.formatDuration()}"
      })
    }));

    durationSeries.strokes.template.setAll({ strokeWidth: 2 });

    // Add circle bullet
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/#Bullets
    durationSeries.bullets.push(function() {
      var graphics = am5.Rectangle.new(root, {
        width:10,
        height:10,
        centerX:am5.p50,
        centerY:am5.p50,
        fill: durationSeries.get("stroke")
      });

      return am5.Bullet.new(root, {
        sprite: graphics
      });
    });

    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    chart.set("cursor", am5xy.XYCursor.new(root, {
      xAxis: xAxis,
      yAxis: distanceAxis
    }));


    distanceSeries.data.setAll(data);
    latitudeSeries.data.setAll(data);
    durationSeries.data.setAll(data);
    xAxis.data.setAll(data);

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    distanceSeries.appear(1000);
    chart.appear(1000, 100);

    }); // end am5.ready()
</script>
<script>
    am5.ready(function() {

    var data = [{
      "date": "2012-01-01",
      "distance": 227,
      "townName": "New York",
      "townSize": 12,
      "latitude": 40.71,
      "duration": 408
    }, {
      "date": "2012-01-02",
      "distance": 371,
      "townName": "Washington",
      "townSize": 7,
      "latitude": 38.89,
      "duration": 482
    }, {
      "date": "2012-01-03",
      "distance": 433,
      "townName": "Wilmington",
      "townSize": 3,
      "latitude": 34.22,
      "duration": 562
    }, {
      "date": "2012-01-04",
      "distance": 345,
      "townName": "Jacksonville",
      "townSize": 3.5,
      "latitude": 30.35,
      "duration": 379
    }, {
      "date": "2012-01-05",
      "distance": 480,
      "townName": "Miami",
      "townSize": 5,
      "latitude": 25.83,
      "duration": 501
    }, {
      "date": "2012-01-06",
      "distance": 386,
      "townName": "Tallahassee",
      "townSize": 3.5,
      "latitude": 30.46,
      "duration": 443
    }, {
      "date": "2012-01-07",
      "distance": 348,
      "townName": "New Orleans",
      "townSize": 5,
      "latitude": 29.94,
      "duration": 405
    }, {
      "date": "2012-01-08",
      "distance": 238,
      "townName": "Houston",
      "townSize": 8,
      "latitude": 29.76,
      "duration": 309
    }, {
      "date": "2012-01-09",
      "distance": 218,
      "townName": "Dalas",
      "townSize": 8,
      "latitude": 32.8,
      "duration": 287
    }, {
      "date": "2012-01-10",
      "distance": 349,
      "townName": "Oklahoma City",
      "townSize": 5,
      "latitude": 35.49,
      "duration": 485
    }, {
      "date": "2012-01-11",
      "distance": 603,
      "townName": "Kansas City",
      "townSize": 5,
      "latitude": 39.1,
      "duration": 890
    }, {
      "date": "2012-01-12",
      "distance": 534,
      "townName": "Denver",
      "townSize": 9,
      "latitude": 39.74,
      "duration": 810
    }, {
      "date": "2012-01-13",
      "townName": "Salt Lake City",
      "townSize": 6,
      "distance": 425,
      "duration": 670,
      "latitude": 40.75,
      "dashLength": 8,
      "alpha": 0.4
    }, {
      "date": "2012-01-14",
      "latitude": 36.1,
      "duration": 470,
      "townName": "Las Vegas"
    }, {
      "date": "2012-01-15"
    }, {
      "date": "2012-01-16"
    }, {
      "date": "2012-01-17"
    }];

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element

    var root = am5.Root.new("chartdiv2");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: false,
      panY: false,
      wheelY: "none"
    }));

    chart.zoomOutButton.set("forceHidden", true);

    chart.get("colors").set("step", 2);

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
      baseInterval: { timeUnit: "day", count: 1 },
      renderer: am5xy.AxisRendererX.new(root, { minGridDistance: 50 }),
      tooltip: am5.Tooltip.new(root, {})
    }));


    var distanceAxisRenderer = am5xy.AxisRendererY.new(root, {});
    distanceAxisRenderer.grid.template.set("forceHidden", true);
    var distanceAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      renderer: distanceAxisRenderer,
      tooltip: am5.Tooltip.new(root, {})
    }));

    var latitudeAxisRenderer = am5xy.AxisRendererY.new(root, {});
    latitudeAxisRenderer.grid.template.set("forceHidden", true);
    var latitudeAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      renderer: latitudeAxisRenderer,
      forceHidden: true
    }));

    var durationAxisRenderer = am5xy.AxisRendererY.new(root, {
      opposite: true
    });
    durationAxisRenderer.grid.template.set("forceHidden", true);
    var durationAxis = chart.yAxes.push(am5xy.DurationAxis.new(root, {
      baseUnit:"minute",
      renderer: durationAxisRenderer,
      extraMax:0.3
    }));

    // Create series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var distanceSeries = chart.series.push(am5xy.ColumnSeries.new(root, {
      xAxis: xAxis,
      yAxis: distanceAxis,
      valueYField: "distance",
      valueXField: "date",
      tooltip:am5.Tooltip.new(root, {
        labelText:"{valueY} miles"
      })
    }));

    distanceSeries.data.processor = am5.DataProcessor.new(root, {
      dateFields: ["date"],
      dateFormat: "yyyy-MM-dd"
    });

    var latitudeSeries = chart.series.push(am5xy.LineSeries.new(root, {
      xAxis: xAxis,
      yAxis: latitudeAxis,
      valueYField: "latitude",
      valueXField: "date",
      tooltip:am5.Tooltip.new(root, {
        labelText:"latitude: {valueY} ({townName})"
      })
    }));

    latitudeSeries.strokes.template.setAll({ strokeWidth: 2 });

    // Add circle bullet
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/#Bullets
    latitudeSeries.bullets.push(function() {
      var graphics = am5.Circle.new(root, {
        strokeWidth: 2,
        radius: 5,
        stroke: latitudeSeries.get("stroke"),
        fill: root.interfaceColors.get("background"),
      });

      graphics.adapters.add("radius", function(radius, target) {
        return target.dataItem.dataContext.townSize;
      })

      return am5.Bullet.new(root, {
        sprite: graphics
      });
    });

    var durationSeries = chart.series.push(am5xy.LineSeries.new(root, {
      xAxis: xAxis,
      yAxis: durationAxis,
      valueYField: "duration",
      valueXField: "date",
      tooltip:am5.Tooltip.new(root, {
        labelText:"duration: {valueY.formatDuration()}"
      })
    }));

    durationSeries.strokes.template.setAll({ strokeWidth: 2 });

    // Add circle bullet
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/#Bullets
    durationSeries.bullets.push(function() {
      var graphics = am5.Rectangle.new(root, {
        width:10,
        height:10,
        centerX:am5.p50,
        centerY:am5.p50,
        fill: durationSeries.get("stroke")
      });

      return am5.Bullet.new(root, {
        sprite: graphics
      });
    });

    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    chart.set("cursor", am5xy.XYCursor.new(root, {
      xAxis: xAxis,
      yAxis: distanceAxis
    }));


    distanceSeries.data.setAll(data);
    latitudeSeries.data.setAll(data);
    durationSeries.data.setAll(data);
    xAxis.data.setAll(data);

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    distanceSeries.appear(1000);
    chart.appear(1000, 100);

    }); // end am5.ready()
</script>
<script>
    am5.ready(function() {

    var data = [{
      "date": "2012-01-01",
      "distance": 227,
      "townName": "New York",
      "townSize": 12,
      "latitude": 40.71,
      "duration": 408
    }, {
      "date": "2012-01-02",
      "distance": 371,
      "townName": "Washington",
      "townSize": 7,
      "latitude": 38.89,
      "duration": 482
    }, {
      "date": "2012-01-03",
      "distance": 433,
      "townName": "Wilmington",
      "townSize": 3,
      "latitude": 34.22,
      "duration": 562
    }, {
      "date": "2012-01-04",
      "distance": 345,
      "townName": "Jacksonville",
      "townSize": 3.5,
      "latitude": 30.35,
      "duration": 379
    }, {
      "date": "2012-01-05",
      "distance": 480,
      "townName": "Miami",
      "townSize": 5,
      "latitude": 25.83,
      "duration": 501
    }, {
      "date": "2012-01-06",
      "distance": 386,
      "townName": "Tallahassee",
      "townSize": 3.5,
      "latitude": 30.46,
      "duration": 443
    }, {
      "date": "2012-01-07",
      "distance": 348,
      "townName": "New Orleans",
      "townSize": 5,
      "latitude": 29.94,
      "duration": 405
    }, {
      "date": "2012-01-08",
      "distance": 238,
      "townName": "Houston",
      "townSize": 8,
      "latitude": 29.76,
      "duration": 309
    }, {
      "date": "2012-01-09",
      "distance": 218,
      "townName": "Dalas",
      "townSize": 8,
      "latitude": 32.8,
      "duration": 287
    }, {
      "date": "2012-01-10",
      "distance": 349,
      "townName": "Oklahoma City",
      "townSize": 5,
      "latitude": 35.49,
      "duration": 485
    }, {
      "date": "2012-01-11",
      "distance": 603,
      "townName": "Kansas City",
      "townSize": 5,
      "latitude": 39.1,
      "duration": 890
    }, {
      "date": "2012-01-12",
      "distance": 534,
      "townName": "Denver",
      "townSize": 9,
      "latitude": 39.74,
      "duration": 810
    }, {
      "date": "2012-01-13",
      "townName": "Salt Lake City",
      "townSize": 6,
      "distance": 425,
      "duration": 670,
      "latitude": 40.75,
      "dashLength": 8,
      "alpha": 0.4
    }, {
      "date": "2012-01-14",
      "latitude": 36.1,
      "duration": 470,
      "townName": "Las Vegas"
    }, {
      "date": "2012-01-15"
    }, {
      "date": "2012-01-16"
    }, {
      "date": "2012-01-17"
    }];

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element

    var root = am5.Root.new("chartdiv3");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: false,
      panY: false,
      wheelY: "none"
    }));

    chart.zoomOutButton.set("forceHidden", true);

    chart.get("colors").set("step", 2);

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
      baseInterval: { timeUnit: "day", count: 1 },
      renderer: am5xy.AxisRendererX.new(root, { minGridDistance: 50 }),
      tooltip: am5.Tooltip.new(root, {})
    }));


    var distanceAxisRenderer = am5xy.AxisRendererY.new(root, {});
    distanceAxisRenderer.grid.template.set("forceHidden", true);
    var distanceAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      renderer: distanceAxisRenderer,
      tooltip: am5.Tooltip.new(root, {})
    }));

    var latitudeAxisRenderer = am5xy.AxisRendererY.new(root, {});
    latitudeAxisRenderer.grid.template.set("forceHidden", true);
    var latitudeAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      renderer: latitudeAxisRenderer,
      forceHidden: true
    }));

    var durationAxisRenderer = am5xy.AxisRendererY.new(root, {
      opposite: true
    });
    durationAxisRenderer.grid.template.set("forceHidden", true);
    var durationAxis = chart.yAxes.push(am5xy.DurationAxis.new(root, {
      baseUnit:"minute",
      renderer: durationAxisRenderer,
      extraMax:0.3
    }));

    // Create series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var distanceSeries = chart.series.push(am5xy.ColumnSeries.new(root, {
      xAxis: xAxis,
      yAxis: distanceAxis,
      valueYField: "distance",
      valueXField: "date",
      tooltip:am5.Tooltip.new(root, {
        labelText:"{valueY} miles"
      })
    }));

    distanceSeries.data.processor = am5.DataProcessor.new(root, {
      dateFields: ["date"],
      dateFormat: "yyyy-MM-dd"
    });

    var latitudeSeries = chart.series.push(am5xy.LineSeries.new(root, {
      xAxis: xAxis,
      yAxis: latitudeAxis,
      valueYField: "latitude",
      valueXField: "date",
      tooltip:am5.Tooltip.new(root, {
        labelText:"latitude: {valueY} ({townName})"
      })
    }));

    latitudeSeries.strokes.template.setAll({ strokeWidth: 2 });

    // Add circle bullet
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/#Bullets
    latitudeSeries.bullets.push(function() {
      var graphics = am5.Circle.new(root, {
        strokeWidth: 2,
        radius: 5,
        stroke: latitudeSeries.get("stroke"),
        fill: root.interfaceColors.get("background"),
      });

      graphics.adapters.add("radius", function(radius, target) {
        return target.dataItem.dataContext.townSize;
      })

      return am5.Bullet.new(root, {
        sprite: graphics
      });
    });

    var durationSeries = chart.series.push(am5xy.LineSeries.new(root, {
      xAxis: xAxis,
      yAxis: durationAxis,
      valueYField: "duration",
      valueXField: "date",
      tooltip:am5.Tooltip.new(root, {
        labelText:"duration: {valueY.formatDuration()}"
      })
    }));

    durationSeries.strokes.template.setAll({ strokeWidth: 2 });

    // Add circle bullet
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/#Bullets
    durationSeries.bullets.push(function() {
      var graphics = am5.Rectangle.new(root, {
        width:10,
        height:10,
        centerX:am5.p50,
        centerY:am5.p50,
        fill: durationSeries.get("stroke")
      });

      return am5.Bullet.new(root, {
        sprite: graphics
      });
    });

    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    chart.set("cursor", am5xy.XYCursor.new(root, {
      xAxis: xAxis,
      yAxis: distanceAxis
    }));


    distanceSeries.data.setAll(data);
    latitudeSeries.data.setAll(data);
    durationSeries.data.setAll(data);
    xAxis.data.setAll(data);

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    distanceSeries.appear(1000);
    chart.appear(1000, 100);

    }); // end am5.ready()
</script>

@endsection
