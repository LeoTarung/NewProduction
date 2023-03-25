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
    <div class="calendar " id="calendar"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                eventClick: function(info) {
                    var eventObj = info.event;
                    Swal.fire({
                        title: eventObj.title,
                        text: eventObj.id + eventObj.classNames,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    })
                },
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
                events: [
                    @foreach($data as $a)
                        {
                            title: '{{ $a->judul }} | Pic : {{ $a->pic}} | {{ $a->location}} | {{ $a->type}}',
                            start: '{{ $a->tanggal }}T{{ $a->mulai }}',
                            end: '{{ $a->tanggal }}T{{ $a->selesai }}',
                            borderColor : '#000000',
                        },
                    @endforeach
            ],
            });
            calendar.render();
        });
    </script>
@endsection
