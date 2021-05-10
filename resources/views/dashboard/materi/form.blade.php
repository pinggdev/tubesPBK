@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Materi</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('materi.store') }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Materi</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control @error('materi') {{ 'is-invalid' }} @enderror" name="materi" value="{{ old('materi') }}">
                                @error('materi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Bab Materi</label>
                            </div>
                            <fieldset class=" col-md-8 form-group">
                                <select class="form-select @error('babmateri') {{ 'is-invalid' }} @enderror" id="basicSelect" name="babmateri">
                                    <option value="">Pilih Bab</option>    
                                    @foreach ($kelas as $kls)
                                        @for ($i = 1; $i <= $kls->bab; $i++)
                                            <option value="{{ $i }}">Bab {{ $i }}</option>    
                                        @endfor
                                    @endforeach
                                </select>
                                @error('babmateri')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <div class="col-md-4">
                                <label>Kelas</label>
                            </div>
                            <fieldset class=" col-md-8 form-group">
                                <select class="form-select @error('kelas_id') {{ 'is-invalid' }} @enderror" id="basicSelect" name="kelas_id">
                                    <option value="">Pilih Kategori</option>    
                                    @foreach ($kelas as $kls)
                                        <option value="{{ $kls->id }}">{{ $kls->kelas }}</option>    
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <div class="col-md-4">
                                <label>Link</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control @error('link') {{ 'is-invalid' }} @enderror" name="link" value="{{ old('link') }}">
                                @error('link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                                <a href="{{ route('materi.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection