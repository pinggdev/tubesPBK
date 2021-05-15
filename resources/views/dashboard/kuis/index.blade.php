@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Kuis</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="row">
                <div class="col-8 align-self-center">
                    <a href="{{ route('kuis.create') }}" class="btn btn-primary btn-sm align-self-center">Tambah Kuis</a>
                </div>
                <div class="col-4">
                    <form method="get" action="{{ route('kelas.index') }}">
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
                @if ($kuis->total())
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KELAS</th>
                                <th>SOAL</th>
                                <th>BAB KUIS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kuis as $ks)
                                <tr>
                                    <td scope="row" style="vertical-align: middle;">{{ ($kuis->currentPage() - 1) * $kuis->perPage() + $loop->iteration }}</td>
                                    <td class="text-bold-500">{{ $ks->kelas->kelas }}</td>
                                    <td class="text-bold-500">{{ $ks->soal }}</td>
                                    <td class="text-bold-500">{{ $ks->babkuis}}</td>
                                    <td class="text-bold-500">
                                        <form action="{{ route('kuis.destroy', $ks->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('kuis.edit', $ks->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $kuis->appends($request)->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection