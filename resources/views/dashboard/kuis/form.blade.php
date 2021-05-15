@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Kuis</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('kuis.store') }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-4">
                                <label>Kelas</label>
                            </div>
                            <fieldset class=" col-md-8 form-group">
                                <select class="form-select @error('kelas_id') {{ 'is-invalid' }} @enderror" id="basicSelect" name="kelas_id">
                                    <option value="">Pilih Kelas</option>    
                                    @foreach ($kelas as $kls)
                                        <option value="{{ $kls->id }}">{{ $kls->kelas }}</option>    
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <div class="col-md-4">
                                <label>Soal</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <textarea class="form-control @error('soal') {{ 'is-invalid' }} @enderror" id="teks" rows="3" name="soal">{{ old('soal') }}</textarea>
                                @error('soal')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label>Bab Kuis</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="number" class="form-control @error('babkuis') {{ 'is-invalid' }} @enderror" name="babkuis" value="{{ old('babkuis') }}">
                                @error('babkuis')
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