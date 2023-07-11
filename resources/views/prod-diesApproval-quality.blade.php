@extends('prod-template')
@section('content')
    <style>
        #chartdiv {
            margin-top: -2em;
            width: 100%;
            height: 150px;
            font-size: 10px;
        }

        #chartdiv2 {
            margin-top: -2em;
            width: 100%;
            height: 150px;
            font-size: 10px;
        }
    </style>
    <div class="container-fluid mt-2">
        <div class="row m-3">
            <div class="col-6">
                <div class="row">

                    <div class="col-3">
                        <div class="card w-100 text-center border-5 border-primary border-top-0 border-start-0 border-end-0"
                            style="background-color: azure">
                            <div class="fw-bold  " style="color: rgb(12, 43, 129); font-size: 18px;">Planning</div>
                            <div class="fw-bold" style="font-size: 70px;">64</div>
                            <div class="fw-bold mb-1" style="color: rgb(12, 43, 129)">Planning</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card w-100 text-center border-5 border-success border-top-0 border-start-0 border-end-0"
                            style="background-color: azure">
                            <div class="fw-bold  " style="color: rgb(12, 43, 129); font-size: 18px;">Pengukuran</div>
                            <div class="fw-bold" style="font-size: 70px;">64</div>
                            <div class="fw-bold mb-1" style="color: rgb(12, 43, 129)">In Progress</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card w-100 text-center border-5 border-primary border-top-0 border-start-0 border-end-0"
                            style="background-color: azure">
                            <div class="fw-bold  " style="color: rgb(12, 43, 129); font-size: 18px;">Sample App</div>
                            <div class="fw-bold" style="font-size: 70px;">64</div>
                            <div class="fw-bold mb-1" style="color: rgb(12, 43, 129)">In Progress</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card w-100 text-center border-5 border-success border-top-0 border-start-0 border-end-0"
                            style="background-color: azure">
                            <div class="fw-bold  " style="color: rgb(12, 43, 129); font-size: 18px;">Doc. App</div>
                            <div class="fw-bold" style="font-size: 70px;">64</div>
                            <div class="fw-bold mb-1" style="color: rgb(12, 43, 129)">In Progress</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">

                    <div class="col-3">
                        <div class="card w-100 text-center border-5 border-primary border-top-0 border-start-0 border-end-0"
                            style="background-color: azure">
                            <div class="fw-bold  " style="color: rgb(12, 43, 129); font-size: 18px;">Submit App</div>
                            <div class="fw-bold" style="font-size: 70px;">64</div>
                            <div class="fw-bold mb-1" style="color: rgb(12, 43, 129)">Planning</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card w-100 text-center border-5 border-success border-top-0 border-start-0 border-end-0"
                            style="background-color: azure">
                            <div class="fw-bold  " style="color: rgb(12, 43, 129); font-size: 18px;">PA</div>
                            <div class="fw-bold" style="font-size: 70px;">64</div>
                            <div class="fw-bold mb-1" style="color: rgb(12, 43, 129)">In Progress</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card w-100 text-center border-5 border-primary border-top-0 border-start-0 border-end-0"
                            style="background-color: azure">
                            <div class="fw-bold  " style="color: rgb(12, 43, 129); font-size: 18px;">IPP</div>
                            <div class="fw-bold" style="font-size: 70px;">64</div>
                            <div class="fw-bold mb-1" style="color: rgb(12, 43, 129)">In Progress</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card w-100 text-center border-5 border-success border-top-0 border-start-0 border-end-0"
                            style="background-color: azure">
                            <div class="fw-bold  " style="color: rgb(12, 43, 129); font-size: 18px;">Masspro</div>
                            <div class="fw-bold" style="font-size: 70px;">64</div>
                            <div class="fw-bold mb-1" style="color: rgb(12, 43, 129)">Completed</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-3 mt-4">
            <div class="col-8 h-100">
                <div class="text-center fw-bold mb-2"> Overdue Tasks</div>
                <div class="table-responsive">
                    <table class="table borderless bg-light">
                        <thead>
                            <th class="bg-primary text-center" style="color: white">Overdue</th>
                            <th class=" text-center" style="color: white; background-color: rgb(5, 196, 123);">Item Progress
                            </th>
                            <th class="bg-primary text-center" style="color: white">Deadline</th>
                            <th class=" text-center" style="color: white; background-color: rgb(5, 196, 123);">Dies Name
                            </th>
                            <th class="bg-primary text-center" style="color: white">Completed</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold text-center" style="color: rgb(223, 176, 21)">1 Days</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">Pengukuran</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">20 Juli 2023</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">COVER COMP WATER PUMP K56A
                                    (SFG) #6</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">
                                    <div class="row">
                                        <div class="col-10 mt-1">
                                            <div class="progress w-100 text-end" role="progressbar"
                                                aria-label="Success example" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-primary" style="width: 75%"></div>
                                            </div>
                                        </div>
                                        75
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-center" style="color: rgb(223, 176, 21)">1 Days</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">Pengukuran</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">20 Juli 2023</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">COVER COMP WATER PUMP K56A
                                    (SFG) #6</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">
                                    <div class="row">
                                        <div class="col-10 mt-1">
                                            <div class="progress w-100 text-end" role="progressbar"
                                                aria-label="Success example" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-primary" style="width: 75%"></div>
                                            </div>
                                        </div>
                                        75
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-center" style="color: rgb(223, 176, 21)">1 Days</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">Pengukuran</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">20 Juli 2023</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">COVER COMP WATER PUMP K56A
                                    (SFG) #6</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">
                                    <div class="row">
                                        <div class="col-10 mt-1">
                                            <div class="progress w-100 text-end" role="progressbar"
                                                aria-label="Success example" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-primary" style="width: 75%"></div>
                                            </div>
                                        </div>
                                        75
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-center" style="color: rgb(223, 176, 21)">1 Days</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">Pengukuran</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">20 Juli 2023</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">COVER COMP WATER PUMP K56A
                                    (SFG) #6</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">
                                    <div class="row">
                                        <div class="col-10 mt-1">
                                            <div class="progress w-100 text-end" role="progressbar"
                                                aria-label="Success example" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-primary" style="width: 75%"></div>
                                            </div>
                                        </div>
                                        75
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-center" style="color: rgb(223, 176, 21)">1 Days</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">Pengukuran</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">20 Juli 2023</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">COVER COMP WATER PUMP K56A
                                    (SFG) #6</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">
                                    <div class="row">
                                        <div class="col-10 mt-1">
                                            <div class="progress w-100 text-end" role="progressbar"
                                                aria-label="Success example" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-primary" style="width: 75%"></div>
                                            </div>
                                        </div>
                                        75
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-center" style="color: rgb(223, 176, 21)">1 Days</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">Pengukuran</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">20 Juli 2023</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">COVER COMP WATER PUMP K56A
                                    (SFG) #6</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">
                                    <div class="row">
                                        <div class="col-10 mt-1">
                                            <div class="progress w-100 text-end" role="progressbar"
                                                aria-label="Success example" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-primary" style="width: 75%"></div>
                                            </div>
                                        </div>
                                        75
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-center" style="color: rgb(223, 176, 21)">1 Days</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">Pengukuran</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">20 Juli 2023</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">COVER COMP WATER PUMP K56A
                                    (SFG) #6</td>
                                <td class="fw-bold text-center" style="color:rgb(12, 43, 129)">
                                    <div class="row">
                                        <div class="col-10 mt-1">
                                            <div class="progress w-100 text-end" role="progressbar"
                                                aria-label="Success example" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-primary" style="width: 75%"></div>
                                            </div>
                                        </div>
                                        75
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4">
                {{-- <div class="card"></div> --}}
                <div class="text-center fw-bold mb-4"> Completed</div>
                <div class="mb-5" id="chartdiv"></div>
                <div class="card"></div>
                <div class="text-center fw-bold mb-4"> On Schedule</div>
                <div class="mb-5" id="chartdiv2"></div>
            </div>
        </div>
    </div>
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

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

            axisDataItem.set("value", 50);
            bullet.get("sprite").on("rotation", function() {
                var value = axisDataItem.get("value");
                label.set("text", Math.round(value).toString() + "%");
            });

            setInterval(function() {
                var value = Math.round(Math.random() * 100);

                axisDataItem.animate({
                    key: "value",
                    to: value,
                    duration: 500,
                    easing: am5.ease.out(am5.ease.cubic)
                });

                axisRange0.animate({
                    key: "endValue",
                    to: value,
                    duration: 500,
                    easing: am5.ease.out(am5.ease.cubic)
                });

                axisRange1.animate({
                    key: "value",
                    to: value,
                    duration: 500,
                    easing: am5.ease.out(am5.ease.cubic)
                });
            }, 2000);

            chart.bulletsContainer.set("mask", undefined);

            var colorSet = am5.ColorSet.new(root, {});

            var axisRange0 = xAxis.createAxisRange(
                xAxis.makeDataItem({
                    above: true,
                    value: 0,
                    endValue: 50
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
                    value: 50,
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

            axisDataItem.set("value", 50);
            bullet.get("sprite").on("rotation", function() {
                var value = axisDataItem.get("value");
                label.set("text", Math.round(value).toString() + "%");
            });

            setInterval(function() {
                var value = Math.round(Math.random() * 100);

                axisDataItem.animate({
                    key: "value",
                    to: value,
                    duration: 500,
                    easing: am5.ease.out(am5.ease.cubic)
                });

                axisRange0.animate({
                    key: "endValue",
                    to: value,
                    duration: 500,
                    easing: am5.ease.out(am5.ease.cubic)
                });

                axisRange1.animate({
                    key: "value",
                    to: value,
                    duration: 500,
                    easing: am5.ease.out(am5.ease.cubic)
                });
            }, 2000);

            chart.bulletsContainer.set("mask", undefined);

            var colorSet = am5.ColorSet.new(root, {});

            var axisRange0 = xAxis.createAxisRange(
                xAxis.makeDataItem({
                    above: true,
                    value: 0,
                    endValue: 50
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
                    value: 50,
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
