@extends('prod-template')
@section('content')
<h3 class="mt-2">Melting Section</h3>
<div class="row">
    <div class="col">
        <a class="btn btn-sm btn-secondary mb-2 float-start" href="{{ url('/tv/melting') }}" target="_blank"><i class="fa-solid fa-tv"></i> Monitoring TV Charging</a>
        <a class="btn btn-sm btn-dark mb-2 ms-2 float-start" href="{{ url('/tv/levelmolten') }}" target="_blank"><i class="fa-solid fa-tv"></i> Monitoring Lv Molten</a>
    </div>
</div>
<div class="row">
    <div class="col">
        <button class="btn btn-primary mb-2 float-start me-2" onclick="ButtonSetupMelting('setuplevelMolten')"><i class="fa-solid fa-whiskey-glass"></i> Lv Molten</button>
        <button class="btn btn-success mb-2 float-start me-2" onclick="ButtonSetupMelting('setupFurnace')"><i class="fa-solid fa-fire-burner"></i> Furnace</button>
        <button class="btn btn-warning mb-2 float-start me-2" onclick="ButtonSetupMelting('setupKereta')"><i class="fa-solid fa-cart-shopping"></i> Kereta</button>
        <button class="btn btn-danger mb-2 float-start me-2" onclick="ButtonSetupMelting('setupHenkaten')"><i class="fa-solid fa-screwdriver-wrench"></i> Henkaten</button>

        <form enctype="multipart/form-data" onsubmit="addlotingot(event)">
            <div class="input-group mb-2 float-lg-end" style="width:50%;">
                <input type="text" name="lotingot" id="lotingot" class="form-control" placeholder="Scan Lot QR" autofocus required>
                <button type="submit" id="submit" class="btn btn-secondary text-light btn-outline-secondary"><i class="fa-solid fa-magnifying-glass fa-lg"></i></button>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col">
        <a class="btn btn-info mb-2 float-start" href="{{ url('/prod/melting/lot/ingot') }}"><i class="fa-solid fa-cubes-stacked"></i> Bundle Ingot</a>
        <a class="btn btn-secondary mb-2 ms-2 float-start" onclick="ButtonSetupMelting('setupForklift')"><i class="fa-solid fa-industry"></i> Forklift</a>
    </div>
</div>
<div class="row">
    @foreach ($data as $item)
        <div class="col-12 col-lg-6 nopadding">
            <div class="card m-1">
                @if  ($item->kode_status == 0)
                <div class="card-header bg-success"></div>
                @else
                <div class="card-header bg-secondary"></div>
                @endif
                <div class="card-body">
                    <a class="btn btn-primary float-end" href="{{ url('/prod/melting/')."/".$item->furnace }}">Lihat Data</a>
                    <p class="fs-4 text-center fw-bold text-decoration-underline">{{ $item->furnace }}</p>
                    <div class="chartdiv" id="chartdiv_{{ $item->furnace }}"></div>
                </div>
            </div>
        </div>

        <script>

            am5.ready(function() {

                // Data
                var data = [];

                // FOR ID
                var root = am5.Root.new("chartdiv_{{ $item->furnace }}");
                root._logo.dispose(); //Menghilangkan Logo Armchart dipojok dikiri bawh
                // Set themes
                root.setThemes([
                am5themes_Animated.new(root)
                ]);
                root.dateFormatter.setAll({
                dateFormat: "MM-dd",
                dateFields: ["valueX"]
                });
                // Create chart
                var chart = root.container.children.push(
                am5xy.XYChart.new(root, {
                    panX: false,
                    panY: false,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    layout: root.verticalLayout
                })
                );
                // Add cursor
                var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
                behavior: "zoomX"
                }));
                cursor.lineY.set("visible", false);

                // COLOR
                chart.get("colors").set("colors", [
                        am5.color(0x0d6efd), //biru
                        am5.color(0x6c757d), //abu abu
                        am5.color(0x198754), //ijo
                        am5.color(0xffc107), //kuning
                        am5.color(0xdc3545), //merah
                        am5.color(0x0dcaf0), //biru muda
                        am5.color(0x212529), //Hitam
                ]);

                // Create axes
                var xAxis = chart.xAxes.push(
                am5xy.DateAxis.new(root, {
                    baseInterval: { timeUnit: "day", count: 1 },
                    renderer: am5xy.AxisRendererX.new(root, {}),
                    tooltip: am5.Tooltip.new(root, {}),
                    tooltipDateFormat: "yyyy-MM-dd"
                })
                );
                var yAxis0 = chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    renderer: am5xy.AxisRendererY.new(root, {})
                })
                );
                var yRenderer1 = am5xy.AxisRendererY.new(root, {
                opposite: true
                });
                yRenderer1.grid.template.set("forceHidden", true);
                var yAxis1 = chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    renderer: yRenderer1,
                    syncWithAxis: yAxis0
                })
                );

                // Add series
                var total_charging = chart.series.push(
                am5xy.ColumnSeries.new(root, {
                    name: "Total Charging",
                    xAxis: xAxis,
                    yAxis: yAxis0,
                    valueYField: "total_charging",
                    valueXField: "date",
                    clustered: false,
                    tooltip: am5.Tooltip.new(root, {
                    pointerOrientation: "horizontal",
                    labelText: "{name}: {valueY}"
                    })
                })
                );

                total_charging.columns.template.setAll({
                width: am5.percent(60),
                fillOpacity: 0.6,
                strokeOpacity: 0
                });


                total_charging.data.processor = am5.DataProcessor.new(root, {
                dateFields: ["date"],
                dateFormat: "yyyy-MM-dd"
                });

                var ingot = chart.series.push(
                am5xy.ColumnSeries.new(root, {
                    name: "Ingot",
                    xAxis: xAxis,
                    yAxis: yAxis0,
                    valueYField: "ingot",
                    valueXField: "date",
                    clustered: false,
                    tooltip: am5.Tooltip.new(root, {
                    pointerOrientation: "horizontal",
                    labelText: "{name}: {valueY}"
                    })
                })
                );

                ingot.columns.template.set("width", am5.percent(40));


                var garis_batas_PersenIngot = chart.series.push(
                am5xy.SmoothedXLineSeries.new(root, {
                    name: "BATAS MAX INGOT",
                    xAxis: xAxis,
                    yAxis: yAxis1,
                    valueYField: "batas_max_ingot",
                    valueXField: "date",
                })
                );

                garis_batas_PersenIngot.strokes.template.setAll({
                strokeWidth: 4
                });

                var garis_persentase_ingot = chart.series.push(
                am5xy.SmoothedXLineSeries.new(root, {
                    name: "Persenetase Ingot",
                    xAxis: xAxis,
                    yAxis: yAxis1,
                    valueYField: "persen_ingot",
                    valueXField: "date"
                })
                );
                var garis_persentase_losdros_material = chart.series.push(
                am5xy.SmoothedXLineSeries.new(root, {
                    name: "Persenetase Loss",
                    xAxis: xAxis,
                    yAxis: yAxis1,
                    valueYField: "persen_losdros_material",
                    valueXField: "date"
                })
                );

                // Add bullet
                garis_persentase_ingot.strokes.template.setAll({
                strokeWidth: 2,
                strokeDasharray: [2, 2]
                });

                var tooltip1 = garis_persentase_ingot.set("tooltip", am5.Tooltip.new(root, {
                pointerOrientation: "horizontal"
                }));
                tooltip1.label.set("text", "{name}: {valueY}");

                garis_persentase_losdros_material.setAll({
                strokeWidth: 2,
                strokeDasharray: [2, 2]
                });

                var tooltip1 = garis_persentase_losdros_material.set("tooltip", am5.Tooltip.new(root, {
                pointerOrientation: "horizontal"
                }));
                tooltip1.label.set("text", "{name}: {valueY}");

                // Add bullet
                // https://www.amcharts.com/docs/v5/charts/xy-chart/series/#Bullets
                garis_persentase_ingot.bullets.push(function() {
                return am5.Bullet.new(root, {
                    sprite: am5.Circle.new(root, {
                    stroke: garis_persentase_ingot.get("fill"),
                    strokeWidth: 2,
                    fill: root.interfaceColors.get("background"),
                    radius: 5
                    })
                });
                });
                garis_persentase_losdros_material.bullets.push(function() {
                return am5.Bullet.new(root, {
                    sprite: am5.Circle.new(root, {
                    stroke: garis_persentase_losdros_material.get("fill"),
                    strokeWidth: 2,
                    fill: root.interfaceColors.get("background"),
                    radius: 5
                    })
                });
                });

                // Add scrollbar
                // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
                var scrollbar = chart.set("scrollbarX", am5xy.XYChartScrollbar.new(root, {
                orientation: "horizontal",
                //   height: 60
                }));

                var sbDateAxis = scrollbar.chart.xAxes.push(
                am5xy.DateAxis.new(root, {
                    baseInterval: {
                    timeUnit: "day",
                    count: 1
                    },
                    renderer: am5xy.AxisRendererX.new(root, {})
                })
                );

                var sbValueAxis0 = scrollbar.chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    renderer: am5xy.AxisRendererY.new(root, {})
                })
                );

                var sbValueAxis1 = scrollbar.chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    renderer: am5xy.AxisRendererY.new(root, {})
                })
                );

                var persenIngot = scrollbar.chart.series.push(
                am5xy.ColumnSeries.new(root, {
                    valueYField: "persen_ingot",
                    valueXField: "date",
                    xAxis: sbDateAxis,
                    yAxis: sbValueAxis0
                })
                );

                persenIngot.columns.template.setAll({ fillOpacity: 0.5, strokeOpacity: 0 });

                var batas_max_ingot = scrollbar.chart.series.push(
                am5xy.LineSeries.new(root, {
                    valueYField: "batas_max_ingot",
                    valueXField: "date",
                    xAxis: sbDateAxis,
                    yAxis: sbValueAxis1
                })
                );

                var legend = chart.children.push(
                am5.Legend.new(root, {
                    x: am5.p50,
                    centerX: am5.p50
                })
                );

                legend.data.setAll(chart.series.values);

                $(function() {
                    let ip_node = location.hostname;
                    let socket_port = '1553';
                    let socket = io(ip_node + ':' + socket_port);
                    socket.on('connection');

                    socket.on("bulanan{{ $item->furnace }}", (datasql) => {
                        console.log(datasql)
                        var data = [];
                        var ChartData = document.getElementById("chartdiv_{{ $item->furnace }}").innerHTML;
                        for (i = 0; i < datasql.length; i++) {
                        var obj = {};
                        obj['date'] = moment(datasql[i].tanggal).format('MM/DD/YY');
                        obj['total_charging'] = parseInt(datasql[i].total_chargings);
                        obj['ingot'] =  parseInt(datasql[i].ingots);
                        obj['batas_max_ingot'] = 30;
                        obj["persen_losdros_material"] = parseInt(parseFloat(datasql[i].persen_loss).toFixed(
                            0)); //parseFloat(datasql[i].persen_loss).toFixed(2)
                        obj["persen_ingot"] = parseInt(parseFloat(datasql[i].persen_ingots).toFixed(
                            0)); //parseFloat(datasql[i].persen_ingots).toFixed(2)
                        data.push(obj);
                        }
                        total_charging.data.setAll(data);
                        ingot.data.setAll(data);
                        garis_batas_PersenIngot.data.setAll(data);
                        garis_persentase_ingot.data.setAll(data);
                        garis_persentase_losdros_material.data.setAll(data);
                        persenIngot.data.setAll(data);
                        batas_max_ingot.data.setAll(data);
                    })
                });
                // Make stuff animate on load
                garis_batas_PersenIngot.appear(1000);
                garis_persentase_ingot.appear(1000);
                garis_persentase_losdros_material.appear(1000);
                chart.appear(1000, 100);

            }); // end am5.ready()
        </script>
    @endforeach
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
            } else if(dataa == 'setupForklift'){
                link = '/modal/Forklift';
                judul = 'Forklift Melting';
            }
        $.get(link, {}, function (data, status) {
            $("#staticBackdropLabel").html(judul); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function addlotingot(event){
        event.preventDefault(); // agar form tidak di eksekusi
        var lotingot = $('#lotingot').val(); // UBPURE-ADC1200001 | ADC 12 | 1376 | HARI AGUS PURWANTO | 31011699 | PT. PINJAYA ABADI METAL | 514.5 | TERGANTUNG VENDOR | 1001 | Nusametal | 2023-04-28 04:20:13
        const array = lotingot.split(" | "); // memecah string berdasarkan spasi
        var dateString = array[10];
        var date = new Date(dateString);
        var year = date.getFullYear();
        var month = (date.getMonth() + 1).toString().padStart(2, '0');
        var day = date.getDate().toString().padStart(2, '0');
        var hours = date.getHours().toString().padStart(2, '0');
        var minutes = date.getMinutes().toString().padStart(2, '0');
        var formattedDate = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;

        $.get('/modal/addLotIngot', {}, function (data, status) {
            $("#staticBackdropLabel").html("Use Bundle Ingot"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $('#nama_vendor').val(array[5]);
            $('#material').val(ConvertSAPINGOT(array[0]));
            $('#penyimpanan_bundle').val(array[8]);
            $('#berat_bundle').val(array[6]);
            $("#tambahaninputan").html(
                        '<input type="hidden" name="kode_sap" value="' + array[0] + '">'+
                        '<input type="hidden" name="nrp_penimbang" value="' + array[2] + '">'+
                        '<input type="hidden" name="nama_penimbang" value="' + array[3] + '">'+
                        '<input type="hidden" name="id_vendor" value="' + array[4] + '">'+
                        '<input type="datetime-local" class="d-none" name="kedatangan"  value="' + formattedDate + '">' +
                        '<input type="hidden" name="bisnis_unit" value="' + array[9] + '">'
            );
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
                    $("#kode_status").val(data.kode_status);
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

    function editLevelMolten(xx){
        $.get('/modal/levelmoltenMelting/edit', {}, function (data, status) {
            $("#staticBackdropLabel").html("Edit Level Molten"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/api/levelmolten') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    mc: xx,
                },
                success: function (data) {
                    console.log(data)
                    $("form").attr("action", "{{ url('/modal/levelmolten/update') }}");
                    $("#mc").html(data[0].mc);
                    $("#aktual_molten").val(data[0].aktual_molten);
                    $("#min_level_molten").val(data[0].min_level_molten);
                    $("#max_level_molten").val(data[0].max_level_molten);
                    $("#tambahaninputan").html(
                        '<input type="hidden" name="mc" value="' + data[0].mc + '">'
                    );
                },
            });
        });
    }

    function addForklift(){
        $.get('/modal/addForklift', {}, function (data, status) {
            $("#staticBackdropLabel").html("New Forklift"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function editForklift(xx){
        $.get('/modal/addForklift', {}, function (data, status) {
            $("#staticBackdropLabel").html("Edit forklift"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/api/forklift') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    $("form").attr("action", "{{ url('/modal/addforklift/update') }}");
                    $("#forklift").val(data.forklift);
                    $("#material").val(data.material);
                    $("#kode_status").val(data.kode_status);
                    $("#tambahaninputan").html(
                        '<input type="hidden" name="id" value="' + data.id + '">'
                    );
                },
            });
        });
    }

</script>

@endsection
