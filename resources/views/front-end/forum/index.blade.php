@include('front-end.includes.header')

<div class="forum">
    <div class="container-fluid">
        <div class="container">
            <div class="header">
                <h3 class="text-center">Forum</h3>
                <p class="text-center">Temui jawaban dan berikan bantuan</p>
            </div>
            <div class="pencarian">
                <div class="row">
                    <div class="col-md-10 col-sm-8 mx-auto">
                        <input type="text">
                    </div>
                    <div class="col-md-2 col-sm-4 text-right">
                        <a class="btn">Cari</a>
                    </div>
                </div>
            </div>

            <div class="mx-auto justify-content-center">
                <div class="row pertanyaan">
                    <div class="col-md-6 align-self-center">
                        <h5>
                            Pertanyaan
                        </h5>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('forum.create') }}" class="btn btn-primary">Tambah Pertanyaan</a>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-md-12">
                        {{ $forum->links() }}
                        tes
                    </div>
                </div> --}}

                <div class="list-forum">
                    @foreach ($forum as $frm)               
                        <div class="row border">
                            <div class="col-md-12">
                                <a href="/forum/{{ $frm->id }}/view" class="judul-forum">
                                    <img src="{{ $frm->user->getAvatar() }}" alt="" style="width: 20px; height: 20px; border-radius: 50%;">&nbsp;&nbsp;&nbsp;{{ $frm->user->name }} :  {{ $frm->judul }}
                                </a>
                            </div>
                            <div class="col-md-12 data">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="/forum/{{ $frm->id }}/view" class="like-cmt">
                                                    <img class="icon" src="{{ asset('admin/assets/images/bg/message-circle.png') }}"></img><span>&nbsp; &nbsp; {{ $frm->komentar->count() }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 text-right timestamp">
                                        {{ $frm->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- @foreach ($kelas as $kls)      
                <div class="list-kelas">
                    <div class="col-3-md col-12-md">
                            <a href="{{ route('rincian.kelas', $kls->id) }}">
                            <div class="card">
                                <img src="{{ asset('storage/kelas/'.$kls->gambar) }}" class="card-img-top img-fluid kelas" alt="gambar">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $kls->kelas }}</h5>
                                    <p class="card-text">Free</p>
                                    <img class="star" src="{{ asset('admin/assets/images/logo/star.png') }}" alt="">
                                </div>
                            </div>
                        </a>           
                    </div>
                </div>   
                @endforeach --}}
            </div>
        </div>
    </div>
</div>


@include('front-end.includes.footer')