@extends('TV-template')
@section('content')
<style>
    #chartdiv {
      width: 100%;
      height: 68vh;
    }
    </style>
    <div class="row justify-content-center mx-auto mt-0 mt-xxl-4">
        <div class="col-3 mb-2 mb-xxl-4">
            <div class="card border-start border-danger  border-5 border-top-0 border-bottom-0 border-end-0 shadow-lg  bg-body rounded">
                <div class="card-body">
                    <div class="fs-4 fw-bold font-monospace">AOP-SHIPPING</div>
                    <div class="d-flex justify-content-between">
                        <div class="fs-1 fw-bold" id="totalScan_SHIPPING"></div>
                        <i class="fa-solid fa-boxes-packing fa-4x opacity-25 ms-3 nopadding"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 mb-2 mb-xxl-4">
            <div class="card border-start border-warning  border-5 border-top-0 border-bottom-0 border-end-0 shadow-lg  bg-body rounded">
                <div class="card-body">
                    <div class="fs-4 fw-bold font-monospace">AOP-FSCM</div>
                    <div class="d-flex justify-content-between">
                        <div class="fs-1 fw-bold" id="totalScan_FSCM"></div>
                        <i class="fa-solid fa-boxes-packing fa-4x opacity-25 ms-3 nopadding"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 mb-2 mb-xxl-4">
            <div class="card border-start border-success  border-5 border-top-0 border-bottom-0 border-end-0 shadow-lg  bg-body rounded">
                <div class="card-body">
                    <div class="fs-4 fw-bold font-monospace">AOP-DELSI</div>
                    <div class="d-flex justify-content-between">
                        <div class="fs-1 fw-bold" id="totalScan_DELSI"></div>
                        <i class="fa-solid fa-boxes-packing fa-4x opacity-25 ms-3 nopadding"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 mb-2 mb-xxl-4">
            <div class="card border-start border-primary  border-5 border-top-0 border-bottom-0 border-end-0 shadow-lg  bg-body rounded">
                <div class="card-body">
                    <div class="fs-4 fw-bold font-monospace">AOP-NM</div>
                    <div class="d-flex justify-content-between">
                        <div class="fs-1 fw-bold" id="totalScan_NUSAMETAL"></div>
                        <i class="fa-solid fa-boxes-packing fa-4x opacity-25 ms-3 nopadding"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 nopadding ">
            <div class="h4 text-center font-monospace fw-bold">MONTHLY CHART</div>
            <div id="chartdiv"></div>
            <div id="div_1"></div>
            <div id="div_2"></div>
            <div id="div_3"></div>
            <div id="div_4"></div>
            <div id="div_5"></div>
            <div id="div_6"></div>
            <div id="div_7"></div>
        </div>
    </div>
<script>
    am5.ready(function() {
    var root = am5.Root.new("chartdiv");
    root._logo.dispose(); //Menghilangkan Logo Armchart dipojok dikiri bawh
    root.setThemes([
    am5themes_Animated.new(root)
    ]);
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
    panX: false,
    panY: false,
    wheelX: "panX",
    wheelY: "zoomX",
    layout: root.verticalLayout
    }));
    var legend = chart.children.push(
    am5.Legend.new(root, {
        centerX: am5.p50,
        x: am5.p50
    })
    );

    // var data = [{
    // "tanggal": "2023-05-01",
    // "Shipping": 25,
    // "FSCM": 25,
    // "Delsi": 21,
    // "NM": 31,
    // },]

    //naek kesitu cok

    // COLOR
    chart.get("colors").set("colors", [
        am5.color(0xdc3545), //merah
        am5.color(0xffc107), //kuning
        am5.color(0x198754), //ijo
        am5.color(0x0d6efd), //biru
    ]);

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xRenderer = am5xy.AxisRendererX.new(root, {
    cellStartLocation: 0.1,
    cellEndLocation: 0.9
    })

    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "tanggal",
    renderer: xRenderer,
    tooltip: am5.Tooltip.new(root, {})
    }));

    xRenderer.grid.template.setAll({
    location: 1
    })

    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
    renderer: am5xy.AxisRendererY.new(root, {
        strokeOpacity: 0.1
    })
    }));


    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: name,
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: fieldName,
        categoryXField: "tanggal"
    }));

    series.columns.template.setAll({
        tooltipText: "{name} : {valueY} Pack",
        width: am5.percent(90),
        tooltipY: 0,
        strokeOpacity: 0
    });

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear();

    series.bullets.push(function() {
        return am5.Bullet.new(root, {
        locationY: 0,
        sprite: am5.Label.new(root, {
            text: "{valueY}",
            fill: root.interfaceColors.get("alternativeText"),
            centerY: 0,
            centerX: am5.p50,
            populateText: true
        })
        });
    });

    legend.data.push(series);

    var area = ['SHIPPING','FSCM','DELSI','NUSAMETAL'];
    $(function() {
        let ip_node = location.hostname;
        let socket_port = '1553';
        let socket = io(ip_node + ':' + socket_port);
        socket.on('connection');

        area.forEach(area => {
            socket.on('CountScan'+area, (data) => {
                if(data.length != 0){
                   $("#totalScan_"+area).html(data[0].jumlah_scan + ' <span class="fw-normal fs-5">pack<sub>/daily</sub></span>')
                }else{
                   $("#totalScan_"+area).html('0 <span class="fw-normal fs-5">pack<sub>/daily</sub></span>')
                }
            })
        });

        socket.on('DataChartSHIPPING', (newData) => {
            var arr = [];
            var chartData = {};
            for (i = 0; i < newData.length; i++) {
                newData[i].tanggal =  moment(newData[i].tanggal).format('Y-MM-DD');
            }
            console.log(newData);
            xAxis.data.setAll(newData);
            series.data.setAll(newData);
        })

    });


    }

    makeSeries("Shipping", "Shipping");
    makeSeries("FSCM", "FSCM");
    makeSeries("Delsi", "Delsi");
    makeSeries("NM", "NM");

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);

    }); // end am5.ready()
</script>
@endsection
