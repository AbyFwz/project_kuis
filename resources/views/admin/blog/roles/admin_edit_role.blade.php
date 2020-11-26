@extends('layouts.adminLayout.admin_design')
@section('page-title', 'Add Roles')
@section('content')
<form action="/admin/users/roles/edit/{{ $roles->role_id }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="role_id" value="{{ $roles->role_id }}">
    <div class="form-group">
    <label for="title">Nama Role</label>
    <input type="text" class="form-control" required="required" name="nama_role" value="{{ $roles->nama_role }}"></br>
    </div>
    <button type="submit" name="add" class="btn btn-primary float-right">Tambah Data</button>
</form>
@endsection