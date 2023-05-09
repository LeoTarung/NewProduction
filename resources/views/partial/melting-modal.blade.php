@switch(Route::current()->getName())
        {{-- SETUP LEVEL MOLTEN --}}
    @case('Melting.ModalLevelMolten')
            <h1>THIS IS MODAL FOR LEVEL MOLTEN</h1>
        @break

        {{-- SETUP FURNACE --}}
    @case('Melting.ModalAddFurnace')
            <form action="{{ url('/modal/addFurnace/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
                @csrf
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="name">FURNACE <sup>*</sup></label>
                        <input type="text" class="form-control" name="furnace" id="furnace" aria-describedby="furnaceHelp">
                        <div id="furnaceHelp" class="form-text">* Harap Menggunakan Huruf Kapital</div>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="material" class="">MATERIAL <sup>*</sup></label>
                        <select class="form-select fw-bold" id="material" name="material" required>
                            <option value="" selected disabled>Open this select menu</option>
                            <option value="AC2B">AC2B</option>
                            <option value="AC4B">AC4B</option>
                            <option value="AC4CH">AC4CH</option>
                            <option value="AC2BF">AC2BF</option>
                            <option value="ADC12">ADC12</option>
                            <option value="HD-2">HD-2</option>
                            <option value="HD-4">HD-4</option>
                            <option value="YH3R">YH3R</option>

                        </select>
                    </div>
                    <div class="tambahaninputan" id="tambahaninputan"></div>
                </div>
                <div class="row">
                    <div class="col" >
                        <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                    </div>
                </div>
            </form>
        @break
    @case('Melting.DataFurnace')
            <div class="row">
                <div class="col ">
                <button class="btn btn-success mb-2 float-end" onclick="addFurnace()"><i class="fa-solid fa-plus"></i> Furnace</button>
                </div>
            </div>
            <div class="table-responsive">
                <table id="Table_Furnace" class="table table-striped-columns table-hover table-bordered nowrap display" style="overflow-x: scroll">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>FURNACE</th>
                            <th>MATERIAL</th>
                            <th>COLOR</th>
                            <th nowrap="nowrap" class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $furnace)
                            @if ($furnace->material == 'AC2B')
                            <?php $warna = 'bg-orange' ?>
                            @elseif($furnace->material == 'AC4B')
                            <?php $warna = 'bg-ungu' ?>
                            @elseif($furnace->material == 'AC4CH')
                            <?php $warna = 'text-dark' ?>
                            @elseif($furnace->material == 'AC2BF')
                            <?php $warna = 'bg-merahBata' ?>
                            @elseif($furnace->material == 'ADC12')
                            <?php $warna = 'bg-silver' ?>
                            @elseif($furnace->material == 'HD-2')
                            <?php $warna = 'text-warning' ?>
                            @elseif($furnace->material == 'HD-4')
                            <?php $warna = 'text-primary' ?>
                            @elseif($furnace->material == 'YH3R')
                            <?php $warna = 'text-success' ?>
                            @endif
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $furnace->furnace }}</td>
                            <td>{{ $furnace->material }}</td>
                            <td class="text-center"><i class="fa-solid fa-square fa-2x {{ $warna }}"></i></td>
                            <td class="text-center"><a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="editFurnace('{{ $furnace->id }}')"></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    $(document).ready(function () {
                    $("#Table_Furnace").DataTable();
                    });
                </script>
            </div>
        @break

        {{-- SETUP KERETA --}}
    @case('Melting.ModalAddKereta')
            <form action="{{ url('/modal/addKereta/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="col-12 mb-3">
                            <label for="material" class="">MATERIAL <sup>*</sup></label>
                            <select class="form-select fw-bold" id="material" name="material" required>
                                <option value="" selected disabled>Open this select menu</option>
                                <option value="AC2B">AC2B</option>
                                <option value="AC4B">AC4B</option>
                                <option value="AC4CH">AC4CH</option>
                                <option value="AC2BF">AC2BF</option>
                                <option value="ADC12">ADC12</option>
                                <option value="HD-2">HD-2</option>
                                <option value="HD-4">HD-4</option>
                                <option value="YH3R">YH3R</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="name">NO KERETA <sup>*</sup></label>
                            <input type="number" class="form-control" name="no_kereta" id="no_kereta" aria-describedby="no_keretaHelp">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-12 mb-3">
                            <label for="name">WEIGHT <sup>*</sup></label>
                            <input type="number" class="form-control" name="berat" id="berat" aria-describedby="beratHelp">
                            <div id="berat" class="form-text">* Harap Menggunakan Satuan (KG)</div>
                        </div>
                        <div class="tambahaninputan" id="tambahaninputan"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" >
                        <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                    </div>
                </div>
            </form>
        @break
    @case('Melting.DataKereta')
            <div class="row">
                <div class="col">
                    <button class="btn btn-success mb-2 float-end" onclick="addKereta()"><i class="fa-solid fa-plus"></i> Kereta Charging</button>
                </div>
            </div>
            <div class="table-responsive">
                <table id="Table_Kereta" class="table table-striped-columns table-hover table-bordered nowrap display" style="overflow-x: scroll">
                    <thead>
                        <tr>
                            <th>MATERIAL</th>
                            <th>NO KERETA</th>
                            <th>WEIGHT (KG)</th>
                            <th>COLOR</th>
                            <th nowrap="nowrap" class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $kereta)
                            @if ($kereta->material == 'AC2B')
                            <?php $warna = 'bg-orange' ?>
                            @elseif($kereta->material == 'AC4B')
                            <?php $warna = 'bg-ungu' ?>
                            @elseif($kereta->material == 'AC4CH')
                            <?php $warna = 'text-dark' ?>
                            @elseif($kereta->material == 'AC2BF')
                            <?php $warna = 'bg-merahBata' ?>
                            @elseif($kereta->material == 'ADC12')
                            <?php $warna = 'bg-silver' ?>
                            @elseif($kereta->material == 'HD-2')
                            <?php $warna = 'text-warning' ?>
                            @elseif($kereta->material == 'HD-4')
                            <?php $warna = 'text-primary' ?>
                            @elseif($kereta->material == 'YH3R')
                            <?php $warna = 'text-success' ?>
                            @endif
                        <tr>
                            <td>{{ $kereta->material }}</td>
                            <td>{{ $kereta->no_kereta }}</td>
                            <td>{{ $kereta->berat }}</td>
                            <td class="text-center"><i class="fa-solid fa-square fa-2x {{ $warna }}"></i></td>
                            <td class="text-center"><a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="editkereta('{{ $kereta->id }}')"></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    $(document).ready(function () {
                    $("#Table_Kereta").DataTable();
                    });
                </script>
            </div>
        @break

        {{-- SETUP HENKATEN--}}
    @case('Melting.ModalAddHenkaten')
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
                <form action="{{ url('/modal/henkatenMelting/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
                    @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="furnace">Furnace <sup>*</sup></label>
                                        <select class="form-control mt-1" name="furnace" id="furnace" required>
                                            <option class="dropdown-item form-control" selected disabled>-- Pilih Furnace --</option>
                                            @foreach (App\Models\DB_Furnace::all(); as $item)
                                            <option class="dropdown-item form-control" value="{{ $item->furnace }}" >{{ $item->furnace }}</option>
                                            @endforeach
                                        </select>
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
    @case('Melting.DataHenkaten')
            <div class="row">
                <div class="col">
                    <button class="btn btn-success mb-2 float-end" onclick="menuHenkaten()"><i class="fa-solid fa-plus"></i> Henkaten</button>
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
                            <td>{{ $henkaten->furnace }}</td>
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

        {{-- SETUP LOT INGOT BUNDLE--}}
    @case('Melting.AddLotIngot')
            <form action="{{ url('/modal/addLotIngot/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="col-12 mb-3">
                            <label for="name">Nama Vendor <sup>*</sup></label>
                            <input type="text" class="form-control" name="nama_vendor" id="nama_vendor" required readonly>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="name">Material <sup>*</sup></label>
                            <input type="text" class="form-control" name="material" id="material" required readonly>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="name">Penyimpanan Bundle <sup>*</sup></label>
                            <input type="number" class="form-control" name="penyimpanan_bundle" id="penyimpanan_bundle" required readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-12 mb-3">
                            <label for="name">Berat Bundle <sup>*</sup></label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="berat_bundle" id="berat_bundle" required readonly>
                                <a class="btn btn-outline-secondary fw-bold" type="button" >KG</a>
                            </div>

                        </div>
                        <div class="col-12 mb-3">
                            <label for="name">Lot Produksi Bundle <sup>*</sup></label>
                            <input type="date" class="form-control" name="lot_ingot" id="lot_ingot" required>
                        </div>
                        <p class="text-center"> <span class=" text-danger fw-bold">!!! PERINGATAN !!!</span> <br> Harap Pastikan Semua Kolom Terisi Dan Sesuai</p>
                    </div>
                </div>
                <div class="row">
                    <div class="tambahaninputan" id="tambahaninputan"></div>
                    <div class="col" >
                        <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                    </div>
                </div>

            </form>
        @break

        {{-- SETUP DETAIL LHP MELTING--}}
    @case('Melting.DataLhpMeltingRAW')
            <div class="table-responsive">
                <table id="Table_detailLhp" class="table table-striped-columns table-hover table-bordered display" style="overflow-x: scroll">
                    <thead>
                        <tr>
                            <th class="text-center">JAM</th>
                            <th class="text-center">INGOT</th>
                            <th class="text-center">EXGATE</th>
                            <th class="text-center">PARTS NG</th>
                            <th class="text-center">ALM TREAT</th>
                            <th class="text-center">FLUXING</th>
                            <th class="text-center">TAPPING</th>
                            <th class="text-center">DROSS</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
            <script>
                $(document).ready(function () {
                    $("#Table_detailLhp").DataTable();
                });
            </script>
        @break
    @case('Melting.EditLhpMeltingRAW')
            <form action="{{ url('/modal/edit-detail-lhp/update') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="ingot">INGOT <sup>*</sup></label>
                                <input type="text" class="form-control" value="" name="ingot" id="ingot" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="reject_parts">PARTS NG <sup>*</sup></label>
                                <input type="text" class="form-control" value="" name="reject_parts" id="reject_parts" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="tapping">TAPPING <sup>*</sup></label>
                                <input type="text" class="form-control" value="" name="tapping" id="tapping" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="alm_treat">ALM TREAT <sup>*</sup></label>
                                <input type="text" class="form-control" value="" name="alm_treat" id="alm_treat" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="fluxing">FLUXING <sup>*</sup></label>
                                <input type="text" class="form-control" value="" name="fluxing" id="fluxing" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="dross">DROSS <sup>*</sup></label>
                                <input type="text" class="form-control" value="" name="dross" id="dross" required>
                            </div>
                            <div class="col-12 mb-3">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="tambahaninputan" id="tambahaninputan"></div>
                    <div class="col" >
                        <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                    </div>
                </div>
            </form>
        @break
        {{-- SETUP --}}
    {{-- @case()
        @break --}}
    @default

@endswitch
