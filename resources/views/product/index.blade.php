<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Product index</title>

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
th{
	background-color:blue ;
	padding: 10px;
	border: 1px solid white;
	color: white;
}
td{
	border: 1px solid #e3e3e3;
}
tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body class="hold-transition sidebar-mini">
@include('layouts.master');	
	<nav class="main-header ">
        <div class="col-lg-12" style="margin-top:40px">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title col-lg-10">Product </h3>
                    <a href="/product/create"class="col-lg-2 form-control btn btn-dark" type="button">Add Product </a>
                </div>
	            <div class="col-lg-12 p-4">
	            	<form method="post" action="/search/product">
	            		@csrf

			            <div class="d-flex col-lg-11">
							<input class="form-control col-lg-4"type="text" value="{{ Request::get('name') }}" name="name"placeholder="Select Name">
							<input class="form-control col-lg-4 ml-4"type="text"value="{{ Request::get('price') }}"name="price"placeholder="Select Price">
							<select class="form-control col-lg-4 ml-4" name="size">
								<option value="none">Select Size</option>
								<option {{ Request::get('size') =='2XS' ? 'selected="selected"' : ''}}>2XS</option>
								<option {{ Request::get('size') =='XS' ? 'selected="selected"' : ''}}>XS</option>
								<option {{ Request::get('size') =='S' ? 'selected="selected"' : ''}}>S</option>
								<option {{ Request::get('size') =='M' ? 'selected="selected"' : ''}}>M</option>
								<option {{ Request::get('size') =='L' ? 'selected="selected"' : ''}}>L</option>
								<option {{ Request::get('size') =='XL' ? 'selected="selected"' : ''}}>XL</option>
               				</select>
			           	</div>
		                <div class="d-flex mt-3">
		                  	<button class="col-lg-1 ml-2 btn btn-primary"name="submit"type="submit"value="submit">Filter</button>
	                   		<a href="/product/index"class="col-lg-1 ml-2 btn btn-primary"value="refresh"style="background-color:blue;">Refresh</a>
	               		 </div>
	               	</form>
	            	<div>
	              		<h4 class="ml-2 mt-2" style="font-weight:bold;"> Download Product Data</h4>
	                    <button class="col-lg-3 ml-2 btn btn-primary"> <i class="fa fa-download mr-2"></i>Download Product Data</button>
	                </div>
	            </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap mt-3">
                        <thead>
                            <tr>
                              	<th>SR</th>
								<th>Tittle</th>
								<th>Price</th>
								<th>Name</th>
								<th>Sku</th>
								<th>Stock</th>
								<th>Categary </th>
								<th>Size </th>
								<th>Color</th>
								<th>Discount</th>
								<th>Return </th>
								<th>Action</th>
                            </tr>
                        </thead>
                       	<tbody>
                       		@if($data->count())
                            @foreach($data as $key => $value)
                                <tr>
                                    <td>{{$key +1}}</td>
									<td>{{$value->tittle}}</td>
									<td>{{$value->price}}</td>
									<td>{{$value->name}}</td>
									<td>{{$value->sku}}</td>
									<td>{{$value->stock}}</td>
									<td>{{$value->categarymodels ? $value->categarymodels->name : 'N/A'}}</td>
									<td>{{$value->size}}</td>
									<td>{{$value->color}}</td>
									<td>{{$value->discount}}</td>
									<td>{{$value->return}}</td>
									<td class="d-flex" >
										<a class="btn btn-danger" name="delete" value="delete" type="button" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"  href="/product/delete/{{$value->id}}"><i class=" fa fa-trash"></i></a>
										<a class="ml-1 btn btn-primary" name="update" value="update" type="button"  href="/product/edit/{{$value->id}}"><i class=" fa fa-edit"></i></a>
										<a class="ml-1 btn btn-dark" name="update" value="update" type="button"  href="/product/view/{{$value->id}}"><i class=" fa fa-eye"></i></a>
									</td>                                   
								</tr>
                            @endforeach
                            @else
                            <td colspan="12" class="text-center text-danger"><b>Record Not Found</b></td>
                            @endif
                        </tbody>
                    </table>
                    <div class=" mt-3 ml-3">
                    	@if(empty($pdata) > 0)
                        {!! $data->withQueryString()->links('pagination::bootstrap-4') !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"tegrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


