@include('front-end.includes.header')

<div class="forum">
    <div class="container-fluid">
        <div class="container">
            <div class="header">
                <h3 class="text-center">Forum</h3>
                <p class="text-center">Temui jawaban dan berikan bantuan</p>
            </div>

            <div class="row rincian">
                <div class="col-md-12">
                    <h5>
                        {{ $forum->judul }}
                    </h5>
                    <p class="nama-tanya">By {{ $forum->user->name }} &nbsp;&nbsp; <span class="timestamp">{{ $forum->created_at->diffForHumans() }}</span></p>
                </div>
            </div>

            <div class="row second">
                <div class="col-md-12">
                    <p class="konten">{!! $forum->konten !!}</p>
                    <hr>

                    <div class="btn-group">
                        <a href="" class="like-cmt">
                            <img class="icon" src="{{ asset('admin/assets/images/bg/heart.png') }}"></img><span>&nbsp; &nbsp; 0</span>
                        </a>

                        <a href="" class="like-cmt">
                            <img class="icon" src="{{ asset('admin/assets/images/bg/message-circle.png') }}"></img><span>&nbsp; &nbsp; 0</span>
                        </a>
                    </div>

                    <p style="font-weight: 400;"><img class="icon" src="{{ asset('admin/assets/images/bg/message-circle-hitam.png') }}"></img>&nbsp;&nbsp; Komentar</p>
                    <ul>
                        <li>
                            <p class="nama-komentar">
                                <img src="{{ $forum->user->getAvatar() }}" alt="" style="width: 30px; height: 30px; border-radius: 50%;">&nbsp; {{ $forum->user->name }}
                            </p>
                            <p class="isi-komentar">
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                            </p>
                            <p class="timestamp">2 days ago</p>
                            <hr>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@include('front-end.includes.footer')