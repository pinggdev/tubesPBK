@include('front-end.includes.header')

<div class="jumbo-custom">
    <div class="jumbotron jumbotron-fluid bg-transparent">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-7">
                        <h1>FIND YOUR JOURNEY</h1>
                        <p>Belajar Coding dan Design dari mentor berpengalaman dalam masing masing bidang demi membangun masa depan dengan pembelajaran melalui video yang mudah dimengerti</p>
                        <a href="" class="btn btn-primary-custom">Daftar dan Mulai Belajar</a>
                        <a href="" class="btn btn-secondary-custom">Kelas Belajar</a>
                    </div>
                    <div class="col-5">
                        <img class="img-fluid" src="{{ asset('admin/assets/images/bg/jumbotron.png') }}" alt="jumbotron">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="daftar-kelas">
    <div class="container-fluid">
        <div class="container">
            <h3 class="text-center">Daftar Kelas</h3>
            <div class="row">
                <div class="col-6">
                    <div class="card-kelas">
                        <img class="img-fluid" src="{{ asset('admin/assets/images/bg/kelas-coding.png') }}" alt="coding">
                        <div class="row">
                            <div class="col-8">
                                <h6>Kelas Coding</h6>
                                <p>Belajar Program / Bikin Aplikasi</p>
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{ asset('admin/assets/images/bg/panah-kanan.png') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card-kelas">
                        <img class="img-fluid" src="{{ asset('admin/assets/images/bg/kelas-design.png') }}" alt="design">
                        <div class="row">
                            <div class="col-8">
                                <h6>Kelas Design</h6>
                                <p>Belajar Design  dan UI / UX</p>
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{ asset('admin/assets/images/bg/panah-kanan.png') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="kenapa">
    <h3 class="text-center">Kenapa Memilih Pro.id?</h3>
    <div class="card-kenapa">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <img class="img-fluid" src="{{ asset('admin/assets/images/bg/kenapa.png') }}" alt="kenapa">
                    </div>
                    <div class="col-8 align-self-center">
                        <p>Pro.id didesain khusus untuk pemula yang tertarik dengan bidang pemrograman dan design. Penyampaian materi yang mudah dan sederhana akan memudahkan user untuk memahami setiap materi yang diberikan. Materi juga dapat diakses selama peserta masih mengikuti pembelajaran secara berulang-ulang. Nantinya, akan ada kuis pada setiap bab untuk menguji pemahaman user mengenai materi yang diberikan. Di akhir pembelajaran, akan ada submisson sebagai syarat user untuk mendapatkan sertifikat </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('front-end.includes.footer')