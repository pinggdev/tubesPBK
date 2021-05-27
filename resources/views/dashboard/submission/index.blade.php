@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Submission</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="row">
                <div class="col-8 align-self-center">
                    <a href="{{ route('submission.create') }}" class="btn btn-primary btn-sm align-self-center">Tambah Submission</a>
                </div>
                <div class="col-4">
                    <form method="get" action="{{ route('submission.index') }}">
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
                @if ($submission->total())
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KELAS</th>
                                <th>BAB SUBMISSION</th>
                                <th>SOAL</th>
                                <th>LANJUT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($submission as $sb)
                                <tr>
                                    <td class="text-center" scope="row" style="vertical-align: middle;">{{ ($submission->currentPage() - 1) * $submission->perPage() + $loop->iteration }}</td>
                                    <td class="text-bold-500 text-center">{{ $sb->kelas->kelas }}</td>
                                    <td class="text-bold-500 text-center">{!! $sb->babsubmission !!}</td>
                                    <td class="text-bold-500" style="width: 50%;">{!! $sb->soal !!}</td>
                                    <td class="text-bold-500">{{ $sb->lanjut }}</td>
                                    <td class="text-bold-500">
                                        <form action="{{ route('submission.destroy', $sb->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('submission.edit', $sb->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $submission->appends($request)->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection