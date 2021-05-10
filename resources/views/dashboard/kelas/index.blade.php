@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Kelas</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="row">
                <div class="col-8 align-self-center">
                    <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-sm align-self-center">Tambah Kelas</a>
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
                @if ($kelas->total())
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KELAS</th>
                                <th>DESKRIPSI</th>
                                <th>BAB</th>
                                <th>GAMBAR</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $kls)
                                <tr>
                                    <td scope="row" style="vertical-align: middle;">{{ ($kelas->currentPage() - 1) * $kelas->perPage() + $loop->iteration }}</td>
                                    <td class="text-bold-500">{{ $kls->kelas }}</td>
                                    <td class="text-bold-500">{{ $kls->deskripsi }}</td>
                                    <td class="text-bold-500">{{ $kls->bab }}</td>
                                    <td>
                                        <img src="{{ asset('storage/kelas/'.$kls->gambar) }}" class="img-fluid" style="width: 100px;">
                                    </td>
                                    <td class="text-bold-500">
                                        <form action="{{ route('kelas.destroy', $kls->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('kelas.edit', $kls->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $kelas->appends($request)->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection