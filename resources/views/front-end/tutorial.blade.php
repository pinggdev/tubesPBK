@extends('front-end.tampilantutor.master-tutorial')
@section('content')    
<style>
.youtube-video-container {
  position: relative;
  overflow: hidden;
  width: 100%;
}

.youtube-video-container::after {
  display: block;
  content: "";
  padding-top: 56.25%;
}

.youtube-video-container iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <h4 class="card-title mb-0">{{ $materi->kelas->kelas }}</h4>
        </div>
        {{-- @foreach ($kelas->materi as $mtr) --}}
          <div class="youtube-video-container">
            <iframe width="560" height="315" src="{{ $materi->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        {{-- @endforeach --}}
        <div class="card-body">

        </div>
    </div>
</div>
@endsection