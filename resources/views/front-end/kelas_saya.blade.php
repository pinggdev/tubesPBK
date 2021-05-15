@extends('layouts.master')

@section('content')
    <div class="row">
        @foreach ($kelas as $kls)    
            <div class="col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <a href="/tutorial-homepage/{{ $kls->id }}">
                            <img class="card-img-top img-fluid" src="{{ asset('storage/kelas/'.$kls->gambar) }}" alt="materi">
                            <div class="card-body">
                                <h4 class="card-title">{{ $kls->kelas }}</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection