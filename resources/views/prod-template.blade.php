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

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
    <body class="sb-nav-fixed bg-digital">
        @include('partial/prod-navbar')

        <div id="layoutSidenav">

            @include('partial/prod-sidebar')

            <div id="layoutSidenav_content" class="">
                <main>
                    <div class="container-fluid px-4">
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
                        <div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="page" >
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
