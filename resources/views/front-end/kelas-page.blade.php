@include('front-end.includes.header')

<div class="kelas">
    <div class="container-fluid">
        <div class="container">
            <div class="header">
                <h3 class="text-center">Kelas</h3>
                <p class="text-center">Temui kelas anda disini</p>
            </div>
            <div class="pencarian">
                <div class="row mx-auto justify-content-center">
                    <div class="col-md-10 col-sm-8 mx-auto">
                        <input type="text">
                    </div>
                    <div class="col-md-2 col-sm-4 mx-auto">
                        <a class="btn">Cari</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-auto justify-content-center">
            @foreach ($kelas as $kls)      
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
            @endforeach
        </div>
    </div>
</div>


@include('front-end.includes.footer')