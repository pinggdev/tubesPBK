@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Kelas</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah Kelas</a>
            <!-- Table with outer spacing -->
            <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th>KELAS</th>
                            <th>GAMBAR</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $kls)
                            <tr>
                                <td class="text-bold-500">{{ $kls->kelas }}</td>
                                <td>
                                    <img src="{{ asset('storage/kelas/'.$kls->gambar) }}" class="img-fluid" style="width: 100px;">
                                </td>
                                <td class="text-bold-500">
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="#" class="btn btn-success">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $kelas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection