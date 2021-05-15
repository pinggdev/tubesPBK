@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Option</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('option.store') }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-4">
                                <label>Soal</label>
                            </div>
                            <fieldset class=" col-md-8 form-group">
                                <select class="form-select @error('kuis_id') {{ 'is-invalid' }} @enderror" id="basicSelect" name="kuis_id">
                                    <option value="">Pilih Soal</option>    
                                    @foreach ($kuis as $ks)
                                        <option value="{{ $ks->id }}">{!! $ks->soal !!}</option>    
                                    @endforeach
                                </select>
                                @error('kuis_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <div class="col-md-4">
                                <label>Option</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <textarea class="form-control @error('option') {{ 'is-invalid' }} @enderror" id="teks" rows="3" name="option">{{ old('option') }}</textarea>
                                @error('option')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label>Point</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="number" class="form-control @error('points') {{ 'is-invalid' }} @enderror" name="points" value="{{ old('points') }}">
                                @error('points')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                                <a href="{{ route('option.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
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