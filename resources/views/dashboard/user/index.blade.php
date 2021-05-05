@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">User</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="row">
                <div class="col-8 align-self-center">
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm align-self-center">Tambah User</a>
                </div>
                <div class="col-4">
                    <form method="get" action="{{ route('user.index') }}">
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
                @if ($user->total())                    
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>ROLE</th>
                                <th>EMAIL</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $usr)
                                <tr>
                                    <td scope="row" style="vertical-align: middle;">{{ ($user->currentPage() - 1) * $user->perPage() + $loop->iteration }}</td>
                                    <td class="text-bold-500">{{ $usr->name }}</td>
                                    <td class="text-bold-500">{{ $usr->role }}</td>
                                    <td class="text-bold-500">{{ $usr->email }}</td>
                                    <td class="text-bold-500">
                                        <form action="{{ route('user.destroy', $usr->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('user.edit', $usr->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                    {{ $user->appends($request)->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection