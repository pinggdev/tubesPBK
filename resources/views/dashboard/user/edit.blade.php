@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit User</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nama</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror" name="name" value="{{ old('name') ?? $user->name ?? '' }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Role</label>
                            </div>
                            <fieldset class=" col-md-8 form-group">
                                <select class="form-select @error('role') {{ 'is-invalid' }} @enderror" id="basicSelect" name="role">
                                    <option value="">Pilih Kategori</option>    
                                    <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>    
                                    <option value="member" @if($user->role == 'member') selected @endif>Member</option>    
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <div class="col-md-4">
                                <label>Email</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control @error('email') {{ 'is-invalid' }} @enderror" name="email" value="{{ old('email') ?? $user->email ?? '' }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Password</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="password" class="form-control @error('password') {{ 'is-invalid' }} @enderror" name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Avatar</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input class="form-control" type="file" name="avatar" value="{{ old('avatar') ?? $user->avatar ?? '' }}">
                                @error('avatar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                <a href="{{ route('user.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection