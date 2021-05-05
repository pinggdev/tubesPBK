@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Kelas</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('kelas.store') }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nama Kelas</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control @error('kelas') {{ 'is-invalid' }} @enderror" name="kelas" value="{{ old('kelas') }}">
                                @error('kelas')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Deskripsi</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <textarea class="form-control @error('deskripsi') {{ 'is-invalid' }} @enderror" id="teks" rows="3" name="deskripsi">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Gambar</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input class="form-control" type="file" name="gambar">
                                @error('gambar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                                <a href="{{ route('kelas.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('ckeditor')
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
@endsection