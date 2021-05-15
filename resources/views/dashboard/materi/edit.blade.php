@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Materi</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('materi.update', $materi->id) }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Materi</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control @error('materi') {{ 'is-invalid' }} @enderror" name="materi" value="{{ old('materi') ?? $materi->materi ?? '' }}">
                                @error('materi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Bab Materi</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="number" class="form-control @error('babmateri') {{ 'is-invalid' }} @enderror" name="babmateri" value="{{ old('babmateri') ?? $materi->babmateri ?? '' }}">
                                @error('babmateri')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Kelas</label>
                            </div>
                            <fieldset class=" col-md-8 form-group">
                                <select class="form-select @error('kelas_id') {{ 'is-invalid' }} @enderror" id="basicSelect" name="kelas_id">
                                    <option value="">Pilih Kelas</option>    
                                    @foreach ($kelas as $kls)
                                        <option value="{{ $kls->id }}" @if($materi->kelas_id == $kls->id) selected @endif>{{ $kls->kelas }}</option>    
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
                                <input type="text" class="form-control @error('link') {{ 'is-invalid' }} @enderror" name="link" value="{{ old('link') ?? $materi->link ?? '' }}">
                                @error('link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                <a href="{{ route('materi.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection