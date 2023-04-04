@extends('TV-template')
@section('content')
    <style>
        .fc-license-message{
            display: none;
        }
        #calendar {
        background-color: rgba(255, 255, 255, 0.548);
        max-width: 100%;
        max-height: 77vh;
        }
        #calendar1 {
        background-color: rgba(255, 255, 255, 0.548);
        max-width: 100%;
        max-height: 77vh;
        }
        #calendar2 {
        background-color: rgba(255, 255, 255, 0.548);
        max-width: 100%;
        max-height: 77vh;
        }
    </style>
    <div class="mt-5">&ensp;</div>

    <p class="text-center fs-3 fw-bold" id="judul"></p>
    <div id="calendar"></div>
    <script>
        var data;
        var group = 'pdca';
        function tukeran(){
                if (group == 'pdca'){
                    var dataa = [];
                    $.get("/calenderEvent/apiAll/pdca", function(datasql){
                        for(i = 0; i < datasql.length; i++){
                            if (datasql[i].type == 'external'){
                                var warna = "#FFFFFF";
                                var bg = "#000000";
                            } else {
                                var bg = "#348cdc";
                                var warna = "#FFFFFF";
                            }
                            var obj = {};
                            obj['title'] = datasql[i].judul + " | " + datasql[i].pic + " | " + datasql[i].location
                            obj['start'] = datasql[i].tanggal+ "T" + datasql[i].mulai
                            obj['end'] = datasql[i].tanggal+ "T" + datasql[i].selesai
                            obj['borderColor'] = "#000000",
                            obj['textColor'] = warna,
                            obj['color'] = bg,
                            data.push(obj)
                    }})

                    data = dataa
                    var groupn = 'quality';
                    group = groupn
                    $('#judul').html("PDCA AND PANDEMIC")

                } else if( group == 'quality'){
                    var dataa = []
                    $.get("/calenderEvent/apiAll/quality", function(datasql){
                        for(i = 0; i < datasql.length; i++){
                            if (datasql[i].type == 'external'){
                                var warna = "#FFFFFF";
                                var bg = "#000000";
                            } else {
                                var bg = "#348cdc";
                                var warna = "#FFFFFF";
                            }
                            var obj = {};
                            obj['title'] = datasql[i].judul + " | " + datasql[i].pic + " | " + datasql[i].location
                            obj['start'] = datasql[i].tanggal+ "T" + datasql[i].mulai
                            obj['end'] = datasql[i].tanggal+ "T" + datasql[i].selesai
                            obj['borderColor'] = "#000000",
                            obj['textColor'] = warna,
                            obj['color'] = bg,
                            data.push(obj)
                    }})

                    data = dataa
                    var groupn = 'plant';
                    group = groupn
                    $('#judul').html("QUALITY")

                } else if( group == 'plant'){
                    var dataa = []
                    $.get("/calenderEvent/apiAll/plant", function(datasql){
                        for(i = 0; i < datasql.length; i++){
                            if (datasql[i].type == 'external'){
                                var warna = "#FFFFFF";
                                var bg = "#000000";
                            } else {
                                var bg = "#348cdc";
                                var warna = "#FFFFFF";
                            }
                            var obj = {};
                            obj['title'] = datasql[i].judul + " | " + datasql[i].pic + " | " + datasql[i].location
                            obj['start'] = datasql[i].tanggal+ "T" + datasql[i].mulai
                            obj['end'] = datasql[i].tanggal+ "T" + datasql[i].selesai
                            obj['borderColor'] = "#000000",
                            obj['textColor'] = warna,
                            obj['color'] = bg,
                            data.push(obj)
                    }})

                    data = dataa
                    var groupn = 'pdca';
                    group = groupn
                    $('#judul').html("ENGGINERING PRODUCT")
                }
            }
        tukeran()

        setInterval(tukeran, 10000);

        function datacalender(){
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'timeGridFourDay',
                        slotMinTime: "07:00:00",
                        slotMaxTime: "17:00:00",
                        contentHeight: "auto",
                        headerToolbar: {
                            left: 'prev,next',
                            center: 'title',
                            right: 'timeGridDay,timeGridFourDay'
                        },
                        views: {
                            timeGridFourDay: {

                                type: 'timeGrid',
                                duration: {
                                    days: 5,
                                },
                                buttonText: '5 day'
                            }
                        },
                        events: data
                    });

                    calendar.render();
        }
        datacalender()

        setInterval(datacalender, 1000);
    </script>
@endsection
