@extends('lhp-template')
@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-2 m-2">
        @foreach ($furnace as $mesin)
        <div class="col">
            <a class="buttonssssss btn {{ $mesin->DB_Material->warna }} border-dark" onclick="Preparation('{{ $mesin->furnace}}','{{ $mesin->DB_Material->initial }}')">
            <div class="big-font">{{ $mesin->furnace }}</div>
            </a><br>
        </div>
    @endforeach
    </div>
    <script>
        function Preparation(machine, material) {
            $.ajax({
            method: "POST",
            dataType: "json",
            url: "{{ url('/lhp/melting/check') }}",
            data: {
                _token: "{{ csrf_token() }}",
                furnace: machine,
            },
            success: function (data) {
                window.location.href = "{{ url('/lhp/melting') }}" +"/"+ machine +"/"+ data.id;
            },
            error: function(status) {
                $.get('/lhp-modal/melting', {}, function (data, status) {
                $("#staticBackdropLabel").html('Preparation ' + machine); //Untuk kasih judul di modal
                $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
                $("#page").html(data); //menampilkan view create di dalam id page
                $("#form-tambahan").html(
                    '<input type="hidden" name="furnace" value="' + machine + '">' +
                        '<input type="hidden" name="material" value="' + material + '">'
                );
                });
            }
            });
        }


    </script>
@endsection
