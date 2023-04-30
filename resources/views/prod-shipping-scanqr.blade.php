@extends('prod-template')
@section('content')
<h3 class="mt-2 text-center">SHIPPING DELIVERY</h3>
<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-12">
                        <form enctype="multipart/form-data" onsubmit="addScanQr(event)">
                            <div class="input-group mb-3 float-lg-end" style="width:70%;">
                                <input type="text" name="hasilScan" id="hasilScan" class="form-control" placeholder="Scan QR" autofocus required>
                                <button type="submit" id="submit" class="btn btn-secondary text-light btn-outline-secondary"><i class="fa-solid fa-magnifying-glass fa-lg"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <form action="{{ url('/prod/shipping/scan/update') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 50%">NAMA PART</th>
                                        <th style="width: 25%">MATERIAL</th>
                                        <th style="width: 10%">QTY</th>
                                        <th style="width: 15%">LOT</th>
                                        <th style="width: 15%">AKSI</th>
                                    </tr>
                                </thead>
                                @csrf
                                <tbody class="table-group-divider" id="tbody-table">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="col-12 mb-3">
                    <label class="fw-bold" for="customer" class="">Customer <sup>*</sup></label>
                    <select class="form-select fw-bold" id="customer" name="customer" required>
                        <option value="AHM - NSI/CBA1">AHM - NSI/CBA1</option>
                        <option value="AHM - NSI/CEA1">AHM - NSI/CEA1</option>
                        <option value="AHM - P1E1">AHM - P1E1</option>
                        <option value="AHM - P1E2">AHM - P1E2</option>
                        <option value="AHM - P1P1">AHM - P1P1</option>
                        <option value="AHM - P1P2">AHM - P1P2</option>
                        <option value="AHM - P2E3">AHM - P2E3</option>
                        <option value="AHM - P2P2">AHM - P2P2</option>
                        <option value="AHM - P2P3">AHM - P2P3</option>
                        <option value="AHM - P3E1">AHM - P3E1</option>
                        <option value="AHM - P3E3">AHM - P3E3</option>
                        <option value="AHM - P3P1">AHM - P3P1</option>
                        <option value="AHM - P3P3">AHM - P3P3</option>
                        <option value="AHM - P3P6">AHM - P3P6</option>
                        <option value="AHM - P7P1">AHM - P7P1</option>
                        <option value="AHM - P7P2">AHM - P7P2</option>
                        <option value="AHM - P8A1">AHM - P8A1</option>
                        <option value="AHM - P8P1">AHM - P8P1</option>
                        <option value="AHM - P8P2">AHM - P8P2</option>
                        <option value="AHM - P8P4">AHM - P8P4</option>
                        <option value="AHM - P8P5">AHM - P8P5</option>
                        <option value="ADM - ADM">ADM</option>
                        <option value="AISIN - AISIN">AISIN</option>
                        <option value="ASK - ASK">ASK</option>
                        <option value="ASPIRA - ASPIRA">ASPIRA</option>
                        <option value="CAI - CAI">CAI</option>
                        <option value="DENSO - DENSO">DENSO</option>
                        <option value="DNP - DNP">DNP</option>
                        <option value="EMI - EMI">EMI</option>
                        <option value="HINO - HINO">HINO</option>
                        <option value="HPM - HPM">HPM</option>
                        <option value="HPM-AP2 - HPM-AP2">HPM-AP2</option>
                        <option value="KBI - KBI">KBI</option>
                        <option value="KMI - KMI">KMI</option>
                        <option value="KTB - KTB">KTB</option>
                        <option value="KYB - KYB">KYB</option>
                        <option value="MII - MII">MII</option>
                        <option value="MKM - MKM">MKM</option>
                        <option value="NKI - NKI">NKI</option>
                        <option value="SIM - SIM">SIM</option>
                        <option value="TGID - TGID">TGID</option>
                        <option value="TMMIN - TMMIN">TMMIN</option>
                        <option value="YMI - YMI">YMI</option>
                        <option value="YTK - YTK">YTK</option>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#customer").select2({
                            });
                        });
                    </script>
                </div>
                <div class="col-12 mb-3">
                    <label for="ritase" class="fw-bold">Ritase <sup>*</sup></label>
                    <input type="number" class="form-control" id="ritase" name="ritase" value="1" min="1" required>
                </div>
                <div class="row justify-content-around">
                    <div class="col-5">
                        <a href="{{ '/prod/shipping/' }}" class="btn btn-danger float-end"><i class="fa-solid fa-left-long"></i> Kembali</a>
                    </div>
                    <div class="col-5">
                        <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<script>
    function upTable(){
        $.ajax({
                method: "GET",
                url: "{{ url('/prod/shipping/scan/notrans') }}",
                success: function (data) {
                    var  myHTML = '';
                    for (var i = 0; i < data.length; i++) {
                        myHTML +=   '<tr>' +
                                        '<td style="width: 50%"><input type="text" class="form-control" name="nama_part[]" value="'+ data[i].nama_part +'" readonly></td>'+
                                        '<td style="width: 25%"><input type="text" class="form-control" id="customer_material" name="customer_material[]" value="'+ data[i].customer_material +'" readonly></td>'+
                                        '<td style="width: 10%"><input type="text" class="form-control" id="qty" name="qty[]" value="'+ data[i].qty +'" readonly></td>'+
                                        '<td style="width: 15%"><input type="text" class="form-control" id="lot" name="lot[]" value="'+ data[i].lot +'" readonly></td>'+
                                        '<td style="width: 15%"><a class="btn fa-solid fa-trash fa-lg text-warning" onclick="hapusData('+ data[i].id +')" readonly></a></td>' +
                                        '<input type="hidden" class="form-control" id="id" name="id[]" value="'+ data[i].id +'">' +
                                    '</tr>'
                    }
                    $("#tbody-table").html(myHTML);
                },
            });
    }
    upTable()

    function addScanQr(){
        event.preventDefault();
        var hasilscan = $('#hasilScan').val();
        // console.log(hasilscan);
        $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/shipping/scan/save') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    hasilscan: hasilscan,
                },
                success: function (data) {
                },
        });
        upTable()
        $('#hasilScan').val("");
    }

    function hapusData(xx){
        $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/shipping/scan/delete') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                },
        });
        upTable()
    }

    function simpan(){
        document.getElementById("submitan").disabled = true;
        // mendapatkan semua elemen dengan class "nama_part"
        var nama_part_inputs = $('.nama_part').val();

        console.log(nama_part_inputs)
        // iterasi pada setiap elemen dan mengambil nilai valuenya
        // nama_part_inputs.each(function() {
        // var value = $(this).val();
        // console.log(value);
        // });
    }

</script>
@endsection
