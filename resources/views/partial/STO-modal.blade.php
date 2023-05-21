@switch(Route::current()->getName())
    @case('STO.preparation')
            <form action="{{ url('/sto/modal/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="nrp">NRP <sup>*</sup></label>
                        <input type="number" class="form-control" name="nrp" id="nrp" aria-describedby="nrpHelp" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="nama">NAMA <sup>*</sup></label>
                        <input type="text" class="form-control" name="nama" id="nama" aria-describedby="namaHelp" required readonly>
                    </div>
                    <div class="tambahaninputan" id="tambahaninputan"></div>
                </div>
                <div class="row">
                    <div class="col" >
                        <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
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
                            url: "{{ url('/adm/api') }}" +"/"+ searchnrp,
                            success: function (data) {
                                switch (data.length) {
                                    case 1 :
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
    @case('STO.Input_verificator')
    <div id="tambahaninputan"></div>
            {{-- <form action="{{ url('/sto/modal-input/update') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
                @csrf
                <div class="row mt-3">
                    <div class="col-12 nopadding">
                        <div class="card bg-secondary bg-opacity-25">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 mb-3">
                                        <label for="sloc">S.LOCATION <sup>*</sup></label>
                                        <select class="form-control fw-bold" name="sloc" id="sloc" required>
                                            <option class="dropdown-item form-control" name="sloc" value="1011">1011</option>
                                            <option class="dropdown-item form-control" name="sloc" value="1012">1012</option>
                                            <option class="dropdown-item form-control" name="sloc" value="1013">1013</option>
                                            <option class="dropdown-item form-control" name="sloc" value="1014">1014</option>
                                            <option class="dropdown-item form-control" name="sloc" value="1015">1015</option>
                                            <option class="dropdown-item form-control" name="sloc" value="1016">1016</option>
                                        </select>
                                    </div>
                                    <div class="col-7 mb-3">
                                        <label for="status">STATUS <sup>*</sup></label>
                                        <div class="form-check" id="status" name="status" required>
                                            <input type="radio" class="btn-check " name="status" id="status_OK" autocomplete="off" value="OK">
                                            <label class="btn btn-outline-success fw-bold" style="width: 40%;" for="status_OK">OK</label>

                                            <input type="radio" class="btn-check " name="status" id="status_NG" autocomplete="off" value="NG">
                                            <label class="btn btn-outline-danger ms-3 fw-bold" style="width: 40%;" for="status_NG">NG</label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="nama_part">NAMA PART <sup>*</sup></label>
                                        <input type="text" class="form-control fw-bold" name="nama_part" id="nama_part" aria-describedby="nama_partHelp" required readonly value="Andhika Nur Rohman">
                                    </div>
                                    <div class="col-8 mb-3">
                                        <label for="jumlah">JUMLAH <sup>*</sup></label>
                                        <input type="text" class="form-control fw-bold" name="jumlah" id="jumlah" aria-describedby="jumlahHelp" required readonly value="1000">
                                    </div>
                                    <div class="col-4  mb-3">
                                        <label for="satuan">SATUAN <sup>*</sup></label>
                                        <input type="text" class="form-control fw-bold" name="satuan" id="satuan" aria-describedby="satuanHelp" required readonly value="PCS">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="area">AREA <sup>*</sup></label>
                                        <input type="text" class="form-control fw-bold" name="area" id="area" aria-describedby="areaHelp" required readonly value="LINE MACHINING POJOK DEKET K1ZG">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="keterangan">KETERANGAN <sup>*</sup></label>
                                        <input type="text" class="form-control fw-bold" name="keterangan" id="keterangan" aria-describedby="keteranganHelp" required readonly value="YAUDAH..BOLEH..!!">
                                    </div>
                                    <div class="col" >
                                        <input type="hidden" name="id_mpsto" id="id_mpsto" aria-describedby="id_mpstoHelp" required readonly value="{{ $id }}">
                                        <button type="submit" id="submit" class="btn btn-warning float-end"><i class="fa-solid fa-print"></i> Print</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form> --}}
        @break
    @default
            <h1>HUBUNGI ADMIN DIGITALIZATION</h1>
@endswitch
