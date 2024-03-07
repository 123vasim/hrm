<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User index</title>
<link rel="stylesheet" href="https:fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<style>
a{
color: black;
}
</style>
</head>
<body>
    <form method="post">
        @include('layouts.master');
        <nav class="main-header ">
            <div class="col-lg-10 mx-auto p-4" style="margin-bottom:50px">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title col-lg-8"> User Management</h3>
                        <a class=" btn btn-dark" href="/user/create" type="button">Add  User </a>
                        <a class=" btn btn-dark" href="/export" type="button">Export </a>
                        <a class=" btn btn-dark" href="/imports" type="button">Import </a>

                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>SR</th>
                                    <th>Username</th>
                                    <th>E-mail</th>
                                    <th>Number</th>
                                    <th >Role Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key=> $value)
                                    <tr>
                                        <td>{{$key +1}}</td>
                                        <td>{{$value->name }}</td>
                                        <td>{{$value->email }}</td>
                                        <td>{{$value->number }}</td>                                        <td>
                                            <button class="btn btn-sm  {{$value->role == '8' ? 'btn-success' :( $value->role == '9' ? 'btn-primary':'btn-dark')}}" style="border:none;">{{$value->Role ? $value->Role->name : 'N/A'}}</button>
                                        </td>
                                        <td class="d-flex">
                                            <a class="btn btn-danger" name="delete" value="delete" type="button" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"  href="/user/delete/{{$value->id}}"><i class=" fa fa-trash"></i></a>
                                            <a class="ml-1 btn btn-primary" name="update" value="update" type="button"  href="/user/edit/{{$value->id}}"><i class=" fa fa-edit"></i></a>
                                            <a class="ml-1 btn btn-dark" name="update" value="update" type="button"  href="/generate/pdf/{{$value->id}}">PDF</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="ml-3 mt-3">
                            {!! $data->withQueryString()->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </form>
</body>
</html>