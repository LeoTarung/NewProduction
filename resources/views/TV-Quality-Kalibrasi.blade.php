@extends('TV-template')
@section('content')
<div class="row">
    {{-- <div class="col-3">
        <img src="/UI/IMG/Dies.png" width="500" height="300" style="margin-top: 35%; margin-left: -30%;">
    </div> --}}
    <div class="col-6 mt-3">
        <div class="card">
            <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-check-double"></i> Calibration Achievement Yesterday
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="Table_AchKalibrasi" class="table table-striped-columns table-hover table-bordered display w-100" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th class="text-center">NAMA ALAT</th>
                                <th class="text-center">NO REGISTRASI</th>
                                <th class="text-center">JUDGEMENT</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_yesterday" >
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 mt-3">
        <div class="card">
            <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-check-double"></i> Calibration Achievement Today
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="Table_AchKalibrasi" class="table table-striped-columns table-hover table-bordered display w-100" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th class="text-center">NAMA ALAT</th>
                                <th class="text-center">NO REGISTRASI</th>
                                <th class="text-center">JUDGEMENT</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_today" >
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function ConvertIcon(data){
                if(data == 0){
                    hasil = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                }else if(data == 1){
                    hasil = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                }else{
                    hasil = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                }
            return hasil;
        }

        $(function() {
        let ip_node = location.hostname;
        let socket_port = '1553';
        let socket = io(ip_node + ':' + socket_port);
        socket.on('connection');
        socket.on("TV-AchKalibrasi", (DataSocket) => {
            console.log(DataSocket)
            var  myHTML = '';
            DataSocket.forEach(Data => {
                myHTML +=   '<tr>' +
                                '<td nowrap="nowrap">' + Data.nama_alat + '</td>' +
                                '<td nowrap="nowrap">' + Data.no_reg + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.judgement) + '</td>' +
                            '</tr>'
            });
            $("#tbody_today").html(myHTML);
        })
        socket.on("TV-AchKalibrasi-kemarin", (DataSocket) => {
            console.log(DataSocket)
            var  myHTML = '';
            DataSocket.forEach(Data => {
                myHTML +=   '<tr>' +
                                '<td nowrap="nowrap">' + Data.nama_alat + '</td>' +
                                '<td nowrap="nowrap">' + Data.no_reg + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.judgement) + '</td>' +
                            '</tr>'
            });
            $("#tbody_yesterday").html(myHTML);
        })
    });
    </script>
</div>
@endsection
