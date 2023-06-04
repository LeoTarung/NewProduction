@extends('TV-template')
@section('content')
<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-measure-HPDC-tab" data-bs-toggle="pill" data-bs-target="#pills-measure-HPDC" type="button" role="tab" aria-controls="pills-measure-HPDC" aria-selected="true">MEASURE HPDC</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-measure-GDC-tab" data-bs-toggle="pill" data-bs-target="#pills-measure-GDC" type="button" role="tab" aria-controls="pills-measure-GDC" aria-selected="false">MEASURE GDC</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-measure-machining-tab" data-bs-toggle="pill" data-bs-target="#pills-measure-machining" type="button" role="tab" aria-controls="pills-measure-machining" aria-selected="false">MEASURE MACHINING</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-spectro-hpdc-tab" data-bs-toggle="pill" data-bs-target="#pills-spectro-hpdc" type="button" role="tab" aria-controls="pills-spectro-hpdc" aria-selected="false">SPECTRO HPDC</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-spectro-gdc-tab" data-bs-toggle="pill" data-bs-target="#pills-spectro-gdc" type="button" role="tab" aria-controls="pills-spectro-gdc" aria-selected="false">SPECTRO GDC</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-measure-HPDC" role="tabpanel" aria-labelledby="pills-measure-HPDC-tab" tabindex="0">
                <div class="card">
                    <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-paste"></i> Measurement Part HPDC</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="Table_Measurement" class="table table-striped-columns table-hover table-bordered nowrap display  w-100" style="overflow-x: scroll">
                                <thead>
                                    <tr>
                                        <th class="text-center">SHIFT</th>
                                        <th class="text-center">KATEGORI</th>
                                        <th class="text-center">NAMA PART - DIES</th>
                                        <th class="text-center">QTY</th>
                                        <th class="text-center">JUDGEMENT</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_measure_HPDC"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-measure-GDC" role="tabpanel" aria-labelledby="pills-measure-GDC-tab" tabindex="0">
                <div class="card">
                    <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-paste"></i> Measurement Part GDC</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="Table_Measurement" class="table table-striped-columns table-hover table-bordered nowrap display  w-100" style="overflow-x: scroll">
                                <thead>
                                    <tr>
                                        <th class="text-center">SHIFT</th>
                                        <th class="text-center">KATEGORI</th>
                                        <th class="text-center">NAMA PART - DIES</th>
                                        <th class="text-center">QTY</th>
                                        <th class="text-center">JUDGEMENT</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_measure_GDC"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-measure-machining" role="tabpanel" aria-labelledby="pills-measure-machining-tab" tabindex="0">
                <div class="card">
                    <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-paste"></i> Measurement Part Machining</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="Table_Measurement" class="table table-striped-columns table-hover table-bordered nowrap display  w-100" style="overflow-x: scroll">
                                <thead>
                                    <tr>
                                        <th class="text-center">SHIFT</th>
                                        <th class="text-center">KATEGORI</th>
                                        <th class="text-center">NAMA PART - DIES</th>
                                        <th class="text-center">QTY</th>
                                        <th class="text-center">JUDGEMENT</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_measure_MACHINING"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-spectro-hpdc" role="tabpanel" aria-labelledby="pills-spectro-hpdc-tab" tabindex="0">
                <div class="card">
                    <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-paste"></i> Spectrometer HPDC
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="Table_SpectroHPDC" class="table table-striped-columns table-hover table-bordered nowrap display  w-100" style="overflow-x: scroll">
                                <thead>
                                    <tr>
                                        <th class="text-center">FURNACE - MATERIAL</th>
                                        <th class="text-center">1A</th>
                                        <th class="text-center">1B</th>
                                        <th class="text-center">2A</th>
                                        <th class="text-center">2B</th>
                                        <th class="text-center">3A</th>
                                        <th class="text-center">3B</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_spectrometer_hpdc"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-spectro-gdc" role="tabpanel" aria-labelledby="pills-spectro-gdc-tab" tabindex="0">
                <div class="card">
                    <div class="card-header fw-bold font-monospace fs-5"><i class="fa-solid fa-paste"></i> Spectrometer GDC
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="Table_SpectroGDC" class="table table-striped-columns table-hover table-bordered nowrap display w-100" style="overflow-x: scroll">
                                <thead>
                                    <tr>
                                        <th class="text-center">FURNACE - MATERIAL</th>
                                        <th class="text-center">1</th>
                                        <th class="text-center">2</th>
                                        <th class="text-center">3</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_spectrometer_gdc"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var menu = 'measure-HPDC';
        setInterval(function(){
            if(menu == 'measure-HPDC'){
                // TAGNYA
                $('#pills-measure-HPDC-tab').addClass('active');
                $('#pills-measure-GDC-tab').removeClass('active');
                $('#pills-measure-machining-tab').removeClass('active');
                $('#pills-spectro-hpdc-tab').removeClass('active');
                $('#pills-spectro-gdc-tab').removeClass('active');
                //PAGENYA
                $('#pills-measure-HPDC').addClass('show active');
                $('#pills-measure-GDC').removeClass('show active');
                $('#pills-measure-machining').removeClass('show active');
                $('#pills-spectro-hpdc').removeClass('show active');
                $('#pills-spectro-gdc').removeClass('show active');
                xx = 'measure-GDC';
                menu = xx;
            }else if(menu == 'measure-GDC'){
                // TAGNYA
                $('#pills-measure-HPDC-tab').removeClass('active');
                $('#pills-measure-GDC-tab').addClass('active');
                $('#pills-measure-machining-tab').removeClass('active');
                $('#pills-spectro-hpdc-tab').removeClass('active');
                $('#pills-spectro-gdc-tab').removeClass('active');
                //PAGENYA
                $('#pills-measure-HPDC').removeClass('show active');
                $('#pills-measure-GDC').addClass('show active');
                $('#pills-measure-machining').removeClass('show active');
                $('#pills-spectro-hpdc').removeClass('show active');
                $('#pills-spectro-gdc').removeClass('show active');
                xx = 'measure-machining';
                menu = xx;
            }else if(menu == 'measure-machining'){
                // TAGNYA
                $('#pills-measure-HPDC-tab').removeClass('active');
                $('#pills-measure-GDC-tab').removeClass('active');
                $('#pills-measure-machining-tab').addClass('active');
                $('#pills-spectro-hpdc-tab').removeClass('active');
                $('#pills-spectro-gdc-tab').removeClass('active');
                //PAGENYA
                $('#pills-measure-HPDC').removeClass('show active');
                $('#pills-measure-GDC').removeClass('show active');
                $('#pills-measure-machining').addClass('show active');
                $('#pills-spectro-hpdc').removeClass('show active');
                $('#pills-spectro-gdc').removeClass('show active');
                xx = 'spectro-hpdc';
                menu = xx;
            }else if(menu == 'spectro-hpdc'){
                // TAGNYA
                $('#pills-measure-HPDC-tab').removeClass('active');
                $('#pills-measure-GDC-tab').removeClass('active');
                $('#pills-measure-machining-tab').removeClass('active');
                $('#pills-spectro-hpdc-tab').addClass('active');
                $('#pills-spectro-gdc-tab').removeClass('active');
                //PAGENYA
                $('#pills-measure-HPDC').removeClass('show active');
                $('#pills-measure-GDC').removeClass('show active');
                $('#pills-measure-machining').removeClass('show active');
                $('#pills-spectro-hpdc').addClass('show active');
                $('#pills-spectro-gdc').removeClass('show active');
                xx = 'spectro-gdc';
                menu = xx;
            }else if(menu == 'spectro-gdc'){
                // TAGNYA
                $('#pills-measure-HPDC-tab').removeClass('active');
                $('#pills-measure-GDC-tab').removeClass('active');
                $('#pills-measure-machining-tab').removeClass('active');
                $('#pills-spectro-hpdc-tab').removeClass('active');
                $('#pills-spectro-gdc-tab').addClass('active');
                //PAGENYA
                $('#pills-measure-HPDC').removeClass('show active');
                $('#pills-measure-GDC').removeClass('show active');
                $('#pills-measure-machining').removeClass('show active');
                $('#pills-spectro-hpdc').removeClass('show active');
                $('#pills-spectro-gdc').addClass('show active');
                xx = 'measure-HPDC';
                menu = xx;
            }else{
                xx = 'measure-HPDC';
                menu = xx;
                console.log("GAGAL MAS, HUBUNGIN TIM DIGITAL DEH")
            }
        }, 5000)
    </script>

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
        socket.on("TV-Measure-HPDC", (DataSocket) => {
            var  myHTML = '';
            DataSocket.forEach(Data => {
                tanggal =  moment( Data.created_at).format('YYYY-MM-DD');
                myHTML +=   '<tr>' +
                                '<td nowrap="nowrap">' + Data.shift + '</td>' +
                                '<td nowrap="nowrap">' + Data.kategori + '</td>' +
                                '<td nowrap="nowrap">' + Data.nama_part_dies + '</td>' +
                                '<td nowrap="nowrap">' + Data.qty + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.judgement) + '</td>' +
                            '</tr>'
            });
            $("#tbody_measure_HPDC").html(myHTML);
        })
        socket.on("TV-Measure-GDC", (DataSocket) => {
            var  myHTML = '';
            DataSocket.forEach(Data => {
                tanggal =  moment( Data.created_at).format('YYYY-MM-DD');
                myHTML +=   '<tr>' +
                                '<td nowrap="nowrap">' + Data.shift + '</td>' +
                                '<td nowrap="nowrap">' + Data.kategori + '</td>' +
                                '<td nowrap="nowrap">' + Data.nama_part_dies + '</td>' +
                                '<td nowrap="nowrap">' + Data.qty + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.judgement) + '</td>' +
                            '</tr>'
            });
            $("#tbody_measure_GDC").html(myHTML);
        })
        socket.on("TV-Measure-MACHINING", (DataSocket) => {
            console.log(DataSocket)
            var  myHTML = '';
            DataSocket.forEach(Data => {
                tanggal =  moment( Data.created_at).format('YYYY-MM-DD');
                myHTML +=   '<tr>' +
                                '<td nowrap="nowrap">' + Data.shift + '</td>' +
                                '<td nowrap="nowrap">' + Data.kategori + '</td>' +
                                '<td nowrap="nowrap">' + Data.nama_part_dies + '</td>' +
                                '<td nowrap="nowrap">' + Data.qty + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.judgement) + '</td>' +
                            '</tr>'
            });
            $("#tbody_measure_MACHINING").html(myHTML);
        })
        socket.on("TV-Spectro-HPDC", (DataSocket) => {
            console.log(DataSocket)
            var  myHTML = '';
            DataSocket.forEach(Data => {
                tanggal =  moment( Data.created_at).format('YYYY-MM-DD');
                myHTML +=   '<tr>' +
                                '<td nowrap="nowrap">' + Data.furnace + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.a) + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.b) + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.aa) + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.bb) + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.aaa) + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.bbb) + '</td>' +
                            '</tr>'
            });
            $("#tbody_spectrometer_hpdc").html(myHTML);
        })
        socket.on("TV-Spectro-GDC", (DataSocket) => {
            console.log(DataSocket)
            var  myHTML = '';
            DataSocket.forEach(Data => {
                tanggal =  moment( Data.created_at).format('YYYY-MM-DD');
                myHTML +=   '<tr>' +
                                '<td nowrap="nowrap">' + Data.furnace + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.a) + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.aa) + '</td>' +
                                '<td class="text-center">' + ConvertIcon(Data.aaa) + '</td>' +
                            '</tr>'
            });
            $("#tbody_spectrometer_gdc").html(myHTML);
        })
    });
    </script>
</div>
@endsection
