@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Materi</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <a href="" class="btn btn-primary btn-sm">Tambah Materi</a>
            <!-- Table with outer spacing -->
            <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th>MATERI</th>
                            <th>KURIKULUM</th>
                            <th>LINK</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-bold-500">Instalasi C++</td>
                            <td>Belajar C++ Dasar</td>
                            <td>https://www.youtube.com/channel/UC4wUtPE3ZqC3kgLXz--rjrQ</td>
                            <td class="text-bold-500">
                                <form action="#" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="#" class="btn btn-success btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection