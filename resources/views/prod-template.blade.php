<!DOCTYPE html>
<html lang="en" class="notranslate">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PRODUCTION - {{ $title }}</title>
    <link href="/UI/CSS/styles.css" rel="stylesheet" />
    <link href="/UI/CSS/self-style.css" rel="stylesheet" />
    <script src="/UI/JS/fontawesomeV610.js"></script>
    <link href="/UI/CSS/datatables.css" rel="stylesheet" />
    <script src="/UI/JS/jquery363.js"></script>
    <script src="/UI/JS/jquerydatatables.js"></script>
    <script src="/UI/JS/Socketio454.js"></script>
    <script src="/UI/JS/fullcalenderIndex.global.min.js"></script>
    <script src="/UI/JS/amchart/Dailychart-Melting/index.js"></script>
    <script src="/UI/JS/amchart/Dailychart-Melting/xy.js"></script>
    <script src="/UI/JS/amchart/Dailychart-Melting/Animated.js"></script>
    <script src="/UI/JS/amchart/LossesChart-Melting/core.js"></script>
    <script src="/UI/JS/amchart/LossesChart-Melting/charts.js"></script>
    <script src="/UI/JS/amchart/LossesChart-Melting/Animated.js"></script>
    <script src="/UI/JS/radar.js"></script>
    <link href="/UI/CSS/select2.css" rel="stylesheet" />
    <script src="/UI/JS/select2.js"></script>
    <script src="/UI/JS/html5-qrcode.min.js"></script>
    <script src="/UI/JS/unpkghtml5-qrcode.min.js" type="text/javascript"></script>


    <script src="/UI/JS/dom-to-image.js"></script>
    <script src="/UI/JS/imin-printer.min.js"></script>
</head>

<body class="sb-nav-fixed bg-digital">
    @include('partial/prod-navbar')

    <div id="layoutSidenav">

        @include('partial/prod-sidebar')

        <div id="layoutSidenav_content" class="">
            <main>
                <div class="container-fluid px-4">
                    {{-- TESTING KAMERA --}}
                    {{-- <div class="mt-4" style="width: 500px" id="reader"></div>


                    <script>
                        var html5QrcodeScanner = new Html5QrcodeScanner(
                            "reader", {
                                fps: 10,
                                qrbox: 250
                            });
                        html5QrcodeScanner.render(onScanSuccess);

                        function onScanSuccess(decodedText, decodedResult) {
                            // Handle on success condition with the decoded text or result.
                            alert(`Scan result: ${decodedText}`, decodedResult);
                            // ...
                            html5QrcodeScanner.clear();
                            // ^ this will stop the scanner (video feed) and clear the scan area.
                        }

                        html5QrcodeScanner.render(onScanSuccess);

                        function onScanSuccess(decodedText, decodedResult) {
                            // Handle on success condition with the decoded text or result.
                            alert(`Scan result: ${decodedText}`, decodedResult);
                        }

                        function onScanError(errorMessage) {
                            // handle on error condition, with error message
                        }
                    </script> --}}

                    {{-- TESTING IMIN --}}
                    {{-- <style>
                        #PrintContent {
                            width: 920px;
                            /* height: 1900px; */
                            height: 2200px;
                            padding: 20px 0px;
                            /* line-height: 35px; */
                            /* overflow: auto; */
                            /* font-family: 'Instrument Serif', serif; */
                            /* font-family: 'Snippet', sans-serif; */
                            /* font-family: "Source Sans Pro", sans-serif; */
                            background-color: #ffffff;
                            /* border: 1px solid black !important; */

                        }

                        .printArea {
                            width: 100%;
                            height: 1900px;
                            margin-bottom: 150px;
                            border: 3px solid black !important;
                        }
                    </style> --}}
                    {{-- <button id="btn">print Image</button> --}}
                    {{-- <div class=" bg-warning" id="PrintContent">
                        <div class="printArea bg-primary">
                            <h1>123456789011121314151617181920</h1>
                        </div>
                    </div> --}}
                    {{-- <div id="PrintContent">
                        <div class="printArea">
                            <h1>123456789011121314151617181920</h1>
                        </div>
                    </div>
                    <script>
                        var IminPrintInstance = new IminPrinter();
                        IminPrintInstance.connect().then(async (isConnect) => {
                            if (isConnect) {
                                IminPrintInstance.initPrinter();
                                document.querySelector("#btn").addEventListener("click", () => {
                                    var node = document.getElementById("PrintContent");
                                    domtoimage.toJpeg(node).then(function(dataUrl) {
                                        console.log(dataUrl);
                                        IminPrintInstance.printSingleBitmap(dataUrl);
                                        IminPrintInstance.printAndFeedPaper(10);
                                    });
                                });
                            }
                        });
                    </script> --}}
                    @include('partial/sweetallert')
                    @yield('content')
                    {{-- <h1 class="mt-4">{{ $data->DB_Namapart->nama_part }}</h1> --}}

                    {{-- <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card">
                            <div class="card-body">
                                <h1>asdasdasdasdasd</h1>
                            </div>
                        </div> --}}
                    <div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="page">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-end small">
                        <div class="text-muted">Copyright &copy; P.E Digitalization</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="/UI/JS/bootstrap523.js"></script>
    <script src="/UI/JS/scripts.js"></script>
    <script src="/UI/JS/moment.js"></script>
</body>

</html>
