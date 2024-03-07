<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Lead</title>
</head>
<body class ="bg-light">  
@include('layouts.master');	
<form enctype="multipart/form-data" method="post" action="/lead/update/{{$data->id}}">
	@csrf
	<nav class="main-header" style="margin-top:40px">
		<div class=" col-lg-12">
		    <div class="card card-primary">
        		<div class="card-header">
        			<h3 class="card-title p-3"> Edit Lead</h3>
        		</div>
                <div class="card-body">
                	<div class="mt-3">
                		<label> Name</label>
                    	<input type="name" class="form-control"value="{{$data->lead_name}}" name="lead_name" placeholder="Enter Lead Name">
                    	<span class="text-danger">{{ $errors->first('lead_name') }}</span>
                  	</div>
                  	<div class="mt-3">
                    	<label>Description</label>
                    	<input type="description" class="form-control"value="{{$data->description}}" name="description" placeholder="Description">
                    	<span class="text-danger">{{ $errors->first('description') }}</span>
                  	</div>
                  	<div class="row mt-3">
	                	<div class="form-group col-lg-6">
	                		<label>Categary Id</label>
	                		<select class="form-control" name="categary_id">
	                			@foreach($categary as $value)
	                				<option value="{{$value->id}}" {{$value->id == $data->categary_id ? 'selected="selected"' : ''}} >{{$value->name}}</option>
	                			@endforeach
	                		</select>
	                		<span class="text-danger">{{ $errors->first('categary_id') }}</span>
	                	</div>
	                	<div class="col-lg-6">
	                		<label>Customer Name</label>
	                		<select class="form-control"  name="customer_id">
	                			@foreach($customer as $value)
	                  				<option value="{{$value->id}}" {{$value->id == $data->customer_id ? 'selected="selected"' : ''}} >{{$value->name}}</option>
	                  			@endforeach                  							
	                  		</select>
	                  	</div>
	                </div>
                  	<div>
               			<label>Image</label>
               			<input type="file" name="image" class="form-control">
               			<span class="text-danger">{{ $errors->first('image') }}</span>
               		</div>
               		<div class="row mt-3">
                  		<div class="col-lg-6">
                    		<label>Start Date</label>
                    		<input class="form-control" type="date"value="{{$data->start_date}}" name="start_date">
                    		<span class="text-danger">{{ $errors->first('start_date') }}</span>
                  		</div>
                  		<div class="col-lg-6">
                    		<label>End Date</label>
                    		<input class="form-control"value="{{$data->end_date}}" type="date" name="end_date">
                    		<span class="text-danger">{{ $errors->first('end_date') }}</span>
                  		</div>
                  	</div>
				    <div class=" mb-4 col-lg-8 d-flex mx-auto mt-3">
    	            	<button type="submit" name="submit" value="submit" class="col-lg-6 mr-2 form-control btn btn-primary">Submit</button>
        	        	<a href="/lead/index" type="button" name="back" value="back" class="col-lg-6 form-control btn btn-dark ml-2">Back</a>
            	    </div>
            	</div>
            </div>
        </div>
   	</nav>
</form>        		
</body>
</html>