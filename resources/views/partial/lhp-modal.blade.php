@switch(Route::current()->getName())
    @case('lhpmelting.ScanBundleIngot')
        <form enctype="multipart/form-data" onsubmit="addlotingot(event)">
            <div class="input-group mb-2 float-lg-end" style="height: 8.5vh;">
                <input type="text" name="lotingot" id="lotingot" class="form-control" placeholder="Scan Lot QR" autofocus
                    required>
                <button type="submit" id="submit" class="btn btn-secondary text-light btn-outline-secondary"><i
                        class="fa-solid fa-magnifying-glass fa-lg"></i></button>
            </div>
        </form>
    @break

    @case('lhpmelting.preparation')
        <form action="{{ url('/lhp-modal/pre-melting/save') }}" method="POST" enctype="multipart/form-data"
            onsubmit="DisabledButtomSubmit()">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control border-dark fw-bold" id="nrp" name="nrp" required>
                        <label for="nrp" class="">N R P</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control border-dark fw-bold" id="nama" name="nama" readonly
                            required>
                        <label for="nama" class="">N A M A</label>
                    </div>
                </div>
                <div class="form-tambahan" id="form-tambahan"></div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <button type="submit" id="submit" class="btn btn-primary float-end"><i
                            class="fa-regular fa-floppy-disk"></i> Save</button>
                </div>
            </div>
        </form>
        <script>
            $(document).ready(function() {
                $('#nrp').keyup(function() {
                    $('#result').html('');
                    var searchnrp = $('#nrp').val();
                    $.ajax({
                        method: "GET",
                        dataType: "json",
                        url: "{{ url('/adm/api') }}" + "/" + searchnrp,
                        success: function(data) {
                            switch (data.length) {
                                case 1:
                                    $("#nama").val(data[0].name);
                                    break;
                                default:
                                    $("#nama").val('Belum Terdaftar');
                                    break;
                            }
                        },
                        error: function(status) {
                            $("#nama").val('');
                        }
                    });
                });
            });
        </script>
    @break

    @case('lhpmelting.buttonkereta')
        <form action="{{ url('/lhp-modal/melting/save') }}" method="POST" enctype="multipart/form-data"
            onsubmit="DisabledButtomSubmit()">
            @csrf
            <div class="row">
                @foreach ($data as $kereta)
                    <div class="col-2 m-2">
                        <button type="Submit" class="btn btn-lg {{ $kereta->DB_Material->warna }} fw-bold fs-3" id="Ssubmit"
                            style="width:100%; height:100%;" name="berat_kereta"
                            value="{{ $kereta->berat }}">{{ $kereta->berat }}</button>
                    </div>
                @endforeach
            </div>
            <div class="form-tambahan" id="form-tambahan"></div>
        </form>
    @break

    @case('lhpmelting.resume')
        <div class="table-responsive">
            <table id="Table_MP" class="table table-striped-columns table-hover table-bordered nowrap display"
                style="overflow-x: scroll">
                <thead class="table-dark text-center fw-bold">
                    <tr>
                        <th nowrap class="fs-5">JAM</th>
                        <th class="fs-5">TOTAL CHARGING</th>
                        <th nowrap class="fs-5">INGOT</th>
                        <th nowrap class="fs-5">EX GATE</th>
                        <th nowrap class="fs-5">PARTS NG</th>
                        <th nowrap class="fs-5">ALM TREAT</th>
                        <th nowrap class="fs-5">OIL SCRAP</th>
                        <th nowrap class="fs-5">TAPPING</th>
                        <th nowrap class="fs-5">DROSS</th>
                    </tr>
                </thead>
                <tbody class="text-center fs-5">
                    @foreach ($data as $a)
                        <tr>
                            <td>{{ date('H', strtotime($a->jam)) }}:00</td>
                            <td>{{ $a->total_charging_rs }}</td>
                            <td>{{ $a->ingots }}</td>
                            <td>{{ $a->exgates }}</td>
                            <td>{{ $a->reject_partss }}</td>
                            <td>{{ $a->alm_treats }}</td>
                            <td>{{ $a->oil_scraps }}</td>
                            <td>{{ $a->tappings }}</td>
                            <td>{{ $a->drosss }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @break

    @case('lhpmelting.SupplyPreparation')
        <form action="{{ url('/lhp-modal/pre-meltingsupply/save') }}" method="POST" enctype="multipart/form-data"
            onsubmit="DisabledButtomSubmit()">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control border-dark fw-bold" id="nrp" name="nrp" required>
                        <label for="nrp" class="">N R P</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control border-dark fw-bold" id="nama" name="nama" readonly
                            required>
                        <label for="nama" class="">N A M A</label>
                    </div>
                </div>
                <div class="form-tambahan" id="form-tambahan"></div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <button type="submit" id="submit" class="btn btn-primary float-end"><i
                            class="fa-regular fa-floppy-disk"></i> Save</button>
                </div>
            </div>
        </form>
        <script>
            $(document).ready(function() {
                $('#nrp').keyup(function() {
                    $('#result').html('');
                    var searchnrp = $('#nrp').val();
                    $.ajax({
                        method: "GET",
                        dataType: "json",
                        url: "{{ url('/adm/api') }}" + "/" + searchnrp,
                        success: function(data) {
                            switch (data.length) {
                                case 1:
                                    $("#nama").val(data[0].name);
                                    break;
                                default:
                                    $("#nama").val('Belum Terdaftar');
                                    break;
                            }
                        },
                        error: function(status) {
                            $("#nama").val('');
                        }
                    });
                });
            });
        </script>
    @break

    @case('lhpmelting.SupplyButton')
        <div class="row justify-content-between">
            <div class="border border-danger p-2 mb-2">Anda sudah melakukan preparation dengan NRP : <span
                    class="fw-bold">3551</span>. Silahkan pilih <br> <span class="fw-bold"> "Lanjutkan"</span> untuk
                melanjutkan input supply, atau <br> <span class="fw-bold"> "Preparation"</span> Untuk melakukan pergantian NRP
                atau preparation ulang.</div>
            <div id="form-tambahan"></div>
            <div class="col-4">
                <a class="btn btn-primary"
                    onclick="Preparation_1('{{ $forklift }}','{{ $data->material }}')">Preparation</a>
            </div>
            <div class="col-4">
                <a class="btn btn-success" href="{{ url('/lhp/meltingsupply' . '/' . $forklift . '/' . $id) }}">Lanjutkan</a>
            </div>
        </div>
    @break

    @case('lhpmelting.Supplyresume')
        <div class="table-responsive">
            <table id="Table_ResumeForklift" class="table table-striped-columns table-hover table-bordered nowrap display"
                style="overflow-x: scroll">
                <thead class="table-dark text-center fw-bold">
                    <tr>
                        <th nowrap class="fs-5">JAM</th>
                        <th nowrap class="fs-5">FURNACE</th>
                        <th nowrap class="fs-5">MESIN CASTING</th>
                        <th nowrap class="fs-5">FREKUENSI SUPPLY</th>
                        <th nowrap class="fs-5">TOTAL TAPPING</th>
                    </tr>
                </thead>
                <tbody class="text-center fs-5">
                    @foreach ($data as $a)
                        <tr>
                            <td>{{ date('H', strtotime($a->jam)) }}:00</td>
                            <td>{{ $a->furnace }}</td>
                            <td>{{ $a->Mesin_Casting }}</td>
                            <td>{{ $a->frekuensi }}</td>
                            <td>{{ $a->total_tapping }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @break

    @case('lhpmelting.SupplyInput')
        <form action="{{ url('/lhp/modal-meltingsupply/save') }}" method="POST" enctype="multipart/form-data"
            onsubmit="DisabledButtomSubmit()">
            @csrf
            <div class="row">
                <div class="col-6 mb-2">
                    <div class="form-floating">
                        <input type="text" class="form-control border-dark fw-bold" id="forklift" name="forklift"
                            required readonly value="{{ $data->forklift }}">
                        <label for="forklift" class="">FORKLIFT</label>
                    </div>
                </div>
                <div class="col-6 mb-2">
                    <div class="form-floating">
                        <input type="text" class="form-control border-dark fw-bold" id="material" name="material"
                            required readonly value="{{ $data->material }}">
                        <label for="material" class="">MATERIAL</label>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="form-floating">
                        <input type="number" class="form-control border-dark fw-bold" id="berat" name="berat"
                            required value="0" min="0">
                        <label for="berat" class="">BERAT (kg)</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row"> <label for="furnace " class="ms-2">FURNACE :</label></div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-check mt-2" id="furnace" name="furnace" required focus>
                                @foreach (App\Models\DB_Furnace::all() as $item)
                                    <input type="radio" class="btn-check" name="furnace"
                                        id="furnace_{{ $loop->iteration }}" autocomplete="off"
                                        value="{{ $item->furnace }}">
                                    <label class="btn btn-outline-success fw-bold"
                                        for="furnace_{{ $loop->iteration }}">{{ $item->furnace }}</label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-tambahan" id="form-tambahan"></div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <button type="submit" id="submit" class="btn btn-primary float-end"><i
                            class="fa-regular fa-floppy-disk"></i> Save</button>
                </div>
            </div>
        </form>
    @break

    @default
        <h1>INI DEFAULTNYA</h1>
@endswitch
