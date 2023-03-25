<nav class="nav shadow-lg">
    <ul>
        {{-- LOGO NUSAMETAL KIRI --}}
        <li>
            <a href="" class="navbar-brand">
                <div class="rectangle-logo shadow">
                    <img class="navbarimg" src="/UI/IMG/nusametal-nobg.png" alt="Image" />
                </div>
            </a>
        </li>

        {{-- KOLOM SHIFT --}}
        <li>
            <a>
                <div class="shift border-bottom">
                    SHIFT-2
                </div>
            </a>
            <div class="old-Program">
                    {{-- LHP CASTING --}}
                {{-- @if (Request::url() == url('/lhp-casting')) --}}
                    {{-- <a>
                        <div class="shift border-bottom">
                            {{ $shift }}
                        </div>
                    </a> --}}
                {{-- @elseif (Request::url() == url('/lhp-casting/lhp-casting')) --}}
                    {{-- <a>
                        <div class="shift border-bottom">
                            {{ $shift }}
                        </div>
                    </a> --}}


                    {{-- { LHP MELTING} --}}
                {{-- @elseif (Request::url() == url('/lhp-melting')) --}}
                    {{-- <a>
                        <div class="shift border-bottom">
                            {{ $shift }}
                        </div>
                    </a> --}}
                {{-- @elseif(Request::url() == url('/lhp-melting/' . $mesin . '/' . $id . '')) --}}
                    {{-- <a onClick="ModalResume('{{ $mesin }}', '{{ $id }}')">
                        <div class="shift border-bottom">
                            {{ $shift }}
                        </div>
                    </a> --}}

                    {{-- { LHP SUPPLY} --}}
                {{-- @elseif(Request::url() == url('/lhpforklift')) --}}
                    {{-- <a>
                        <div class="shift border-bottom">
                            {{ $shift }}
                        </div>
                    </a> --}}
                {{-- @elseif(Request::url() == url('/forklift/' . $mesin . '/' . $id . '')) --}}
                    {{-- <a onClick="ModalSupply('{{ $mesin }}', '{{ $id }}')">
                        <div class="shift border-bottom">
                            {{ $shift }}
                        </div>
                    </a> --}}
                {{-- @endif --}}
            </div>
        </li>

        {{-- JAM TENGAH  --}}
        <li class="ms-2">
            <a href="" class="time shadow-lg navitems">
                <div id="MyClockDisplay" class="clock " onload="showTime()"></div>
                <div id="date-1">
                </div>
            </a>
        </li>

        {{-- KOLOM NRP --}}
        <li>
            <a href="" class="navitems">
                <div class="nrp">
                    <div class="font-white"> NRP : </div>
                </div>
                <div class="nrp nrp-child border-bottom ">
                    <div class="font-white fw-bold">3551</div>
                </div>
            </a>
            {{-- <a href="{{ url('/lhp-melting') }}" class="navitems">
                <div class="nrp border-bottom">
                    <div class="font-white"> PILIH MESIN </div>
                </div>
            </a> --}}
            {{-- <a href="{{ url('/lhpforklift') }}" class="navitems">
                <div class="nrp border-bottom">
                    <div class="font-white"> PILIH FORKLIFT </div>
                </div>
            </a>
            <a href="{{ url('/lhp-melting') }}" class="navitems">
                <div class="nrp border-bottom">
                    <div class="font-white"> CASTING</div>
                </div>
            </a> --}}
            {{-- <a href="{{ url('/settings') }}" class="navitems">
                <div class="nrp border-bottom">
                    <div class="font-white"> Admin </div>
                </div>
            </a> --}}
            {{-- <a href="{{ url('/settings') }}" class="navitems">
                <div class="nrp border-bottom">
                    <div class="font-white"> Menu Utama </div>
                </div>
            </a> --}}
            <div class="old-Program">
                    {{-- LHP Casting --}}
                    {{-- Preparation casting --}}
                    {{-- @if ($nrp != 0 && Request::url() == url('/lhp-casting'))
                        <a href="{{ url('/lhp-casting') }}" class="navitems">
                            <div class="nrp">
                                <div class="font-white"> NRP : </div>
                            </div>
                            <div class="nrp nrp-child border-bottom ">
                                <div class="font-white fw-bold">{{ $nrp }}</div>
                            </div>
                        </a>
                    @elseif (Request::url() == url('/lhp-casting'))
                        <a href="{{ url('/lhp-casting') }}" class="navitems">
                            <div class="nrp border-bottom">
                                <div class="font-white"> Preparation </div>
                            </div>
                        </a> --}}
                        {{-- lhp casting  --}}
                    {{-- @elseif (Request::url() == url('/lhp-casting/lhp-casting')) --}}



                    {{-- LHP MELTING --}}
                {{-- @elseif ($nrp != 0 && Request::url() == url('/lhp-melting')) --}}
                    {{-- <a href="{{ url('/lhp-melting') }}" class="navitems">
                        <div class="nrp">
                            <div class="font-white"> NRP : </div>
                        </div>
                        <div class="nrp nrp-child border-bottom ">
                            <div class="font-white fw-bold">{{ $nrp }}</div>
                        </div>
                    </a> --}}
                {{-- @elseif(Request::url() == url('/lhp-melting')) --}}

                {{-- @elseif(Request::url() == url('/lhp-melting/' . $mesin . '/' . $id . '')) --}}
                    {{-- <a href="{{ url('/lhp-melting') }}" class="navitems">
                        <div class="nrp">
                            <div class="font-white"> NRP : </div>
                        </div>
                        <div class="nrp nrp-child border-bottom ">
                            <div class="font-white fw-bold">{{ $nrp }}</div>
                        </div>
                    </a> --}}

                    {{-- LHP FORKLIFT --}}
                {{-- @elseif ($nrp != 0 && Request::url() == url('/lhpforklift')) --}}
                    {{-- <a href="{{ url('/lhpforklift') }}" class="navitems">
                        <div class="nrp">
                            <div class="font-white"> NRP : </div>
                        </div>
                        <div class="nrp nrp-child border-bottom ">
                            <div class="font-white fw-bold">{{ $nrp }}</div>
                        </div>
                    </a> --}}
                {{-- @elseif($nrp == null && Request::url() == url('/lhpforklift')) --}}

                {{-- @elseif(Request::url() == url('/forklift/' . $mesin . '/' . $id . '')) --}}
                    {{-- <a href="{{ url('/lhpforklift') }}" class="navitems">
                        <div class="nrp">
                            <div class="font-white"> NRP : </div>
                        </div>
                        <div class="nrp nrp-child border-bottom ">
                            <div class="font-white fw-bold">{{ $nrp }}</div>
                        </div>
                    </a> --}}

                    {{-- LHP CASTING --}}
                {{-- @elseif(Request::url() == url('/final')) --}}


                    {{-- SETTINGS --}}
                {{-- @elseif(Request::url() == url('/settings')) --}}

                {{-- @elseif(Request::url() == url('/settings/mesincasting/' . $id . '')) --}}

                {{-- @endif --}}
            </div>


        </li>
        <li>
            <a href="" class="machine shadow-lg">
                <div class="mesin">
                        <div class="font-white choose_machine"> MESIN </div>
                </div>
            </a>

            {{-- Preparation Casting --}}
            {{-- @if ($mesin == 'CASTING') --}}
                {{-- <a href="{{ url('/lhp-casting') }}" class="machine shadow-lg">
                    <div class="mesin">
                        <div class="font-white choose_machine"> {{ $mesin }} </div>
                    </div>
                </a> --}}
                {{-- Preparation Forklift --}}
            {{-- @elseif ($mesin == 'FORKLIFT') --}}
                {{-- <a href="{{ url('/lhpforklift') }}" class="machine shadow-lg">
                    <div class="mesin">
                        @if ($mesin == 'FORKLIFT')
                            <div class="font-white "> {{ $mesin }} </div>
                        @else
                            <div class="font-white choose_machine"> {{ $mesin }} </div>
                        @endif
                    </div>
                </a> --}}


                {{-- LHP Forklift --}}
            {{-- @elseif($mesin == $forklift) --}}
                {{-- <a href="{{ url('/lhpforklift') }}" class="machine shadow-lg">
                    <div class="mesin">
                        @if ($mesin == 'FINAL .INS')
                            <div class="font-white "> {{ $mesin }} </div>
                        @else
                            <div class="font-white choose_machine"> {{ $mesin }} </div>
                        @endif
                    </div>
                </a> --}}

                {{-- Setting --}}
            {{-- @elseif(Request::url() == url('/settings')) --}}
                {{-- <a href="{{ url('/settings') }}" class="machine shadow-lg">
                    <div class="mesin">
                        @if ($mesin == 'FINAL .INS')
                            <div class="font-white "> {{ $mesin }} </div>
                        @else
                            <div class="font-white choose_machine"> {{ $mesin }} </div>
                        @endif
                    </div>
                </a> --}}
            {{-- @elseif(Request::url() == url('/settings/mesincasting/' . $id . '')) --}}
                {{-- <a href="{{ url('/settings') }}" class="machine shadow-lg">
                    <div class="mesin">
                        @if ($mesin == 'FINAL .INS')
                            <div class="font-white "> {{ $mesin }} </div>
                        @else
                            <div class="font-white choose_machine"> {{ $mesin }} </div>
                        @endif
                    </div>
                </a> --}}


                {{-- Preparation Melting --}}
            {{-- @elseif($mesin == 'MELTING') --}}
                {{-- <a href="{{ url('/lhp-melting') }}" class="machine shadow-lg">
                    <div class="mesin">
                        @if ($mesin == 'MELTING')
                            <div class="font-white "> {{ $mesin }} </div>
                        @else
                            <div class="font-white choose_machine"> {{ $mesin }} </div>
                        @endif
                    </div>
                </a> --}}
            {{-- @else --}}
                {{-- <a href="{{ url('/lhp-melting') }}" class="machine shadow-lg">
                    <div class="mesin">
                        @if ($mesin == 'FINAL .INS')
                            <div class="font-white "> {{ $mesin }} </div>
                        @else
                            <div class="font-white choose_machine"> {{ $mesin }} </div>
                        @endif
                    </div>
                </a> --}}
            {{-- @endif --}}
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
