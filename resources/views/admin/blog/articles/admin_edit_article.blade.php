@extends('layouts.adminLayout.admin_design')
@section('page-title', 'Edit Article')
@section('content')
<form action="/admin/blog/edit-article/{{$article->id}}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$article->id}}"></br>
    <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" class="form-control" required="required" name="title" value="{{$article->title}}"></br>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <input type="text" class="form-control" required="required" name="content" value="{{$article->content}}"></br>
    </div>
    <div class="form-group">
        <label for="image">Feature Image</label>
        <input type="file" class="form-control" required="required" name="image"></br>
    </div>
    <button type="submit" name="edit" class="btn btn-primary float-right">Ubah Data</button>
</form>
@endsection