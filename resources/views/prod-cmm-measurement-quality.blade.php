@extends('prod-template')
@section('content')
    <style>
        #chartdiv {
            margin-top: -2em;
            width: 100%;
            height: 200px;
            font-size: 10px;
        }

        #chartdiv2 {
            margin-top: -2em;
            width: 100%;
            height: 200px;
            font-size: 10px;
        }
    </style>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-4">
                        <div class="card border-0">
                            <div class="card-header border-success border-5  border-top-0 border-start-0 border-end-0"
                                style="background-color: white; color:rgb(31, 168, 93)">
                                <h4><i class="fa-regular fa-circle-check fs-lg"></i> Completed</h4>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center text-center">
                                    <h1 class="fw-bold "
                                        style="width: 90%; font-size: 6rem; margin-bottom: -1rem; margin-top:-1.5rem;"
                                        id="total_complete">
                                    </h1>
                                    <span class="fw-bold " style="width:90%; font-size: 1.5rem; ">Part</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card border-0">
                            <div class="card-header border-info border-5  border-top-0 border-start-0 border-end-0"
                                style="background-color: white;color:rgb(30, 162, 172)">
                                <h4> <i class="fa-regular fa-rectangle-list fa-lg"></i> Schedule</h4>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center text-center">
                                    <h1 class="fw-bold "
                                        style="width: 90%; font-size: 6rem; margin-bottom: -1rem; margin-top:-1.5rem;"
                                        id="total_schedule">
                                    </h1>
                                    <span class="fw-bold " style="width:90%; font-size: 1.5rem; ">Part</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card border-0">
                            <div class="card-header border-warning border-5  border-top-0 border-start-0 border-end-0"
                                style="background-color: white;">
                                <h4 class="text-warning"> <i class="fa-solid fa-boxes-stacked fa-lg text-warning"></i>
                                    Waiting</h4>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center text-center">
                                    <h1 class="fw-bold "
                                        style="width: 90%; font-size: 6rem; margin-bottom: -1rem; margin-top:-1.5rem;"
                                        id="total_waiting">
                                    </h1>
                                    <span class="fw-bold " style="width:90%; font-size: 1.5rem; ">Part</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card" style="margin-bottom: 0.7rem; border: 1px solid black; border-radius: 1rem;">
                        <div class="card-body"
                            style="border-left: 0.5rem solid rgb(90, 183, 199); border-bottom: 0.5rem solid rgb(45, 145, 163); border-radius: 1rem;">
                            <div class="row nopadding">
                                <div class="col-12 text-start h5 fw-bold  fs-3"
                                    style="margin-bottom:0.5rem; margin-top: -0.5rem; border-bottom:0.2rem solid rgb(45, 145, 163); color: rgb(45, 145, 163); padding-bottom:0.5rem;">
                                    <i class="fa-solid fa-bolt fa-lg"></i> Running
                                </div>
                                <div class="row">
                                    <div class="col-6 fw-bold mb-1 border-5 " style="margin-bottom: -1.3rem;">
                                        <div class="card ps-2 border-3 border-top-0 border-end-0 border-bottom-0">
                                            <div class="row">
                                                <div class="col-8 ms-4">
                                                    <div class="fw-bold fs-3" style="color: rgb(12, 65, 126);"><i
                                                            class="fa-solid fa-computer fa-lg"></i> ZEIIS</div>
                                                    <div class="fs-6" style="color: rgb(12, 65, 126);"
                                                        id="zeiss_part_running">
                                                    </div>
                                                    <div class="fs-6" style="color: rgb(12, 65, 126);"
                                                        id="mesin_zeiss_running">
                                                    </div>
                                                </div>
                                                <div class="col-auto" style="color: aqua">
                                                    {{-- <i class="fa-regular fa-face-smile fa-2xl"
                                                        style="height: 50px;margin-top: 1rem;"></i> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 fw-bold mb-1 " style="margin-bottom: -1.3rem;">
                                        <div class="card ps-2 border-3 border-top-0 border-end-0 border-bottom-0">
                                            <div class="row">
                                                <div class="col-8 ms-1">
                                                    <div class="fw-bold fs-3" style="color: rgb(12, 65, 126);"><i
                                                            class="fa-solid fa-computer fa-lg"></i> Mitutoyo</div>
                                                    <div class="fs-6" style="color: rgb(12, 65, 126);"
                                                        id="mitutoyo_part_running">
                                                    </div>
                                                    <div class="fs-6" style="color: rgb(12, 65, 126);"
                                                        id="mesin_mitutoyo_running">
                                                    </div>
                                                </div>
                                                <div class="col-auto" style="color: rgb(189, 43, 43)">
                                                    {{-- <i class="fa-regular fa-face-sad-tear"
                                                        style="height: 50px;margin-top: 1rem;"></i> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card" style="margin-bottom: 0.7rem; border: 1px solid black; border-radius: 1rem;">

                        <div class="card-body"
                            style="border-left: 0.5rem solid rgb(235, 185, 21); border-bottom: 0.5rem solid rgb(235, 185, 21);; border-radius: 1rem;">
                            <div class="row nopadding">
                                <div class="col-12 text-start h5 fw-bold  fs-3"
                                    style="margin-bottom:0.5rem; margin-top: -0.5rem; border-bottom:0.2rem solid rgb(235, 185, 21); color:  rgb(235, 185, 21); padding-bottom:0.5rem;">
                                    <i class="fa-regular fa-rectangle-list fa-lg"></i> Schedule
                                </div>
                                <div class="row">
                                    <div class="col-6 fw-bold  border-3 border-bottom-0 border-start-0 border-end-0"
                                        style="margin-bottom: -1.3rem;">
                                        <div class="row">
                                            <div class="col-12 ms-1">
                                                <div class="fs-3 fw-bold" style="color: rgb(12, 65, 126);"><i
                                                        class="fa-solid fa-computer fa-lg"></i> ZEIIS
                                                </div>
                                                <div
                                                    class="card ps-2 py-2 border-3 border-top-0 border-end-0 border-bottom-0">
                                                    <table class="table table-borderless ">
                                                        <tr style="color: rgb(12, 65, 126);">
                                                            <td id="zeiss_part_waiting1">
                                                                <br>
                                                            </td>
                                                            <td><i class="fa-solid fa-up-long fa-lg"
                                                                    style="color:rgb(235, 185, 21);"> </i>
                                                            </td>
                                                        </tr>
                                                        <tr style="color: rgb(12, 65, 126);">
                                                            <td id="zeiss_part_waiting2">
                                                                <br>
                                                            </td>
                                                            <td><i class="fa-solid fa-up-long fa-lg"
                                                                    style="color:rgb(235, 185, 21);"> </i>
                                                            </td>
                                                        </tr>
                                                        <tr style="color: rgb(12, 65, 126);">
                                                            <td id="zeiss_part_waiting3">
                                                                <br>
                                                            </td>
                                                            <td><i class="fa-solid fa-up-long fa-lg"
                                                                    style="color:rgb(235, 185, 21);"> </i>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-6 fw-bold  border-3 border-bottom-0 border-start-0 border-end-0"
                                        style="margin-bottom: -1.3rem;">
                                        <div class="row">
                                            {{-- <div class="col-1 mt-1"><i class="fa-solid fa-computer "
                                                    style="height: 20px"></i>
                                            </div> --}}
                                            <div class="col-12 ms-1">
                                                <div class="fs-3 fw-bold" style="color: rgb(12, 65, 126);"><i
                                                        class="fa-solid fa-computer fa-lg"></i> Mitutoyo
                                                </div>
                                                <div
                                                    class="card ps-2 py-2 border-3 border-top-0 border-end-0 border-bottom-0">
                                                    <table class="table table-borderless ">
                                                        <tr style="color: rgb(12, 65, 126);">
                                                            <td id="mitutoyo_part_waiting1">
                                                                <br>
                                                            </td>
                                                            <td><i class="fa-solid fa-up-long fa-lg"
                                                                    style="color: rgb(235, 185, 21);"> </i>
                                                            </td>
                                                        </tr>
                                                        <tr style="color: rgb(12, 65, 126);">
                                                            <td id="mitutoyo_part_waiting2">
                                                                <br>
                                                            </td>
                                                            <td><i class="fa-solid fa-up-long fa-lg"
                                                                    style="color: rgb(235, 185, 21);"> </i>
                                                            </td>
                                                        </tr>
                                                        <tr style="color: rgb(12, 65, 126);">
                                                            <td id="mitutoyo_part_waiting3">
                                                                <br>
                                                            </td>
                                                            <td><i class="fa-solid fa-up-long fa-lg"
                                                                    style="color: rgb(235, 185, 21);"> </i>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="card border-0">
                    <div class="card-header border-primary border-5  border-top-0 border-start-0 border-end-0"
                        style="background-color: white;">
                        <h4> <i class="fa-regular fa-clipboard-list-check"></i> PERFORMANCE</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="fs-1">
                            <div id="chartdiv"></div>
                        </h1>
                    </div>
                </div>
                <div class="card border-0">
                    <div class="card-header border-primary border-5  border-top-0 border-start-0 border-end-0"
                        style="background-color: white;">
                        <h4> <i class="fa-regular fa-clipboard-list-check"></i> Achievement</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="fs-1">
                            <div id="chartdiv2"></div>
                        </h1>
                    </div>
                </div>
                <div class="card" style="margin-bottom: 0.7rem; border: 1px solid black; border-radius: 1rem;">

                    <div class="card-body"
                        style="border-left: 0.5rem solid rgb(156, 156, 156); border-bottom: 0.5rem solid rgb(133, 132, 132); border-radius: 1rem;">
                        <div class="row nopadding">
                            <div class="col-12 text-start h5 fw-bold  fs-3"
                                style="margin-bottom:0.5rem; margin-top: -0.5rem;   color: rgb(45, 145, 163); padding-bottom:0.5rem;">
                            </div>
                            <div class="row">
                                <div class="col-3 text-center m-auto tfw-bold"> Ava</div>
                                <div class="col-9">
                                    <div class="progress" role="progressbar" aria-label="Success example"
                                        aria-valuenow="98   " aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-primary" style="width: 98%">98</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 text-center m-auto tfw-bold"> Load</div>
                                <div class="col-9">
                                    <div class="progress" role="progressbar" aria-label="Success example"
                                        aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-success" style="width: 98%">98</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Resources -->
    <script src="https:JS/amchart/cmm_measurement/index.js"></script>
    <script src="https:/JS/amchart/cmm_measurement/xy.js"></script>
    <script src="https:/JS/amchart/cmm_measurement/radar.js"></script>
    <script src="https:/JS/amchart/cmm_measurement/Animated.js"></script>
    <script>
        let totalSchedule = 0;
        $(function() {
            let ip_node = location.hostname;
            let socket_port = '1553';
            let socket = io(ip_node + ':' + socket_port);
            socket.on('connection');
            socket.on("CMM_Measurement", (DataSocket) => {
                // $("#total_schedule").html(DataSocket.length);
            })
            socket.on("CMM_Zeiss_running", (DataSocket) => {
                if (DataSocket.length > 0) {
                    $("#zeiss_part_running").html(DataSocket[0].nama_part_dies);
                    $("#mesin_zeiss_running").html(DataSocket[0].mesin);
                } else {
                    $("#zeiss_part_running").html("-");
                    $("#mesin_zeiss_running").html("-");
                }
            })
            socket.on("CMM_Mitutoyo_running", (DataSocket) => {
                if (DataSocket.length > 0) {
                    $("#mitutoyo_part_running").html(DataSocket[0].nama_part_dies);
                    $("#mesin_mitutoyo_running").html(DataSocket[0].mesin);
                } else {
                    $("#mitutoyo_part_running").html("-");
                    $("#mesin_mitutoyo_running").html("-");
                }
            })
            socket.on("CMM_schedule_zeiss", (DataSocket) => {
                totalSchedule = DataSocket.length;
                $("#total_schedule").html(totalSchedule);
                if (DataSocket.length > 0) {
                    let jmlAntrian = DataSocket.length;
                    switch (jmlAntrian) {
                        case 1:
                            $("#zeiss_part_waiting1").html(DataSocket[0].nama_part_dies + '<br> ' +
                                DataSocket[0].mesin);
                            $("#zeiss_part_waiting2").html("-");
                            $("#zeiss_part_waiting3").html("-");
                            break;
                        case 2:
                            $("#zeiss_part_waiting1").html(DataSocket[0].nama_part_dies + '<br> ' +
                                DataSocket[0].mesin);
                            $("#zeiss_part_waiting2").html(DataSocket[1].nama_part_dies + '<br> ' +
                                DataSocket[1].mesin);
                            $("#zeiss_part_waiting3").html("-");
                            break;
                        case 3:
                            $("#zeiss_part_waiting1").html(DataSocket[0].nama_part_dies + '<br> ' +
                                DataSocket[0].mesin);
                            $("#zeiss_part_waiting2").html(DataSocket[1].nama_part_dies + '<br> ' +
                                DataSocket[1].mesin);
                            $("#zeiss_part_waiting3").html(DataSocket[2].nama_part_dies + '<br> ' +
                                DataSocket[2].mesin);
                            break;
                        default:
                            break;
                    }
                } else {
                    $("#zeiss_part_waiting1").html("-");
                    $("#zeiss_part_waiting2").html("-");
                    $("#zeiss_part_waiting3").html("-");
                }
            })
            socket.on("CMM_schedule_mitutoyo", (DataSocket) => {
                totalSchedule += DataSocket.length;
                $("#total_schedule").html(totalSchedule);
                console.log(DataSocket)
                if (DataSocket.length > 0) {
                    let jmlAntrian = DataSocket.length;
                    switch (jmlAntrian) {
                        case 1:
                            $("#mitutoyo_part_waiting1").html(DataSocket[0].nama_part_dies + '<br> ' +
                                DataSocket[0].mesin);
                            $("#mitutoyo_part_waiting2").html("-");
                            $("#mitutoyo_part_waiting3").html("-");
                            break;
                        case 2:
                            $("#mitutoyo_part_waiting1").html(DataSocket[0].nama_part_dies + '<br> ' +
                                DataSocket[0].mesin);
                            $("#mitutoyo_part_waiting2").html(DataSocket[1].nama_part_dies + '<br> ' +
                                DataSocket[1].mesin);
                            $("#mitutoyo_part_waiting3").html("-");
                            break;
                        case 3:
                            $("#mitutoyo_part_waiting1").html(DataSocket[0].nama_part_dies + '<br> ' +
                                DataSocket[0].mesin);
                            $("#mitutoyo_part_waiting2").html(DataSocket[1].nama_part_dies + '<br> ' +
                                DataSocket[1].mesin);
                            $("#mitutoyo_part_waiting3").html(DataSocket[2].nama_part_dies + '<br> ' +
                                DataSocket[2].mesin);
                            break;
                        default:
                            break;
                    }
                } else {
                    $("#mitutoyo_part_waiting1").html("-");
                    $("#mitutoyo_part_waiting2").html("-");
                    $("#mitutoyo_part_waiting3").html("-");
                }
            })
            socket.on("CMM_completed", (DataSocket) => {
                $("#total_complete").html(DataSocket.length);

            })

            socket.on("CMM_waiting", (DataSocket) => {
                $("#total_waiting").html(DataSocket.length);

            })

        });
    </script>
    <script>
        am5.ready(function() {

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
            // https://www.amcharts.com/docs/v5/charts/radar-chart/
            var chart = root.container.children.push(
                am5radar.RadarChart.new(root, {
                    panX: false,
                    panY: false,
                    startAngle: 180,
                    endAngle: 360
                })
            );

            chart.getNumberFormatter().set("numberFormat", "#'%'");

            // Create axis and its renderer
            // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Axes
            var axisRenderer = am5radar.AxisRendererCircular.new(root, {
                innerRadius: -40
            });

            axisRenderer.grid.template.setAll({
                stroke: root.interfaceColors.get("background"),
                visible: true,
                strokeOpacity: 0.8
            });

            var xAxis = chart.xAxes.push(
                am5xy.ValueAxis.new(root, {
                    maxDeviation: 0,
                    min: 0,
                    max: 100,
                    strictMinMax: true,
                    renderer: axisRenderer
                })
            );

            // Add clock hand
            // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Clock_hands
            var axisDataItem = xAxis.makeDataItem({});

            var clockHand = am5radar.ClockHand.new(root, {
                pinRadius: 50,
                radius: am5.percent(100),
                innerRadius: 50,
                bottomWidth: 0,
                topWidth: 0
            });

            clockHand.pin.setAll({
                fillOpacity: 0,
                strokeOpacity: 0.5,
                stroke: am5.color(0x000000),
                strokeWidth: 1,
                strokeDasharray: [2, 2]
            });
            clockHand.hand.setAll({
                fillOpacity: 0,
                strokeOpacity: 0.5,
                stroke: am5.color(0x000000),
                strokeWidth: 0.5
            });

            var bullet = axisDataItem.set(
                "bullet",
                am5xy.AxisBullet.new(root, {
                    sprite: clockHand
                })
            );

            xAxis.createAxisRange(axisDataItem);

            var label = chart.radarContainer.children.push(
                am5.Label.new(root, {
                    centerX: am5.percent(50),
                    textAlign: "center",
                    centerY: am5.percent(50),
                    fontSize: "2em"
                })
            );

            axisDataItem.set("value", 90);
            bullet.get("sprite").on("rotation", function() {
                var value = axisDataItem.get("value");
                label.set("text", value + "%");
            });

            // setInterval(function() {
            //     var value = Math.round(Math.random() * 100);

            // axisDataItem.animate({
            //     key: "value",
            //     to: value,
            //     duration: 500,
            //     easing: am5.ease.out(am5.ease.cubic)
            // });

            // axisRange0.animate({
            //     key: "endValue",
            //     to: value,
            //     duration: 500,
            //     easing: am5.ease.out(am5.ease.cubic)
            // });

            // axisRange1.animate({
            //     key: "value",
            //     to: value,
            //     duration: 500,
            //     easing: am5.ease.out(am5.ease.cubic)
            // });
            // }, 2000);

            chart.bulletsContainer.set("mask", undefined);

            var colorSet = am5.ColorSet.new(root, {});

            var axisRange0 = xAxis.createAxisRange(
                xAxis.makeDataItem({
                    above: true,
                    value: 0,
                    endValue: 90
                })
            );

            axisRange0.get("axisFill").setAll({
                visible: true,
                fill: colorSet.getIndex(0)
            });

            axisRange0.get("label").setAll({
                forceHidden: true
            });

            var axisRange1 = xAxis.createAxisRange(
                xAxis.makeDataItem({
                    above: true,
                    value: 90,
                    endValue: 100
                })
            );

            axisRange1.get("axisFill").setAll({
                visible: true,
                fill: colorSet.getIndex(4)
            });

            axisRange1.get("label").setAll({
                forceHidden: true
            });

            // Make stuff animate on load
            chart.appear(1000, 100);

        }); // end am5.ready()
    </script>
    <script>
        am5.ready(function() {

            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv2");
            root._logo.dispose();
            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            // Create chart
            // https://www.amcharts.com/docs/v5/charts/radar-chart/
            var chart = root.container.children.push(
                am5radar.RadarChart.new(root, {
                    panX: false,
                    panY: false,
                    startAngle: 180,
                    endAngle: 360
                })
            );

            chart.getNumberFormatter().set("numberFormat", "#'%'");

            // Create axis and its renderer
            // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Axes
            var axisRenderer = am5radar.AxisRendererCircular.new(root, {
                innerRadius: -40
            });

            axisRenderer.grid.template.setAll({
                stroke: root.interfaceColors.get("background"),
                visible: true,
                strokeOpacity: 0.8
            });

            var xAxis = chart.xAxes.push(
                am5xy.ValueAxis.new(root, {
                    maxDeviation: 0,
                    min: 0,
                    max: 100,
                    strictMinMax: true,
                    renderer: axisRenderer
                })
            );

            // Add clock hand
            // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Clock_hands
            var axisDataItem = xAxis.makeDataItem({});

            var clockHand = am5radar.ClockHand.new(root, {
                pinRadius: 50,
                radius: am5.percent(100),
                innerRadius: 50,
                bottomWidth: 0,
                topWidth: 0
            });

            clockHand.pin.setAll({
                fillOpacity: 0,
                strokeOpacity: 0.5,
                stroke: am5.color(0x000000),
                strokeWidth: 1,
                strokeDasharray: [2, 2]
            });
            clockHand.hand.setAll({
                fillOpacity: 0,
                strokeOpacity: 0.5,
                stroke: am5.color(0x000000),
                strokeWidth: 0.5
            });

            var bullet = axisDataItem.set(
                "bullet",
                am5xy.AxisBullet.new(root, {
                    sprite: clockHand
                })
            );

            xAxis.createAxisRange(axisDataItem);

            var label = chart.radarContainer.children.push(
                am5.Label.new(root, {
                    centerX: am5.percent(50),
                    textAlign: "center",
                    centerY: am5.percent(50),
                    fontSize: "2em"
                })
            );

            axisDataItem.set("value", 98);

            bullet.get("sprite").on("rotation", function() {
                var value = axisDataItem.get("value");
                label.set("text", value + "%");
            });

            // setInterval(function() {
            //     var value = Math.round(Math.random() * 100);

            //     axisDataItem.animate({
            //         key: "value",
            //         to: value,
            //         duration: 500,
            //         easing: am5.ease.out(am5.ease.cubic)
            //     });

            //     axisRange0.animate({
            //         key: "endValue",
            //         to: value,
            //         duration: 500,
            //         easing: am5.ease.out(am5.ease.cubic)
            //     });

            //     axisRange1.animate({
            //         key: "value",
            //         to: value,
            //         duration: 500,
            //         easing: am5.ease.out(am5.ease.cubic)
            //     });
            // }, 2000);

            chart.bulletsContainer.set("mask", undefined);

            var colorSet = am5.ColorSet.new(root, {});

            var axisRange0 = xAxis.createAxisRange(
                xAxis.makeDataItem({
                    above: true,
                    value: 0,
                    endValue: 98
                })
            );

            axisRange0.get("axisFill").setAll({
                visible: true,
                fill: colorSet.getIndex(0)
            });

            axisRange0.get("label").setAll({
                forceHidden: true
            });

            var axisRange1 = xAxis.createAxisRange(
                xAxis.makeDataItem({
                    above: true,
                    value: 98,
                    endValue: 100
                })
            );

            axisRange1.get("axisFill").setAll({
                visible: true,
                fill: colorSet.getIndex(4)
            });

            axisRange1.get("label").setAll({
                forceHidden: true
            });

            // Make stuff animate on load
            chart.appear(1000, 100);

        }); // end am5.ready()
    </script>
@endsection
