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

                    {{-- <div class="btn-group">
                        <a href="" class="like-cmt">
                            <img class="icon" src="{{ asset('admin/assets/images/bg/heart.png') }}"></img>
                        </a>

                        <a href="" class="like-cmt" id="btn-komentar">
                            <img class="icon" src="{{ asset('admin/assets/images/bg/message-circle.png') }}"></img>
                        </a>
                    </div> --}}

                    <p style="font-weight: 400;"><img class="icon" src="{{ asset('admin/assets/images/bg/message-circle-hitam.png') }}"></img>&nbsp;&nbsp; Komentar</p>
                    @foreach ($forum->komentar()->where('parent', 0)->orderBy('created_at', 'desc')->get() as $komentar)                        
                        <ul>
                            <li>
                                <p class="nama-komentar">
                                    <img src="{{ $komentar->user->getAvatar() }}" alt="" style="width: 30px; height: 30px; border-radius: 50%;">&nbsp; {{ $komentar->user->name }}
                                </p>
                                <p class="isi-komentar">
                                    {!! $komentar->konten !!}
                                </p>
                                <p class="timestamp">{{ $komentar->created_at->diffForHumans() }}</p>

                                @foreach ($komentar->childs()->orderBy('created_at', 'desc')->get() as $child)    
                                    <ul>
                                        <li>
                                            <p class="komentar-anak" style="text-align: justify;">
                                                <img src="{{ $child->user->getAvatar() }}" alt="" style="width: 25px; height: 25px; border-radius: 50%;">&nbsp; {{ $child->user->name }} : {!! $child->konten !!}
                                            </p>
                                            <p class="timestamp">{{ $child->created_at->diffForHumans() }}</p>
                                        </li>
                                    </ul>
                                @endforeach

                                <form action="" method="POST" class="komen-komen">
                                    @csrf
                                    <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                                    <input type="hidden" name="parent" value="{{ $komentar->id }}">
                                    <input type="text" class="form-control" name="konten">
                                    <button type="submit" class="btn-custom">Kirim</button>
                                </form>

                                <hr>
                            </li>
                        </ul>
                    @endforeach

                    <form action="" method="POST">
                        @csrf
                        <div id="custom-editor">
                            <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                            <input type="hidden" name="parent" value="0">
                            <textarea class="form-control" id="teks" id="#komentar-utama" rows="3" name="konten"></textarea>
                            <button type="submit" class="btn-custom">Kirim</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '#teks' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );

    // $(document).ready(function() {
    //     $('#btn-komentar').click(function() {
    //         // $('#komentar-utama').show();
    //         $('#komentar-utama').show();
    //         // alert(0);
    //     });
    // });
</script>

@include('front-end.includes.footer')