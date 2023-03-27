<nav class="sb-topnav navbar navbar-expand navbar-light" style="background-color: #E9E8E8;">
    {{-- KIRI --}}
    <a href="{{ url('/dashboard') }}"><img src="/UI/IMG/nusametal-nobg.png" width="228" height="38"></a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    {{-- KANAN --}}
    <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="card fs-4 fw-bold p-1" id="MyClockDisplay" onload="showTime()">
        </div>
        {{-- <label id="MyClockDisplay" class="clock border border-bottom rounded" onload="showTime()">
        </label> --}}
        {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> Andhika Nur R</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#!">Logout</a></li>
            </ul>
        </li> --}}
    </ul>
</nav>
