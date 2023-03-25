@extends('prod-template')
@section('content')
<h3 class="mt-2">Man Power</h3>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col ">
                <button class="btn btn-success mb-2 float-end" onclick="addEmployee()"><i class="fa-solid fa-plus"></i> Man Power</button>
                {{-- <button class="btn btn-primary mb-2 float-end me-2" onclick="ChangePassword()"><i class="fa-solid fa-key"></i> Change Password</button> --}}
            </div>
        </div>
        {{-- <p class="text-center fw-bold fs-3">Nusametal Main Power</p> --}}
        <div class="table-responsive">
            <table id="Table_MP" class="table table-striped-columns table-hover table-bordered nowrap display" style="overflow-x: scroll">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NRP</th>
                        <th>NAMA</th>
                        <th>LEVEL</th>
                        <th>SEKSI</th>
                        <th>DEPARTEMEN</th>
                        <th>DIVISI</th>
                        <th>EMAIL</th>
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
        var table = $('#Table_MP').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/adm/mp') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {data: 'nrp', name: 'nrp'},
                {data: 'name', name: 'name'},
                {data: 'role', name: 'role'},
                {data: 'seksi', name: 'seksi'},
                {data: 'departemen', name: 'departemen'},
                {data: 'divisi', name: 'divisi'},
                {data: 'email', name: 'email'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

    function addEmployee() {
        $.get("/modal/mpadd", {}, function (data, status) {
            $("#staticBackdropLabel").html("Add Man power"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }
    function editEmployee(xx) {
        $.get("/modal/mpadd", {}, function (data, status) {
            $("#staticBackdropLabel").html("Edit Man Power"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/adm/api/mp') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    $("form").attr("action", "{{ url('/modal/mpadd/update') }}");
                    $("#DivPassword").remove();
                    $("#nrp").val(data.nrp);
                    $("#nrp").attr("disabled", "disabled");
                    $("#name").val(data.name);
                    $("#seksi").val(data.seksi);
                    $("#departemen").val(data.departemen);
                    $("#divisi").val(data.divisi);
                    $("#email").val(data.email);
                    $("#role").val(data.role);
                    $("#status").val(data.status);
                    $("#tambahanEmployee").html(
                        '<input type="hidden" name="id" value="' + data.id + '">'
                    );
                },
            });
        });
    }
    function editPassword(xx) {
        $.get("/modal/ChangePassword", {}, function (data, status) {
            $("#staticBackdropLabel").html("Change Password"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/adm/api/mp') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    $("#nrp").val(data.nrp);
                    $("#name").val(data.name);
                    $("#name").val(data.name);
                    $("#tambahanchangePassword").html(
                        '<input type="hidden" name="id" value="' + data.id + '">'
                    );
                },
            });
        });
    }
</script>
@endsection
