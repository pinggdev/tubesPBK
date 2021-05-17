@include('front-end.includes.header')
<style>
    .container .video {
      border-radius: 20px;
    }
    .youtube-video-container {
      position: relative;
      overflow: hidden;
      width: 100%;
      border-radius: 20px;
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

<div class="rincian-kelas">
    <div class="container-fluid">
        <div class="container">           
            <div class="header">
                <h3 class="text-center">{{ $kelas->kelas }}</h3>
                <p class="text-center">Semua belajar dari dasar</p>
            </div>
            <div class="row listvideo">
                <div class="col-md-8">
                    <div class="card video">
                        <div class="card-content">
                            <div class="youtube-video-container">
                            <iframe width="560" height="315" src="{{ $kelas->materi->first()->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 kotak-list-materi">
                    <p class="header-materi">Daftar materi</p>
                    <div class="row">   
                        <div class="list-materi">
                            <a href="/tutorial-homepage/{{ $kelas->id }}">
                                <div class="col-md-12 permateri">
                                    {{$kelas->materi->first()->materi}}
                                </div>
                            </a>
                                @for ($i = 1; $i <= 4 ; $i++)
                                    <div class="col-md-12 permateri">
                                        Lihat Kelas
                                    </div>
                                @endfor
                        </div>                       
                    </div>
                    <div class="row">
                        <a class=" lihat-kelas" href="/tutorial-homepage/{{ $kelas->id }}">
                            <div class="col-md-12 justify-content-center text-center">
                                Lihat Kelas
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row deskripsi">
                <div class="col-md-8">
                    <h5>Deskripsi</h5>
                    <p>{!! $kelas->deskripsi !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>


@include('front-end.includes.footer')