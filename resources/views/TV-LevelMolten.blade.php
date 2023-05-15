@extends('TV-template')
@section('content')
    <div class="row mt-3 LevelMolten">
    </div>
<script>
    $(function() {
        let ip_node = location.hostname;
        let socket_port = '1553';
        let socket = io(ip_node + ':' + socket_port);
        socket.on('connection');
        socket.on("AllMesinCasting", (DataSocket) => {
            var  myHTML = '';
            DataSocket.forEach(Data => {
                myHTML +=   '<div class="col-12 col-md-2 col-xl-1">' +
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
                console.log(level1)

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
</script>
@endsection
