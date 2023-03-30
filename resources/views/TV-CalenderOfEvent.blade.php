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
    </style>
    <div class="mt-5">&ensp;</div>
    <div class="calendar fw-bold font-monospace" id="calendar"></div>

    <script>
        function datacalender(){
            $.get("/calenderEvent/apiAll", function(datasql){
                var data = [];
                for(i = 0; i < datasql.length; i++){
                    var obj = {};
                    obj['title'] = datasql[i].judul + " | " + datasql[i].pic + " | " + datasql[i].location + " | " + datasql[i].type
                    obj['start'] = datasql[i].tanggal+ "T" + datasql[i].mulai
                    obj['end'] = datasql[i].tanggal+ "T" + datasql[i].selesai
                    obj['borderColor'] = "#000000",
                    data.push(obj)
                }
                console.log(data)
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
            });
        }
        datacalender()
        setInterval(datacalender, 10000);
    </script>
@endsection
