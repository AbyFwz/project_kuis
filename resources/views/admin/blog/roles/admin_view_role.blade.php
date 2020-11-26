@extends('layouts.adminLayout.admin_design')
@section('page-title', 'Manage Roles')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        <span>List of Article</span>
        <a href="{{ url('admin/users/roles/add') }}" class="btn btn-success float-right">Tambah Data</a>
        <a href="{{ url('admin/users/roles/cetak_pdf') }}" class="btn btn-success float-right" style="margin-right: 2.5px">Cetak PDF</a>
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
                    @foreach ($roles as $rls)
                    <tr>
                        <td>{{ $rls->role_id }}</td>
                        <td>{{ $rls->nama_role }}</td>
                        <td>
                            <a href="roles/edit/{{ $rls->role_id }}" class="badge badge-warning">Edit</a>
                            <a href="roles/delete/{{ $rls->role_id }}" class="badge badge-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection