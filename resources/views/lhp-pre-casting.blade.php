@extends('lhp-template')
@section('content')
<form action="{{ url('/lhp-modal/pre-casting/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
    @csrf
    <div class="row g-2 m-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="card">
                                <div class="card-header text-center fw-bold bg-warning fs-4 bg-opacity-75">
                                  MAN POWER
                                </div>
                                <div class="card-body">
                                    @for($a=1; $a <= 6; $a++)
                                        <div class="row mb-3">
                                            <div class="col-4">
                                                <input type="number" class="form-control border border-dark" name="nrp_{{ $a }}" id="nrp_{{ $a }}" placeholder="NRP - {{ $a }}">
                                            </div>
                                            <div class="col-8">
                                                <input type="text" class="form-control border border-dark" name="nama_{{ $a }}" id="nama_{{ $a }}" placeholder="NAMA - {{ $a }}" readonly>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="card">
                                <div class="card-header text-center fw-bold bg-primary fs-4 bg-opacity-75">
                                  MACHINE INFORMATION
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row mb-3">
                                                <label for="inputLine" class="col-sm-2 col-form-label">Pilih Line :</label>
                                                <div class="col-sm-10">
                                                    <input type="radio" class="btn-check" name="line" id="line-1" value="1" autocomplete="off">
                                                    <label class="btn btn-outline-success" for="line-1">Line 1</label>
                                                    <input type="radio" class="btn-check" name="line" id="line-2" value="2" autocomplete="off">
                                                    <label class="btn btn-outline-success" for="line-2">Line 2</label>
                                                    <input type="radio" class="btn-check" name="line" id="line-3" value="3" autocomplete="off">
                                                    <label class="btn btn-outline-success" for="line-3">Line 3</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row mb-3">
                                                <label for="inputMachine" class="col-sm-2 col-form-label">Pilih Machine :</label>
                                                <div class="col-sm-10" id="MCCASTINGINHERE">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="string" class="form-control border-dark fw-bold" id="nama_part" name="nama_part" required readonly>
                                                <label for="nama_part" class="ms-2 text-dark">NAMA PART</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating mb-3">
                                                <input type="string" class="form-control border-dark fw-bold" id="cavity" name="cavity" required readonly>
                                                <label for="cavity" class="ms-2 text-dark">CAVITY</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input type="string" class="form-control border-dark fw-bold" id="dies" name="dies" required readonly>
                                                <label for="dies" class="ms-2 text-dark">DIES</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" id="submit" class="btn btn-primary w-100 h-75 fs-3">SUBMIT</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <script>
        function getLine(){
            const radioButtons = document.getElementsByName('line');
            radioButtons.forEach(radio => {
                radio.addEventListener('change', function() {
                    const selectedOption = document.querySelector('input[name="line"]:checked').value;
                    $.ajax({
                        method: "GET",
                        dataType: "json",
                        url: "{{ url('api/mesincastingbyline/') }}" +"/"+ selectedOption,
                        success: function (data) {
                            var  myHTML = '';
                            data.forEach(element => {
                                myHTML +=   '<input type="radio" class="btn-check" onclick="GetMachine()" name="mc" id="mc-'+element.mc+'" value="'+element.mc+'" autocomplete="off">'+
                                            '<label class="btn btn-outline-success mb-2 me-2" for="mc-'+element.mc+'" style="width: 4vw">'+element.mc+'</label>';
                            });
                            $("#MCCASTINGINHERE").html(myHTML);
                        },
                        error: function(status) {
                            $("#MCCASTINGINHERE").html('LOADING...');
                        }
                    });

                });
            });
        }
        getLine()

        function GetAllNrp(){
            $(document).ready(function() {
                for (let i = 1; i < 7; i++) {
                    $('#nrp_'+i).keyup(function() {
                        var searchnrp_i = $('#nrp_'+i).val();
                        $.ajax({
                            method: "GET",
                            dataType: "json",
                            url: "{{ url('/adm/api') }}" +"/"+ searchnrp_i,
                            success: function (data) {
                                console.log(data)
                                // console.log(searchnrp_i + 'adalah : ' + i)
                                switch (data.length) {
                                case 1 :
                                    $('#nama_'+i).val(data[0].name);
                                    break;
                                    default:
                                    $('#nama_'+i).val('Belum Terdaftar');
                                    break;
                                }
                            },
                            error: function(status) {
                                $('#nama_'+i).val('Belum Terdaftar');
                            }
                        });
                    });
                }
            });
        }
        GetAllNrp()

        function GetMachine() {
            const radioButtons = document.getElementsByName('mc');
            radioButtons.forEach(radio => {
                radio.addEventListener('change', function() {
                    const no_mc = document.querySelector('input[name="mc"]:checked').value;
                    console.log("pilih no mc berapa? " + no_mc);
                    $.ajax({
                        method: "POST",
                        dataType: "json",
                        url: "{{ url('/prod/api/machinecasting') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: no_mc,
                        },
                        success: function (data) {
                            $("#nama_part").val(data[0].d_b__namapart.nama_part);
                            $("#cavity").val(data[0].d_b__namapart.cavity);
                            $("#dies").val(data[0].nomor_dies);
                        },
                    });
                });
            });
        }
    </script>
@endsection
