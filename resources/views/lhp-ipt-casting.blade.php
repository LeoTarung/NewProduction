@extends('lhp-template')
@section('content')
    <style>
        .btn-reject {
            background: url('/UI/IMG/btn-reject.png');
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 4rem;
            width: 100%;
            border-radius: 5rem;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        .btn-btnPrintPart {
            background: url('/UI/IMG/btn-PrintPart.png');
            background-repeat: no-repeat;
            background-size: 50% 100%;
            background-position: right;
            background-color: white;
            border-radius: 5rem;
            margin-bottom: 0.7rem;
            height: 3rem;
        }

        .scroll {
            /* max-height: 24.5rem; */
            max-height: 27.5rem;
            overflow-y: auto;
        }
    </style>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-3">
                <button class="btn btn-secondary bg-opacity-25  btn-sm w-100"
                    style="margin-bottom: 0.7rem; border: 1px solid black; border-radius: 1rem;" onclick="ScanTagQR()"><i
                        class="fa-solid fa-camera fa-xl"></i></button>
                <div class="card" style="margin-bottom: 0.7rem; border: 1px solid black; border-radius: 1rem;">
                    <div class="card-body"
                        style="border-left: 0.5rem solid #1bcbf0; border-bottom: 0.5rem solid #1bcbf0; border-radius: 1rem;">
                        <div class="row nopadding">
                            <div class="col-12 text-start h5 fw-bold" style="margin-bottom: -1rem; margin-top: -0.5rem; ">
                                TARGET
                            </div>
                            <div class="col-12 text-end fw-bold fs-1" style="margin-bottom: -1.3rem;" id="target">
                                @FormatRibu(0)<span class="fs-6 ms-1">PCS</span></div>
                        </div>
                    </div>
                </div>

                <div class="card" style="margin-bottom: 0.7rem; border: 1px solid black; border-radius: 1rem;">
                    <div class="card-body"
                        style="border-left: 0.5rem solid blue; border-bottom: 0.5rem solid blue; border-radius: 1rem;">
                        <div class="row nopadding">
                            <div class="col-12 text-start h5 fw-bold" style="margin-bottom: -1rem; margin-top: -0.5rem; ">
                                PRODUKSI
                            </div>
                            <div class="col-12 text-end fw-bold fs-1" style="margin-bottom: -1.3rem;" id="total_produksi">
                                @FormatRibu(0)<span class="fs-6 ms-1">PCS</span></div>
                        </div>
                    </div>
                </div>

                <div class="card" style="margin-bottom: 0.7rem; border: 1px solid black; border-radius: 1rem;">
                    <div class="card-body"
                        style="border-left: 0.5rem solid #198754; border-bottom: 0.5rem solid #198754; border-radius: 1rem;">
                        <div class="row nopadding">
                            <div class="col-12 text-start h5 fw-bold" style="margin-bottom: -1rem; margin-top: -0.5rem; ">
                                OK
                            </div>
                            <div class="col-12 text-end fw-bold fs-1" style="margin-bottom: -1.3rem;" id="total_ok">
                                @FormatRibu(0)<span class="fs-6 ms-1">PCS</span></div>
                        </div>
                    </div>
                </div>

                <div class="card" style="margin-bottom: 0.7rem; border: 1px solid black; border-radius: 1rem;">
                    <div class="card-body"
                        style="border-left: 0.5rem solid #dc3444; border-bottom: 0.5rem solid #dc3444; border-radius: 1rem;">
                        <div class="row nopadding">
                            <div class="col-12 text-start h5 fw-bold" style="margin-bottom: -1rem; margin-top: -0.5rem; ">
                                REJECTION
                            </div>
                            <div class="col-12 text-end fw-bold fs-1" style="margin-bottom: -1.3rem;" id="total_ng">
                                @FormatRibu(0)<span class="fs-6 ms-1">PCS</span></div>
                        </div>
                    </div>
                </div>

                <div class="card" style="margin-bottom: 0.7rem; border: 1px solid black; border-radius: 1rem;">
                    <div class="card-body"
                        style="border-left: 0.5rem solid #ffc107; border-bottom: 0.5rem solid #ffc107; border-radius: 1rem;">
                        <div class="row nopadding">
                            <div class="col-12 text-start h5 fw-bold" style="margin-bottom: -1rem; margin-top: -0.5rem; ">
                                DOWNTIME
                            </div>
                            <div class="col-12 text-end fw-bold fs-1" style="margin-bottom: -1.3rem;" id="total_downtime">
                                @FormatRibu(0)<span class="fs-6 ms-1">MIN</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card btn-btnPrintPart">
                    <div class="card-body">
                        <div class="row" style="margin-top: -0.5rem;">
                            <div class="col-11 fw-bold h3" id="namapart">COVER COMP WATER PUMP YR-GOLD K56A (SFG)#12
                            </div>
                            <div class="col-1" onclick="printQr()"><i class="ms-2 fa-solid fa-print fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card scroll mb-2" style="border: 0.1rem solid #dc3444; border-radius: 1rem;">
                    <div class="card-body">
                        <div class="row" id="insideROW">
                            {{-- @for ($i = 80; $i < 120; $i++)
                                <div class="col-3 mb-2" style="padding: 0.2rem !important;">
                                    <button type="button" class="btn btn-danger btn-reject text-dark">
                                        <div class="row">
                                            <div class="col-4 text-center align-middle fs-3 fw-bold">{{ $i }}
                                            </div>
                                            <div class="col-8 fw-bold">COATING TERKELUPASS</div>
                                        </div>
                                    </button>
                                </div>
                            @endfor --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let angkaTarget = 0;

        function UpdateTarget() {
            let angkanya = angkaTarget++
            $("#target").html(angkanya.toLocaleString('de-DE') + '<span class="fs-6 ms-1">PCS</span>');
        }
        let interval = setInterval(UpdateTarget, 1000);

        function BtnReject() {
            $.ajax({
                dataType: "json",
                url: "{{ url('/api/rejection/group') }}",
                success: function(data) {
                    $("form").attr("action", "{{ url('/prod/modal-casting/reject/save') }}");
                    var myHTML = '';
                    data.forEach(element => {
                        myHTML += '<div class="col-3 mb-2" style="padding: 0.2rem !important;">' +
                            '<button type="button" class="btn btn-danger btn-reject text-dark">' +
                            '<div class="row">' +
                            '<div class="col-4 text-center align-middle fs-3 fw-bold" id="' + element
                            .jenis_reject.replace(/\s/g, "") + '">0</div>' +
                            '<div class="col-8 fw-bold my-auto">' + element.jenis_reject +
                            '</div>' +
                            '</div>' +
                            '</button>' +
                            '</div>';
                    });
                    $("#insideROW").html(myHTML);
                },
            });
        }
        BtnReject()

        function LeftSideCasting() {
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "{{ url('/prod/api/machinecasting') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: {{ $data[0]->id_mesincasting }},
                },
                success: function(data) {
                    console.log(data)
                    // angka = 6000
                    $("#namapart").html(data[0].nomor_dies);

                    $("#total_produksi").html(data[0].total_produksi.toLocaleString('de-DE') +
                        '<span class="fs-6 ms-1">PCS</span>');
                    // $("#target").html(angka.toLocaleString('de-DE') + '<span class="fs-6 ms-1">PCS</span>');
                    // $("#target").html(angka.toLocaleString('de-DE') + '<span class="fs-6 ms-1">PCS</span>');
                    // $("#namapart").html(data[0].d_b__namapart.nama_part);
                    // $("#cavity").val(data[0].d_b__namapart.cavity);
                    // $("#dies").val(data[0].nomor_dies);
                },
            });
            // $.ajax({
            //     dataType: "json",
            //     url: "{{ url('/api/rejection/group') }}",
            //     success: function(data) {
            //         $("form").attr("action", "{{ url('/prod/modal-casting/reject/save') }}");
            //         var myHTML = '';
            //         data.forEach(element => {
            //             myHTML += '<div class="col-3 mb-2" style="padding: 0.2rem !important;">' +
            //                 '<button type="button" class="btn btn-danger btn-reject text-dark">' +
            //                 '<div class="row">' +
            //                 '<div class="col-4 text-center align-middle fs-3 fw-bold" id="' + element
            //                 .jenis_reject.replace(/\s/g, "") + '">0</div>' +
            //                 '<div class="col-8 fw-bold my-auto">' + element.jenis_reject +
            //                 '</div>' +
            //                 '</div>' +
            //                 '</button>' +
            //                 '</div>';
            //         });
            //         $("#insideROW").html(myHTML);
            //     },
            // });
        }
        LeftSideCasting()

        function printQr() {
            // $.get('/lhp-casting/printqr/' + {{ $data[0]->id }}, {}, function(data, status) {
            $(".modal-dialog").addClass("modal-fullscreen");
            $(".modal-dialog").removeClass("modal-xl");
            $.get('/lhp-casting/printqr', {}, function(data, status) {
                $("#staticBackdropLabel").html('Nanti Bakal Print QR'); //Untuk kasih judul di modal
                $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
                $("#page").html(data); //menampilkan view create di dalam id page
            });
            setTimeout(() => {
                $(".modal-dialog").removeClass("modal-fullscreen");
                $(".modal-dialog").addClass("modal-xl");
                $("#staticBackdrop").modal("hide");
            }, 1000);
            // $("#myModal").modal("hide");
            // alert('PRINT QR BERHASIL');
        }

        function ScanTagQR() {
            $.get('/lhp-casting/scanqrtag', {}, function(data, status) {
                $("#staticBackdropLabel").html('SCAN QR'); //Untuk kasih judul di modal
                $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
                $("#page").html(data); //menampilkan view create di dalam id page
            });
        }
    </script>
@endsection
