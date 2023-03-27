@extends('prod-template')
@section('content')
<h3 class="mt-2">Bad News First</h3>

<div class="card mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col ">
                <button class="btn btn-success mb-2 float-end" onclick="addEvent()"><i class="fa-solid fa-plus"></i> Bad News</button>
                <a class="btn btn-sm btn-primary mb-2 float-start" href="{{ url('/tv/BadNewsFirst') }}" target="_blank"><i class="fa-solid fa-tv"></i> See On TV</a>
            </div>
        </div>
        <div class="table-responsive">
            <table id="Table_COE" class="table table-striped-columns table-hover table-bordered nowrap display" style="overflow-x: scroll">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL</th>
                        <th>JUDUL</th>
                        <th>DESKRIPSI</th>
                        <th>GAMBAR</th>
                        <th>PIC</th>
                        <th>STATUS</th>
                        <th nowrap="nowrap" class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ date('Y-m-d') }}</td>
                        <td>MACAM MACAM AREA DI NM</td>
                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe eveniet molestiae unde dicta dolorum a, tempore tempora obcaecati voluptates debitis accusamus eum soluta delectus rem sequi dolores ea veniam. Maiores.</td>
                        <td id="text"></td>
                        <td>Andhika Nur Rohman</td>
                        <td>Tampilkan</td>
                        <td><a class="btn fa-solid fa-pen-to-square fa-lg text-warning"></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text d-none" id="text"></div> {{-- KITA HILANGKAN DLU GAIS --}}

    </div>
</div>
<script type="text/javascript">
    var data = [
        {'gambar' : 'assembling.jpg'},
        {'gambar' : 'casting.jpg'},
        {'gambar' : 'melting.jpg'},
        {'gambar' : 'machining.jpg'},
        {'gambar' : 'painting.jpg'},
    ]

    var jangka = 20000 ;
    var inter;
    function showdata(){
        for (let i = 0; i < data.length; i++) {
            setTimeout(function() {
                console.log(data[i]);
                // $("#text").html(data[i].gambar)
                $("#text").html(
                    '<img src="/UI/IMG/'+data[i].gambar+'" class="img-fluid" alt="'+data[i].gambar+'" >'
                )
            }, jangka * i); // mengatur jeda waktu dengan mengalikan 1000 (1 detik) dengan indeks i
            inter = jangka * i;
        }
    }
    showdata()
    setInterval(showdata, inter+inter);
    </script>


{{-- <script>
    $(function () {
        var table = $('#Table_COE').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/calenderEvent') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' },
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
</script> --}}
@endsection
