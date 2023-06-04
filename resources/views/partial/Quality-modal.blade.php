@switch(Route::current()->getName())
    @case('Quality.AddKalibrasi')
            <form action="{{ url('/prod/modal-quality/kalibrasi/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="nama_alat">NAMA ALAT <sup>*</sup></label>
                        <input type="text" class="form-control" name="nama_alat" id="nama_alat" aria-describedby="nama_alatHelp" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="no_reg">NO REGISTRASI <sup>*</sup></label>
                        <input type="text" class="form-control" name="no_reg" id="no_reg" aria-describedby="no_regHelp" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="judgement">JUDGEMENT <sup>*</sup></label>
                        <select class="form-select" id="judgement" name="judgement" required>
                            <option value="">Open this select menu</option>
                            <option value="0">OPEN</option>
                            <option value="1">OK</option>
                            <option value="2">NG</option>
                        </select>
                    </div>
                </div>
                <div id="tambahaninputan"></div>
                <div class="row">
                    <div class="col" >
                        <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                    </div>
                </div>
            </form>
    @break
    @case('Quality.AddDiesApproval')
            <form action="{{ url('/prod/modal-quality/diesapproval/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="col-12 mb-3">
                            <label for="nama_part">NAMA PART <sup>*</sup></label>
                            <select class="form-select" id="nama_part" name="nama_part" required>
                                <option value="">Open this select menu</option>
                                @foreach ( App\Models\DB_Namapart::where('proses', 'CASTING')->get() as $item)
                                    <option class="dropdown-item form-control" value="{{ $item->nama_part }}" >{{ $item->nama_part }}</option>
                                @endforeach
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#nama_part").select2({
                                        dropdownParent: $("#staticBackdrop")
                                    });
                                });
                            </script>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="no_dies">NO DIES <sup>*</sup></label>
                            <input type="text" class="form-control" name="no_dies" id="no_dies" aria-describedby="no_diesHelp" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="status_pengukuran">STATUS PENGUKURAN <sup>*</sup></label>
                            <select class="form-select" id="status_pengukuran" name="status_pengukuran" required>
                                <option value="">Open this select menu</option>
                                <option value="0">OPEN</option>
                                <option value="1">CLOSE</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="sample_approval">SAMPLE APPROVAL <sup>*</sup></label>
                            <select class="form-select" id="sample_approval" name="sample_approval" required>
                                <option value="">Open this select menu</option>
                                <option value="0">OPEN</option>
                                <option value="1">CLOSE</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="document_approval">DOCUMENT APPROVAL <sup>*</sup></label>
                            <select class="form-select" id="document_approval" name="document_approval" required>
                                <option value="">Open this select menu</option>
                                <option value="0">OPEN</option>
                                <option value="1">CLOSE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">

                        <div class="col-12 mb-3">
                            <label for="status_submit_sample">STATUS SUBMIT SAMPLE <sup>*</sup></label>
                            <select class="form-select" id="status_submit_sample" name="status_submit_sample" required>
                                <option value="">Open this select menu</option>
                                <option value="0">OPEN</option>
                                <option value="1">CLOSE</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="status_submit_pa">STATUS SUBMIT PA <sup>*</sup></label>
                            <select class="form-select" id="status_submit_pa" name="status_submit_pa" required>
                                <option value="">Open this select menu</option>
                                <option value="0">OPEN</option>
                                <option value="1">CLOSE</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="status_submit_ipp">STATUS SUBMIT IPP <sup>*</sup></label>
                            <select class="form-select" id="status_submit_ipp" name="status_submit_ipp" required>
                                <option value="">Open this select menu</option>
                                <option value="0">OPEN</option>
                                <option value="1">CLOSE</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="status_submit_masspro">STATUS SUBMIT MASSPRO <sup>*</sup></label>
                            <select class="form-select" id="status_submit_masspro" name="status_submit_masspro" required>
                                <option value="">Open this select menu</option>
                                <option value="0">OPEN</option>
                                <option value="1">CLOSE</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="tambahaninputan"></div>
                <div class="row">
                    <div class="col" >
                        <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                    </div>
                </div>
            </form>
    @break
    @case('Quality.Addspectro_hpdc')
        <form action="{{ url('/prod/modal-quality/spectro-hpdc/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
            @csrf
            <div class="row">
                <div class="col-6">
                        <div class="col-12 mb-3">
                            <label for="furnace">FURNACE <sup>*</sup></label>
                            <select class="form-select" id="furnace" name="furnace" required>
                                <option value="">Open this select menu</option>
                                @foreach ( App\Models\DB_Furnace::with(['DB_Material'])->get() as $item)
                                    <option class="dropdown-item form-control" value="{{ $item->furnace }} - {{ $item->DB_Material->initial }}" >{{ $item->furnace }} - {{ $item->DB_Material->initial }}</option>
                                @endforeach
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $("#furnace").select2({
                                        dropdownParent: $("#staticBackdrop")
                                    });
                                });
                            </script>
                        </div>
                    <div class="col-12 mb-3">
                        <label for="a"> SHIFT 1A <sup>*</sup></label>
                        <select class="form-select" id="a" name="a" required>
                            <option value="">Open this select menu</option>
                            <option value="0">OPEN</option>
                            <option value="1">OK</option>
                            <option value="2">NG</option>
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="b"> SHIFT 1B <sup>*</sup></label>
                        <select class="form-select" id="b" name="b" required>
                            <option value="">Open this select menu</option>
                            <option value="0">OPEN</option>
                            <option value="1">OK</option>
                            <option value="2">NG</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12 mb-3">
                        <label for="aa"> SHIFT 2A <sup>*</sup></label>
                        <select class="form-select" id="aa" name="aa" required>
                            <option value="">Open this select menu</option>
                            <option value="0">OPEN</option>
                            <option value="1">OK</option>
                            <option value="2">NG</option>
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="bb"> SHIFT 2B <sup>*</sup></label>
                        <select class="form-select" id="bb" name="bb" required>
                            <option value="">Open this select menu</option>
                            <option value="0">OPEN</option>
                            <option value="1">OK</option>
                            <option value="2">NG</option>
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="aaa"> SHIFT 3A <sup>*</sup></label>
                        <select class="form-select" id="aaa" name="aaa" required>
                            <option value="">Open this select menu</option>
                            <option value="0">OPEN</option>
                            <option value="1">OK</option>
                            <option value="2">NG</option>
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="bbb"> SHIFT 3B <sup>*</sup></label>
                        <select class="form-select" id="bbb" name="bbb" required>
                            <option value="">Open this select menu</option>
                            <option value="0">OPEN</option>
                            <option value="1">OK</option>
                            <option value="2">NG</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="tambahaninputan"></div>
            <div class="row">
                <div class="col" >
                    <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                </div>
            </div>
        </form>
    @break
    @case('Quality.Addspectro_gdc')
        <form action="{{ url('/prod/modal-quality/spectro-gdc/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
            @csrf
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="furnace">FURNACE - MATERIAL <sup>*</sup></label>
                    <input type="text" class="form-control" name="furnace" id="furnace" aria-describedby="furnaceHelp" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="a"> SHIFT 1 <sup>*</sup></label>
                    <select class="form-select" id="a" name="a" required>
                        <option value="">Open this select menu</option>
                        <option value="0">OPEN</option>
                        <option value="1">OK</option>
                        <option value="2">NG</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="aa"> SHIFT 2 <sup>*</sup></label>
                    <select class="form-select" id="aa" name="aa" required>
                        <option value="">Open this select menu</option>
                        <option value="0">OPEN</option>
                        <option value="1">OK</option>
                        <option value="2">NG</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="aaa"> SHIFT 3 <sup>*</sup></label>
                    <select class="form-select" id="aaa" name="aaa" required>
                        <option value="">Open this select menu</option>
                        <option value="0">OPEN</option>
                        <option value="1">OK</option>
                        <option value="2">NG</option>
                    </select>
                </div>
            </div>
            <div id="tambahaninputan"></div>
            <div class="row">
                <div class="col" >
                    <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                </div>
            </div>
        </form>
    @break
    @case('Quality.measurement')
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="Table_Measurementt" class="table table-striped-columns table-hover table-bordered nowrap display  w-100" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">SHIFT</th>
                                <th class="text-center">PROSES</th>
                                <th class="text-center">KATEGORI</th>
                                <th class="text-center">NAMA PART - DIES</th>
                                <th class="text-center">QTY</th>
                                <th class="text-center">JUDGEMENT</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                    </table>
                    <script>
                            $(function () {
                                var table = $('#Table_Measurementt').DataTable({
                                    processing: true,
                                    serverSide: true,
                                    ajax: "{{ url('/prod/modal-quality/measurement/data/nostat') }}",
                                    columns: [
                                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                                        {data: 'shift', name: 'shift'},
                                        {data: 'proses', name: 'proses'},
                                        {data: 'kategori', name: 'kategori'},
                                        {data: 'nama_part_dies', name: 'nama_part_dies'},
                                        {data: 'qty', name: 'qty'},
                                        {data: 'judgement', name: 'judgement'},
                                        {data: 'action', name: 'action', orderable: false, searchable: false},
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
    @break
    @case('Quality.Addmeasurement')
        <form action="{{ url('/prod/modal-quality/measurement/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
            @csrf
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="proses"> PROSES <sup>*</sup></label>
                    <select class="form-select" id="proses" name="proses" required>
                        <option value="">Open this select menu</option>
                        <option value="hpdc">HPDC</option>
                        <option value="gdc">GDC</option>
                        <option value="machining">MACHINING</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="kategori"> KATEGORI <sup>*</sup></label>
                    <select class="form-select" id="kategori" name="kategori" required>
                        <option value="">Open this select menu</option>
                        <option value="setup">SETUP</option>
                        <option value="patrol - pershift">PATROL - PERSHIFT</option>
                        <option value="patrol - perhari">PATROL - PERHARI</option>
                        <option value="trial">TRIAL</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="nama_part_dies">NAMA PART DAN DIES <sup>*</sup></label>
                    <input type="text" class="form-control" name="nama_part_dies" id="nama_part_dies" aria-describedby="nama_part_diesHelp" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="qty">QTY <sup>*</sup></label>
                    <input type="number" class="form-control" name="qty" id="qty" aria-describedby="qtyHelp" value="0" min="0" required>
                </div>
                <div id="tambahaninputan"></div>
            </div>
            <div class="row">
                <div class="col" >
                    <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                </div>
            </div>
        </form>
    @break
    @default
    <h1>TIDAK ADA APA-APA SEPERTI PERASAANNYA KEPADAKU</h1>
@endswitch
