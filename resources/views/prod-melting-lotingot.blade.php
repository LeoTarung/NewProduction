@extends('prod-template')
@section('content')
<h3 class="mt-2 text-center">BUNDLE INGOT</h3>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-paste"></i></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="Table_BundleIngot" class="table table-striped-columns table-hover table-bordered nowrap display" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">TANGGAL</th>
                                <th class="text-center">JAM</th>
                                <th class="text-center">MATERIAL</th>
                                <th class="text-center">LOT BUNDLE</th>
                                <th class="text-center">AKSI</th>
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
        var table = $('#Table_BundleIngot').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/prod/melting/lot/ingot') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' },
                {data: 'tanggal', name: 'tanggal'},
                {data: 'jam', name: 'jam'},
                {data: 'material', name: 'material'},
                {data: 'lot_bundle', name: 'lot_bundle'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endsection
