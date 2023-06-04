@extends('prod-template')
@section('content')
<h3 class="mt-2">Qualtiy Section</h3>
<div class="row">
    <div class="col">
        <a class="btn btn-sm btn-primary mb-2 float-start me-2" href="{{ url('/tv/quality/diesapproval') }}" target="_blank"><i class="fa-solid fa-tv"></i> Monitoring Dies Approval</a>
        <a class="btn btn-sm btn-secondary mb-2 float-start me-2" href="{{ url('/tv/quality/kalibrasi') }}" target="_blank"><i class="fa-solid fa-tv"></i> Monitoring Achivement Kalibrasi</a>
        <a class="btn btn-sm btn-warning mb-2 float-start me-2" href="{{ url('/tv/quality/spectro') }}" target="_blank"><i class="fa-solid fa-tv"></i> Monitoring Spectrometer Test</a>
    </div>
</div>
<div class="row">
    <div class="col">
        <a class="btn btn-info mb-2 float-start" onclick="Measurement()"><i class="fa-solid fa-cubes-stacked"></i> MEASUREMENT TICKET</a>
    </div>
</div>
<div class="row mt-2">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-Measurement-Part-tab" data-bs-toggle="pill" data-bs-target="#pills-Measurement-Part" type="button" role="tab" aria-controls="pills-Measurement-Part" aria-selected="false" Measurement-Part>Measurement Part</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-achivement-kalibrasi-tab" data-bs-toggle="pill" data-bs-target="#pills-achivement-kalibrasi" type="button" role="tab" aria-controls="pills-achivement-kalibrasi" aria-selected="true">Achivement Kalibrasi</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-DiesApproval-tab" data-bs-toggle="pill" data-bs-target="#pills-DiesApproval" type="button" role="tab" aria-controls="pills-DiesApproval" aria-selected="false">Dies Approval</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-SpectroHPDC-tab" data-bs-toggle="pill" data-bs-target="#pills-SpectroHPDC" type="button" role="tab" aria-controls="pills-SpectroHPDC" aria-selected="false">Spectro HPDC</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-SpectroGDC-tab" data-bs-toggle="pill" data-bs-target="#pills-SpectroGDC" type="button" role="tab" aria-controls="pills-SpectroGDC" aria-selected="false" SpectroGDC>Spectro GDC</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade  show active" id="pills-Measurement-Part" role="tabpanel" aria-labelledby="pills-Measurement-Part-tab" tabindex="0">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-paste"></i> Measurement Part
                                <button class="btn btn-success mb-2 float-end" onclick="AddMeasurement()"><i class="fa-solid fa-plus"></i> Measurement</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="Table_Measurement" class="table table-striped-columns table-hover table-bordered nowrap display  w-100" style="overflow-x: scroll">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NO</th>
                                                <th class="text-center">SHIFT</th>
                                                <th class="text-center">PROSES</th>
                                                <th class="text-center">KATEGORI</th>
                                                <th class="text-center">NAMA PART - DIES</th>
                                                <th class="text-center">QTY</th>
                                                <th class="text-center">JUDGEMENT</th>
                                                {{-- <th class="text-center">AKSI</th> --}}
                                            </tr>
                                        </thead>
                                    </table>
                                    <script>
                                            $(function () {
                                                var table = $('#Table_Measurement').DataTable({
                                                    processing: true,
                                                    serverSide: true,
                                                    ajax: "{{ url('/prod/modal-quality/measurement/data') }}",
                                                    columns: [
                                                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                                                        {data: 'shift', name: 'shift'},
                                                        {data: 'proses', name: 'proses'},
                                                        {data: 'kategori', name: 'kategori'},
                                                        {data: 'nama_part_dies', name: 'nama_part_dies'},
                                                        {data: 'qty', name: 'qty'},
                                                        {data: 'judgement', name: 'judgement'},
                                                        // {data: 'action', name: 'action', orderable: false, searchable: false},
                                                    ],
                                                    "columnDefs": [
                                                        { className: "text-center", "targets": [ 6 ] }
                                                    ]
                                                });
                                            });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-achivement-kalibrasi" role="tabpanel" aria-labelledby="pills-achivement-kalibrasi-tab" tabindex="0">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-paste"></i> Achivement Kalibrasi Today
                                <button class="btn btn-success mb-2 float-end" onclick="AddKalibrasi()"><i class="fa-solid fa-plus"></i> Kalibrasi</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="Table_AchKalibrasi" class="table table-striped-columns table-hover table-bordered nowrap display  w-100" style="overflow-x: scroll">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NO</th>
                                                <th class="text-center">NAMA ALAT</th>
                                                <th class="text-center">NO REGISTRASI</th>
                                                <th class="text-center">JUDGEMENT</th>
                                                <th class="text-center">AKSI</th>
                                            </tr>
                                        </thead>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-DiesApproval" role="tabpanel" aria-labelledby="pills-DiesApproval-tab" tabindex="0">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-check-double"></i> Dies Approval Today
                                <button class="btn btn-success mb-2 float-end" onclick="AddDiesApproval()"><i class="fa-solid fa-plus"></i> Dies Approval</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="Table_DiesApproval" class="table table-striped-columns table-hover table-bordered display w-100" style="overflow-x: scroll">
                                        <thead>
                                            <tr>
                                                <th class="text-center" rowspan="2">NO</th>
                                                <th class="text-center" rowspan="2">TANGGAL</th>
                                                <th class="text-center" rowspan="2">NAMA PART</th>
                                                <th class="text-center" rowspan="2">NO DIES</th>
                                                <th class="text-center" colspan="7">STATUS</th>
                                                <th class="text-center" rowspan="2">AKSI</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">PENGUKURAN</th>
                                                <th class="text-center">SAMPLE APPROVAL</th>
                                                <th class="text-center">DOCUMENT APPROVAL</th>
                                                <th class="text-center">SUBMIT SAMPLE</th>
                                                <th class="text-center">PA</th>
                                                <th class="text-center">IPP</th>
                                                <th class="text-center">MASPRO</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-SpectroHPDC" role="tabpanel" aria-labelledby="pills-SpectroHPDC-tab" tabindex="0">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-paste"></i> Spectrometer HPDC
                                <button class="btn btn-success mb-2 float-end" onclick="AddSpectroHPDC()"><i class="fa-solid fa-plus"></i> Spectro HPDC</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="Table_SpectroHPDC" class="table table-striped-columns table-hover table-bordered nowrap display  w-100" style="overflow-x: scroll">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NO</th>
                                                <th class="text-center">FURNACE - MATERIAL</th>
                                                <th class="text-center">1A</th>
                                                <th class="text-center">1B</th>
                                                <th class="text-center">2A</th>
                                                <th class="text-center">2B</th>
                                                <th class="text-center">3A</th>
                                                <th class="text-center">3B</th>
                                                <th class="text-center">AKSI</th>
                                            </tr>
                                        </thead>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-SpectroGDC" role="tabpanel" aria-labelledby="pills-SpectroGDC-tab" tabindex="0">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-paste"></i> Spectrometer GDC
                                <button class="btn btn-success mb-2 float-end" onclick="AddSpectroGDC()"><i class="fa-solid fa-plus"></i> Spectro GDC</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="Table_SpectroGDC" class="table table-striped-columns table-hover table-bordered nowrap display w-100" style="overflow-x: scroll">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NO</th>
                                                <th class="text-center">FURNACE - MATERIAL</th>
                                                <th class="text-center">1</th>
                                                <th class="text-center">2</th>
                                                <th class="text-center">3</th>
                                                <th class="text-center">AKSI</th>
                                            </tr>
                                        </thead>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        var table = $('#Table_AchKalibrasi').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/prod/modal-quality/kalibrasi/data') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {data: 'nama_alat', name: 'nama_alat'},
                {data: 'no_reg', name: 'no_reg'},
                {data: 'hasil', name: 'hasil'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "text-center", "targets": [ 3 ] }
            ]
        });
    });

    $(function () {
        var table = $('#Table_DiesApproval').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/prod/modal-quality/diesapproval/data') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {data: 'tanggal', name: 'tanggal' },
                {data: 'nama_part', name: 'nama_part'},
                {data: 'no_dies', name: 'no_dies'},
                {data: 'sample_approval', name: 'sample_approval'},
                {data: 'document_approval', name: 'document_approval'},
                {data: 'status_pengukuran', name: 'status_pengukuran'},
                {data: 'status_submit_sample', name: 'status_submit_sample'},
                {data: 'status_submit_pa', name: 'status_submit_pa'},
                {data: 'status_submit_ipp', name: 'status_submit_ipp'},
                {data: 'status_submit_masspro', name: 'status_submit_masspro'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "text-center", "targets": [ 4 ] },
                { className: "text-center", "targets": [ 5 ] },
                { className: "text-center", "targets": [ 6 ] },
                { className: "text-center", "targets": [ 7 ] },
                { className: "text-center", "targets": [ 8 ] },
                { className: "text-center", "targets": [ 9 ] },
                { className: "text-center", "targets": [ 10 ] },
            ]
        });
    });

    $(function () {
        var table = $('#Table_SpectroHPDC').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/prod/modal-quality/spectro-hpdc/data') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {data: 'furnace', name: 'furnace'},
                {data: 'a', name: 'a'},
                {data: 'aa', name: 'aa'},
                {data: 'aaa', name: 'aaa'},
                {data: 'b', name: 'b'},
                {data: 'bb', name: 'bb'},
                {data: 'bbb', name: 'bbb'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "text-center", "targets": [ 2 ] },
                { className: "text-center", "targets": [ 3 ] },
                { className: "text-center", "targets": [ 4 ] },
                { className: "text-center", "targets": [ 5 ] },
                { className: "text-center", "targets": [ 6 ] },
                { className: "text-center", "targets": [ 7 ] },
            ]
        });
    });

    $(function () {
        var table = $('#Table_SpectroGDC').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/prod/modal-quality/spectro-gdc/data') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {data: 'furnace', name: 'furnace'},
                {data: 'a', name: 'a'},
                {data: 'aa', name: 'aa'},
                {data: 'aaa', name: 'aaa'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "columnDefs": [
                { className: "text-center", "targets": [ 2 ] },
                { className: "text-center", "targets": [ 3 ] },
                { className: "text-center", "targets": [ 4 ] },
            ]
        });
    });



</script>
<script>
    function Measurement(){
        $.get('/prod/modal-quality/measurement/table', {}, function (data, status) {
            $("#staticBackdropLabel").html('MEASUREMENT PART'); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function AddMeasurement(){
        $.get('/prod/modal-quality/measurement', {}, function (data, status) {
            $("#staticBackdropLabel").html('ADD MEASUREMENT PART'); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function EditMeasurement(xx){
        $.get('/prod/modal-quality/measurement', {}, function (data, status) {
            $("#staticBackdropLabel").html("EDIT MEASUREMENT PART"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/modal-quality/measurement/api') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    $("form").attr("action", "{{ url('/prod/modal-quality/measurement/update') }}");
                    $("#proses").val(data.proses);
                    $("#kategori").val(data.kategori);
                    $("#nama_part_dies").val(data.nama_part_dies);
                    $("#qty").val(data.qty);
                    $("#tambahaninputan").html(
                        '<div class="col-12 mb-3">' +
                            '<label for="judgement">JUDGEMENT <sup>*</sup></label>' +
                            '<select class="form-select" id="judgement" name="judgement" required>' +
                                '<option value="">Open this select menu</option>' +
                                '<option value="0">OPEN</option>' +
                                '<option value="1">OK</option>' +
                                '<option value="2">NG</option>' +
                            '</select>' +
                        '</div>' +
                        '<input type="hidden" name="id" value="' + data.id + '">'
                    );
                    $("#judgement").val(data.judgement);
                    $("#judgement").trigger('change');
                },
            });
        });
    }

    function AddKalibrasi(){
        $.get('/prod/modal-quality/kalibrasi', {}, function (data, status) {
            $("#staticBackdropLabel").html('ADD KALIBRASI'); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function EditKalibrasi(xx){
        $.get('/prod/modal-quality/kalibrasi', {}, function (data, status) {
            $("#staticBackdropLabel").html("EDIT KALIBRASI"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/modal-quality/kalibrasi/api') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    $("form").attr("action", "{{ url('/prod/modal-quality/kalibrasi/update') }}");
                    $("#nama_alat").val(data.nama_alat);
                    $("#no_reg").val(data.no_reg);
                    $("#judgement").val(data.judgement);
                    $("#tambahaninputan").html(
                        '<input type="hidden" name="id" value="' + data.id + '">'
                    );
                },
            });
        });
    }

    function AddDiesApproval(){
        $.get('/prod/modal-quality/diesapproval', {}, function (data, status) {
            $("#staticBackdropLabel").html('ADD DIES APPROVAL'); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function EditDiesApproval(xx){
        $.get('/prod/modal-quality/diesapproval', {}, function (data, status) {
            $("#staticBackdropLabel").html("EDIT DIES APPROVAL"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/modal-quality/diesapproval/api') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    $("form").attr("action", "{{ url('/prod/modal-quality/diesapproval/update') }}");
                    $("#nama_part").val(data.nama_part);
                    $("#nama_part").trigger('change');
                    $("#no_dies").val(data.no_dies);
                    $("#sample_approval").val(data.sample_approval);
                    $("#status_pengukuran").val(data.status_pengukuran);
                    $("#document_approval").val(data.document_approval);
                    $("#status_submit_sample").val(data.status_submit_sample);
                    $("#status_submit_pa").val(data.status_submit_pa);
                    $("#status_submit_ipp").val(data.status_submit_ipp);
                    $("#status_submit_masspro").val(data.status_submit_masspro);
                    $("#tambahaninputan").html(
                        '<input type="hidden" name="id" value="' + data.id + '">'
                    );
                },
            });
        });
    }

    function AddSpectroHPDC(){
        $.get('/prod/modal-quality/spectro-hpdc', {}, function (data, status) {
            $("#staticBackdropLabel").html('ADD SPECTRO HPDC'); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function EditSpectroHPDC(xx){
        $.get('/prod/modal-quality/spectro-hpdc', {}, function (data, status) {
            $("#staticBackdropLabel").html("EDIT SPECTRO HPDC"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/modal-quality/spectro/api') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    $("form").attr("action", "{{ url('/prod/modal-quality/spectro-hpdc/update') }}");
                    $("#furnace").val(data.furnace);
                    $("#furnace").trigger('change');
                    $("#a").val(data.a);
                    $("#aa").val(data.aa);
                    $("#aaa").val(data.aaa);
                    $("#b").val(data.b);
                    $("#bb").val(data.bb);
                    $("#bbb").val(data.bbb);
                    $("#tambahaninputan").html(
                        '<input type="hidden" name="id" value="' + data.id + '">'
                    );
                },
            });
        });
    }

    function AddSpectroGDC(){
        $.get('/prod/modal-quality/spectro-gdc', {}, function (data, status) {
            $("#staticBackdropLabel").html('ADD SPECTRO GDC'); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function EditSpectroGDC(xx){
        $.get('/prod/modal-quality/spectro-gdc', {}, function (data, status) {
            $("#staticBackdropLabel").html("EDIT SPECTRO GDC"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/modal-quality/spectro/api') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    $("form").attr("action", "{{ url('/prod/modal-quality/spectro-gdc/update') }}");
                    $("#furnace").val(data.furnace);
                    $("#furnace").trigger('change');
                    $("#a").val(data.a);
                    $("#aa").val(data.aa);
                    $("#aaa").val(data.aaa);
                    $("#tambahaninputan").html(
                        '<input type="hidden" name="id" value="' + data.id + '">'
                    );
                },
            });
        });
    }
</script>
@endsection
