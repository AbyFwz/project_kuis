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
                        <th>Title</th>
                        <th>Content</th>
                        <th>Featured Image</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $art)
                    <tr>
                        <td>{{ $art->id }}</td>
                        <td>{{ $art->title }}</td>
                        <td>{{ Str::limit($art->content, 100, '...') }}</td>
                        {{-- <td>{{ $art->featured_image }}</td> --}}
                        <td><img src="{{ public_path('/img/backend_img/articles/small/'.$art->featured_image) }}" alt="ImageCap"></td>
                        <td>{{ $art->created_at->format('d M, Y') }}</td>
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