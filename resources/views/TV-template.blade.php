<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>NM | TV MELTING</title>
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
    {{-- <link href="/UI/CSS/performa_melting.css" rel="stylesheet" /> --}}
  </head>

    <body class="sb-nav-fixed bg-digital">
        <nav class="sb-topnav navbar navbar-expand navbar-light" style="background-color: #E9E8E8;">
            <img src="/UI/IMG/nusametal-nobg.png" width="228" height="40">
            <p class="d-none d-md-inline-block position-absolute top-50 start-50 translate-middle fw-bold fs-3 ">{{ $judul }}</p>
            <ul class="navbar-nav d-none d-lg-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

                <div class="card fs-4 fw-bold p-1" id="MyClockDisplay" onload="showTime()">
                </div>
            </ul>
        </nav>
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @include('partial/sweetallert')

                        @yield('content')
                    </div>
                </main>
                {{-- <footer class="py-4 bg-light mt-auto fixed-bottom">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-end small">
                            <div class="text-muted">Copyright &copy; P.E Digitalization</div>
                        </div>
                    </div>
                </footer> --}}
        </div>
        @include('sweetalert::alert')
        <script src="/UI/JS/bootstrap523.js"></script>
        <script src="/UI/JS/scripts.js"></script>
        <script src="/UI/JS/moment.js"></script>
    </body>
</html>
