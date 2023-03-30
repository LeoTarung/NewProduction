@switch(Route::current()->getName())
    @case('lhpmelting.preparation')
        <form action="{{ url('/lhp-modal/pre-melting/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
            @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control border-dark fw-bold" id="nrp"
                                name="nrp" required>
                            <label for="nrp" class="">N R P</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control border-dark fw-bold" id="nama"
                                name="nama" readonly>
                            <label for="nama" class="">N A M A</label>
                        </div>
                    </div>
                    <div class="form-tambahan" id="form-tambahan"></div>
                </div>
                <div class="row mt-2">
                    <div class="col" >
                        <button type="submit" id="submit" class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                    </div>
                </div>
        </form>
        <script>
            $(document).ready(function() {
                $('#nrp').keyup(function() {
                    $('#result').html('');
                    var searchnrp = $('#nrp').val();
                    $.ajax({
                        method: "GET",
                        dataType: "json",
                        url: "{{ url('/adm/api') }}" +"/"+ searchnrp,
                        success: function (data) {
                            switch (data.length) {
                                case 1 :
                                    $("#nama").val(data[0].name);
                                    break;
                                default:
                                    $("#nama").val('Belum Terdaftar');
                                break;
                            }
                        },
                        error: function(status) {
                            $("#nama").val('');
                        }
                    });
                });
            });
        </script>
    @break

    @case('lhpmelting.buttonkereta')
        <form action="{{ url('/lhp-modal/melting/save') }}" method="POST" enctype="multipart/form-data" onsubmit="DisabledButtomSubmit()">
            @csrf
                <div class="row">
                    @foreach ($data as $kereta)
                        @if ($kereta->material == 'AC2B')
                        <?php $warna = 'bg-orange' ?>
                        @elseif($kereta->material == 'AC4B')
                        <?php $warna = 'bg-ungu' ?>
                        @elseif($kereta->material == 'AC4CH')
                        <?php $warna = 'text-dark' ?>
                        @elseif($kereta->material == 'AC2BF')
                        <?php $warna = 'bg-merahBata' ?>
                        @elseif($kereta->material == 'ADC12')
                        <?php $warna = 'bg-silver text-dark' ?>
                        @elseif($kereta->material == 'HD-2')
                        <?php $warna = 'bg-warning' ?>
                        @elseif($kereta->material == 'HD-4')
                        <?php $warna = 'bg-primary' ?>
                        @elseif($kereta->material == 'YH3R')
                        <?php $warna = 'bg-success' ?>
                        @endif
                        <div class="col-2 m-2">
                            <button type="Submit" class="btn btn-lg {{ $warna }} fw-bold fs-3" id="submit" style="width:100%; height:100%;" name="berat_kereta" value="{{ $kereta->berat }}">{{ $kereta->no_kereta }}</button>
                        </div>
                    @endforeach
                </div>
                <div class="form-tambahan" id="form-tambahan"></div>
        </form>
    @break
    @case('lhpmelting.resume')

    <div class="table-responsive">
        <table id="Table_MP" class="table table-striped-columns table-hover table-bordered nowrap display" style="overflow-x: scroll">
            <thead class="table-dark text-center fw-bold">
                <tr>
                    <th nowrap class="fs-5">JAM</th>
                    <th  class="fs-5">TOTAL CHARGING</th>
                    <th nowrap class="fs-5">INGOT</th>
                    <th nowrap class="fs-5">EX GATE</th>
                    <th nowrap class="fs-5">PARTS NG</th>
                    <th nowrap class="fs-5">ALM TREAT</th>
                    <th nowrap class="fs-5">OIL SCRAP</th>
                    <th nowrap class="fs-5">TAPPING</th>
                    <th nowrap class="fs-5">DROSS</th>
                </tr>
            </thead>
            <tbody class="text-center fs-5">
                @foreach ($data as $a)
                <tr>
                    <td>{{date('H', strtotime($a->jam))}}:00</td>
                    <td>{{ $a->total_charging_rs }}</td>
                    <td>{{ $a->ingots }}</td>
                    <td>{{ $a->exgates }}</td>
                    <td>{{ $a->reject_partss }}</td>
                    <td>{{ $a->alm_treats }}</td>
                    <td>{{ $a->oil_scraps }}</td>
                    <td>{{ $a->tappings }}</td>
                    <td>{{ $a->drosss }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        {{-- <table class="table table-success table-striped">
            <thead class="table-dark text-center fw-bold">
                <tr>
                    <td class="fs-5">JAM</td>
                    <td class="fs-5">TOTAL CHARGING</td>
                    <td class="fs-5">INGOT</td>
                    <td class="fs-5">EX GATE</td>
                    <td class="fs-5">PARTS NG</td>
                    <td class="fs-5">ALM TREAT</td>
                    <td class="fs-5">OIL SCRAP</td>
                    <td class="fs-5">TAPPING</td>
                    <td class="fs-5">DROSS</td>
                </tr>
            </thead>
            <tbody class="fs-5">

        </table> --}}
    @break
@default
    <h1>INI DEFAULTNYA</h1>
@endswitch
