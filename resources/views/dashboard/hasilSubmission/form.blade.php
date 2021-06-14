@extends('front-end.tampilantutor.master-tutorial')

@section('content')
    <div class="page-heading">
        <h3>Submission</h3>
    </div>
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                @foreach ($data as $dt)
                                    @if ($kelas->id == $dt->kelas_id)
                                        <div class="card-header">
                                            <h4 class="card-title">
                                                {!! $dt->soal !!}
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="/store/submission" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="submission_id" value="{{ $dt->id }}">
                                                <input type="hidden" name="lanjut" value="0">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Kumpul File Submission</label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input class="form-control" type="file" name="file">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary me-1 mb-1 mt-3">Kumpul</button>
                                            </form>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection