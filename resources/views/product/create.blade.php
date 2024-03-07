<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>    
<title>Product Create</title>
</head>
<body class ="bg-light">
		@include('layouts.master');	         
	<form enctype="multipart/form-data" method="post" action="/product/store">
		@csrf
		<nav class="main-header">
			<div class="col-lg-12 p-3">
				<div class="card card-primary ">
		       		<div class="card-header">
		           		<h3 class="card-title p-3">Product Create</h3>
		       		</div>
				    <div class="p-3">
				    	<div class=" row">
				        	<div class="col-lg-6">
				            	<label> Tittle</label>
				            	<input type="tittle" class="form-control" name="tittle" placeholder="Enter Product Tittle">
				            	<span class="text-danger">{{ $errors->first('tittle')}}</span>
				            </div>
				            <div class="col-lg-6">
				            	<label> Price</label>
				                <input type="price" class="form-control" name="price" placeholder="Enter Product Price">
				                <span class="text-danger">{{ $errors->first('price')}}</span>
				            </div>
				        </div>
				        <div class="row mt-3">
					        <div class="col-lg-6">
					        	<label> Name</label>
					            <input type="name" class="form-control" name="name" placeholder="Enter Product Name">
					            <span class="text-danger">{{ $errors->first('name')}}</span>
					        </div>
					        <div class="col-lg-6">
					        	<label> Video</label>
								<input wire:model="video" class="form-control" type="text" name="video" accept="video/*" placeholder="Url youtube">
					            <span class="text-danger">{{ $errors->first('video')}}</span>
					        </div>
				        </div>
				        <div class="row mt-3">                						
				        	<div class="col-lg-6">
				        		<label>Sku</label>
				                <input type="sku" class="form-control" name="sku" placeholder="Enter Product Sku">
				                <span class="text-danger">{{ $errors->first('sku')}}</span>
				            </div>
				            <div class="col-lg-6">
				                  <label> Stock</label>
				                  <input type="number" class="form-control" name="stock" placeholder="Enter Product Stock Quantity">
				                  <span class="text-danger">{{ $errors->first('stock')}}</span>
				            </div>
				        </div>
				       	<div class="row mt-3">
				        	<div class="col-lg-6">
				        		<label> image</label>
				                <input type="file" class="form-control"name="images[]" multiple>
				                <span class="text-danger">{{ $errors->first('images')}}</span>
				            </div>
				            <div class="col-lg-6">
				            	<label>Categary_id</label>
				                <select class="form-control"  name="categary_id">
					                @foreach($data as $value)
					                	<option value="{{$value->id}}">{{$value->name}}</option>
					                @endforeach                  							
					            </select>                   							
					            <span class="text-danger">{{ $errors->first('categary_id')}}</span>
				            </div>
				        </div>
				        <div class="row mt-3">
				        	<div class="col-lg-6">
				            	<label>Size</label>
				              	<select class="form-control" name="size">
				              		<option value="2XS">2XS</option>
				              		<option value="XS">XS</option>
				              		<option value="S">S</option>
				              		<option value="M">M</option>
				              		<option value="L">L</option>
				              		<option value="XL">XL</option>
				              	</select>
                			</div>
	                		<div class="col-lg-6">
	                			<label>Color</label>
	                			<select class="form-control" name="color">
	                				<option value="White">White</option>
	                				<option value="Red">Red</option>
	                				<option value="Black">Black</option>
	                				<option value="Gray">Gray</option>
	                			</select>
	                			<span class="text-danger">{{ $errors->first('color')}}</span>
	                		</div>
                		</div>
	                	<div class="row  mt-3">
	                		<div class="col-lg-6">
	                			<label>Discount</label>
	                			<input type="text" class="form-control" name="discount" placeholder="Enter Product Discount Percentage">
	                			<span class="text-danger">{{ $errors->first('discount')}}</span>
	                		</div>
	                		<div class="col-lg-6">
	                			<label>Return Policy</label>
	                			<select class="form-control" name="return">
	                				<option value="0 Days">0 days</option>
	                				<option value="1 Days">1 days</option>
	                				<option value="2 Days">2 days</option>
	                				<option value="3 Days">3 days</option>
	                				<option value="4 Days">4 days</option>
	                				<option value="5 Days">5 days</option>
	                				<option value="6 Days">6 days</option>
	                				<option value="7 Days">7 days</option>
	                				<option value="8 Days">8 days</option>
	                				<option value="9 Days">9 days</option>
	                				<option value="10 Days">10 days</option>
	                			</select>
	                			<span class="text-danger">{{ $errors->first('return')}}</span>
	                		</div>
	                	</div>
	                	<div class=" mt-3">
	                		<label>Description</label>
	                		<textarea type="description" id="editor" name="description" class="form-control"> </textarea>
	                		<span class="text-danger">{{ $errors->first('description')}}</span>
	                	</div>
	                	<div class=" mb-4 col-lg-8 d-flex mx-auto mt-3">
	    	            	<button type="submit" name="submit" value="submit" class="col-lg-6 mr-2 form-control btn btn-primary">Submit</button>
	        	        	<a href="/product/index" type="button" name="back" value="back" class="col-lg-6 form-control btn btn-dark ml-2">Back</a>
            	    	</div>
              		</div>
         		</div>
            </div>
    	</nav>
    </form>   
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script>CKEDITOR.replace('editor');</script>     		
</body>
</html>
