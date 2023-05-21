<!DOCTYPE html>
<html lang="en" class="notranslate">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LHP | {{ $title }} </title>
    {{-- //============[ CSS IN HERE ]============// --}}
    <link  rel="stylesheet" type="text/css" href="/UI/CSS/styles.css"/>
    <link rel="stylesheet" type="text/css" href="/UI/CSS/style_lhp.css">
    <link rel="stylesheet" type="text/css" href="/UI/CSS/font.css">
    <script src="/UI/JS/fontawesomeV610.js"></script>
    <link href="/UI/CSS/datatables.css" rel="stylesheet" />
    <link href="/UI/CSS/select2.css" rel="stylesheet" />
    {{-- //============[ JS IN HERE ]============// --}}
    <script src="/UI/JS/jquery363.js"></script>
    <script src="/UI/JS/jquerydatatables.js"></script>
    <script src="/UI/JS/Socketio454.js"></script>
    <script src="/UI/JS/select2.js"></script>
</head>

<body>
    <div id="app">
        <div id="main">
            @include('partial.lhp-navbar')
            @include('partial/sweetallert')
            @yield('content')

            <div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="page">
                    </div>
                  </div>
                </div>
            </div>

            <footer class="my-auto text-center text-light">
                <i class='bx bxs-copyright'></i>
                2022 Copyright: P.E. Digitalization
            </footer>
        </div>
    </div>
    {{-- //============[ JS IN HERE ]============// --}}
    @include('sweetalert::alert')
    <script src="/UI/JS/bootstrap523.js"></script>
    <script src="/UI/JS/JSforLHP.js"></script>
</body>

</html>
