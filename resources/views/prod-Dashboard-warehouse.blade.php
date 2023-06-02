@extends('prod-template')
@section('content')
<h3 class="mt-2">Warehouse Section</h3>
<div class="row">
    <div class="col">
        <a class="btn btn-sm btn-secondary mb-2 float-start" href="{{ url('/tv/stokingot') }}" target="_blank"><i class="fa-solid fa-tv"></i> Monitoring Stock</a>
    </div>
</div>
<div class="row">
    <div class="col">
        <button class="btn btn-info mb-2 float-start me-2" onclick="ButtonSetupingot('setupstockingot')"><i class="fa-solid fa-cubes-stacked"></i> Setup Stock Ingot</button>
    </div>
</div>

<div class="row">
    @foreach ($data as $item)
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="card ">
                <div class="card-header fs-3 fw-bold text-center bg-secondary bg-opacity-50">
                    {{ $item->DB_Material->initial }} - {{ $item->sloc }}
                </div>
                <div class="card-body nopadding bg-secondary bg-opacity-25">
                    <div id="stockmaterial-{{ $item->id }}" style="width: 100%; height: 30vh;"></div>
                </div>
            </div>
        </div>
    <script>
        am5.ready(function() {
            var root = am5.Root.new("stockmaterial-{{ $item->id }}");
            root._logo.dispose(); //Menghilangkan Logo Armchart dipojok dikiri bawh
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            // Buat lengkungan di chart, mulai dari 180Derajat sampai 360 Derajat
            var chart = root.container.children.push(am5radar.RadarChart.new(root, {
                panX: false,
                panY: false,
                startAngle: 180,
                endAngle: 360
            }));

            // Atur ini untuk ketebalan si chart merah kuning ijo
            var axisRenderer = am5radar.AxisRendererCircular.new(root, {
                    innerRadius: -35
            });

            axisRenderer.grid.template.setAll({
                stroke: root.interfaceColors.get("background"),
                visible: false, //menampilkan angka pada garis.( true = muncul)
                strokeOpacity: 0.8 //Belum ketemu untuk apa.
            });

            $(function() {
                let ip_node = location.hostname;
                let socket_port = '1553';
                let socket = io(ip_node + ':' + socket_port);
                socket.on('connection');

                socket.on("stockmaterial-{{ $item->id }}", (datasql{{ $item->id }}) => {
                    axisDataItem.animate({
                        key: "value",
                        to: datasql{{ $item->id }}[0].actual_stock,
                        duration: 100,
                        easing: am5.ease.out(am5.ease.cubic)
                    });

                    var max = datasql{{ $item->id }}[0].max_stock // => ini diisi dengan datasql{{ $item->id }}[0].max_stock
                    var min = datasql{{ $item->id }}[0].min_stock // => ini diisi dengan datasql{{ $item->id }}[0].max_stock
                    var Parmax = max + datasql{{ $item->id }}[0].kebutuhan_daily
                    var Parmin = 0.5 * min

                    xAxis.animate({
                        key: "min",
                        to: 0,
                        duration: 800,
                        easing: am5.ease.out(am5.ease.cubic)
                    });
                    xAxis.animate({
                        key: "max",
                        to: Parmax,
                        duration: 800,
                        easing: am5.ease.out(am5.ease.cubic)
                    });

                    var bandsData = [{
                            title: "Minimal",
                            color: "#ee1f25",
                            lowScore: 0,
                            highScore: datasql{{ $item->id }}[0].kebutuhan_daily
                        },
                        {
                            title: "Caution",
                            color: "#E57C23",
                            lowScore: datasql{{ $item->id }}[0].kebutuhan_daily,
                            highScore: min
                        },
                        {
                            title: "Normal",
                            color: "#0f9747",
                            lowScore: min,
                            highScore: max
                        },
                        {
                            title: "Maximal",
                            color: "#30A2FF",
                            lowScore: max,
                            highScore: Parmax
                        }
                    ];

                am5.array.each(bandsData, function(data) {
                    var axisRange = xAxis.createAxisRange(xAxis.makeDataItem({}));

                    axisRange.setAll({
                        value: data.lowScore,
                        endValue: data.highScore
                    });

                    axisRange.get("axisFill").setAll({
                        visible: true,
                        fill: am5.color(data.color),
                        fillOpacity: 0.8
                    });
                });



                })
            });

            var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0,
                min: 0,    //angka minimal
                max: 500,   //angka maksimal => ini diisi dengan datasql{{ $item->id }}[0].max_stock
                strictMinMax: true,
                renderer: axisRenderer
            }));

            // Add clock hand
            var axisDataItem = xAxis.makeDataItem({});
            var clockHand = am5radar.ClockHand.new(root, {
                pinRadius: am5.percent(10), // setting lingkaran dalam tengah
                radius: am5.percent(100), // setting panjang jarumnya
                bottomWidth: 15, // setting tingkat lebar segita jarum
            })

            var bullet = axisDataItem.set("bullet", am5xy.AxisBullet.new(root, {
                sprite: clockHand
            }));

            xAxis.createAxisRange(axisDataItem);

            bullet.get("sprite").on("rotation", function() {

                var value = axisDataItem.get("value");
                var fill = am5.color(0x000000);
                clockHand.pin.animate({
                    key: "fill",
                    to: fill,
                    duration: 800,
                    easing: am5.ease.out(am5.ease.cubic)
                })

                clockHand.hand.animate({
                    key: "fill",
                    to: fill,
                    duration: 800,
                    easing: am5.ease.out(am5.ease.cubic)
                    })
            });

            chart.bulletsContainer.set("mask", undefined);

            chart.appear(1000, 800);

        });
    </script>
    @endforeach
</div>


<script>
    var data1 = 70.0;
    var data2 = 70.5;
    console.log(data1 + data2)
</script>

<script>
    function ButtonSetupingot(dataa) {
        var link;
        var judul;
            if(dataa == 'setupstockingot'){
                link = '/modal/setupstockingot';
                judul = 'SETUP STOCK INGOT';
            } else if(dataa == 'setuptpingot'){
                link = '/modal/tpingot';
                judul = 'TP INGOT MONTHLY';
            }
        $.get(link, {}, function (data, status) {
            $("#staticBackdropLabel").html(judul); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function editstockingot(xx){
        $.get('/modal/editstockingot', {}, function (data, status) {
            $("#staticBackdropLabel").html("Edit Stock"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/api/stockingot') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    console.log(data)
                    $("form").attr("action", "{{ url('/modal/editstockingot/update') }}");
                    $("#material").val(data.material_id);
                    $("#sloc").val(data.sloc);
                    $("#kebutuhan_mrp").val(data.kebutuhan_mrp);
                    $("#kebutuhan_daily").val(data.kebutuhan_daily);
                    $("#actual_stock").val(data.actual_stock);
                    $("#min_stock").val(data.min_stock);
                    $("#max_stock").val(data.max_stock);
                    $("#material").attr('disabled','disabled');
                    $("#sloc").attr('disabled','disabled');

                    $("#kebutuhan_mrp" ).on( "keyup", function() {
                        var xxx = $("#kebutuhan_mrp").val();
                        var valDaily = xxx / 20
                        var valMIN = 0.3 * 20 * valDaily
                        var valMAX = 0.5 * 20 * valDaily
                        $("#kebutuhan_daily").val(valDaily);
                        $("#min_stock").val(valMIN);
                        $("#max_stock").val(valMAX);
                    } );

                    $("#tambahaninputan").html(
                        '<input type="hidden" name="id" value="' + data.id + '">'
                    );
                },
            });
        });
    }
</script>
@endsection
