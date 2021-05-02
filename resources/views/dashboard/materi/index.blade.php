@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Materi</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="row">
                <div class="col-8 align-self-center">
                    <a href="{{ route('materi.create') }}" class="btn btn-primary btn-sm align-self-center">Tambah Materi</a>
                </div>
                <div class="col-4">
                    <form method="get" action="{{ route('materi.index') }}">
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
                @if ($materi->total())                    
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>MATERI</th>
                                <th>KELAS</th>
                                <th>LINK</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materi as $mtr)
                                <tr>
                                    <td scope="row" style="vertical-align: middle;">{{ ($materi->currentPage() - 1) * $materi->perPage() + $loop->iteration }}</td>
                                    <td class="text-bold-500">{{ $mtr->materi }}</td>
                                    <td class="text-bold-500">{{ $mtr->kelas->kelas }}</td>
                                    <td class="text-bold-500">{{ $mtr->link }}</td>
                                    <td class="text-bold-500">
                                        <form action="{{ route('materi.destroy', $mtr->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('materi.edit', $mtr->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                    {{ $materi->appends($request)->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection