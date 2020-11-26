@extends('layouts.adminLayout.admin_design')
@section('page-title', 'Manage Articles')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        <span>List of Article</span>
        <a href="{{ url('admin/blog/add-article') }}" class="btn btn-success float-right">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($roles as $art)
                    <tr>
                        <td>{{ $art->role_id }}</td>
                        <td>{{ $art->nama_role }}</td>
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