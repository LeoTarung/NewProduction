@extends('TV-template')
@section('content')


<div class="row">
    <div class="col-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach ($data as $item)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-{{ preg_replace('/\s+/', '', $item->furnace) }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ preg_replace('/\s+/', '', $item->furnace) }}" type="button" role="tab" aria-controls="pills-{{ preg_replace('/\s+/', '', $item->furnace) }}" aria-selected="false">{{ preg_replace('/\s+/', '', $item->furnace) }}</button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="pills-tabContent">
            @foreach ($data as $item)
            <div class="tab-pane fade" id="pills-{{ preg_replace('/\s+/', '', $item->furnace) }}" role="tabpanel" aria-labelledby="pills-{{ preg_replace('/\s+/', '', $item->furnace) }}-tab" tabindex="0">
                <div class="row">
                    <div class="col-3">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12"><div class="fs-1 fw-bold text-center">{{ $item->furnace }}</div></div>
                                    <div class="col-12"><div class="text-center fs-2 fw-semibold" id="material_{{ preg_replace('/\s+/', '', $item->furnace) }}"></div></div>
                                    <div class="col-12 mb-3"><div class="gambar">
                                        <img src="/UI/IMG/profile.png" class="img-fluid img-rounded rounded mx-auto w-75 d-flex justify-content-center"></div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <h2 id="nama_{{ preg_replace('/\s+/', '', $item->furnace) }}"></h2>
                                        <h3 id="nrp_{{ preg_replace('/\s+/', '', $item->furnace) }}"></h3>
                                    </div>
                                    <div class="col-12 mt-2 fw-bold ">
                                        <div class="card bg-birutosca mb-2">
                                            <div class="row py-1 px-2">
                                                <div class="col-7 fs-6">Total Charging </div>
                                                <div class="col-5 fs-5" id="total_charging_{{ preg_replace('/\s+/', '', $item->furnace) }}"> <sub> KG</sub></div>
                                            </div>
                                        </div>
                                        <div class="card bg-birutosca mb-2">
                                            <div class="row py-1 px-2">
                                                <div class="col-7 fs-6">Ingot </div>
                                                <div class="col-5 fs-5" id="ingot_{{ preg_replace('/\s+/', '', $item->furnace) }}"> <sub> KG</sub></div>
                                            </div>
                                        </div>
                                        <div class="card bg-birutosca mb-2">
                                            <div class="row py-1 px-2">
                                                <div class="col-7 fs-6">Ex - Gate </div>
                                                <div class="col-5 fs-5" id="exgate_{{ preg_replace('/\s+/', '', $item->furnace) }}"> <sub> KG</sub></div>
                                            </div>
                                        </div>
                                        <div class="card bg-birutosca mb-2">
                                            <div class="row py-1 px-2">
                                                <div class="col-7 fs-6">Reject Parts </div>
                                                <div class="col-5 fs-5" id="reject_parts_{{ preg_replace('/\s+/', '', $item->furnace) }}"> <sub> KG</sub></div>
                                            </div>
                                        </div>
                                        <div class="card bg-birutosca mb-2">
                                            <div class="row py-1 px-2">
                                                <div class="col-7 fs-6">Tapping </div>
                                                <div class="col-5 fs-5" id="tapping_{{ preg_replace('/\s+/', '', $item->furnace) }}"> <sub> KG</sub></div>
                                            </div>
                                        </div>
                                        <div class="card bg-birutosca mb-2">
                                            <div class="row py-1 px-2">
                                                <div class="col-7 fs-6">Dross </div>
                                                <div class="col-5 fs-5" id="dross_{{ preg_replace('/\s+/', '', $item->furnace) }}"> <sub> KG</sub></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="card shadow-lg">
                                    <div class="card-header fw-bold fs-6 text-center bg-secondary bg-opacity-25">Daily Report</div>
                                    <div class="card-body"><div id="chart_daily_{{ preg_replace('/\s+/', '', $item->furnace) }}" style="width: 100%; height: 31vh;"></div></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card shadow-lg">
                                    <div class="card-header fw-bold fs-6 text-center bg-secondary bg-opacity-25">Month Report</div>
                                    <div class="card-body"><div id="chart_month_{{ preg_replace('/\s+/', '', $item->furnace) }}" style="width: 100%; height: 31vh;"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                 $(function() {
                    let ip_node = location.hostname;
                    let socket_port = '1553';
                    let socket = io(ip_node + ':' + socket_port);
                    socket.on('connection');
                    socket.on("Kiri{{ $item->furnace }}", (DataSocket) => {
                        if(DataSocket == 0){
                            document.getElementById("material_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = "BELUM PREPARATION";
                            document.getElementById("nama_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = "";
                            document.getElementById("nrp_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = "";
                            document.getElementById("total_charging_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = "0 kg";
                            document.getElementById("ingot_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = "0 kg";
                            document.getElementById("exgate_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = "0 kg";
                            document.getElementById("reject_parts_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = "0 kg";
                            document.getElementById("tapping_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = "0 kg";
                            document.getElementById("dross_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = "0 kg";
                        } else {
                            document.getElementById("material_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = DataSocket[0].material;
                            document.getElementById("nama_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = DataSocket[0].nama;
                            document.getElementById("nrp_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = DataSocket[0].nrp;
                            document.getElementById("total_charging_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = DataSocket[0].total_charging + " kg";
                            document.getElementById("ingot_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = DataSocket[0].ingot + " kg";
                            document.getElementById("exgate_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = DataSocket[0].exgate + " kg";
                            document.getElementById("reject_parts_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = DataSocket[0].reject_parts + " kg";
                            document.getElementById("tapping_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = DataSocket[0].tapping + " kg";
                            document.getElementById("dross_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML = DataSocket[0].dross + " kg";
                        }
                    })
                });
            </script>
            <script>
                am5.ready(function() {

                    // Data
                    var data = [];

                    // FOR ID
                    var root = am5.Root.new("chart_daily_{{ preg_replace('/\s+/', '', $item->furnace) }}");
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
                            var ChartData = document.getElementById("chart_daily_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML;
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

                am5.ready(function() {

                    // Data
                    var data = [];

                    // FOR ID
                    var root = am5.Root.new("chart_month_{{ preg_replace('/\s+/', '', $item->furnace) }}");
                    root._logo.dispose(); //Menghilangkan Logo Armchart dipojok dikiri bawh
                    // Set themes
                    root.setThemes([
                    am5themes_Animated.new(root)
                    ]);
                    root.dateFormatter.setAll({
                    dateFormat: "MM",
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
                        baseInterval: { timeUnit: "month", count: 1 },
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
                        timeUnit: "Month",
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

                        socket.on("Tahunan{{ $item->furnace }}", (datasql) => {
                            console.log(datasql)
                            var data = [];
                            var ChartData = document.getElementById("chart_month_{{ preg_replace('/\s+/', '', $item->furnace) }}").innerHTML;
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
    </div>
</div>
<script>
    var furnace = 'STRIKO-1';
    setInterval(function () {
        //============[' furnace ']===========//
        if (furnace == 'STRIKO-1') {
        document.getElementById('pills-STRIKO-1-tab').classList.add('active');
        document.getElementById('pills-STRIKO-2-tab').classList.remove('active');
        document.getElementById('pills-STRIKO-3-tab').classList.remove('active');
        document.getElementById('pills-SWIFASIA-tab').classList.remove('active');
        document.getElementById('pills-STRIKO-1').classList.add('show');
        document.getElementById('pills-STRIKO-1').classList.add('active');
        document.getElementById('pills-STRIKO-2').classList.remove('show');
        document.getElementById('pills-STRIKO-2').classList.remove('active');
        document.getElementById('pills-STRIKO-3').classList.remove('show');
        document.getElementById('pills-STRIKO-3').classList.remove('active');
        document.getElementById('pills-SWIFASIA').classList.remove('active');
        document.getElementById('pills-SWIFASIA').classList.remove('active');
        furnacea = 'STRIKO-2';
        furnace = furnacea;
        } else if (furnace == 'STRIKO-2') {
        document.getElementById('pills-STRIKO-1-tab').classList.remove('active');
        document.getElementById('pills-STRIKO-2-tab').classList.add('active');
        document.getElementById('pills-STRIKO-3-tab').classList.remove('active');
        document.getElementById('pills-SWIFASIA-tab').classList.remove('active');
        document.getElementById('pills-STRIKO-1').classList.remove('show');
        document.getElementById('pills-STRIKO-1').classList.remove('active');
        document.getElementById('pills-STRIKO-2').classList.add('show');
        document.getElementById('pills-STRIKO-2').classList.add('active');
        document.getElementById('pills-STRIKO-3').classList.remove('show');
        document.getElementById('pills-STRIKO-3').classList.remove('active');
        document.getElementById('pills-SWIFASIA').classList.remove('active');
        document.getElementById('pills-SWIFASIA').classList.remove('active');
        furnacea = 'STRIKO-3';
        furnace = furnacea;
        } else if (furnace == 'STRIKO-3') {
        document.getElementById('pills-STRIKO-1-tab').classList.remove('active');
        document.getElementById('pills-STRIKO-2-tab').classList.remove('active');
        document.getElementById('pills-STRIKO-3-tab').classList.add('active');
        document.getElementById('pills-SWIFASIA-tab').classList.remove('active');
        document.getElementById('pills-STRIKO-1').classList.remove('show');
        document.getElementById('pills-STRIKO-1').classList.remove('active');
        document.getElementById('pills-STRIKO-2').classList.remove('show');
        document.getElementById('pills-STRIKO-2').classList.remove('active');
        document.getElementById('pills-STRIKO-3').classList.add('show');
        document.getElementById('pills-STRIKO-3').classList.add('active');
        document.getElementById('pills-SWIFASIA').classList.remove('active');
        document.getElementById('pills-SWIFASIA').classList.remove('active');
        furnacea = 'SWIFASIA';
        furnace = furnacea;
        } else if (furnace == 'SWIFASIA') {
        document.getElementById('pills-STRIKO-1-tab').classList.remove('active');
        document.getElementById('pills-STRIKO-2-tab').classList.remove('active');
        document.getElementById('pills-STRIKO-3-tab').classList.remove('active');
        document.getElementById('pills-SWIFASIA-tab').classList.add('active');
        document.getElementById('pills-STRIKO-1').classList.remove('show');
        document.getElementById('pills-STRIKO-1').classList.remove('active');
        document.getElementById('pills-STRIKO-2').classList.remove('show');
        document.getElementById('pills-STRIKO-2').classList.remove('active');
        document.getElementById('pills-STRIKO-3').classList.remove('show');
        document.getElementById('pills-STRIKO-3').classList.remove('active');
        document.getElementById('pills-SWIFASIA').classList.add('show');
        document.getElementById('pills-SWIFASIA').classList.add('active');
        furnacea = 'STRIKO-1';
        furnace = furnacea;
        } else {
        furnacea = 'STRIKO-1';
        furnace = furnacea;
        }
    }, 1000);
</script>
@endsection
