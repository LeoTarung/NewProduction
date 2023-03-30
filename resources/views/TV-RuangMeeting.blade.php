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
<div class="mt-5 ">&ensp;</div>
<div class="row ">
    <div class="calendar fw-bold font-monospace" id="calendar"></div>
</div>
<div class="row fixed-bottom fw-bold fs-4 pt-2">
    <div class="col"><i class="fa-solid fa-square" style="color: #0000FF;"></i> : Nusa 1</div>
    <div class="col"><i class="fa-solid fa-square" style="color: #00FF00;"></i> : Nusa 2</div>
    <div class="col"><i class="fa-solid fa-square" style="color: #9400D3;"></i> : Nusa 3</div>
</div>
<script>
    function datacalender(){
        $.get("https://kanri.smartsyst.my.id/api/Ruangan", function(datasql){
            var data = [];
            console.log(datasql);
            for(i = 0; i < datasql.length; i++){
                var obj = {};
                if(datasql[i].color === '#0000FF' || datasql[i].color == '#9400D3' || datasql[i].color == '#9400D3'){
                    var color = "#FFFFFF";
                } else {
                    var color = "#000000";
                }
                obj['title'] = datasql[i].keterangan + " | " + datasql[i].nama + " | " + datasql[i].jenis_meeting
                obj['start'] = datasql[i].meeting_mulai,
                obj['end'] = datasql[i].meeting_selesai,
                obj['color'] = datasql[i].color,
                obj['textColor'] = color,
                obj['borderColor'] = "#000000",
                data.push(obj)
            }
            // console.log(data)
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    // initialView: 'timeGridFourDay',
                    initialView: 'timeGridDay',
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
