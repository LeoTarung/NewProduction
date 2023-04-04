{{-- tambah mainpower --}}
@if ( Request::url() == url('/modal/mpadd') )
    <form action="{{ url('/modal/mpadd/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="col-12 mb-3">
                    <label for="name">NRP <sup>*</sup></label>
                    <input type="number" class="form-control" value="" name="nrp" id="nrp" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="name">NAMA <sup>*</sup></label>
                    <input type="text" class="form-control" value="" name="name" id="name" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="seksi">SEKSI <sup>*</sup></label>
                        <select class="form-control" name="seksi" id="seksi">
                            <option class="dropdown-item form-control" value="" selected>-- Pilih Seksi --</option>
                            <option class="dropdown-item form-control" value="" ></option>
                            <option class="dropdown-item form-control" value="Account Executive">Account Executive</option>
                            <option class="dropdown-item form-control" value="Assembling">Assembling</option>
                            <option class="dropdown-item form-control" value="Budget - Asset">Budget - Asset</option>
                            <option class="dropdown-item form-control" value="CASTING GDC">CASTING GDC</option>
                            <option class="dropdown-item form-control" value="CASTING HPDC">CASTING HPDC</option>
                            <option class="dropdown-item form-control" value="Cost - G/L">Cost - G/L</option>
                            <option class="dropdown-item form-control" value="Dies Making">Dies Making</option>
                            <option class="dropdown-item form-control" value="Dies, JIG, Tools - Fixtures (DJTF)">Dies, JIG, Tools - Fixtures (DJTF)</option>
                            <option class="dropdown-item form-control" value="Digitalization">Digitalization</option>
                            <option class="dropdown-item form-control" value="ER, IR, SSR - CSR">ER, IR, SSR - CSR</option>
                            <option class="dropdown-item form-control" value="Expert">Expert</option>
                            <option class="dropdown-item form-control" value="Finishing - Repair">Finishing - Repair</option>
                            <option class="dropdown-item form-control" value="General Affair">General Affair</option>
                            <option class="dropdown-item form-control" value="Gravity">Gravity</option>
                            <option class="dropdown-item form-control" value="HRD">HRD</option>
                            <option class="dropdown-item form-control" value="Kaizen">Kaizen</option>
                            <option class="dropdown-item form-control" value="Machining ">Machining </option>
                            <option class="dropdown-item form-control" value="Maintenance Casting">Maintenance Casting</option>
                            <option class="dropdown-item form-control" value="Maintenance Machining">Maintenance Machining</option>
                            <option class="dropdown-item form-control" value="Maintenance Utility">Maintenance Utility</option>
                            <option class="dropdown-item form-control" value="Melting - Induction">Melting - Induction</option>
                            <option class="dropdown-item form-control" value="Painting">Painting</option>
                            <option class="dropdown-item form-control" value="PDCA - Pandemic">PDCA - Pandemic</option>
                            <option class="dropdown-item form-control" value="PE Machining">PE Machining</option>
                            <option class="dropdown-item form-control" value="PE Melting - Casting">PE Melting - Casting</option>
                            <option class="dropdown-item form-control" value="PE Painting - System Support">PE Painting - System Support</option>
                            <option class="dropdown-item form-control" value="PPC">PPC</option>
                            <option class="dropdown-item form-control" value="Product Development">Product Development</option>
                            <option class="dropdown-item form-control" value="Production Eng. Support">Production Eng. Support</option>
                            <option class="dropdown-item form-control" value="Production Support">Production Support</option>
                            <option class="dropdown-item form-control" value="Proses Development">Proses Development</option>
                            <option class="dropdown-item form-control" value="Purchase - Exim">Purchase - Exim</option>
                            <option class="dropdown-item form-control" value="Purchasing Engineering">Purchasing Engineering</option>
                            <option class="dropdown-item form-control" value="Quality Claim">Quality Claim</option>
                            <option class="dropdown-item form-control" value="Quality Control">Quality Control</option>
                            <option class="dropdown-item form-control" value="Quality Inspection">Quality Inspection</option>
                            <option class="dropdown-item form-control" value="Quality Technical">Quality Technical</option>
                            <option class="dropdown-item form-control" value="SAP Enchancement">SAP Enchancement</option>
                            <option class="dropdown-item form-control" value="Section Head Marketing Development">Section Head Marketing Development</option>
                            <option class="dropdown-item form-control" value="SHE">SHE</option>
                            <option class="dropdown-item form-control" value="Shipping">Shipping</option>
                            <option class="dropdown-item form-control" value="Subcont Control - Dev">Subcont Control - Dev</option>
                            <option class="dropdown-item form-control" value="TQM">TQM</option>
                            <option class="dropdown-item form-control" value="Vendor Control - Development">Vendor Control - Development</option>
                            <option class="dropdown-item form-control" value="Warehouse">Warehouse</option>
                        </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="departemen">DEPARTEMEN <sup>*</sup></label>
                    <select class="form-control" name="departemen"  id="departemen">
                        <option class="dropdown-item form-control" value="" selected>-- Pilih Departemen --</option>
                        <option class="dropdown-item form-control" value="" ></option>
                        <option class="dropdown-item form-control" value="Cost - Budget" >Cost - Budget</option>
                        <option class="dropdown-item form-control" value="DIES" >DIES</option>
                        <option class="dropdown-item form-control" value="Expert" >Expert</option>
                        <option class="dropdown-item form-control" value="HC - GA" >HC - GA</option>
                        <option class="dropdown-item form-control" value="Kaizen - TQM" >Kaizen - TQM</option>
                        <option class="dropdown-item form-control" value="Maintenance - SHE" >Maintenance - SHE</option>
                        <option class="dropdown-item form-control" value="Marketing" >Marketing</option>
                        <option class="dropdown-item form-control" value="PDCA - Pandemic" >PDCA - Pandemic</option>
                        <option class="dropdown-item form-control" value="PPIC" >PPIC</option>
                        <option class="dropdown-item form-control" value="Procurement" >Procurement</option>
                        <option class="dropdown-item form-control" value="Produksi 1" >Produksi 1</option>
                        <option class="dropdown-item form-control" value="Produksi 2" >Produksi 2</option>
                        <option class="dropdown-item form-control" value="Process Engineering" >Process Engineering</option>
                        <option class="dropdown-item form-control" value="Product Engineering" >Product Engineering</option>
                        <option class="dropdown-item form-control" value="Quality Assurance" >Quality Assurance</option>
                        <option class="dropdown-item form-control" value="SAP Enchancement" >SAP Enchancement</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="divisi">DIVISI <sup>*</sup></label>
                    <select class="form-control" name="divisi" id="divisi">
                        <option class="dropdown-item form-control" value="" selected >-- Pilih Divisi --</option>
                        <option class="dropdown-item form-control" value="" ></option>
                        <option class="dropdown-item form-control" value="Administration">Administration</option>
                        <option class="dropdown-item form-control" value="Engineering">Engineering</option>
                        <option class="dropdown-item form-control" value="Nusametal">Nusametal</option>
                        <option class="dropdown-item form-control" value="Plant">Plant</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="col-12 mb-3" id="DivPassword">
                    <label for="password" class="form-label">Password <sup>*</sup></label>
                    <input type="password" name="password" class="form-control" id="password" aria-describedby="password" required>
                    <div class="form-group">
                        <input class="form-label" type="checkbox" onclick="SeePassword()">
                        <label class="form-label" for="show">Show Password</label>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="email">EMAIL <sup>*</sup></label>
                    <input type="text" class="form-control" name="email" id="email" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="role">LEVEL <sup>*</sup></label>
                    <select class="form-control" name="role" id="role" required>
                        <option class="dropdown-item form-control" value="1" selected>Lv-1</option>
                        <option class="dropdown-item form-control" value="2">Lv-2</option>
                        <option class="dropdown-item form-control" value="3">Lv-3</option>
                        <option class="dropdown-item form-control" value="4">Lv-4</option>
                        <option class="dropdown-item form-control" value="5">Lv-5</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="status">STATUS <sup>*</sup></label>
                    <select class="form-control" name="status" id="status" required>
                        <option class="dropdown-item form-control" name="status" value="ENABLED" selected>ENABLED</option>
                        <option class="dropdown-item form-control" name="status" value="DISABLED">DISABLED</option>
                    </select>
                </div>
                <div class="tambahanEmployee" id="tambahanEmployee"></div>
            </div>
        </div>
        <div class="row">
            <div class="col" >
                <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
            </div>
        </div>
    </form>

{{-- Rubah Password --}}
@elseif (Request::url() == url('/modal/ChangePassword'))
    <form action="{{ url('/modal/ChangePassword/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="col-12 mb-3">
                    <label for="name">NRP</label>
                    <input type="number" class="form-control" value="" name="nrp" id="nrp" disabled readonly>
                </div>
                <div class="col-12 mb-3">
                    <label for="name">NAMA</label>
                    <input type="text" class="form-control" value="" name="name" id="name" disabled readonly>
                </div>
            </div>
            <div class="col-6">
                <div class="col-12 mb-3" id="DivPassword">
                    <label for="password" class="form-label">Password <sup>*</sup></label>
                    <input type="password" name="password" class="form-control" id="password" aria-describedby="password" required>
                </div>
                <div class="col-12 mb-3" id="DivPassword">
                    <label for="password" class="form-label">Confirm Password <sup>*</sup></label>
                    <input type="password" name="password1" class="form-control" id="password1" aria-describedby="password" required>
                </div>
                <div class="col-12 mb-3" id="DivPassword">
                    <div class="form-group">
                        <input class="form-label" type="checkbox" onclick="SeePassword()">
                        <label class="form-label" for="show">Show Password</label>
                    </div>
                </div>
                <div class="tambahanchangePassword" id="tambahanchangePassword"></div>
            </div>
        </div>
        <div class="row">
            <div class="col" >
                <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
            </div>
        </div>
    </form>
{{-- Henkaten Melting  --}}
@elseif (Request::url() == url('/modal/henkatenMelting'))
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
@elseif (Request::url() == url('/modal/addhenkatenMelting'))
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


{{-- Mesin Furnace Melting  --}}
@elseif (Request::url() == url('/modal/furnaceMelting'))
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

@elseif (Request::url() == url('/modal/addFurnace'))
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

{{-- Level Molten Melting  --}}
@elseif (Request::url() == url('/modal/levelmoltenMelting'))
 <p>THIS IS levelmoltenMelting</p>


{{-- Setup Kereta charging Melting  --}}
@elseif (Request::url() == url('/modal/keretaMelting'))
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

@elseif (Request::url() == url('/modal/addKereta'))
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
{{-- CALENDER OF EVENT  --}}
@elseif (Request::url() == url('/modal/calenderEvent'))
<form action="{{ url('/modal/calenderEvent/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
    @csrf
    <div class="row">
         <div class="col-6">
            <div class="col-12 mb-3">
                <label for="group" class="">Group <sup>*</sup></label>
                <select class="form-select fw-bold" id="group" name="group" required>
                    <option value="" selected disabled>Open this select menu</option>
                    <option value="pdca">PDCA</option>
                    <option value="quality">Quality</option>
                    <option value="plant">Plant</option>
                </select>
            </div>
            <div class="col-12 mb-3">
                <label for="judul">Agenda <sup>*</sup></label>
                <input type="text" class="form-control" name="judul" id="judul" aria-describedby="judulHelp">
            </div>
            <div class="col-12 mb-3">
                <label for="tanggal">Tanggal <sup>*</sup></label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" aria-describedby="tanggalHelp">
            </div>
            <div class="col-12 mb-3">
                <label for="mulai">Mulai <sup>*</sup></label>
                <input type="time" class="form-control" name="mulai" id="mulai" aria-describedby="mulaiHelp">
            </div>
            <div class="col-12 mb-3">
                <label for="selesai">Selesai <sup>*</sup></label>
                <input type="time" class="form-control" name="selesai" id="selesai" aria-describedby="selesaiHelp">
            </div>
         </div>
         <div class="col-6">
            <div class="col-12 mb-3">
                <label for="pic">PIC <sup>*</sup></label>
                <input type="text" class="form-control" name="pic" id="pic" aria-describedby="picHelp">
            </div>
            <div class="col-12 mb-3">
                <label for="location">Location <sup>*</sup></label>
                <input type="text" class="form-control" name="location" id="location" aria-describedby="locationHelp">
            </div>
            <div class="col-12 mb-3">
                <label for="type" class="">Type Meeting <sup>*</sup></label>
                <select class="form-select fw-bold" id="type" name="type" required>
                    <option value="" selected disabled>Open this select menu</option>
                    <option value="internal">Meeting Internal</option>
                    <option value="external">Meeting External</option>
                </select>
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
{{-- BAD NEWS FIRST  --}}
@elseif (Request::url() == url('/modal/bnfQuality'))
<form action="{{ url('/modal/bnfQuality/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
    @csrf
    <div class="row">
         <div class="col-8 bg-silver text-dark">
            <div class="row">
                <div class="col-3 mb-3">
                    <label for="tanggal" class="fw-bold">Tanggal <sup>*</sup></label>
                    <input type="date"  name="tanggal" id="tanggal" aria-describedby="tanggalHelp" required>
                </div>
                <div class="col-4 mb-3">
                    <label class="fw-bold" for="customer" class="">Customer <sup>*</sup></label>
                    <select class="form-select fw-bold" id="nama_customer" name="nama_customer" required>
                        <option value="ADM">ADM</option>
                        <option value="AHM P1">AHM P1</option>
                        <option value="AHM P2">AHM P2</option>
                        <option value="AHM P3">AHM P3</option>
                        <option value="AHM P4">AHM P4</option>
                        <option value="AHM P5">AHM P5</option>
                        <option value="AHM REM">AHM REM</option>
                        <option value="AISIN">AISIN</option>
                        <option value="ASPIRA">ASPIRA</option>
                        <option value="CAI">CAI</option>
                        <option value="DENSO">DENSO</option>
                        <option value="DNP">DNP</option>
                        <option value="HINO">HINO</option>
                        <option value="HPM">HPM</option>
                        <option value="IGP">IGP</option>
                        <option value="J-TEKT">J-TEKT</option>
                        <option value="KAWASAKI">KAWASAKI</option>
                        <option value="KUBOTA">KUBOTA</option>
                        <option value="KAYABA">KAYABA</option>
                        <option value="MHASK">MHASK</option>
                        <option value="MII">MII</option>
                        <option value="MKM">MKM</option>
                        <option value="NISSAN">NISSAN</option>
                        <option value="NKI">NKI</option>
                        <option value="OKAMOTO">OKAMOTO</option>
                        <option value="SUZUKI">SUZUKI</option>
                        <option value="SKC">SKC</option>
                        <option value="TMMIN">TMMIN</option>
                        <option value="TOYODA GOSAI">TOYODA GOSAI</option>
                        <option value="YAMAHA">YAMAHA</option>
                        <option value="YUTAKA">YUTAKA</option>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#nama_customer").select2({
                                dropdownParent: $("#staticBackdrop")
                            });
                        });
                    </script>
                </div>
                <div class="col-5 mb-3">
                    <label class="fw-bold" for="nama_part" class="">Nama Part <sup>*</sup></label>
                    <select class="form-select fw-bold" id="nama_part" name="nama_part" required>
                        <option value="BASE STATOR ASSY K0WA (FG)">BASE STATOR ASSY K0WA (FG)</option>
                        <option value="BASE STATOR ASSY K1ZG (FG)">BASE STATOR ASSY K1ZG (FG)</option>
                        <option value="BASE STATOR ASSY K1ZG PACK.ONLY(FG)">BASE STATOR ASSY K1ZG PACK.ONLY(FG)</option>
                        <option value="BASE STATOR ASSY K59A (FG)">BASE STATOR ASSY K59A (FG)</option>
                        <option value="BASE STATOR ASSY K97A (FG)">BASE STATOR ASSY K97A (FG)</option>
                        <option value="BASE STATOR ASSY KZRA (FG)">BASE STATOR ASSY KZRA (FG)</option>
                        <option value="BODY WATER PUMP D01N (FG)">BODY WATER PUMP D01N (FG)</option>
                        <option value="BRACKET 366 L (FG)">BRACKET 366 L (FG)</option>
                        <option value="BRACKET COMPRESSOR MOUNTING 5222 (FG)">BRACKET COMPRESSOR MOUNTING 5222 (FG)</option>
                        <option value="BRACKET COMPRESSOR MOUNTING 6592 (FG)">BRACKET COMPRESSOR MOUNTING 6592 (FG)</option>
                        <option value="BRACKET COMPRESSOR MOUNTING 6611 (FG)">BRACKET COMPRESSOR MOUNTING 6611 (FG)</option>
                        <option value="BRACKET ENGINE MOUNTING D80N (FG)">BRACKET ENGINE MOUNTING D80N (FG)</option>
                        <option value="BRACKET OIL FILTER 0C070 (FG)">BRACKET OIL FILTER 0C070 (FG)</option>
                        <option value="BRACKET OIL FILTER OCO90 (FG)">BRACKET OIL FILTER OCO90 (FG)</option>
                        <option value="BRACKET PEDAL (FG)">BRACKET PEDAL (FG)</option>
                        <option value="BRACKET TORQUE ROD (CVT) (FG)">BRACKET TORQUE ROD (CVT) (FG)</option>
                        <option value="BRACKET TORQUE ROD (MT) (FG)">BRACKET TORQUE ROD (MT) (FG)</option>
                        <option value="BRACKET TORQUE ROD CVT (2CF-B) (FG)">BRACKET TORQUE ROD CVT (2CF-B) (FG)</option>
                        <option value="BRACKET TORQUE ROD CVT (2WK) (FG)">BRACKET TORQUE ROD CVT (2WK) (FG)</option>
                        <option value="BRACKET TORQUE ROD MT (2SJ) (FG)">BRACKET TORQUE ROD MT (2SJ) (FG)</option>
                        <option value="BRACKET TORQUE ROD MT (2WK) (FG)">BRACKET TORQUE ROD MT (2WK) (FG)</option>
                        <option value="BRACKET TRANS MTG CVT (2SJ) (FG)">BRACKET TRANS MTG CVT (2SJ) (FG)</option>
                        <option value="BRACKET TRANS MTG MT (2SJ) (FG)">BRACKET TRANS MTG MT (2SJ) (FG)</option>
                        <option value="BRACKET TRNS MTG (CVT) (FG)">BRACKET TRNS MTG (CVT) (FG)</option>
                        <option value="BRACKET TRNS MTG (MT) (FG)">BRACKET TRNS MTG (MT) (FG)</option>
                        <option value="BRACKET Y230 (FG)">BRACKET Y230 (FG)</option>
                        <option value="BRKT AIR/C (FG)">BRKT AIR/C (FG)</option>
                        <option value="BRKT PCS (FG)">BRKT PCS (FG)</option>
                        <option value="BRKT TORQUEROD LWR (CVT) (FG)">BRKT TORQUEROD LWR (CVT) (FG)</option>
                        <option value="CAP ASSY BEARING 2TQ (FG)">CAP ASSY BEARING 2TQ (FG)</option>
                        <option value="CAP TAIL ASSY HA9J (FG)">CAP TAIL ASSY HA9J (FG)</option>
                        <option value="CAP WATER OUTLET Y4L (FG)">CAP WATER OUTLET Y4L (FG)</option>
                        <option value="CASE COMP MISSION K2FA (FG)">CASE COMP MISSION K2FA (FG)</option>
                        <option value="CASE COMP THERMO (FG)">CASE COMP THERMO (FG)</option>
                        <option value="CASE COMP THERMO 2AG (FG)">CASE COMP THERMO 2AG (FG)</option>
                        <option value="CASE COMP THERMO 2CF (NON ANODIZ)(FG)">CASE COMP THERMO 2CF (NON ANODIZ)(FG)</option>
                        <option value="CASE COMP THERMO 2SJ (NON ANODIZ)(FG)">CASE COMP THERMO 2SJ (NON ANODIZ)(FG)</option>
                        <option value="COV COMP WTR OUTLET 2AG(NON ANODIZ)(FG)">COV COMP WTR OUTLET 2AG(NON ANODIZ)(FG)</option>
                        <option value="COV COMP WTR OUTLET 2MD(NON ANODIZ)(FG)">COV COMP WTR OUTLET 2MD(NON ANODIZ)(FG)</option>
                        <option value="COVER ASSY C/C R NH-GREY K15G (FG)">COVER ASSY C/C R NH-GREY K15G (FG)</option>
                        <option value="COVER ASSY C/C R YR-GOLD K15G (FG)">COVER ASSY C/C R YR-GOLD K15G (FG)</option>
                        <option value="COVER ASSY HEAD K1ZG (FG)">COVER ASSY HEAD K1ZG (FG)</option>
                        <option value="COVER ASSY HEAD K1ZG PACK.ONLY(FG)">COVER ASSY HEAD K1ZG PACK.ONLY(FG)</option>
                        <option value="COVER ASSY R C/C  BROWN METT K98G (FG)">COVER ASSY R C/C  BROWN METT K98G (FG)</option>
                        <option value="COVER ASSY R C/C  NH-GREY K45G (FG)">COVER ASSY R C/C  NH-GREY K45G (FG)</option>
                        <option value="COVER ASSY R C/C  YR-GOLD K15P (FG)">COVER ASSY R C/C  YR-GOLD K15P (FG)</option>
                        <option value="COVER ASSY R C/C  YR-GOLD K45G (FG)">COVER ASSY R C/C  YR-GOLD K45G (FG)</option>
                        <option value="COVER ASSY R C/C K56R NH-303 M GREY (FG)">COVER ASSY R C/C K56R NH-303 M GREY (FG)</option>
                        <option value="COVER ASSY R C/C NH-GREY K56A (FG)">COVER ASSY R C/C NH-GREY K56A (FG)</option>
                        <option value="COVER ASSY R C/C YR-GOLD K15M (FG)">COVER ASSY R C/C YR-GOLD K15M (FG)</option>
                        <option value="COVER ASSY R C/C YR-GOLD K56A (FG)">COVER ASSY R C/C YR-GOLD K56A (FG)</option>
                        <option value="COVER COMP HEAD K0JA (FG)">COVER COMP HEAD K0JA (FG)</option>
                        <option value="COVER COMP HEAD K1AA (FG)">COVER COMP HEAD K1AA (FG)</option>
                        <option value="COVER COMP HEAD K1AA (PACK. ONLY) (FG)">COVER COMP HEAD K1AA (PACK. ONLY) (FG)</option>
                        <option value="COVER COMP HEAD K59A (FG)">COVER COMP HEAD K59A (FG)</option>
                        <option value="COVER COMP HEAD K97A (FG)">COVER COMP HEAD K97A (FG)</option>
                        <option value="COVER COMP HEAD KZLN (FG)">COVER COMP HEAD KZLN (FG)</option>
                        <option value="COVER COMP SENSOR (FG)">COVER COMP SENSOR (FG)</option>
                        <option value="COVER COMP WATER OUTLET (FG)">COVER COMP WATER OUTLET (FG)</option>
                        <option value="COVER COMP WATER OUTLET 55AA 2MD (FG)">COVER COMP WATER OUTLET 55AA 2MD (FG)</option>
                        <option value="COVER CYL HEAD 4HG-1 (FG)">COVER CYL HEAD 4HG-1 (FG)</option>
                        <option value="COVER CYL. HEAD APV/Y9J (FG)">COVER CYL. HEAD APV/Y9J (FG)</option>
                        <option value="COVER CYL. HEAD APV2/YLO (FG)">COVER CYL. HEAD APV2/YLO (FG)</option>
                        <option value="COVER CYLINDER HEAD HINO 366L (FG)">COVER CYLINDER HEAD HINO 366L (FG)</option>
                        <option value="COVER GEAR SHIFT NO.2 (FG)">COVER GEAR SHIFT NO.2 (FG)</option>
                        <option value="COVER L C/C NH-GREY K56A (FG)">COVER L C/C NH-GREY K56A (FG)</option>
                        <option value="COVER L C/C YR-GOLD K56A (FG)">COVER L C/C YR-GOLD K56A (FG)</option>
                        <option value="COVER L CLOUD SILVER K1ZG PACK.ONLY(FG)">COVER L CLOUD SILVER K1ZG PACK.ONLY(FG)</option>
                        <option value="COVER L CRANK CASE K18A (FG)">COVER L CRANK CASE K18A (FG)</option>
                        <option value="COVER L CRANK CASE KYZ (FG)">COVER L CRANK CASE KYZ (FG)</option>
                        <option value="COVER L IRON NAIL K1ZG PACK.ONLY (FG)">COVER L IRON NAIL K1ZG PACK.ONLY (FG)</option>
                        <option value="COVER L K03S NH-1 BLACK (FG)">COVER L K03S NH-1 BLACK (FG)</option>
                        <option value="COVER L KWB BLACK (FG)">COVER L KWB BLACK (FG)</option>
                        <option value="COVER L KYEG GREY (FG)">COVER L KYEG GREY (FG)</option>
                        <option value="COVER L SIDE CLOUD SILVER K1ZG (FG)">COVER L SIDE CLOUD SILVER K1ZG (FG)</option>
                        <option value="COVER L SIDE CLOUD SILVER K2SA (FG)">COVER L SIDE CLOUD SILVER K2SA (FG)</option>
                        <option value="COVER L SIDE IRON NAIL K1ZG (FG)">COVER L SIDE IRON NAIL K1ZG (FG)</option>
                        <option value="COVER L SIDE K0JA NH-255 SHIM.SILVER(FG)">COVER L SIDE K0JA NH-255 SHIM.SILVER(FG)</option>
                        <option value="COVER L SIDE K0JA NH-303 MAT AX GREY(FG)">COVER L SIDE K0JA NH-303 MAT AX GREY(FG)</option>
                        <option value="COVER L SIDE K1AA NH-303 MAT AX GREY(FG)">COVER L SIDE K1AA NH-303 MAT AX GREY(FG)</option>
                        <option value="COVER L SIDE K2FA NH-255 SHIM.SILVER(FG)">COVER L SIDE K2FA NH-255 SHIM.SILVER(FG)</option>
                        <option value="COVER L SIDE K2FA NH-303 MAT AX GREY(FG)">COVER L SIDE K2FA NH-303 MAT AX GREY(FG)</option>
                        <option value="COVER L SIDE K2SA NH-303 MAT AX GREY(FG)">COVER L SIDE K2SA NH-303 MAT AX GREY(FG)</option>
                        <option value="COVER L SIDE K59J (FG)">COVER L SIDE K59J (FG)</option>
                        <option value="COVER L SIDE NH-35 CLOUD SILV K97F (FG)">COVER L SIDE NH-35 CLOUD SILV K97F (FG)</option>
                        <option value="COVER L SIDE SUB ASSY K1ZN NH-303 (FG)">COVER L SIDE SUB ASSY K1ZN NH-303 (FG)</option>
                        <option value="COVER OIL COOLER (FG)">COVER OIL COOLER (FG)</option>
                        <option value="COVER OIL PUMP 1SZ (FG)">COVER OIL PUMP 1SZ (FG)</option>
                        <option value="COVER R C/C KPH Silver (PACK.ONLY) (FG)">COVER R C/C KPH Silver (PACK.ONLY) (FG)</option>
                        <option value="COVER R C/C KVLP Grey (PACK.ONLY) (FG)">COVER R C/C KVLP Grey (PACK.ONLY) (FG)</option>
                        <option value="COVER R C/C NH-GREY K45G ASSY JOINT (FG)">COVER R C/C NH-GREY K45G ASSY JOINT (FG)</option>
                        <option value="COVER R C/C YR-GOLD K45G ASSY JOINT (FG)">COVER R C/C YR-GOLD K45G ASSY JOINT (FG)</option>
                        <option value="COVER R CRANK CASE KYEA (FG)">COVER R CRANK CASE KYEA (FG)</option>
                        <option value="COVER R CRANK CASE KYZ (FG)">COVER R CRANK CASE KYZ (FG)</option>
                        <option value="COVER R KWB BLACK (FG)">COVER R KWB BLACK (FG)</option>
                        <option value="COVER S/A THERMOSTAT 479 W (FG)">COVER S/A THERMOSTAT 479 W (FG)</option>
                        <option value="COVER THERMO 2AG (FG)">COVER THERMO 2AG (FG)</option>
                        <option value="COVER THERMO 2CF/2AG (NON ANODIZ)(FG)">COVER THERMO 2CF/2AG (NON ANODIZ)(FG)</option>
                        <option value="COVER THERMO 2SJ/2MD (NON ANODIZ)(FG)">COVER THERMO 2SJ/2MD (NON ANODIZ)(FG)</option>
                        <option value="COVER THERMO 55AA 2MD (FG)">COVER THERMO 55AA 2MD (FG)</option>
                        <option value="CROWN HANDLE MATT BLACK 2 (FG)">CROWN HANDLE MATT BLACK 2 (FG)</option>
                        <option value="CYLINDER BLOCK GZ52 - 632.EFI (FG)">CYLINDER BLOCK GZ52 - 632.EFI (FG)</option>
                        <option value="CYLINDER BLOCK GZ52 HOLE-642.CARBU (FG)">CYLINDER BLOCK GZ52 HOLE-642.CARBU (FG)</option>
                        <option value="CYLINDER BLOCK GZ520 - EG633 (FG)">CYLINDER BLOCK GZ520 - EG633 (FG)</option>
                        <option value="CYLINDER COMP K25 (FG)">CYLINDER COMP K25 (FG)</option>
                        <option value="CYLINDER COMP KVY (FG)">CYLINDER COMP KVY (FG)</option>
                        <option value="CYLINDER COMP KZL (FG)">CYLINDER COMP KZL (FG)</option>
                        <option value="FAN BRACKET EA 330-E3-NB1 (FG)">FAN BRACKET EA 330-E3-NB1 (FG)</option>
                        <option value="FAN BRACKET R K70-T (FG)">FAN BRACKET R K70-T (FG)</option>
                        <option value="FAN EA 330-E3-NB 1 (FG)">FAN EA 330-E3-NB 1 (FG)</option>
                        <option value="FAN R K70-T (FG)">FAN R K70-T (FG)</option>
                        <option value="FLANGE DRIVEN K41A (FG)">FLANGE DRIVEN K41A (FG)</option>
                        <option value="FLANGE DRIVEN K41A SPAREPART (FG)">FLANGE DRIVEN K41A SPAREPART (FG)</option>
                        <option value="FLANGE DRIVEN KYZ (FG)">FLANGE DRIVEN KYZ (FG)</option>
                        <option value="FRONT COVER (FG)">FRONT COVER (FG)</option>
                        <option value="FRONT COVER 4HG-1 (FG)">FRONT COVER 4HG-1 (FG)</option>
                        <option value="GARNISH L KCJV (FG)">GARNISH L KCJV (FG)</option>
                        <option value="GARNISH R KCJV (FG)">GARNISH R KCJV (FG)</option>
                        <option value="HOLDER  R K47A (FG)">HOLDER  R K47A (FG)</option>
                        <option value="HOLDER ASSY L K45 (FG)">HOLDER ASSY L K45 (FG)</option>
                        <option value="HOLDER ASSY L STEP K15G (FG)">HOLDER ASSY L STEP K15G (FG)</option>
                        <option value="HOLDER ASSY L STEP K15P (FG)">HOLDER ASSY L STEP K15P (FG)</option>
                        <option value="HOLDER ASSY L STEP K3BA (FG)">HOLDER ASSY L STEP K3BA (FG)</option>
                        <option value="HOLDER ASSY R K45 (FG)">HOLDER ASSY R K45 (FG)</option>
                        <option value="HOLDER FORK UPPER LX 150 BLACK (FG)">HOLDER FORK UPPER LX 150 BLACK (FG)</option>
                        <option value="HOLDER FORK UPPER LX 150 PHANTOM SILVER">HOLDER FORK UPPER LX 150 PHANTOM SILVER</option>
                        <option value="HOLDER L NH-A30M DIG SILVER K41A (FG)">HOLDER L NH-A30M DIG SILVER K41A (FG)</option>
                        <option value="HOLDER L PILL STEP KYZ NH-A30MDIG SV(FG)">HOLDER L PILL STEP KYZ NH-A30MDIG SV(FG)</option>
                        <option value="HOLDER L PILLION K03S (FG)">HOLDER L PILLION K03S (FG)</option>
                        <option value="HOLDER PIVOT ASSY KYZ (FG)">HOLDER PIVOT ASSY KYZ (FG)</option>
                        <option value="HOLDER PIVOT KYZ (FG)">HOLDER PIVOT KYZ (FG)</option>
                        <option value="HOLDER R DD NH-A30M D SIL K41A (FG)">HOLDER R DD NH-A30M D SIL K41A (FG)</option>
                        <option value="HOLDER R PIL KYZ NH-A30M DIG SV (FG)">HOLDER R PIL KYZ NH-A30M DIG SV (FG)</option>
                        <option value="HOLDER R PILL STEP KYZ NH-A30MDIG SV(FG)">HOLDER R PILL STEP KYZ NH-A30MDIG SV(FG)</option>
                        <option value="HOLDER R PILLION K03S (FG)">HOLDER R PILLION K03S (FG)</option>
                        <option value="HOLDER R SD NH-A30M D SIL K41A (FG)">HOLDER R SD NH-A30M D SIL K41A (FG)</option>
                        <option value="HOUSING CLUTCH 37090 - 210W (479 W)(FG)">HOUSING CLUTCH 37090 - 210W (479 W)(FG)</option>
                        <option value="HOUSING SHIFT LEVER D40D (FG)">HOUSING SHIFT LEVER D40D (FG)</option>
                        <option value="HOUSING SUB-ASSY, WATER OUTLET (FG)">HOUSING SUB-ASSY, WATER OUTLET (FG)</option>
                        <option value="HOUSING WATER OUTLET (FG)">HOUSING WATER OUTLET (FG)</option>
                        <option value="HUB COMP REAR KVG (PACKAGING ONLY) (FG)">HUB COMP REAR KVG (PACKAGING ONLY) (FG)</option>
                        <option value="HUB COMP REAR KVG ASPIRA (FG)">HUB COMP REAR KVG ASPIRA (FG)</option>
                        <option value="HUB COMP REAR NH255 SILVER KWB/W (FG)">HUB COMP REAR NH255 SILVER KWB/W (FG)</option>
                        <option value="HUB FRONT DISC KVB ASPIRA (FG)">HUB FRONT DISC KVB ASPIRA (FG)</option>
                        <option value="HUB FRONT WHEEL DISC KVB (PACK.ONLY)(FG)">HUB FRONT WHEEL DISC KVB (PACK.ONLY)(FG)</option>
                        <option value="HUB FRONT WHEEL NH-255M SILVER KWB (FG)">HUB FRONT WHEEL NH-255M SILVER KWB (FG)</option>
                        <option value="INSULATOR , INTAKE MANIFOLD NO.1 (FG)">INSULATOR , INTAKE MANIFOLD NO.1 (FG)</option>
                        <option value="INTAKE MANIFOLD HINO (FG)">INTAKE MANIFOLD HINO (FG)</option>
                        <option value="MANIFOLD INTAKE 715B (FG)">MANIFOLD INTAKE 715B (FG)</option>
                        <option value="OIL PUMP ASSY K2SA (FG)">OIL PUMP ASSY K2SA (FG)</option>
                        <option value="OIL PUMP ASSY KVB (FG)">OIL PUMP ASSY KVB (FG)</option>
                        <option value="OIL PUMP SET K0JA (FG)">OIL PUMP SET K0JA (FG)</option>
                        <option value="OIL PUMP SET K1AA (FG)">OIL PUMP SET K1AA (FG)</option>
                        <option value="OIL PUMP SET K1AA (PACK. ONLY) (FG)">OIL PUMP SET K1AA (PACK. ONLY) (FG)</option>
                        <option value="OIL SEPARATOR ASSY K0JA(FG)">OIL SEPARATOR ASSY K0JA(FG)</option>
                        <option value="OIL SEPARATOR ASSY K2FA (FG)">OIL SEPARATOR ASSY K2FA (FG)</option>
                        <option value="OUTER TUBE L Y2DP METALIC MATT BLACK(FG)">OUTER TUBE L Y2DP METALIC MATT BLACK(FG)</option>
                        <option value="OUTER TUBE R Y2DP METALIC MATT BLACK(FG)">OUTER TUBE R Y2DP METALIC MATT BLACK(FG)</option>
                        <option value="PANEL ASSY REAR BRAKE KWWX GREY (FG)">PANEL ASSY REAR BRAKE KWWX GREY (FG)</option>
                        <option value="PANEL ASSY REAR BRAKE KWWX SILVER (FG)">PANEL ASSY REAR BRAKE KWWX SILVER (FG)</option>
                        <option value="PASSAGE COMP EGR VALVE (FG)">PASSAGE COMP EGR VALVE (FG)</option>
                        <option value="PEDAL COMP BRAKE ASSY K15G (FG)">PEDAL COMP BRAKE ASSY K15G (FG)</option>
                        <option value="PEDAL COMP BRAKE ASSY K15P (FG)">PEDAL COMP BRAKE ASSY K15P (FG)</option>
                        <option value="PEDAL COMP BRAKE ASSY K3BA (FG)">PEDAL COMP BRAKE ASSY K3BA (FG)</option>
                        <option value="PIPE AIR INLET ML288384 (FG)">PIPE AIR INLET ML288384 (FG)</option>
                        <option value="PIPE AIR INLET ML315769 (FG)">PIPE AIR INLET ML315769 (FG)</option>
                        <option value="PIPE ASSY INTAKE 415B (FG)">PIPE ASSY INTAKE 415B (FG)</option>
                        <option value="PIPE COMP INLET KPH (FG)">PIPE COMP INLET KPH (FG)</option>
                        <option value="PIPE COMP INLET KWWX (FG)">PIPE COMP INLET KWWX (FG)</option>
                        <option value="PIPE INTAKE (FG)">PIPE INTAKE (FG)</option>
                        <option value="PIPE INTAKE HPDC 17113-0U050 (FG)">PIPE INTAKE HPDC 17113-0U050 (FG)</option>
                        <option value="PIPE RADIATOR (FG)">PIPE RADIATOR (FG)</option>
                        <option value="PIPE SUB-ASSY WATER BY-PASS 60U020 (FG)">PIPE SUB-ASSY WATER BY-PASS 60U020 (FG)</option>
                        <option value="PIPE SUB-ASSY WATER BY-PASS 60U030 (FG)">PIPE SUB-ASSY WATER BY-PASS 60U030 (FG)</option>
                        <option value="PLATE COMP EGR (FG)">PLATE COMP EGR (FG)</option>
                        <option value="PLATE COMP EGR 2TQ (FG)">PLATE COMP EGR 2TQ (FG)</option>
                        <option value="PROSES ALODIN K84 SET (FG)">PROSES ALODIN K84 SET (FG)</option>
                        <option value="PUMP ASSY WATER K1ZG (FG)">PUMP ASSY WATER K1ZG (FG)</option>
                        <option value="PUMP ASSY WATER K1ZG PACK.ONLY(FG)">PUMP ASSY WATER K1ZG PACK.ONLY(FG)</option>
                        <option value="PUMP ASSY WATER K59J (FG)">PUMP ASSY WATER K59J (FG)</option>
                        <option value="PUMP ASSY WATER KZRA (FG)">PUMP ASSY WATER KZRA (FG)</option>
                        <option value="QUADRANT BOX (FG)">QUADRANT BOX (FG)</option>
                        <option value="RAIL GRAB K396 NH255M SHIMER SILVER (FG)">RAIL GRAB K396 NH255M SHIMER SILVER (FG)</option>
                        <option value="RAIL GRAB K46A NH-303 AXIS GREY (FG)">RAIL GRAB K46A NH-303 AXIS GREY (FG)</option>
                        <option value="RAIL GRAB KYZA NH-303M MATT AXISGREY(FG)">RAIL GRAB KYZA NH-303M MATT AXISGREY(FG)</option>
                        <option value="RAIL GRAB KYZA NH-A30 M DIGITAL SLV (FG)">RAIL GRAB KYZA NH-A30 M DIGITAL SLV (FG)</option>
                        <option value="RAIL GRAB NH-303 AXIS GREY K41A (FG)">RAIL GRAB NH-303 AXIS GREY K41A (FG)</option>
                        <option value="RAIL R GRAB K59J NH-229MU ANCHOR GM(FG)">RAIL R GRAB K59J NH-229MU ANCHOR GM(FG)</option>
                        <option value="RAIL R GRAB K59J NH-B12M AFFINITY BM(FG)">RAIL R GRAB K59J NH-B12M AFFINITY BM(FG)</option>
                        <option value="RAIL REAR GRAB K2SA NH-303 M GREY(FG)">RAIL REAR GRAB K2SA NH-303 M GREY(FG)</option>
                        <option value="RAIL REAR GRAB K59A NH-303 M (FG)">RAIL REAR GRAB K59A NH-303 M (FG)</option>
                        <option value="RAIL REAR GRAB K59J NH-303 M (FG)">RAIL REAR GRAB K59J NH-303 M (FG)</option>
                        <option value="RAIL REAR GRAB KZRA NH-303 M GREY (FG)">RAIL REAR GRAB KZRA NH-303 M GREY (FG)</option>
                        <option value="RAIL RR GRAB KVB NH-255 SILVER ( FG)">RAIL RR GRAB KVB NH-255 SILVER ( FG)</option>
                        <option value="RAIL RR GRAB KVB NH-303M GREY (FG)">RAIL RR GRAB KVB NH-303M GREY (FG)</option>
                        <option value="RAIL RR GRAB KVLP NH-225M SILVER (FG)">RAIL RR GRAB KVLP NH-225M SILVER (FG)</option>
                        <option value="RAIL RR GRAB KVLP NH-303 GREY (FG)">RAIL RR GRAB KVLP NH-303 GREY (FG)</option>
                        <option value="RAIL RR GRAB KZLG NH-303 GREY (FG)">RAIL RR GRAB KZLG NH-303 GREY (FG)</option>
                        <option value="RAILRR GRAB KZRA NH-177 M VOSTOC SV(FG)">RAILRR GRAB KZRA NH-177 M VOSTOC SV(FG)</option>
                        <option value="RAILRR GRAB KZRA NH-MELATITE DEEP BK(FG)">RAILRR GRAB KZRA NH-MELATITE DEEP BK(FG)</option>
                        <option value="RETAINER 2WD (632) (FG)">RETAINER 2WD (632) (FG)</option>
                        <option value="RETAINER 2WD 614 (FG)">RETAINER 2WD 614 (FG)</option>
                        <option value="RETAINER 4WD (632) (FG)">RETAINER 4WD (632) (FG)</option>
                        <option value="RETAINER OK151 4WD (632) (FG)">RETAINER OK151 4WD (632) (FG)</option>
                        <option value="RETAINER OKO61 4WD 614 (FG)">RETAINER OKO61 4WD 614 (FG)</option>
                        <option value="ROCKER COVER 4D34 (FG)">ROCKER COVER 4D34 (FG)</option>
                        <option value="ROCKER COVER 4D56-KZD LOKAL (FG)">ROCKER COVER 4D56-KZD LOKAL (FG)</option>
                        <option value="ROCKER COVER 4D56-SLD (FG)">ROCKER COVER 4D56-SLD (FG)</option>
                        <option value="SELECT LEVER 366L (FG)">SELECT LEVER 366L (FG)</option>
                        <option value="SELECT LEVER D80N (FG)">SELECT LEVER D80N (FG)</option>
                        <option value="SELECT LEVER Y230 (FG)">SELECT LEVER Y230 (FG)</option>
                        <option value="SET BRAKE SHOE & SPRING KZLG (FG)">SET BRAKE SHOE & SPRING KZLG (FG)</option>
                        <option value="SET BRAKE SHOE KZLG (PACKAGING ONLY) (FG">SET BRAKE SHOE KZLG (PACKAGING ONLY) (FG</option>
                        <option value="SHOE SET,BRAKE KVR (FG)">SHOE SET,BRAKE KVR (FG)</option>
                        <option value="SLIDER COMP C-CHAIN TENSIONER 2CF (FG)">SLIDER COMP C-CHAIN TENSIONER 2CF (FG)</option>
                        <option value="SPACER EGR (FG)">SPACER EGR (FG)</option>
                        <option value="STAY L KAWASAKI FLAT METT GREY (FG)">STAY L KAWASAKI FLAT METT GREY (FG)</option>
                        <option value="STAY R KAWASAKI FLAT METT GREY (FG)">STAY R KAWASAKI FLAT METT GREY (FG)</option>
                        <option value="STEERING WHEEL D01 (FG)">STEERING WHEEL D01 (FG)</option>
                        <option value="STEERING WHEEL EFC (FG)">STEERING WHEEL EFC (FG)</option>
                        <option value="STEP  L K47A (FG)">STEP  L K47A (FG)</option>
                        <option value="STEP ASSY L K47A (FG)">STEP ASSY L K47A (FG)</option>
                        <option value="STEP ASSY L NH-A30M DIG SILVER K41A (FG)">STEP ASSY L NH-A30M DIG SILVER K41A (FG)</option>
                        <option value="STEP ASSY L PIL KYZ NH-A30M DIG SV (FG)">STEP ASSY L PIL KYZ NH-A30M DIG SV (FG)</option>
                        <option value="STEP ASSY L PILLION K03S (FG)">STEP ASSY L PILLION K03S (FG)</option>
                        <option value="STEP ASSY L PILLION K07A (FG)">STEP ASSY L PILLION K07A (FG)</option>
                        <option value="STEP ASSY L PILLION K56A (FG)">STEP ASSY L PILLION K56A (FG)</option>
                        <option value="STEP ASSY L PILLION KTM/KPHX  ASSY(FG)">STEP ASSY L PILLION KTM/KPHX  ASSY(FG)</option>
                        <option value="STEP ASSY L PILLION KTMY (FG)">STEP ASSY L PILLION KTMY (FG)</option>
                        <option value="STEP ASSY L PILLION KVLP (ANTI RUST)(FG)">STEP ASSY L PILLION KVLP (ANTI RUST)(FG)</option>
                        <option value="STEP ASSY L PILLION KWB (FG)">STEP ASSY L PILLION KWB (FG)</option>
                        <option value="STEP ASSY L PILLION KWWX (ANTI RUST)(FG)">STEP ASSY L PILLION KWWX (ANTI RUST)(FG)</option>
                        <option value="STEP ASSY L PILLION KWWX (FG)">STEP ASSY L PILLION KWWX (FG)</option>
                        <option value="STEP ASSY L PILLION KWZA (FG)">STEP ASSY L PILLION KWZA (FG)</option>
                        <option value="STEP ASSY R DD NH-A30M D SIL K41A (FG)">STEP ASSY R DD NH-A30M D SIL K41A (FG)</option>
                        <option value="STEP ASSY R K47A (FG)">STEP ASSY R K47A (FG)</option>
                        <option value="STEP ASSY R PIL KVLP D.DISC ANTI RUST/FG">STEP ASSY R PIL KVLP D.DISC ANTI RUST/FG</option>
                        <option value="STEP ASSY R PIL KVLP S.DISC ANTI RUST/FG">STEP ASSY R PIL KVLP S.DISC ANTI RUST/FG</option>
                        <option value="STEP ASSY R PIL KYZ NH-A30M DIG SV (FG)">STEP ASSY R PIL KYZ NH-A30M DIG SV (FG)</option>
                        <option value="STEP ASSY R PILLION K03S (FG)">STEP ASSY R PILLION K03S (FG)</option>
                        <option value="STEP ASSY R PILLION K07A (FG)">STEP ASSY R PILLION K07A (FG)</option>
                        <option value="STEP ASSY R PILLION K56A (FG)">STEP ASSY R PILLION K56A (FG)</option>
                        <option value="STEP ASSY R PILLION KWB (FG)">STEP ASSY R PILLION KWB (FG)</option>
                        <option value="STEP ASSY R PILLION KWWT (FG)">STEP ASSY R PILLION KWWT (FG)</option>
                        <option value="STEP ASSY R PILLION KWWX (ANTI RUST)(FG)">STEP ASSY R PILLION KWWX (ANTI RUST)(FG)</option>
                        <option value="STEP ASSY R PILLION KWWX (FG)">STEP ASSY R PILLION KWWX (FG)</option>
                        <option value="STEP ASSY R PILLION KWZA (FG)">STEP ASSY R PILLION KWZA (FG)</option>
                        <option value="STEP ASSY R SD NH-A30M D SIL K41A (FG)">STEP ASSY R SD NH-A30M D SIL K41A (FG)</option>
                        <option value="STEP ASSY, R PILLION K56F (FG)">STEP ASSY, R PILLION K56F (FG)</option>
                        <option value="STEP L PIL KYZ NH-A30M DIG SV (FG)">STEP L PIL KYZ NH-A30M DIG SV (FG)</option>
                        <option value="SUB ASSY OIL PAN (FG)">SUB ASSY OIL PAN (FG)</option>
                        <option value="SUPPORT CAM POSITION SENSOR (FG)">SUPPORT CAM POSITION SENSOR (FG)</option>
                        <option value="SUPPORT FUEL TANK 1 RD65T(FG)">SUPPORT FUEL TANK 1 RD65T(FG)</option>
                        <option value="SUPPORT FUEL TANK 1 RD85DI - S/EA11">SUPPORT FUEL TANK 1 RD85DI - S/EA11</option>
                        <option value="SUPPORT FUEL TANK RD65T NEW (FG)">SUPPORT FUEL TANK RD65T NEW (FG)</option>
                        <option value="SUPPORTING ARM LH 4D34G (FG)">SUPPORTING ARM LH 4D34G (FG)</option>
                        <option value="SUPPORTING ARM RH 4D34G (FG)">SUPPORTING ARM RH 4D34G (FG)</option>
                        <option value="SWING ARM ABS K2SA (FG)">SWING ARM ABS K2SA (FG)</option>
                        <option value="SWING ARM ASSY K0WL (FG)">SWING ARM ASSY K0WL (FG)</option>
                        <option value="SWING ARM ASSY K59J (FG)">SWING ARM ASSY K59J (FG)</option>
                        <option value="SWING ARM CBS K2SA (FG)">SWING ARM CBS K2SA (FG)</option>
                        <option value="SWING ARM KOWA (FG)">SWING ARM KOWA (FG)</option>
                        <option value="TRANSMISSION CASE 4D56 (FG)">TRANSMISSION CASE 4D56 (FG)</option>
                        <option value="TWIN HEAD SUB ASSY (FG)">TWIN HEAD SUB ASSY (FG)</option>
                        <option value="UPPER BRACKET SUZUKI XB975-CD (FG)">UPPER BRACKET SUZUKI XB975-CD (FG)</option>
                        <option value="UPPER BRACKET SUZUKI XB975-CD BLACK (FG)">UPPER BRACKET SUZUKI XB975-CD BLACK (FG)</option>
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
                    <label class="fw-bold" for="problem">problem <sup>*</sup></label>
                    <input type="text" class="form-control" name="problem" id="problem" aria-describedby="problemHelp" required>
                </div>
                <div class="col-4 mb-3">
                    <label class="fw-bold" for="pic">PIC <sup>*</sup></label>
                    <input type="text" class="form-control" name="pic" id="pic" aria-describedby="picHelp" required>
                </div>
                <div class="col-4 mb-3">
                    <label class="fw-bold" for="pic_qc">PIC QC <sup>*</sup></label>
                    <input type="text" class="form-control" name="pic_qc" id="pic_qc" aria-describedby="pic_qcHelp" required>
                </div>
                <div class="col-4 mb-3">
                    <label class="fw-bold" for="pic_penerima">PIC Penerima</label>
                    <input type="text" class="form-control" name="pic_penerima" id="pic_penerima" aria-describedby="pic_penerimaHelp">
                </div>
                <div class="col-6 mb-3">
                    <label class="fw-bold" for="pic_penerima">Facta Occure <sup>*</sup></label>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="occure" value="MAN" id="occure_MAN" >
                                <label class="form-check-label" for="occure_MAN">
                                  MAN
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="occure" value="METHODE" id="occure_METHODE">
                                <label class="form-check-label" for="occure_METHODE">
                                  METHODE
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="occure" value="MACHINE" id="occure_MACHINE">
                                <label class="form-check-label" for="occure_MACHINE">
                                  MACHINE
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="occure" value="MATERIAL" id="occure_MATERIAL">
                                <label class="form-check-label" for="occure_MATERIAL">
                                  MATERIAL
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <textarea class="form-control" name="occure_deskripsi" id="occure_deskripsi" cols="28" rows="4" placeholder="Deskripsi occure"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <label class="fw-bold" for="pic_penerima">Facta Outflow <sup>*</sup></label>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="outflow" value="MAN" id="outflow_MAN" >
                                <label class="form-check-label" for="outflow_MAN">
                                  MAN
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="outflow" value="METHODE" id="outflow_METHODE">
                                <label class="form-check-label" for="outflow_METHODE">
                                  METHODE
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="outflow" value="MACHINE" id="outflow_MACHINE">
                                <label class="form-check-label" for="outflow_MACHINE">
                                  MACHINE
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="outflow" value="MATERIAL" id="outflow_MATERIAL">
                                <label class="form-check-label" for="outflow_MATERIAL">
                                  MATERIAL
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <textarea class="form-control" name="outflow_deskripsi" id="outflow_deskripsi" cols="28" rows="4" placeholder="Deskripsi outflow"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label class="fw-bold" for="Klasifikasi Masalah mb-3">Klasifikasi Masalah /pcs<sup>*</sup></label>
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Bocor</span>
                                <input type="number" class="form-control" id="bocor" name="bocor" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Flowline</span>
                                <input type="number" class="form-control" id="flowline" name="flowline" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Mach_other</span>
                                <input type="number" class="form-control" id="mach_other" name="mach_other" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">No_tap</span>
                                <input type="number" class="form-control" id="no_tap" name="no_tap" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Paint Meler</span>
                                <input type="number" class="form-control" id="paint_meler" name="paint_meler" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Paint Tipis</span>
                                <input type="number" class="form-control" id="paint_tipis" name="paint_tipis" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Dent</span>
                                <input type="number" class="form-control" id="dent" name="dent" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Gompal</span>
                                <input type="number" class="form-control" id="gompal" name="gompal" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">NG Assy</span>
                                <input type="number" class="form-control" id="ng_assy" name="ng_assy" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Other</span>
                                <input type="number" class="form-control" id="other" name="other" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Paint Other</span>
                                <input type="number" class="form-control" id="paint_other" name="paint_other" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Porosity</span>
                                <input type="number" class="form-control" id="porosity" name="porosity" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Dimensi Cast</span>
                                <input type="number" class="form-control" id="dimensi_cast" name="dimensi_cast" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Jamur</span>
                                <input type="number" class="form-control" id="jamur" name="jamur" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">NG Assy Mach</span>
                                <input type="number" class="form-control" id="ng_assy_mach" name="ng_assy_mach" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">O Proses F</span>
                                <input type="number" class="form-control" id="o_proses_f" name="o_proses_f" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Paint Peel Off</span>
                                <input type="number" class="form-control" id="paint_peel_off" name="paint_peel_off" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Retak</span>
                                <input type="number" class="form-control" id="retak" name="retak" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Dimensi Mach</span>
                                <input type="number" class="form-control" id="dimensi_mach" name="dimensi_mach" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">K Proses Fin</span>
                                <input type="number" class="form-control" id="k_proses_fin" name="k_proses_fin" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">NG ASSY S/C</span>
                                <input type="number" class="form-control" id="ng_assy_sc" name="ng_assy_sc" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Paint Kotor</span>
                                <input type="number" class="form-control" id="paint_kotor" name="paint_kotor" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Paint Scratch</span>
                                <input type="number" class="form-control" id="paint_scratch" name="paint_scratch" value="0">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Undercut</span>
                                <input type="number" class="form-control" id="undercut" name="undercut" value="0">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
         <div class="col-4 ">
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="fw-bold" for="Kategori Claim" class="form-label">Kategori Claim : <sup>*</sup></label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim" id="kategori_claim_RC" value="RC">
                        <label class="form-check-label" for="kategori_claim">RC</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim" id="kategori_claim_BNF" value="BNF">
                        <label class="form-check-label" for="kategori_claim">BNF</label>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <label class="fw-bold" for="kejadian Claim" class="form-label">Kejadian Claim : <sup>*</sup></label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kejadian_claim" id="kejadian_claim_REPEAT" value="REPEAT">
                        <label class="form-check-label" for="kejadian_claim">RPT</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kejadian_claim" id="kejadian_claim_FIRST" value="FIRST">
                        <label class="form-check-label" for="kejadian_claim">FRS</label>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label class="fw-bold" for="Kategori Claim" class="form-label">Kategori Claim Market : <sup>*</sup></label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim_market" id="kategori_claim_market_REGULER" value="REGULER">
                        <label class="form-check-label" for="kategori_claim_market">REGULER</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim_market" id="kategori_claim_market_MARKET" value="MARKET">
                        <label class="form-check-label" for="kategori_claim_market">MARKET&ensp;</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim_market" id="kategori_claim_market_REM" value="REM">
                        <label class="form-check-label" for="kategori_claim_REM">REM</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim_market" id="kategori_claim_market_EXPORT" value="EXPORT">
                        <label class="form-check-label" for="kategori_claim_EXPORT">EXPORT&ensp;</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim_market" id="kategori_claim_market_DPWC_YES" value="DPWC_YES">
                        <label class="form-check-label" for="kategori_claim_DPWC">DPWC - Y</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kategori_claim_market" id="kategori_claim_market_DPWC_NO" value="DPWC_NO">
                        <label class="form-check-label" for="kategori_claim_DPWC">DPWC - N</label>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label class="fw-bold" for="no_dpwc">Nomor Dokumen DPWC</label>
                    <input type="text" class="form-control" name="no_dpwc" id="no_dpwc" aria-describedby="no_dpwcHelp">
                </div>
                <div class="col-12 mb-3">
                    <label for="status_bnf" class="fw-bold">Status BNF : <sup>*</sup></label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_bnf" id="status_bnf_OPEN" value="OPEN">
                        <label class="form-check-label" for="status_bnf">OPEN</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_bnf" id="status_bnf_CLOSE" value="CLOSE">
                        <label class="form-check-label" for="status_bnf">CLOSE</label>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="opl" class="fw-bold">One Point Lesson : <sup>*</sup></label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="opl" id="opl_OPEN" value="OPEN">
                        <label class="form-check-label" for="opl">OPEN</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="opl" id="opl_CLOSE" value="CLOSE">
                        <label class="form-check-label" for="opl">CLOSE</label>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <p class="text-center fw-bold fs-5">SAKANOBORI<sup>*</sup></p>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:150px">CUSTOMER</span>
                                <input type="number" class="form-control" id="customer" name="customer" value="0">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:150px">SELOG</span>
                                <input type="number" class="form-control" id="selog" name="selog" value="0">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:150px">DELSI</span>
                                <input type="number" class="form-control" id="delsi" name="delsi" value="0">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:150px">PDC</span>
                                <input type="number" class="form-control" id="PDC" name="PDC" value="0">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:150px">FSCM</span>
                                <input type="number" class="form-control" id="FSCM" name="FSCM" value="0">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:150px">NM</span>
                                <input type="number" class="form-control" id="NM" name="NM" value="0">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark text-center fw-bold" id="basic-addon1" style="width:165px">TOTAL NG</span>
                                <input type="number" class="form-control text-center" id="total_ng" name="total_ng" value="0" disabled readonly>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text disabled bg-silver text-dark text-center fw-bold" id="basic-addon1" style="width:165px">STOCK</span>
                                <input type="number" class="form-control text-center" id="stock" name="stock" value="0" disabled readonly>
                            </div>
                        </div>
                    </div>
                </div>
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
@elseif (Request::url() == url('/modal/deliveryQuality'))
<form action="{{ url('/modal/deliveryQuality/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
    @csrf
    <div class="row justify-content-end">
        <div class="col-4 mb-3 align-self-end">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">Tanggal</span>
                <input type="date" class="form-control float-end" name="tanggal" id="tanggal" aria-describedby="tanggalHelp" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">All Customer</span>
                <input type="number" class="form-control" id="all_customer" name="all_customer" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">ADM</span>
                <input type="number" class="form-control" id="adm" name="adm" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">AHM P1</span>
                <input type="number" class="form-control" id="ahm_p1" name="ahm_p1" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">AHM P2</span>
                <input type="number" class="form-control" id="ahm_p2" name="ahm_p2" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">AHM P3</span>
                <input type="number" class="form-control" id="ahm_p3" name="ahm_p3" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">AHM P4</span>
                <input type="number" class="form-control" id="ahm_p4" name="ahm_p4" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">AHM P5</span>
                <input type="number" class="form-control" id="ahm_p5" name="ahm_p5" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">AHM REM</span>
                <input type="number" class="form-control" id="ahm_rem" name="ahm_rem" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">AISIN</span>
                <input type="number" class="form-control" id="aisin" name="aisin" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">ASPIRA</span>
                <input type="number" class="form-control" id="aspira" name="aspira" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">CAI</span>
                <input type="number" class="form-control" id="cai" name="cai" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">DENSO</span>
                <input type="number" class="form-control" id="denso" name="denso" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">DNP</span>
                <input type="number" class="form-control" id="dnp" name="dnp" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">HINO</span>
                <input type="number" class="form-control" id="hino" name="hino" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">HPM</span>
                <input type="number" class="form-control" id="hpm" name="hpm" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">IGP</span>
                <input type="number" class="form-control" id="igp" name="igp" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">J-TEKT</span>
                <input type="number" class="form-control" id="j_tekt" name="j_tekt" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">KAWASAKI</span>
                <input type="number" class="form-control" id="kawasaki" name="kawasaki" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">KUBOTA</span>
                <input type="number" class="form-control" id="kubota" name="kubota" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">KAYABA</span>
                <input type="number" class="form-control" id="kayaba" name="kayaba" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">MHASK</span>
                <input type="number" class="form-control" id="mhask" name="mhask" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">MII</span>
                <input type="number" class="form-control" id="mii" name="mii" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">MKM</span>
                <input type="number" class="form-control" id="mkm" name="mkm" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">NISSAN</span>
                <input type="number" class="form-control" id="nissan" name="nissan" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">NKI</span>
                <input type="number" class="form-control" id="nki" name="nki" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">OKAMOTO</span>
                <input type="number" class="form-control" id="okamoto" name="okamoto" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">SUZUKI</span>
                <input type="number" class="form-control" id="suzuki" name="suzuki" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">SKC</span>
                <input type="number" class="form-control" id="skc" name="skc" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">TMMIN</span>
                <input type="number" class="form-control" id="tmmin" name="tmmin" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">TOYODA GOSAI</span>
                <input type="number" class="form-control" id="toyoda_gosai" name="toyoda_gosai" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">YAMAHA</span>
                <input type="number" class="form-control" id="yamaha" name="yamaha" value="0">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <span class="input-group-text disabled bg-silver text-dark" id="basic-addon1" style="width:145px">YUTAKA</span>
                <input type="number" class="form-control" id="yutaka" name="yutaka" value="0">
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
@else
    <p>THIS IS BAD</p>

    </div>
@endif



