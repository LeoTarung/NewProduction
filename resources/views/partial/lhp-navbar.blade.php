<nav class="nav shadow-lg">
    <ul>
        {{-- LOGO NUSAMETAL KIRI --}}
        <li>
            @switch(Route::current()->getName())
            @case('lhpmelting.input')
                <a href="{{ Route('lhpmelting.index') }}" class="">
                    <div class="rectangle-logo shadow">
                        <img class="navbarimg" src="/UI/IMG/nusametal-nobg.png" alt="Image" />
                    </div>
                </a>
            @break
            @case('lhpmelting.Supplyinput')
                <a href="{{ Route('lhpmelting.Supplyindex') }}" class="">
                    <div class="rectangle-logo shadow">
                        <img class="navbarimg" src="/UI/IMG/nusametal-nobg.png" alt="Image" />
                    </div>
                </a>
            @break
            @default
                <a href="{{ Request::url() }}" class="">
                    <div class="rectangle-logo shadow">
                        <img class="navbarimg" src="/UI/IMG/nusametal-nobg.png" alt="Image" />
                    </div>
                </a>
            @endswitch
        </li>

        {{-- KOLOM SHIFT --}}
        <li>
            @switch(Route::current()->getName())
                @case('lhpmelting.input')
                    <a onclick="resumeMelting('{{ $id }}', '{{ $area }}')">
                        <div class="shift border-bottom">
                            {{ $shift }}
                        </div>
                    </a>
                @break
                @case('lhpmelting.Supplyinput')
                    <a onclick="resumeMeltingSupply('{{ $id }}', '{{ $area }}')">
                        <div class="shift border-bottom">
                            {{ $shift }}
                        </div>
                    </a>
                @break
                @default
                    <a>
                        <div class="shift border-bottom">
                            {{ $shift }}
                        </div>
                    </a>
            @endswitch
        </li>

        {{-- JAM TENGAH  --}}
        <li class="ms-2">
            <a href="{{ Request::url() }}" class="time shadow-lg navitems">
                <div id="MyClockDisplay" class="clock " onload="showTime()"></div>
                <div id="date-1">
                </div>
            </a>
        </li>

        {{-- KOLOM NRP --}}
        <li>
            @switch(Route::current()->getName())
                @case('lhpmelting.input')
                    <a  class="navitems">
                        <div class="nrp">
                            <div class="font-white"> NRP : </div>
                        </div>
                        <div class="nrp nrp-child border-bottom ">
                            <div class="font-white fw-bold">{{ $data->nrp }}</div>
                        </div>
                    </a>
                @break
                @case('lhpmelting.Supplyinput')
                <a  class="navitems">
                    <div class="nrp">
                        <div class="font-white"> NRP : </div>
                    </div>
                    <div class="nrp nrp-child border-bottom ">
                        <div class="font-white fw-bold">{{ $data->nrp }}</div>
                    </div>
                </a>
                @break
                @default
                    <a  class="navitems">
                        <div class="nrp">
                            <div class="font-white"> SILAHKAN </div>
                        </div>
                        <div class="nrp nrp-child border-bottom ">
                            <div class="font-white fw-bold">PREPARATION</div>
                        </div>
                    </a>
            @endswitch
        </li>

        {{-- AREA --}}
        <li>
            @switch(Route::current()->getName())
                @case('lhpmelting.Supplyinput')
                    <a href="{{ Route('lhpmelting.Supplyindex') }}" class="machine shadow-lg">
                        <div class="mesin">
                                <div class="font-white"> {{ $area }} </div>
                        </div>
                    </a>
                @break
                @case('lhpmelting.input')
                    <a href="{{ Route('lhpmelting.index') }}" class="machine shadow-lg">
                        <div class="mesin">
                                <div class="font-white"> {{ $area }} </div>
                        </div>
                    </a>
                @break
                @default
                    <a href="" class="machine shadow-lg">
                        <div class="mesin">
                                <div class="font-white"> AREA PROSES </div>
                        </div>
                    </a>
            @endswitch
        </li>
        {{-- <li>
            <a onclick="ModalInstruksi('xx')">
                <div class="information" data-bs-toggle="modal" data-bs-target="#instruksi-kerja">
                    <i class="fa-regular fa-circle-question fa-3x text-light"></i>
                </div>
            </a>
        </li> --}}
    </ul>
</nav>

{{-- MODAL --}}
<!-- Modal -->
{{-- <div class="modal fade" id="ModalNavbar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="ModalNavbarLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="page" class="p-2"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}

</nav>
