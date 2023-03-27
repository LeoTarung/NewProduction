@extends('TV-template')
@section('content')
<style>
    #testIframe{

    }
</style>
<p class="mt-4">&ensp;</p>
<div class="card mt-2">
    <div class="card-body">
        <div class="" id="text"></div>

        {{-- <img src="{{ $file }}" class="img-fluid" alt="" srcset=""> --}}
    </div>
</div>
{{-- <div class="mt-2">&ensp;</div> --}}
  {{-- <iframe src="/pdf/BadNewFirst.pdf" frameborder="0" width="100%" height="500" class="" id="testIframe" allowfullscreen="true"></iframe> --}}
  {{-- <div class="ratio border border-danger" style="--bs-aspect-ratio: 50%;">
    <iframe src="/pdf/BadNewFirst.pdf" title="YouTube video" ></iframe>
  </div> --}}


<script type="text/javascript">
    var data = [
        {'gambar' : 'assembling.jpg'},
        {'gambar' : 'casting.jpg'},
        {'gambar' : 'melting.jpg'},
        {'gambar' : 'machining.jpg'},
        {'gambar' : 'painting.jpg'},
    ]

    var jangka = 20000 ;
    var inter;
    function showdata(){
        for (let i = 0; i < data.length; i++) {
            setTimeout(function() {
                console.log(data[i]);
                // $("#text").html(data[i].gambar)
                $("#text").html(
                    '<img src="/UI/IMG/'+data[i].gambar+'" class="img-fluid" alt="'+data[i].gambar+'" >'
                )
            }, jangka * i); // mengatur jeda waktu dengan mengalikan 1000 (1 detik) dengan indeks i
            inter = jangka * i;
        }
    }
    showdata()
    setInterval(showdata, inter+inter);
</script>
@endsection
