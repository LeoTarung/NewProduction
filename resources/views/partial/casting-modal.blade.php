@switch(Route::current()->getName())
    @case('Casting.SetupMachine')
            <div class="table-responsive">
                    <button class="btn btn-success mb-2 float-end" onclick="AddMachine()"><i class="fa-solid fa-plus"></i> MACHINE CASTING</button>
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
    @case('Casting.SetupHenkaten')
            <h1>SETUP FOR HENKATEN</h1>
    @break
    @default
@endswitch
