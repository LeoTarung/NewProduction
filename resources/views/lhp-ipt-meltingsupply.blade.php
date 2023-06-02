@extends('lhp-template')
@section('content')
<div class="card">
    <div class="card-body">
        @switch($data->forklift)
            @case('FORKLIFT-3')
                <div class="row mt-3 LevelMolten"></div>
            @break
            @default
                <div class="row mt-3 LevelMolten"></div>
        @endswitch
    </div>
</div>

    <script>
        function resumeMeltingSupply(id, forklift){
            $.get('/lhp-modal/resume-meltingsupply/'+ id, {}, function (data, status) {
                $("#staticBackdropLabel").html('Resume Supply ' + forklift); //Untuk kasih judul di modal
                $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
                $("#page").html(data); //menampilkan view create di dalam id page
            });
        }

        $(function() {
            let ip_node = location.hostname;
            let socket_port = '1553';
            let socket = io(ip_node + ':' + socket_port);
            socket.on('connection');
            socket.on("MesinCasting{{ $data->material }}", (DataSocket) => {
                var  myHTML = '';
                DataSocket.forEach(Data => {
                    myHTML +=   '<div class="col-12 col-md-2 col-xl-1" onclick="inputSupply('+ Data.mc +')">' +
                            '<div class="text-center fw-bold fs-4" style="margin-bottom: -15%;">MC-' + Data.mc + '</div>' +
                            '<section id="battery_' + Data.mc + '" class="battery mb-3 d-flex justify-content-start">' +
                                '<div id="battery__pill" class="battery__pill">' +
                                    '<div id="battery__level" class="battery__level">' +
                                        '<div id="battery__liquid_' + Data.mc + '" class="battery__liquid"></div>' +
                                    '</div>' +
                                '</div>' +
                            '</section>' +
                        '</div>'
                });
                $(".LevelMolten").html(myHTML);

                DataSocket.forEach(element => {
                    let max1 = element.max_level_molten;
                    let min1 = element.min_level_molten;
                    let jarak1 = min1 - max1 //hasilnya 9000
                    let pembagi1 = (jarak1 * 0.01); //hasilnya 20
                    let value1 = (element.aktual_molten - max1); //hasilnya 500
                    let level1 = (value1 / pembagi1);
                    let battery1 = document.getElementById('battery_'+element.mc);

                    let batteryLiquid1 = document.getElementById('battery__liquid_'+element.mc);

                    batteryLiquid1.setAttribute('style', `height: ${level1}%;`);

                    if (level1 <= 20) {
                        batteryLiquid1.style.backgroundColor = '#f71515'

                    } else if (level1 <= 40) {
                        batteryLiquid1.style.backgroundColor = '#f16716'

                    } else if (level1 <= 60) {
                        batteryLiquid1.style.backgroundColor = '#f5dd06'

                    } else if (level1 = 80) {
                        batteryLiquid1.style.backgroundColor = '#98ce06'

                    } else {
                        batteryLiquid1.style.backgroundColor = '#06ce17'
                    }
                });
            })
        });

        function inputSupply(nomc){
            $.get('/lhp/modal-meltingsupply/'+ {{ $data->id }}, {}, function (data, status) {
                $("#staticBackdropLabel").html('Suppy MC-'+ nomc); //Untuk kasih judul di modal
                $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
                $("#page").html(data); //menampilkan view create di dalam id page
                $("#form-tambahan").html(
                        '<input type="hidden" name="mesin_casting" value="' + nomc + '">' +
                        '<input type="hidden" name="id_lhp" value="' + {{ $data->id }} + '">'
                );

                @switch($data->forklift)
                    @case('FORKLIFT-3')
                    function isitimbangan(){
                        $.ajax({
                            method: "GET",
                            dataType: "json",
                            url: "{{ url('/api/timbangan/1') }}",
                            success: function (data) {
                                $("#berat").val(data.berat);
                            },
                            error: function(status) {
                                $("#berat").val("ON LOADING...");
                            }
                        });
                        setTimeout(isitimbangan, 1000);
                    }
                    isitimbangan()
                    @break
                    @default
                            // $("#berat").val(100);
                @endswitch
            });
        }
    </script>
@endsection


