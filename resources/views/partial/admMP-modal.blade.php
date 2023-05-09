@switch(Route::current()->getName())
    @case('MP.AddMP')
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
        @break
    @case('MP.ChangePassword')
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
        @break
    @default

@endswitch
