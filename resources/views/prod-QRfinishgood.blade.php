@extends('prod-template')
@section('content')
<h3 class="mt-2">QR Finish Good</h3>
<div class="row mt-3">
    <div class="col">
        <button class="btn btn-sm btn-secondary mb-2 float-start" onclick="addQRCodeFG()"><i class="fa-solid fa-ban"></i> Abnormality</button>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-paste"></i> PART FINISH GOOD
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="Table_PartFG" class="table table-striped-columns table-hover table-bordered nowrap display" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">NAMA PART</th>
                                <th class="text-center">KODE DARI CUSTOMER</th>
                                <th class="text-center">PN.Customer</th>
                                <th class="text-center">MATERIAL</th>
                                <th class="text-center">QTY / PACK</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                    </table>
                    <script>
                            $(function () {
                                var table = $('#Table_PartFG').DataTable({
                                    processing: true,
                                    serverSide: true,
                                    ajax: "{{ url('/qr/finishgood') }}",
                                    columns: [
                                        {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                                        {data: 'nama_part', name: 'nama_part'},
                                        {data: 'kode_customer', name: 'kode_customer'},
                                        {data: 'customer_material', name: 'customer_material'},
                                        {data: 'material', name: 'material'},
                                        {data: 'std_packaging', name: 'std_packaging'},
                                        {data: 'action', name: 'action', orderable: false, searchable: false},
                                    ]
                                });
                            });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function addQRCodeFG(){
        $.get("/qr/modal/finishgood/abnormality", {}, function (data, status) {
            $("#staticBackdropLabel").html("Add QR Data"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
        });
    }

    function PrintQRFG(id){
        // console.log(id)
        let newWin = window.open("{{ url('/qr/printQR') }}"+"/"+id+"/normal", "hello", "width=400,height=600");
        // setTimeout(() => {
        //     newWin.close()
        // }, 2000);
    }

    function EditQty(xx){
        $.get("/qr/modal/finishgood", {}, function (data, status) {
            $("#staticBackdropLabel").html("Abnormality Qty"); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/namapart/api') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: xx,
                },
                success: function (data) {
                    console.log(data)
                    $('#nama_part').val(data.nama_part);
                    $('#material').val(data.material);
                    $('#pn_customer').val(data.customer_material);
                    $('#qty').val(data.std_packaging);
                    $("#tambahaninputan").html(
                        '<input type="hidden" name="kode_customer" value="' + data.kode_customer + '">'
                    );
                }
            })
        });
    }
</script>
@endsection
