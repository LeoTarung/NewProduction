<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light text-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-house-laptop fa-lg"></i></div>
                    Dashboard
                </a>
                <hr class="sidebar-divider my-1">
                {{-- <div class="sb-sidenav-menu-heading"></div> --}}
                <a class="nav-link collapsed" href="/" data-bs-toggle="collapse" data-bs-target="#collapseProduction" aria-expanded="false" aria-controls="collapseProduction">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gears fa-lg" href="/prod"></i></div>
                    Production
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProduction" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ms-3" href="{{ url('/prod/melting') }}">Melting</a>
                        <a class="nav-link ms-3" href="{{ url('/prod/casting') }}">Casting</a>
                        <a class="nav-link ms-3" href="">Machining</a>
                        <a class="nav-link ms-3" href="">Painting</a>
                        <a class="nav-link ms-3" href="">Assembling</a>
                        <a class="nav-link ms-3" href="">Final Inspection</a>
                        <a class="nav-link ms-3" href="">Shipping</a>
                    </nav>
                </div>
                <hr class="sidebar-divider my-1">
                <a class="nav-link" href="{{ url('/adm/mp') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group fa-lg"></i></div>
                    Man Power
                </a>
                <hr class="sidebar-divider my-1">
                <a class="nav-link" href="{{ url('/calenderEvent') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-days"></i></div>
                    Calender Of Event
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small ">Welcome, </div>
            <span class="fw-bold">Andhika Nur Rohman </span>
            {{-- <span class="fw-bold">{{ Auth::User()->name }} </span> --}}
            <a class="float-end text-danger" href="{{ url('/login/des') }}"> <i class="fa-solid fa-right-from-bracket fa-lg "></i></a>
        </div>
    </nav>
</div>
