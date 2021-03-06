@extends('layouts.adminLayout.admin_design')
@section('page-title', 'Manage Articles')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        <span>List of Article</span>
        <a href="{{ url('admin/blog/add-article') }}" class="btn btn-success float-right">Tambah Data</a>
        <a href="{{ url('admin/blog/cetak_pdf') }}" class="btn btn-success float-right" style="margin-right: 2.5px">Cetak PDF</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Featured Image</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Featured Image</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($articles as $art)
                    <tr>
                        <td>{{ $art->id }}</td>
                        <td>{{ $art->title }}</td>
                        <td>{{ Str::limit($art->content, 100, '...') }}</td>
                        {{-- <td>{{ $art->featured_image }}</td> --}}
                    <td><img src="{{ asset('/img/backend_img/articles/small/'.$art->featured_image) }}" alt="ImageCap"></td>
                        <td>{{ $art->created_at->format('d M, Y') }}</td>
                        <td>
                            <a href="edit-article/{{ $art->id }}" class="badge badge-warning">Edit</a>
                            <a href="delete-article/{{ $art->id }}" class="badge badge-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection