@extends('front-end.tampilantutor.master-tutorial')
@section('content')    

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <h4 class="card-title mb-0">{{ $kelas->kelas }}</h4>
        </div>
        {{-- @foreach ($kelas->materi as $mtr) --}}
        {{-- @endforeach --}}
        <div class="card-body">
            <h3>Selamat datang di dalam kelas {{ $kelas->kelas }}</h3>
            <p>{!! $kelas->deskripsi !!}</p>
        </div>
    </div>
</div>
@endsection