@extends('prod-template')
@section('content')
<h3 class="mt-2">Calender Of Event</h3>

<div class="card mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col ">
                <button class="btn btn-success mb-2 float-end" onclick="addEvent()"><i class="fa-solid fa-plus"></i> Event On Calender</button>
                <a class="btn btn-sm btn-primary mb-2 float-start" href="{{ url('/tv/calenderEvent') }}" target="_blank"><i class="fa-solid fa-tv"></i> See On TV</a>
            </div>
        </div>
        <div class="table-responsive">
            <table id="Table_COE" class="table table-striped-columns table-hover table-bordered nowrap display" style="overflow-x: scroll">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>GROUP</th>
                        <th>AGENDA</th>
                        <th>TANGGAL</th>
                        <th>MULAI</th>
                        <th>SELESAI</th>
                        <th>PIC</th>
                        <th>LOCATION</th>
                        <th>TYPE</th>
                        <th>STATUS</th>
                        <th nowrap="nowrap" class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(function () {
        var table = $('#Table_COE').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/calenderEvent') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {data: 'group', name: 'group'},
                {data: 'judul', name: 'judul'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'mulai', name: 'mulai'},
                {data: 'selesai', name: 'selesai'},
                {data: 'pic', name: 'pic'},
                {data: 'location', name: 'location'},
                {data: 'type', name: 'type'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

    function addEvent() {
        $.get("/modal/calenderEvent", {}, function (data, status) {
            $("#staticBackdropLabel").html("Add Event On Calender"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }
    function editEvent(xx) {
        $.get("/modal/calenderEvent", {}, function (data, status) {
            $("#staticBackdropLabel").html("Edit Event On Calender"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/calenderEvent/api') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    $("form").attr("action", "{{ url('/modal/calenderEvent/update') }}");
                    $("#judul").val(data.judul);
                    $("#tanggal").val(data.tanggal);
                    $("#mulai").val(data.mulai);
                    $("#selesai").val(data.selesai);
                    $("#pic").val(data.pic);
                    $("#location").val(data.location);
                    $("#type").val(data.type);
                    $("#group").val(data.group);
                    $("#tambahaninputan").html(
                        '<input type="hidden" name="id_coe" value="' + data.id + '">' +
                       '<div class="col-12 mb-3">' +
                        '<label for="status" class="">status Meeting <sup>*</sup></label>' +
                        '<select class="form-select fw-bold" id="status" name="status" required>' +
                            '<option value="" selected disabled>Open this select menu</option>' +
                            '<option value="running">RUNNING</option>' +
                            '<option value="cancel">CANCEL</option>' +
                        '</select>' +
                    '</div>'
                    );
                    $("#status").val(data.status);
                },
            });
        });
    }
</script>
@endsection
