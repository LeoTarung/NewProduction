@switch(Route::current()->getName())
    @case('Casting.AllSetup')
        <form action="{{ url('/prod/modal-casting/reject/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
            @csrf
            <div class="row" id="insideCOl">
                <div class="tambahaninputan" id="tambahaninputan"></div>
            </div>
            <div class="row">
                <div class="col" >
                    <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div id="tambahaninputan"></div>
        </div>
    @break
    @case('Casting.SetupMachine')
            <div class="table-responsive">
                    <button class="btn btn-success mb-2 float-end" onclick="AddMachine()"><i class="fa-solid fa-plus"></i> Machine</button>
                <table id="Table_SetupMachine" class="table table-striped-columns table-hover table-bordered display" style="overflow-x: scroll">
                    <thead>
                        <tr>
                            <th nowrap="nowrap" class="text-center" rowspan="2">LINE</th>
                            <th nowrap="nowrap" class="text-center" rowspan="2">MACHINE</th>
                            <th nowrap="nowrap" class="text-center" rowspan="2">MATERIAL</th>
                            <th nowrap="nowrap" class="text-center" rowspan="2">NAMA PART</th>
                            <th nowrap="nowrap" class="text-center" rowspan="2">DIES</th>
                            <th nowrap="nowrap" class="text-center" rowspan="2">CYCLE TIME</th>
                            <th nowrap="nowrap" class="text-center" colspan="5">STATUS</th>
                            <th nowrap="nowrap" class="text-center" rowspan="2">AKSI</th>
                        </tr>
                        <tr>
                            <th class="text-center">KANBAN</th>
                            <th class="text-center">MAN POWER</th>
                            <th class="text-center">MATERIAL</th>
                            <th class="text-center">METHODE</th>
                            <th class="text-center">MACHINE</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach ($data as $item)
                            @if ($item->kode_kanban == 0)
                                    <?php $kanban = 'LAYOFF'; $class = 'bg-secondary';?>
                                @elseif($item->kode_kanban == 1)
                                    <?php $kanban = 'RUNNING'; $class = 'bg-success';?>
                                @else
                                    <?php $kanban = 'URGENT'; $class = 'bg-danger'; ?>
                            @endif

                            @if($item->henkaten_mp == 0)
                                    <?php $henkaten_mp = 'fa-circle-check text-success' ?>
                                @elseif($item->henkaten_mp == 1)
                                    <?php $henkaten_mp = 'fa-circle-xmark text-danger' ?>
                                @else
                                    <?php $henkaten_mp = 'NONE' ?>
                            @endif

                            @if($item->henkaten_mat == 0)
                                    <?php $henkaten_mat = 'fa-circle-check text-success' ?>
                                @elseif($item->henkaten_mat == 1)
                                    <?php $henkaten_mat = 'fa-circle-xmark text-danger' ?>
                                @else
                                    <?php $henkaten_mat = 'NONE' ?>
                            @endif
                            @if($item->henkaten_met == 0)
                                    <?php $henkaten_met = 'fa-circle-check text-success' ?>
                                @elseif($item->henkaten_met == 1)
                                    <?php $henkaten_met = 'fa-circle-xmark text-danger' ?>
                                @else
                                    <?php $henkaten_met = 'NONE' ?>
                            @endif
                            @if($item->henkaten_mc == 0)
                                    <?php $henkaten_mc = 'fa-circle-check text-success' ?>
                                @elseif($item->henkaten_mc == 1)
                                    <?php $henkaten_mc = 'fa-circle-xmark text-danger' ?>
                                @else
                                    <?php $henkaten_mc = 'NONE' ?>
                            @endif
                            <tr>
                                <td class="text-center">{{ $item->line }}</td>
                                <td class="text-center">{{ $item->mc }}</td>
                                <td class="text-center"><i class="badge {{  $item->DB_Material->warna }} fs-6">{{ $item->DB_Material->initial }}</i></td>
                                <td class="text-center">{{ $item->DB_Namapart->nama_part }}</td>
                                <td class="text-center">{{ $item->nomor_dies }}</td>
                                <td class="text-center">{{ $item->cycle_time }} S</td>
                                <td class="text-center"><i class="badge {{ $class }} fs-6">{{ $kanban }}</i> </td>
                                <td class="text-center"><i class="fa-solid {{ $henkaten_mp }} fa-2x"></i> </td>
                                <td class="text-center"><i class="fa-solid {{ $henkaten_mat }} fa-2x"></i></td>
                                <td class="text-center"><i class="fa-solid {{ $henkaten_met }} fa-2x"></i></td>
                                <td class="text-center"><i class="fa-solid {{ $henkaten_mc }} fa-2x"></i></td>
                                <td class="text-center"><a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="editSetupMachine('{{ $item->mc }}')"></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <script>
                $(document).ready(function () {
                    $("#Table_SetupMachine").DataTable();
                });
            </script>
    @break
    @case('Casting.AddSetupMachine')
        <form action="{{ url('/modal/addmachine/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="col-12 mb-3">
                        <label for="line">LINE <sup>*</sup></label>
                        <select class="form-select" id="line" name="line" required>
                            <option value="">Open this select menu</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="mc">NO MC <sup>*</sup></label>
                        <input type="number" class="form-control" name="mc" id="mc" aria-describedby="mcHelp" min="0" value="0" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="material">MATERIAL <sup>*</sup></label>
                        <select class="form-select fw-bold" id="material" name="material" required>
                            <option value="">Open this select menu</option>
                            @foreach (App\Models\DB_Material::all(); as $item)
                                <option value="{{ $item->id }}">{{ $item->initial }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="nama_part">NAMA PART <sup>*</sup></label>
                        <select class="form-select" id="db_namapart_id" name="db_namapart_id" required>
                            <option value="">Open this select menu</option>
                            @foreach ($data as $item)
                                <option class="dropdown-item form-control" value="{{ $item->id }}" >{{ $item->nama_part }}</option>
                            @endforeach
                        </select>
                        <script>
                            $(document).ready(function() {
                                $("#db_namapart_id").select2({
                                    dropdownParent: $("#staticBackdrop")
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-3 mb-3">
                            <label for="no_dies">NO DIES <sup>*</sup></label>
                            <input type="text" class="form-control" name="dies_sample" id="dies_sample" aria-describedby="no_dies_sampleHelp" min="0"  value="0" required>
                            <script>
                            $("#db_namapart_id").on('change', function() {
                                var dies_sample = 0
                                $("#dies_sample").val(0);
                                var namas = $(this).find(":selected").text()
                                    $("#dies_sample" ).on( "keyup", function() {
                                        var dies_samplee = $("#dies_sample").val();
                                        var gabung = namas+"#"+dies_samplee
                                        $("#dies").val(gabung);
                                    });
                                var gabung = namas+"#"+dies_sample
                                $("#dies").val(gabung);
                            });



                            </script>
                        </div>
                        <div class="col-9 mt-4">
                            <input type="text" class="form-control"  name="dies" id="dies" aria-describedby="no_diesHelp" required readonly>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="cycle_time">CYCLE TIME (S) <sup>*</sup></label>
                            <input type="number" class="form-control" name="cycle_time" id="cycle_time" aria-describedby="cycle_timeHelp" min="0" value="0" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="kode_kanban">KANBAN <sup>*</sup></label>
                            <select class="form-select" id="kode_kanban" name="kode_kanban" required>
                                <option value="">Open this select menu</option>
                                <option value="0">LAYOFF</option>
                                <option value="1">RUNNING</option>
                                <option value="2">URGENT</option>
                            </select>
                        </div>
                        <div class="tambahaninputan" id="tambahaninputan"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col" >
                    <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                </div>
            </div>
        </form>
    @break
    @case('Casting.DataHenkaten')
        <div class="row">
            <div class="col">
                <button class="btn btn-success mb-2 float-end" onclick="AddHenkaten()"><i class="fa-solid fa-plus"></i> Henkaten</button>
            </div>
        </div>
        <div class="table-responsive">
        <table id="Table_henkaten" class="table table-striped-columns table-hover table-bordered nowrap display" style="overflow-x: scroll">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>TANGGAL</th>
                    <th>SHIFT</th>
                    <th>JENIS HENKATEN</th>
                    <th>FURNACE</th>
                    <th>STATUS</th>
                    <th nowrap="nowrap" class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $henkaten)
                    @if ($henkaten->status == 'open')
                    <?php $warna = 'bg-warning' ?>
                    @elseif($henkaten->status == 'close')
                    <?php $warna = 'bg-light' ?>
                    @endif
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{date('d F Y', strtotime($henkaten->created_at))}}</td>
                        <td>{{ $henkaten->shift }}</td>
                        <td>{{ $henkaten->jenis_henkaten }}</td>
                        <td>{{ $henkaten->mesin }}</td>
                        <td class="text-center fw-bold fs-5 text-uppercase {{ $warna }}">{{ $henkaten->status }}</td>
                        <td class="text-center"><a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="edithenkaten('{{ $henkaten->id }}')"></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            $(document).ready(function () {
                $("#Table_henkaten").DataTable();
            });
        </script>
    @break
    @case('Casting.SetupHenkaten')
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
            <button class="nav-link active" id="MAN" onclick="addhenkaten('MAN')" data-bs-toggle="pill" data-bs-target="#pills-man" type="button" role="tab" aria-controls="pills-man" aria-selected="true"><i class="fa-solid fa-person"></i> MAN</button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link" id="MACHINE" onclick="addhenkaten('MACHINE')" data-bs-toggle="pill" data-bs-target="#pills-machine" type="button" role="tab" aria-controls="pills-machine" aria-selected="false"><i class="fa-solid fa-gear"></i> MACHINE</button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link" id="MATERIAL" onclick="addhenkaten('MATERIAL')" data-bs-toggle="pill" data-bs-target="#pills-material" type="button" role="tab" aria-controls="pills-material" aria-selected="false"><i class="fa-solid fa-boxes-stacked"></i> MATERIAL</button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link" id="METHODE" onclick="addhenkaten('METHODE')" data-bs-toggle="pill" data-bs-target="#pills-methode" type="button" role="tab" aria-controls="pills-methode" aria-selected="false" ><i class="fa-solid fa-recycle"></i> METHODE</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <form action="{{ url('/modal/henkatencasting/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
                @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="machine">Machine <sup>*</sup></label>
                                    <select class="form-control mt-1" name="machine" id="machine" required>
                                        <option class="dropdown-item form-control" selected disabled>-- Pilih Machine --</option>
                                        @foreach ($data as $item)
                                        <option class="dropdown-item form-control" value="MC-{{ $item->mc }}" >MC-{{ $item->mc }}</option>
                                        @endforeach
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $("#machine").select2({
                                                dropdownParent: $("#staticBackdrop")
                                            });
                                        });
                                    </script>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi<sup>*</sup></label>
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="2" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="problem" class="form-label">Problem<sup>*</sup></label>
                                    <textarea name="problem" id="problem" cols="30" rows="2" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="countermeasure" class="form-label">Countermeasure<sup>*</sup></label>
                                    <textarea name="countermeasure" id="countermeasure" cols="30" rows="3" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="status">Status <sup>*</sup></label>
                                    <div class="switch-field">
                                        <input type="radio" id="status_open" name="status" value="open" checked/>
                                        <label for="status_open">OPEN</label>
                                        <input type="radio" id="status_close" name="status" value="close" />
                                        <label for="status_close">CLOSE</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="Plan">Plan <sup>*</sup></label>
                                    <div class="switch-field" >
                                        <input type="radio" id="plan_yes" name="plan" value="yes" checked/>
                                        <label for="plan_yes">PLANNED</label>
                                        <input type="radio" id="plan_no" name="plan" value="no" />
                                        <label for="plan_no">UNPLANNED</label>
                                    </div>
                                </div>

                                <div class="form-tambahan" id="form-tambahan">
                                    <input type="hidden" name="jenis_henkaten" value="MAN">
                                    <div class="mb-3">
                                        <label for="safety">Safety <sup>*</sup></label>
                                        <div class="switch-field">
                                            <input type="radio" id="safety_yes" name="safety" value="yes" checked/>
                                            <label for="safety_yes">SAFETY</label>
                                            <input type="radio" id="safety_no" name="safety" value="no" />
                                            <label for="safety_no">UNSAFETY</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kakotora">Kakotora <sup>*</sup></label>
                                        <div class="switch-field">
                                            <input type="radio" id="kakotora_yes" name="kakotora" value="yes" checked/>
                                            <label for="kakotora_yes">YA</label>
                                            <input type="radio" id="kakotora_no" name="kakotora" value="no" />
                                            <label for="kakotora_no">TIDAK</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="job_setup">Job_setup <sup>*</sup></label>
                                        <div class="switch-field">
                                            <input type="radio" id="job_setup_yes" name="job_setup" value="yes" checked/>
                                            <label for="job_setup_yes">SUDAH</label>
                                            <input type="radio" id="job_setup_no" name="job_setup" value="no" />
                                            <label for="job_setup_no">BELUM</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="wi_proses">WI proses & IK Check 100% <sup>*</sup></label>
                                        <div class="switch-field">
                                            <input type="radio" id="wi_proses_yes" name="wi_proses" value="yes" checked/>
                                        <label for="wi_proses_yes">SUDAH</label>
                                            <input type="radio" id="wi_proses_no" name="wi_proses" value="no" />
                                            <label for="wi_proses_no">BELUM</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-tambahan1" id="form-tambahan1">
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col" >
                        <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
    @break
    @case('Casting.RejectionCasting')
        <div class="table-responsive">
            <button class="btn btn-warning mb-2 float-end" onclick="AddRejection()"><i class="fa-solid fa-pen-to-square"></i> Rejection</button>
        <table id="Table_Rejection" class="table table-striped-columns table-hover table-bordered display w-100" style="overflow-x: scroll">
            <thead>
            <tr>
                <th>NO</th>
                <th>JENIS REJECTION</th>
            </tr>
            </thead>
        </table>
        </div>
        <script>
            $(function () {
                var table = $('#Table_Rejection').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url('/prod/modal-casting/Rejection/data') }}",
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        {data: 'jenis_reject', name: 'jenis_reject'},
                    ],
                });
            });
        </script>
    @break
    @case('Casting.DowntimeCasting')
        <div class="table-responsive">
            <button class="btn btn-warning mb-2 float-end" onclick="AddDowntime()"><i class="fa-solid fa-pen-to-square"></i> Downtime</button>
        <table id="Table_Downtime" class="table table-striped-columns table-hover table-bordered display w-100" style="overflow-x: scroll">
            <thead>
               <tr>
                <th>NO</th>
                <th>KATEGORI</th>
                <th>NAMA DOWNTIME</th>
               </tr>
            </thead>
        </table>
        </div>
        <script>
            $(function () {
                var table = $('#Table_Downtime').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url('/prod/modal-casting/downtime/data') }}",
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        {data: 'kategori', name: 'kategori'},
                        {data: 'jenis_downtime', name: 'jenis_downtime'},
                    ],
                    "columnDefs": [
                        { className: "text-uppercase", "targets": [ 1 ] }
                    ]
                });
            });
        </script>
    @break
    @default
@endswitch
