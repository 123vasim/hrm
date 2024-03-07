<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>    
<title>User Create</title>
</head>
@include('layouts.master');	
<body>                
	<form enctype="multipart/form-data" method="post" action="/user/store">
		@csrf
		<nav class="main-header">
		    <div class="col-lg-11 mx-auto">
			    <div class="card card-primary" style="margin-top:50px">
            		<div class="card-header">
                		<h3 class="card-title p-3"> User Create</h3>
              		</div>
              		<div class="p-3">              			
	              		<div class="row">              			
	              			<div class="col-lg-6">
	              				<label>Username</label>
	              				<input class="form-control"placeholder="Enter User Name" name="name">
	                  			<span class="text-danger">{{ $errors->first('name')}}</span>
	              			</div>  
	              			<div class="col-lg-6">
	              				<label>E-mail</label>
	              				<input class="form-control"placeholder="Enter User E-mail" name="email">
	                  			<span class="text-danger">{{ $errors->first('email')}}</span>
	              			</div>            			
	              		</div>
	              		<div class="row mt-3"> 	              		 
	              			<div class="col-lg-6">
	              				<label>Number</label>
	              				<input class="form-control"placeholder="Enter User Number" name="number">
	                  			<span class="text-danger">{{ $errors->first('number')}}</span>
	              			</div>             			
	              			<div class="col-lg-6">
	              				<label>Password</label>
	              				<input type="password" class="form-control"placeholder="Enter User Password"name="password">
	                  			<span class="text-danger">{{ $errors->first('password')}}</span>
	              			</div>             			
	              		</div> 
              			<div class="mt-3">
              				<label>Role Name</label>
              				<select class="form-control" name="role">
              					@foreach($data as $value)
		            				<option value="{{$value->id}}">{{$value->name}}</option>
		            			@endforeach 
              				</select>
              			</div>             			
	                	<div class=" mb-4 col-lg-8 d-flex mx-auto mt-3">
	    	            	<button type="submit" name="submit" value="submit" class="col-lg-6 mr-2 form-control btn btn-primary">Submit</button>
	        	        	<a href="/user/index" type="button" name="back" value="back" class="col-lg-6 form-control btn btn-dark ml-2">Back</a>
	            	    </div>
              		</div>
              	</div>
          	</div>
      	</nav>
  	</form>
</body>
</html>	