@extends('prod-template')
@section('content')
<h3 class="mt-2">Casting Section</h3>
<div class="row">
    <div class="col">
        <a class="btn btn-sm btn-secondary mb-2 float-start" href="{{ url('/tv/casting') }}" target="_blank"><i class="fa-solid fa-tv"></i> Monitoring TV Performance</a>
    </div>
</div>
<div class="row">
    <div class="col">
        <button class="btn btn-primary mb-2 float-start me-2" onclick="ButtonSetupCasting('SetupMachineCasting')"><i class="fa-solid fa-gears"></i> Machine Casting </button>
        <button class="btn btn-danger mb-2 float-start me-2" onclick="ButtonSetupCasting('SetupRejection')"><i class="fa-solid fa-not-equal"></i> Rejection </button>
        <button class="btn text-light mb-2 float-start me-2 bg-orange" onclick="ButtonSetupCasting('SetupDowntime')"><i class="fa-solid fa-stopwatch"></i> Downtime </button>
        <button class="btn btn-danger mb-2 float-start me-2" onclick="ButtonSetupCasting('SetupHenkaten')"><i class="fa-solid fa-screwdriver-wrench"></i> Henkaten</button>
    </div>
</div>

<style>
    #chartdiv {
      width: 100%;
      height: 500px;
    }
</style>
{{-- <script src="https://cdn.amcharts.com/lib/5/index.js"></script> --}}
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
{{-- <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script> --}}
<div class="row">
    <div class="col-12"><div id="chartdiv"></div></div>
    {{-- <div class="col-3">
        <div class="flip-card" >
            <div class="flip-card-inner ">
                <div class=" flip-card-front ">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-success"></li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-12 fw-bold fs-4">MC - 48</div>
                                <div class="col-12"></div>
                            </div>
                        </li>
                        <li class="list-group-item bg-success"></li>
                        </ul>
                    </div>
                </div>
                <div class=" flip-card-back ">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-success"></li>
                        <li class="list-group-item">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut ipsum debitis ipsa libero eligendi maiores voluptas alias aspernatur suscipit natus, deserunt voluptatem, rem atque corporis asperiores optio doloribus iste? Ex quam impedit dicta quasi error amet neque aliquam alias, est autem repellendus cumque ea eius dolore voluptatem quia soluta. Beatae?</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
{{--
<script>
    am5.ready(function() {

    // Define data for each year
    var chartData = {
      "1995": [
        { sector: "Agriculture", size: 6.6 },
        { sector: "Mining and Quarrying", size: 0.6 },
        { sector: "Manufacturing", size: 23.2 }, ]
    };

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");


    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
    var chart = root.container.children.push(am5percent.PieChart.new(root, {
      innerRadius: 100,
      layout: root.verticalLayout
    }));


    // Create series
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
    var series = chart.series.push(am5percent.PieSeries.new(root, {
      valueField: "size",
      categoryField: "sector"
    }));


    // Set data
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
    series.data.setAll([
      { sector: "Agriculture", size: 6.6 },
      { sector: "Mining and Quarrying", size: 0.6 },
      { sector: "Manufacturing", size: 23.2 },
    ]);


    // Play initial series animation
    // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
    series.appear(1000, 100);


    // Add label
    var label = root.tooltipContainer.children.push(am5.Label.new(root, {
      x: am5.p50,
      y: am5.p50,
      centerX: am5.p50,
      centerY: am5.p50,
      fill: am5.color(0x000000),
      fontSize: 50
    }));


    // Animate chart data
    var currentYear = 1995;
    function getCurrentData() {
      var data = chartData[currentYear];
      currentYear++;
      if (currentYear > 2014)
        currentYear = 1995;
      return data;
    }

    function loop() {
      label.set("text", currentYear);
      var data = getCurrentData();
      for(var i = 0; i < data.length; i++) {
        series.data.setIndex(i, data[i]);
      }
      chart.setTimeout( loop, 4000 );
    }

    loop();

    }); // end am5.ready()
</script> --}}




<script>
    function ButtonSetupCasting(xx){
        var link;
        var judul;
        if(xx == 'SetupMachineCasting'){
            link = '/modal/setupmachine';
            judul = 'Setup Machine Casting';
        }else if(xx == 'SetupHenkaten'){
            link = '/modal/henkatencasting';
            judul = 'Henkaten For Machine Casting';
        }else if(xx == 'SetupRejection'){
            link = '/modal/rejectioncasting';
            judul = 'Rejection For Machine Casting';
        }else if(xx == 'SetupDowntime'){
            link = '/modal/downtimecasting';
            judul = 'Downtime For Machine Casting';
        }else{
            console.log("Gagal, Hubungi Tim Digitalization");
        }
        $.get(link, {}, function (data, status) {
            $("#staticBackdropLabel").html(judul); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function AddMachine(){
        $.get('/modal/addmachine', {}, function (data, status) {
            $("#staticBackdropLabel").html("ADD MACHINE CASTING"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function AddRejection(){
        $.get('/modal/openmodalaja', {}, function (data, status) {
            $("#staticBackdropLabel").html("SETUP REJECTION"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                dataType: "json",
                url: "{{ url('/api/rejection/group') }}",
                success: function (data) {
                    $("form").attr("action", "{{ url('/prod/modal-casting/reject/save') }}");
                    var  myHTML = '';
                    data.forEach(element => {
                        if (element.casting == 1) {
                            myHTML +=   '<div class="col-6 col-lg-3">'+
                                        '<div class="form-check form-check-inline">'+
                                            '<input class="form-check-input" type="checkbox" checked name="reject[]" value="'+element.id+'" id="reject_'+element.id+'"'+
                                            '<label class="form-check-label" for="reject">'+element.jenis_reject+'</label>'+
                                        '</div>'+
                                    '</div>';
                        } else{
                            myHTML +=   '<div class="col-6 col-lg-3">'+
                                        '<div class="form-check form-check-inline">'+
                                            '<input class="form-check-input" type="checkbox" name="reject[]" value="'+element.id+'" id="reject_'+element.id+'"'+
                                            '<label class="form-check-label" for="reject">'+element.jenis_reject+'</label>'+
                                        '</div>'+
                                    '</div>';
                        }
                    });
                    $("#insideCOl").html(myHTML);
                },
            });
        });
    }

    function AddDowntime(){
        $.get('/modal/openmodalaja', {}, function (data, status) {
            $("#staticBackdropLabel").html("SETUP DOWNTIME"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                dataType: "json",
                url: "{{ url('/api/downtime/group') }}",
                success: function (data) {
                    $("form").attr("action", "{{ url('/prod/modal-casting/downtime/save') }}");
                    var  myHTML = '';
                    data.forEach(element => {
                        // console.log(data)
                        if (element.casting == 1) {
                            myHTML +=   '<div class="col-6 col-lg-4">'+
                                        '<div class="form-check form-check-inline text-uppercase">'+
                                            '<input class="form-check-input" type="checkbox" checked name="downtime[]" value="'+element.id+'" id="downtime_'+element.id+'"'+
                                            '<label class="form-check-label text-uppercase" for="downtime">'+element.kategori+' - '+element.jenis_downtime+'</label>'+
                                        '</div>'+
                                    '</div>';
                        } else{
                            myHTML +=   '<div class="col-6 col-lg-4">'+
                                        '<div class="form-check form-check-inline text-uppercase">'+
                                            '<input class="form-check-input" type="checkbox" name="downtime[]" value="'+element.id+'" id="downtime_'+element.id+'"'+
                                            '<label class="form-check-label text-uppercase" for="downtime">'+element.kategori+' - '+element.jenis_downtime+'</label>'+
                                        '</div>'+
                                    '</div>';
                        }
                    });
                    $("#insideCOl").html(myHTML);
                },
            });
        });
    }

    function editSetupMachine(xx){
        $.get('/modal/addmachine', {}, function (data, status) {
            $("#staticBackdropLabel").html("EDIT MACHINE "+ xx); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/api/machinecasting') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    console.log(data[0].db_namapart_id);
                    $("form").attr("action", "{{ url('/modal/addmachine/update') }}");
                    $("#mc").attr("disabled", "disabled");
                    $("#line").val(data[0].line);
                    $("#mc").val(data[0].mc);
                    $("#material").val(data[0].material_id);
                    $("#db_namapart_id").val(data[0].db_namapart_id);
                    $("#db_namapart_id").trigger('change');
                    $("#dies").val(data[0].nomor_dies);
                    $("#cycle_time").val(data[0].cycle_time);
                    $("#kode_kanban").val(data[0].kode_kanban);
                    $("#tambahaninputan").html(
                        '<input type="hidden" name="mc" value="' + data[0].mc + '">'
                    );
                },
            });
        });
    }

    function AddHenkaten(){
        $.get('/modal/henkatencasting/add', {}, function (data, status) {
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
        $.get('/modal/henkatencasting/add', {}, function (data, status) {
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
                    $("form").attr("action", "{{ url('/modal/henkatencasting/update') }}");
                    $("#machine").val(data.mesin);
                    $("#machine").trigger('change');
                    $("#machine").attr("disabled", "disabled");
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
