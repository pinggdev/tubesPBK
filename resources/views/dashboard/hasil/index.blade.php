@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Hasil Kuis</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="row">
                <div class="col-8 align-self-center">
                    {{-- <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-sm align-self-center">Tambah Kelas</a> --}}
                </div>
                <div class="col-4">
                    {{-- <form method="get" action="{{ route('hasil.index') }}">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" name="q" value="{{ $request['q'] ?? '' }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            </div>
                        </div>
                    </form> --}}
                </div>
            </div>
            <!-- Table with outer spacing -->
            <div class="table-responsive">
                @if ($result->total())
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>POINTS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $hasil)
                                <tr>
                                    <td scope="row" style="vertical-align: middle;">{{ ($result->currentPage() - 1) * $result->perPage() + $loop->iteration }}</td>
                                    <td class="text-bold-500">{{ $hasil->user->name }}</td>
                                    <td class="text-bold-500">{!! $hasil->total_points !!}</td>
                                    <td class="text-bold-500">
                                        <form action="{{ route('hasil.destroy', $hasil->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            {{-- <a href="{{ route('kelas.edit', $hasil->id) }}" class="btn btn-success btn-sm">Edit</a> --}}
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $result->appends($request)->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection