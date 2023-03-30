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
                <label for="judul">Judul <sup>*</sup></label>
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
@else
    <p>THIS IS BAD</p>

    </div>
@endif



