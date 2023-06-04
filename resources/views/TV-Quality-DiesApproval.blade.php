@extends('TV-template')
@section('content')
<div class="row">
    {{-- <div class="col-3">
        <img src="/UI/IMG/Dies.png" width="500" height="300" style="margin-top: 35%; margin-left: -30%;">
    </div> --}}
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="Table_DiesApproval" class="table table-striped-columns table-hover table-bordered display w-100" style="overflow-x: scroll">
                        <thead>
                            <tr>
                                <th class="text-center" rowspan="2">TANGGAL</th>
                                <th  class="text-center" rowspan="2" >NAMA PART</th>
                                <th class="text-center" rowspan="2">DIES</th>

                                <th class="text-center" colspan="7">STATUS</th>
                            </tr>
                            <tr>
                                <th class="text-center">PENGUKURAN</th>
                                <th class="text-center">SAM-APPV</th>
                                <th class="text-center">DOC-APPV</th>
                                <th class="text-center">SUBMIT SAMPLE</th>
                                <th class="text-center">PA</th>
                                <th class="text-center">IPP</th>
                                <th class="text-center">MASS</th>
                            </tr>
                        </thead>
                        <tbody id="tbody" >
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function ConvertIcon(data){
                if(data == 0){
                    hasil = '<a class="fa-solid fa-circle-exclamation text-warning fa-2x"></a>';
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
        socket.on("TV-DiesApproval", (DataSocket) => {
            console.log(DataSocket)
            var  myHTML = '';
            DataSocket.forEach(Data => {
                tanggal =  moment( Data.created_at).format('YYYY-MM-DD');
                myHTML +=   '<tr>' +
                                '<td nowrap="nowrap">' + tanggal + '</td>' +
                                '<td nowrap="nowrap">' + Data.nama_part + '</td>' +
                                '<td>' + Data.no_dies  + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.status_pengukuran) + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.sample_approval) + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.document_approval) + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.status_submit_sample) + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.status_submit_pa) + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.status_submit_ipp) + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.status_submit_masspro) + '</td>' +
                            '</tr>'
            });
            $("#tbody").html(myHTML);
        })
    });
    </script>
</div>
@endsection
