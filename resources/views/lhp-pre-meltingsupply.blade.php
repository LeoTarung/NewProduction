@extends('lhp-template')
@section('content')

<div class="row row-cols-1 row-cols-md-3 g-2 m-2">
    @foreach ($data as $item)
        <div class="col">
            <a class="buttonssssss btn {{ $item->DB_Material->warna }} border-dark" onclick="Preparation('{{ $item->forklift}}','{{ $item->DB_Material->initial }}')">
                <div class="fs-1 fw-bold " style="margin: 20%;">{{ $item->forklift }}</div>
            </a><br>
        </div>
    @endforeach
</div>
<script>
    function Preparation(forklift, material) {
        // console.log(forklift  +  material);
        $.ajax({
        method: "POST",
        dataType: "json",
        url: "{{ url('/lhp/meltingsupply/check') }}",
        data: {
            _token: "{{ csrf_token() }}",
            forklift: forklift,
        },
        success: function (data) {
            console.log(data);
            $.get('/lhp-modal/meltingsupply/cek'+ '/' + forklift + '/' + data.id , {}, function (data, status) {
                $("#staticBackdropLabel").html('Preparation ' + forklift); //Untuk kasih judul di modal
                $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
                $("#page").html(data); //menampilkan view create di dalam id page
            });
            // window.location.href = "{{ url('/lhp/meltingsupply') }}" +"/"+ forklift +"/"+ data.id;
        },
        error: function(status) {
            $.get('/lhp-modal/meltingsupply', {}, function (data, status) {
                $("#staticBackdropLabel").html('Preparation ' + forklift); //Untuk kasih judul di modal
                $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
                $("#page").html(data); //menampilkan view create di dalam id page
                $("#form-tambahan").html(
                    '<input type="hidden" name="forklift" value="' + forklift + '">' +
                        '<input type="hidden" name="material" value="' + material + '">'
                );
            });
        }
        });
    }

    function Preparation_1(forklift, material) {
        $.get('/lhp-modal/meltingsupply', {}, function (data, status) {
            $("#staticBackdropLabel").html('Preparation ' + forklift); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $("#form-tambahan").html(
                '<input type="hidden" name="forklift" value="' + forklift + '">' +
                '<input type="hidden" name="material" value="' + material + '">'
            );
        });
    }
</script>

@endsection
