@include('front-end.includes.header')

<div class="forum">
    <div class="container-fluid">
        <div class="container">
            <div class="header">
                <h3 class="text-center">Forum</h3>
                <p class="text-center">Temui jawaban dan berikan bantuan</p>
            </div>

            <div class="row pertanyaan">
                <div class="col-md-12">
                    <h5>
                        Tambah Pertanyaan
                    </h5>
                </div>
            </div>

            <form action="{{ route('forum.store') }}" method="POST" class="form form-horizontal">
                @csrf
                <div class="form-body">
                    <div class="row">

                        <div class="col-md-4">
                            <label>Judul</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control @error('judul') {{ 'is-invalid' }} @enderror" name="judul" value="{{ old('judul') }}">
                            @error('judul')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label>Pertanyaan</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <textarea class="form-control @error('konten') {{ 'is-invalid' }} @enderror" id="teks" rows="3" name="konten">{{ old('konten') }}</textarea>
                            @error('konten')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                            <a href="{{ route('forum.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '#teks' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

@include('front-end.includes.footer')