@extends('front-end.tampilantutor.master-tutorial')

@section('content')
    <div class="page-heading">
        <h3>Kuis</h3>
    </div>
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('storekuis') }}" method="POST" class="form form-horizontal">
                    @csrf
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
                                                @foreach ($dt->options as $option)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kuis[{{ $dt->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}">
                                                        <label class="form-check-label" for="option-{{ $option->id }}">
                                                            {!! $option->option !!}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    @endforeach
                                        {{-- @foreach ($data as $dt) 
                                            @if ($kelas->id == $dt->kelas_id)
                                                <div class="card-header">
                                                    <h4 class="card-title">{!! $dt->pertanyaan !!}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{ $dt->id }}" value="a">
                                                        <label class="form-check-label">
                                                            {{ $dt->kuis_pilihan->first()->pilihan_a }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{ $dt->id }}" value="b">
                                                        <label class="form-check-label">
                                                            {{ $dt->kuis_pilihan->first()->pilihan_b }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{ $dt->id }}" value="c">
                                                        <label class="form-check-label">
                                                            {{ $dt->kuis_pilihan->first()->pilihan_c }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach --}}
                                </div>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
@endsection