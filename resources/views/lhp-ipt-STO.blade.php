@extends('TV-template')
@section('content')
    @switch(Route::current()->getName())
        @case('STO.counter')
                <a class="h2 text-center d-block d-md-none fw-bold text-decoration-none text-dark" href="{{ route('STO.Menu') }}">C O U N T E R</a>
            @break
        @case('STO.verificator')
                <a class="h2 text-center d-block d-md-none fw-bold text-decoration-none text-dark" href="{{ route('STO.Menu') }}">V E R I F I C A T O R</a>
            @break
        @default
    @endswitch

        <div class="row">
            <div class="col-12 nopadding">
                <div class="card bg-secondary bg-opacity-25">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 mb-3 ">
                                <label for="nrp">NRP <sup>*</sup></label>
                                <input type="number" class="form-control fw-bold" name="nrp" id="nrp" aria-describedby="nrpHelp" required readonly disabled value="{{ $data->nrp }}">
                            </div>
                            <div class="col-8 mb-3 ">
                                <label for="nama">NAMA <sup>*</sup></label>
                                <input type="text" class="form-control fw-bold" name="nama" id="nama" aria-describedby="namaHelp" required readonly disabled value="{{ $data->nama }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @switch(Route::current()->getName())
            @case('STO.counter')
                <form action="{{ url('/sto/modal-input/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-12 nopadding">
                            <div class="card bg-secondary bg-opacity-25">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5 mb-3">
                                            <label for="sloc">S.LOCATION <sup>*</sup></label>
                                            <select class="form-control fw-bold" name="sloc" id="sloc" required>
                                                <option class="dropdown-item form-control" >--Pilih--</option>
                                                <option class="dropdown-item form-control" name="sloc" value="0">0</option>
                                                <option class="dropdown-item form-control" name="sloc" value="1011">1011</option>
                                                <option class="dropdown-item form-control" name="sloc" value="1012">1012</option>
                                                <option class="dropdown-item form-control" name="sloc" value="1013">1013</option>
                                                <option class="dropdown-item form-control" name="sloc" value="1014">1014</option>
                                                <option class="dropdown-item form-control" name="sloc" value="1015">1015</option>
                                                <option class="dropdown-item form-control" name="sloc" value="1017">1017</option>
                                                <option class="dropdown-item form-control" name="sloc" value="1021">1021</option>
                                                <option class="dropdown-item form-control" name="sloc" value="1031">1031</option>
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
                                            <label for="nama_part">nama_part <sup>*</sup></label>
                                            <select class="form-control fw-bold" name="nama_part" id="nama_part" required>
                                                <option class="dropdown-item form-control" >--Pilih--</option>
                                            </select>
                                        </div>
                                        <div class="col-8 mb-3">
                                            <label for="jumlah">JUMLAH <sup>*</sup></label>
                                            <input type="text" class="form-control fw-bold" name="jumlah" id="jumlah" aria-describedby="jumlahHelp" required value="0" min="0">
                                        </div>
                                        <div class="col-4  mb-3">
                                            <label for="satuan">SATUAN <sup>*</sup></label>
                                            <input type="text" class="form-control fw-bold" name="satuan" id="satuan" aria-describedby="satuanHelp" required readonly>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="area">AREA <sup>*</sup></label>
                                            <select class="form-control fw-bold" name="area" id="area" required>
                                                <option class="dropdown-item form-control" >--Pilih--</option>
                                                <option class="dropdown-item form-control" name="area" value="ME">MELTING</option>
                                                <option class="dropdown-item form-control" name="area" value="GR">GRAVITY</option>
                                                <option class="dropdown-item form-control" name="area" value="CA">CASTING</option>
                                                <option class="dropdown-item form-control" name="area" value="MA">MACHINING</option>
                                                <option class="dropdown-item form-control" name="area" value="PA">PAINTING</option>
                                                <option class="dropdown-item form-control" name="area" value="FI">FININSHING</option>
                                                <option class="dropdown-item form-control" name="area" value="ASSY">ASSY</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="keterangan">KETERANGAN</label>
                                            <input type="text" class="form-control fw-bold" name="keterangan" id="keterangan" aria-describedby="keteranganHelp" required>
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
                </form>
                @break
            @case('STO.verificator')
                <div class="row mt-3">
                    <div class="col-12 nopadding">
                        <div class="card bg-secondary bg-opacity-25">
                            <div class="card-body">
                                <form enctype="multipart/form-data" onsubmit="addtag_sto(event)">
                                    <div class="input-group mb-2 float-lg-end" style="width:100%;">
                                        <input type="text" name="tag_sto" id="tag_sto" class="form-control" placeholder="Scan QR STO" autofocus required>
                                        <button type="submit" id="submitt" class="btn btn-secondary text-light btn-outline-secondary"><i class="fa-solid fa-magnifying-glass fa-lg"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 nopadding">
                        <div class="card bg-secondary bg-opacity-25">
                            <div class="card-body">
                                <p class="text-center"> <span class=" text-danger fw-bold">!!! PERINGATAN !!!</span> <br> Harap Pastikan Data Yang Muncul Sesuai Dengan Aktual Dan Apa Adanya.</p>
                            </div>
                        </div>
                    </div>
                </div>
                @break
            @default
        @endswitch
    <script>
        $(document).ready(function() {
            $("#nama_part").select2({
                // dropdownParent: $("#staticBackdrop")
            });
        });

        function addtag_sto(event){
            event.preventDefault(); // agar form tidak di eksekusi
            var tag_sto = $('#tag_sto').val();
            $.get('/sto/modal-verificator/'+tag_sto, {}, function (data, status) {
                $("#staticBackdropLabel").html("CEK DATA"); //Untuk kasih judul di modal
                $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
                $("#page").html(data); //menampilkan view create di dalam id page
                $("#tambahaninputan").html(
                    '<input type="text" name="kode_sap" value="'+tag_sto+'">'
                );
            });
        }

        $("#sloc").change(function(){
            var sloc = $(this).children("option:selected").val();
            console.log(sloc)
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/sto/api/sloc') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    sloc: sloc,
                },
                success: function (data) {
                    var myHTML = '';
                    data.forEach(element => {
                        var slice = element.material.slice(-2);
                        console.log(slice);
                        myHTML +=
                        '<option class="dropdown-item form-control" name="nama_part" value="'+element.nama_part+' - '+slice+'">'+element.nama_part+' - '+slice+'</option>'
                        $("#nama_part").html(myHTML);
                    });
                },
            });
        });

        $("#nama_part").change(function(){
            var nama_part = $(this).children("option:selected").val();
            console.log(nama_part)
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/sto/api/nama-part') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    nama_part: nama_part,
                },
                success: function (data) {
                },
            });
        });
        // $("#area").change(function(){
        //     var area = $(this).children("option:selected").val();
        //     console.log(area)
        //     $.ajax({
        //         method: "POST",
        //         dataType: "json",
        //         url: "{{ url('/sto/api/area') }}",
        //         data: {
        //             _token: "{{ csrf_token() }}",
        //             area: area,
        //         },
        //         success: function (data) {
        //         },
        //     });
        // });


    </script>
@endsection
