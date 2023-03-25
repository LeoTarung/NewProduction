<!DOCTYPE html>
<html lang="en" class="notranslate">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LHP | Template </title>
    {{-- //============[ CSS IN HERE ]============// --}}
    <link rel="stylesheet" type="text/css" href="/UI/CSS/style_lhp.css">
    <link rel="stylesheet" type="text/css" href="/UI/CSS/font.css">

    <script src="/UI/JS/fontawesomeV610.js"></script>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/boxicons/css/boxicons.css') }}"> --}}


    <link href="/UI/CSS/styles.css" rel="stylesheet" />
    <link href="/UI/CSS/datatables.css" rel="stylesheet" />
    {{-- //============[ JS IN HERE ]============// --}}
    <script src="/UI/JS/jquery363.js"></script>
    <script src="/UI/JS/jquerydatatables.js"></script>
</head>

<body>
    <div id="app">
        <div id="main">
            @include('partial.lhp-navbar')
            @include('partial/sweetallert')
            @yield('content')

            @if (Route::current()->getName() == 'lhpberid')
                <h1>KONTOL</h1>
            @else
                <h1>CUUAAAKKKKK</h1>
            @endif

            <div class="card mt-5">
                <div class="card-body">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis quia accusamus ex expedita officia, voluptatem ducimus laborum dolores est dolorem eveniet et! Eveniet nihil saepe minus ex. Optio maxime quisquam deleniti nesciunt dolorem sapiente dolore veritatis pariatur, necessitatibus nam consectetur, nostrum distinctio voluptatibus temporibus, repellendus unde ducimus repellat odit. Veniam nam error soluta, eveniet omnis doloribus reiciendis eos blanditiis ex molestias aspernatur minima accusamus adipisci voluptate dolorum assumenda voluptas non odio fugit illo iure ea, consectetur vero aliquid. Blanditiis culpa atque omnis vitae similique voluptas reiciendis eos, molestias reprehenderit voluptatibus quo illum nemo quaerat delectus dolorum repudiandae. Sapiente quod temporibus ex corporis repellendus, assumenda, accusamus eveniet non sint voluptas animi quam numquam harum! Mollitia ex optio quod. Nam blanditiis eos expedita! Ad eveniet necessitatibus quos voluptatum, veritatis similique eum sequi corrupti voluptas reprehenderit maiores totam dolorum rem dolore earum accusamus perferendis ex inventore quod aut facilis amet omnis accusantium quas. Voluptates cumque voluptatem repellendus aliquid voluptate ut expedita aut pariatur impedit vero officia sapiente consectetur praesentium ipsum facere, iusto illum ab excepturi aperiam dignissimos minima harum odio possimus. Est distinctio quod ratione eveniet repudiandae, odio consectetur accusantium, provident ad cupiditate id maiores veniam tempore omnis modi odit eum optio nam?
                </div>
            </div>

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
    <script src="/UI/JS/Socketio454.js"></script>
</body>

</html>
