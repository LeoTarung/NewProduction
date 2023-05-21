@extends('TV-template')
@section('content')
<div class="h2 mt-4 text-center d-block d-md-none fw-bold ">S T O C K &ensp; O P N A M E</div>

<div style="margin-top: 20%;">
    <div class="row justify-content-center mb-5" >
        <div class="col-10 col-md-5 nopadding shadow-lg" style="height: 12vh;"><a onclick="preparation('counter')" class="btn btn-secondary fw-bold fs-1 text-center pt-3 pt-md-0" style="height: 100%; width:100%;">C O U N T E R</a></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 col-md-5 nopadding shadow-lg" style="height: 12vh;"><a onclick="preparation('verificator')" class="btn btn-secondary fw-bold fs-1 text-center pt-3 pt-md-0" style="height: 100%; width:100%;">V E R I F I C A T O R</a></div>
    </div>
</div>

<script>
    function preparation(xx){
        $.get("/sto/modal/preparation", {}, function (data, status) {
            $("#staticBackdropLabel").html("Preparation "+ xx); //Untuk kasih judul di modal
            $("#staticBackdrop").modal("show"); //kalo ID pake "#" kalo class pake "."
            $("#page").html(data); //menampilkan view create di dalam id page
            $('#tambahaninputan').html(
                '<input type="hidden" class="form-control" name="role" id="role" value="'+ xx +'">'
            )
        });
    }
</script>
@endsection
