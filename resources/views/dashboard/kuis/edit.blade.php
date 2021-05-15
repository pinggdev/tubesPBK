@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Kuis</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('kuis.update', $kuis->id) }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-4">
                                <label>Pertanyaan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <textarea class="form-control @error('pertanyaan') {{ 'is-invalid' }} @enderror" id="teks" rows="3" name="pertanyaan">{{ old('pertanyaan') ?? $kuis->pertanyaan ?? '' }}</textarea>
                                @error('pertanyaan')
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
                                        <option value="{{ $kls->id }}" @if($kuis->kelas_id == $kls->id) selected  @endif>{{ $kls->kelas }}</option>    
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <div class="col-md-4">
                                <label>Bab Kuis</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="number" class="form-control @error('babkuis') {{ 'is-invalid' }} @enderror" name="babkuis" value="{{ old('babkuis') ?? $kuis->babkuis ?? '' }}">
                                @error('babkuis')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <fieldset class=" col-md-8 form-group">
                                <select class="form-select @error('babkuis') {{ 'is-invalid' }} @enderror" id="basicSelect" name="babkuis">
                                    <option value="">Pilih Bab</option>    
                                    @foreach ($kelas as $kls)
                                        @for ($i = 1; $i <= $kls->bab; $i++)
                                            <option value="{{ $i }}" @if($kuis->babkuis == $i) selected @endif>Bab {{ $i }}</option>    
                                        @endfor
                                    @endforeach
                                </select>
                                @error('babkuis')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset> --}}

                            <div class="col-md-4">
                                <label>Pilihan A</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <textarea class="form-control @error('pilihan_a') {{ 'is-invalid' }} @enderror" id="teks" rows="3" name="pilihan_a">{{ old('pilihan_a') ?? $kuis->kuis_pilihan->first()->pilihan_a ?? '' }}</textarea>
                                @error('pilihan_a')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label>Pilihan B</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <textarea class="form-control @error('pilihan_b') {{ 'is-invalid' }} @enderror" id="teks" rows="3" name="pilihan_b">{{ old('pilihan_b') ?? $kuis->kuis_pilihan->first()->pilihan_b ?? '' }}</textarea>
                                @error('pilihan_b')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label>Pilihan C</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <textarea class="form-control @error('pilihan_c') {{ 'is-invalid' }} @enderror" id="teks" rows="3" name="pilihan_c">{{ old('pilihan_c') ?? $kuis->kuis_pilihan->first()->pilihan_c ?? '' }}</textarea>
                                @error('pilihan_c')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-4">
                                <label>Jawaban Kuis</label>
                            </div>
                            <fieldset class=" col-md-8 form-group">
                                <select class="form-select @error('jawaban_benar') {{ 'is-invalid' }} @enderror" id="basicSelect" name="jawaban_benar">
                                    <option value="">Pilih Jawaban</option>    
                                        <option value="a" @if($kuis->jawaban_kuis->first()->jawaban_benar == 'a') selected @endif>A</option>    
                                        <option value="b" @if($kuis->jawaban_kuis->first()->jawaban_benar == 'b') selected @endif>B</option>    
                                        <option value="c" @if($kuis->jawaban_kuis->first()->jawaban_benar == 'c') selected @endif>C</option>    
                                </select>
                                @error('jawaban_benar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                <a href="{{ route('kuis.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
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