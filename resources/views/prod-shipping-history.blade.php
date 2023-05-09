@extends('prod-template')
@section('content')
<h3 class="mt-2">History Delivery Parts</h3>
<div class="row">
    <div class="col-12 ">
        <div class="card">
            <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-calendar-week"></i>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="Table_HistoryDelivery" class="table table-striped-columns table-hover table-bordered display" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th nowrap="nowrap" class="text-center">NO</th>
                                <th nowrap="nowrap" class="text-center">SAP CODE</th>
                                <th nowrap="nowrap" class="text-center">TANGGAL PENGIRIMAN</th>
                                <th nowrap="nowrap" class="text-center">JAM</th>
                                <th nowrap="nowrap" class="text-center">CUSTOMER</th>
                                <th nowrap="nowrap" class="text-center">PLANT</th>
                                <th nowrap="nowrap" class="text-center">NAMA PART</th>
                                <th nowrap="nowrap" class="text-center">MATERIAL</th>
                                <th nowrap="nowrap" class="text-center">CUST MATERIAL</th>
                                <th nowrap="nowrap" class="text-center">QTY</th>
                                <th nowrap="nowrap" class="text-center">LOT</th>
                                <th nowrap="nowrap" class="text-center">RITASE</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        $(function () {
        var table = $('#Table_HistoryDelivery').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/prod/shipping/history') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {data: 'sap_code', name: 'sap_code'},
                {data: 'tanggal_pengiriman', name: 'tanggal_pengiriman'},
                {data: 'jam', name: 'jam'},
                {data: 'customer', name: 'customer'},
                {data: 'plant', name: 'plant'},
                {data: 'nama_part', name: 'nama_part'},
                {data: 'material', name: 'material'},
                {data: 'customer_material', name: 'customer_material'},
                {data: 'qty', name: 'qty'},
                {data: 'lot', name: 'lot'},
                {data: 'ritase', name: 'ritase'},
            ]
        });
    });
</script>
@endsection
