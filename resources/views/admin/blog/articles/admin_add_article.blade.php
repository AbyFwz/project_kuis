@extends('layouts.adminLayout.admin_design')
@section('page-title', 'Add Article')
@section('content')
<form action="/admin/blog/add-article" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="title">Judul</label>
    <input type="text" class="form-control" required="required" name="title"></br>
    </div>
    <div class="form-group">
    <label for="content">Content</label>
    <input type="text" class="form-control" required="required" name="content"></br>
    </div>
    <div class="form-group">
    <label for="image">Feature Image</label>
    <input type="file" class="form-control" required="required" name="image" accept="image/*"></br>
    </div>
    <button type="submit" name="add" class="btn btn-primary float-right">Tambah Data</button>
</form>
@endsection