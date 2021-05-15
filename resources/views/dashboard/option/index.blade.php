@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Option Kuis</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="row">
                <div class="col-8 align-self-center">
                    <a href="{{ route('option.create') }}" class="btn btn-primary btn-sm align-self-center">Tambah Option</a>
                </div>
                <div class="col-4">
                    <form method="get" action="{{ route('option.index') }}">
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
                @if ($option->total())
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>SOAL KUIS</th>
                                <th>OPTION</th>
                                <th>POINT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($option as $op)
                                <tr>
                                    <td scope="row" style="vertical-align: middle;">{{ ($option->currentPage() - 1) * $option->perPage() + $loop->iteration }}</td>
                                    <td class="text-bold-500">{!! $op->kuis->soal !!}</td>
                                    <td class="text-bold-500">{!! $op->option !!}</td>
                                    <td class="text-bold-500">{{ $op->points}}</td>
                                    <td class="text-bold-500">
                                        <form action="{{ route('option.destroy', $op->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('option.edit', $op->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $option->appends($request)->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection