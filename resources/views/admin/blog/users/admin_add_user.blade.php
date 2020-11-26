@extends('layouts.adminLayout.admin_design')
@section('page-title', 'Add Users')
@section('content')
<form action="/admin/users/add" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" required="required" name="nama"></br>
    </div>
    <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" required="required" name="email"></br>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" required="required" name="password"></br>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image"></br>
    </div>
    <div class="form-group">
        <select name="role" class="form-control">
            @foreach ($roles as $rls)
                <option value="{{ $rls->role_id }}">{{ $rls->nama_role }}</option>
            @endforeach
        </select><br>
    </div>
    <button type="submit" name="add" class="btn btn-primary float-right">Tambah Data</button>
</form>
@endsection