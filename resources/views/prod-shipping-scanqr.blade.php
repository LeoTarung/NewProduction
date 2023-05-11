@extends('prod-template')
@section('content')
<h3 class="mt-2 text-center">SHIPPING DELIVERY <br> <span id="TujuanCustomer" class="fw-bold"></span></h3>
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
                            <input type="text" class="form-control" id="customer" name="customer" required>

                        </div> --}}
                        <div class="col-12 mb-3">
                                <label class="fw-bold" for="customer" class="">Customer <sup>*</sup></label>
                                <div id="Form-Customer">

                                </div>
                                <div class="text-danger invalid-notif d-none" style="font-size: 85%;">
                                    *Jika salah input customer dan plant, Silahkan Hapus hasilScan dan refresh kembali.
                                </div>
                                <script>

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
    function SelectOption(){
        var plant = ['AHM - NSI/CBA1',
                    'AHM - NSI/CEA1',
                    'AHM - P1E1',
                    'AHM - P1E2',
                    'AHM - P1P1',
                    'AHM - P1P2',
                    'AHM - P2E3',
                    'AHM - P2P2',
                    'AHM - P2P3',
                    'AHM - P3E1',
                    'AHM - P3E3',
                    'AHM - P3P1',
                    'AHM - P3P3',
                    'AHM - P3P6',
                    'AHM - P7P1',
                    'AHM - P7P2',
                    'AHM - P8A1',
                    'AHM - P8P1',
                    'AHM - P8P2',
                    'AHM - P8P4',
                    'AHM - P8P5',
                    'ADM - ADM',
                    'AISIN - AISIN',
                    'ASK - ASK',
                    'ASPIRA - ASPIRA',
                    'CAI - CAI',
                    'DENSO - DENSO',
                    'DNP - DNP',
                    'EMI - EMI',
                    'HINO - HINO',
                    'HPM - HPM',
                    'HPM - HPM-AP2',
                    'KUBOTA INDONESIA - KUBOTA INDONESIA',
                    'KMI - KMI',
                    'KTB - KTB',
                    'KAYABA - KAYABA',
                    'MII - MII',
                    'MITSUBISHI - MITSUBISHI',
                    'NKI - NKI',
                    'SUZUKI - SUZUKI',
                    'TOYODA GOSEI - TOYODA GOSEI',
                    'TOYOTA - TOYOTA',
                    'YAMAHA - YAMAHA',
                    'YUTAKA - YUTAKA',];
        console.log(plant);
        var  myHTML = '';
        for (var i = 0; i < plant.length; i++) {
            myHTML +=  ' <option value="'+ plant[i] +'">'+ plant[i] +'</option>'
        }
        $("#Form-Customer").html('<select class="form-select fw-bold " id="customer" name="customer" required>' + myHTML);
        $(document).ready(function() {
            $("#customer").select2({});
        });
    }
    SelectOption()

    function upTable(){
        $.ajax({
                method: "GET",
                url: "{{ url('/prod/shipping/scan/notrans')."/".$area }}",
                success: function (data) {
                    console.log(data);
                    if(data.length == 0){
                        $("#customer").removeAttr("disabled", true);
                        $(".invalid-notif").removeClass("d-block");
                        $(".invalid-notif").addClass("d-none");
                        $("#TujuanCustomer").html("");

                    } else {
                        $("#customer").attr("disabled", true);
                        $(".invalid-notif").removeClass("d-none");
                        $(".invalid-notif").addClass("d-block");
                        $("#customer").val(data[0].customer + " - "+ data[0].plant).attr("selected", true);
                        $("#customer");
                        $("#TujuanCustomer").html("To " + data[0].customer + " - "+ data[0].plant);
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
                                        '<input type="hidden" class="form-control" id="area" name="area[]" value="'+ data[i].docking +'">' +
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
        var area = "{{ $area }}";
        $.ajax({
            method: "POST",
            url: "{{ url('/prod/shipping/scan/save') }}",
            data: {
                _token: "{{ csrf_token() }}",
                hasilscan: hasilscan,
                customer: customer,
                area: area,
            },
            success: function (data) {
                console.log("Berhasil Input Data");
            },
            error: function(jqXHR, textStatus, errorThrown) {
               alert("Part sudah pernah di scan, Atau tidak sesuai dengan customer. Silahkan cek kembali");
            }
        });
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
