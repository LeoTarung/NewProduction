@extends('TV-template')
@section('content')
<style>
    #testIframe{

    }
</style>
{{-- <div class="mt-2">&ensp;</div> --}}
  {{-- <iframe src="/pdf/BadNewFirst.pdf" frameborder="0" width="100%" height="500" class="" id="testIframe" allowfullscreen="true"></iframe> --}}
  <div class="ratio border border-danger" style="--bs-aspect-ratio: 50%;">
    <iframe src="/pdf/BadNewFirst.pdf" title="YouTube video" ></iframe>
  </div>
@endsection
