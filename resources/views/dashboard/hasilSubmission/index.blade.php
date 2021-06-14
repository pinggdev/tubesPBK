@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Hasil Submission</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="row">
                <div class="col-8 align-self-center">
                    {{-- <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-sm align-self-center">Tambah Kelas</a> --}}
                </div>
                <div class="col-4">
                    <form method="get" action="{{ route('hasilsubmission.index') }}">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" name="q" value="{{ $request['q'] ?? '' }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Table with outer spacing -->
            <div class="table-responsive">
                @if ($hasil_submission->total())
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>SOAL</th>
                                <th>USER</th>
                                <th>FILE</th>
                                <th class="text-center">LANJUT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hasil_submission as $hs)
                                <tr>
                                    <td scope="row" style="vertical-align: middle;">{{ ($hasil_submission->currentPage() - 1) * $hasil_submission->perPage() + $loop->iteration }}</td>
                                    <td class="text-bold-500">{!! Str::limit($hs->submission->soal, 50) !!}</td>
                                    <td class="text-bold-500">{{ $hs->user->name }}</td>
                                    <td class="text-bold-500">{!! $hs->file !!}</td>
                                    <td class="text-bold-500 text-center">{!! $hs->lanjut !!}</td>
                                    <td class="text-bold-500">
                                        <form action="{{ route('hasilsubmission.destroy', $hs->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('hasilsubmission.edit', $hs->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $hasil_submission->appends($request)->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection