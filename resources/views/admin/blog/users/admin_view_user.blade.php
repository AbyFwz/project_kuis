@extends('layouts.adminLayout.admin_design')
@section('page-title', 'Manage Users')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        <span>List of Article</span>
        <a href="{{ url('admin/users/add') }}" class="btn btn-success float-right">Tambah Data</a>
        <a href="{{ url('admin/users/cetak_pdf') }}" class="btn btn-success float-right" style="margin-right: 2.5px">Cetak PDF</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Image</th>
                        {{-- <th>Created</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Image</th>
                        {{-- <th>Created</th> --}}
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $usr)
                    <tr>
                        <td>{{ $usr->id }}</td>
                        <td>{{ $usr->name }}</td>
                        <td>{{ $usr->email }}</td>
                        <td>{{ $usr->nama_role }}</td>
                        <td><img src="{{ asset('img/backend_img/users/small/'.$usr->image) }}" alt="Users Image"></td>
                        {{-- <td>{{ $usr->created_at->format('d M, Y') }}</td> --}}
                        <td>
                            <a href="users/edit/{{ $usr->id }}" class="badge badge-warning">Edit</a>
                            <a href="users/delete/{{ $usr->id }}" class="badge badge-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection