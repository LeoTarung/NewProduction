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
</script>




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
</script>
@endsection
