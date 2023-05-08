@extends('prod-template')
@section('content')
<h3 class="mt-2 text-center">SHIPPING DELIVERY</h3>
    <div class="row justify-content-end">
        <div class="col-12 col-lg-6 ">
            <form enctype="multipart/form-data" onsubmit="addScanQr(event)">
                <div class="input-group mb-3 float-lg-end" >
                    <input type="text" name="hasilScan" id="hasilScan" class="form-control" placeholder="Scan QR" autofocus required>
                    <button type="submit" id="submit" class="btn btn-secondary text-light btn-outline-secondary"><i class="fa-solid fa-magnifying-glass fa-lg"></i></button>
                </div>
            </form>
        </div>
    </div>
    <form action="{{ url('/prod/shipping/scan/update') }}" method="POST" enctype="multipart/form-data" onsubmit="simpan()">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="col-12 mb-5">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">

                        </div> --}}
                        <div class="col-12 mb-3">
                                <label class="fw-bold" for="customer" class="">Customer <sup>*</sup></label>
                                <select class="form-select fw-bold " id="customer" name="customer" required>
                                    <option disabled selected>-- Pilih Customer dan Plant --</option>
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
                                    <option value="ASK - ASK">ASK</option> {{-- ini gaada --}}
                                    <option value="ASPIRA - ASPIRA">ASPIRA</option> {{-- ini gaada --}}
                                    <option value="CAI - CAI">CAI</option>
                                    <option value="DENSO - DENSO">DENSO</option>
                                    <option value="DNP - DNP">DNP</option>
                                    <option value="EMI - EMI">EMI</option> {{-- ini gaada --}}
                                    <option value="HINO - HINO">HINO</option>
                                    <option value="HPM - HPM">HPM</option>
                                    <option value="HPM - HPM-AP2">HPM-AP2</option>
                                    <option value="KUBOTA INDONESIA - KUBOTA INDONESIA">KUBOTA INDONESIA</option>
                                    <option value="KMI - KMI">KMI</option> {{-- ini gaada --}}
                                    <option value="KTB - KTB">KTB</option>
                                    <option value="KAYABA - KAYABA">KAYABA</option>
                                    <option value="MII - MII">MII</option> {{-- ini gaada --}}
                                    <option value="MITSUBISHI - MITSUBISHI">MITSUBISHI</option>
                                    <option value="NKI - NKI">NKI</option>
                                    <option value="SUZUKI - SUZUKI">SUZUKI</option>
                                    <option value="TOYODA GOSEI - TOYODA GOSEI">TOYODA GOSEI</option>
                                    <option value="TOYOTA - TOYOTA">TOYOTA</option>
                                    <option value="YAMAHA - YAMAHA">YAMAHA</option>
                                    <option value="YUTAKA - YUTAKA">YUTAKA</option>
                                </select>
                                <div class="text-danger invalid-notif d-none" style="font-size: 85%;">
                                    *Jika salah input customer dan plant, Silahkan Hapus hasilScan dan refresh kembali.
                                </div>
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
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th >NO TAG</th>
                                                <th >NAMA PART</th>
                                                <th >MATERIAL</th>
                                                <th >QTY</th>
                                                <th >LOT</th>
                                                <th >AKSI</th>
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
        </div>
    </form>
<script>
    function upTable(){
        $.ajax({
                method: "GET",
                url: "{{ url('/prod/shipping/scan/notrans') }}",
                success: function (data) {
                    if(data.length == 0){
                        $("#customer").removeAttr("disabled", true);
                        $(".invalid-notif").removeClass("d-block");
                        $(".invalid-notif").addClass("d-none");

                    } else {
                        $("#customer").attr("disabled", true);
                        $(".invalid-notif").removeClass("d-none");
                        $(".invalid-notif").addClass("d-block");
                        $("#customer").val(data[0].customer + " - "+ data[0].plant).attr("selected", true);
                        $("#customer");
                    }
                    var  myHTML = '';
                    for (var i = 0; i < data.length; i++) {
                        let pieces = data[i].isiqr.split("|");
                        let fiveDigits = pieces[3].substring(pieces[3].length - 5);
                        myHTML +=   '<tr>' +
                                        '<td ><input type="text" class="form-control" name="No_tag[]" value="'+ fiveDigits +'" readonly></td>'+
                                        '<td ><input type="text" class="form-control" name="nama_part[]" value="'+ data[i].nama_part +'" readonly></td>'+
                                        '<td ><input type="text" class="form-control" id="customer_material" name="customer_material[]" value="'+ data[i].customer_material +'" readonly></td>'+
                                        '<td ><input type="text" class="form-control" id="qty" name="qty[]" value="'+ data[i].qty +'" readonly></td>'+
                                        '<td ><input type="text" class="form-control" id="lot" name="lot[]" value="'+ data[i].lot +'" readonly></td>'+
                                        '<td ><a class="btn fa-solid fa-trash fa-lg text-warning" onclick="hapusData('+ data[i].id +')" readonly></a></td>' +
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
        var customer = $('#customer').val();
        $.ajax({
            method: "POST",
            url: "{{ url('/prod/shipping/scan/save') }}",
            data: {
                _token: "{{ csrf_token() }}",
                hasilscan: hasilscan,
                customer: customer,
            },
            success: function (data) {
                console.log("Berhasil Input Data");
            },
            error: function(jqXHR, textStatus, errorThrown) {
               alert("Part sudah pernah di scan, Atau tidak sesuai dengan customer. Silahkan cek kembali");
            }
        });
        $("#customer").attr("disabled", true);
        $(".invalid-notif").removeClass("d-none");
        $(".invalid-notif").addClass("d-block");
        $('#hasilScan').val("");
        upTable()
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
        document.getElementById("customer").disabled = false;
        document.getElementById("submitan").disabled = true;
        upTable()
    }

</script>
@endsection
