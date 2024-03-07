<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lead index</title>
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
		<nav class="main-header" style="margin-top:30px">
           	<div class="col-lg-12">
           		<div class="card card-primary">
               		<div class="card-header">
                   		<h3 class="card-title col-lg-10">Lead Table</h3>
                   		<a class="col-lg-2 form-control btn btn-dark" href="/lead/create" type="button">Add Lead</a>
               		</div>
               		<div class="card-body table-responsive p-0">
                   		<table class="table table-hover text-nowrap">
                   			<thead>
	                           	<tr>
	                                <th class="col-lg-1"> SR</th>
	                              	<th class="col-lg-1"> Name</th>
									<th class="col-lg-1"> Description</th>
									<th class="col-lg-1"> Categary </th>
									<th class="col-lg-1"> Customer </th>
									<th class="col-lg-1"> Start</th>
									<th class="col-lg-1"> End</th>
									<th class="col-lg-1"> Action</th>
		                        </tr>
                            </thead>
                            <tbody>
                            	@foreach($data as $key => $value)
                            	<tr>
									<td>{{$key +1}}</td>
									<td>{{$value->lead_name}}</td>
									<td>{{$value->description}}</td>
									<td>{{$value->categarymodels ? $value->categarymodels->name : 'N/A'}}</td>
									<td>{{$value->Customer ? $value->Customer->name : 'N/A'}}</td>
									<td>{{$value->start_date}}</td>
									<td>{{$value->end_date}}</td>
									<td class="d-flex p-2" >
										<a class="btn btn-danger" name="delete" value="delete" type="button"  onclick="return confirm('{{ __('Are you sure you want to delete?') }}')" href="/delete/{{$value->id}}"><i class=" fa fa-trash"></i></a>
										<a class="ml-3 btn btn-primary" name="update" value="update" type="button"  href="/lead/edit/{{$value->id}}"><i class=" fa fa-edit"></i></a>
									</td>
								</tr>
                               	@endforeach
                            </tbody>
                        </table>
                        <div class=" ml-3 mt-3">
                        	{!! $data->withQueryString()->links('pagination::bootstrap-4') !!}
                    	</div>
                    </div>
               	</div>
            </div>
        </nav>
    </form>
</body>
</html>
