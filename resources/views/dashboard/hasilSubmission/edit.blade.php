@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h3>Edit Submission</h3>
    </div>
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('hasilsubmission.update', $hasil_submission->id) }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>User</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <p>{!! $hasil_submission->user->name !!}</p>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Soal</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <p>{!! $hasil_submission->submission->soal !!}</p>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Bab Submission</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" class="form-control name="kelas" placeholder="Kelas" value="{{ $hasil_submission->submission->babsubmission }}" disabled>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Lanjut</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" class="form-control  @error('lanjut') {{ 'is-invalid' }} @enderror" name="lanjut" value="{{ old('lanjut') ?? $hasil_submission->lanjut ?? '' }}">
                                                    @error('lanjut')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                                    <a href="{{ route('hasilsubmission.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection