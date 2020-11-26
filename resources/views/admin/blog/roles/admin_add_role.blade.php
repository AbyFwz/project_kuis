@extends('layouts.adminLayout.admin_design')
@section('page-title', 'Add Roles')
@section('content')
<form action="/admin/users/roles/add" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="title">Nama Role</label>
    <input type="text" class="form-control" required="required" name="nama_role"></br>
    </div>
    <button type="submit" name="add" class="btn btn-primary float-right">Tambah Data</button>
</form>
@endsection