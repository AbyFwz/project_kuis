<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Roles Report</title>
    <link href="{{ public_path('css/backend_css/styles.css') }}" rel="stylesheet" />
    <link href="{{ public_path('css/backend_css/dataTables.bootstrap4.min.js') }}" rel="stylesheet" crossorigin="anonymous" />
    <script src="{{ public_path('js/backend_js/all.min.css') }}" crossorigin="anonymous"></script>
</head>
<body>
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        <span>List of Article</span>
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
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $usr)
                    <tr>
                        <td>{{ $usr->id }}</td>
                        <td>{{ $usr->name }}</td>
                        <td>{{ $usr->email }}</td>
                        <td>{{ $usr->nama_role }}</td>
                        <td><img src="{{ public_path('img/backend_img/users/small/'.$usr->image) }}" alt="Users Image"></td>
                        {{-- <td>{{ $usr->created_at->format('d M, Y') }}</td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ public_path('js/backend_js/jquery-3.5.1.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ public_path('js/backend_js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ public_path('js/backend_js/scripts.js')}}"></script>
    <script src="{{ public_path('js/backend_js/chart.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ public_path('js/backend_js/chart-area-demo.js') }}"></script>
    <script src="{{ public_path('js/backend_js/chart-bar-demo.js') }}"></script>
    <script src="{{ public_path('js/backend_js/jquery.DataTables.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ public_path('js/backend_js/dataTables.bootstrap4.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ public_path('js/backend_js/datatables-demo.js') }}"></script>
</body>
</html>