<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>    
<title>Product Edit</title>
</head>
<body class ="bg-light">
@include('layouts.master');	

<form enctype="multipart/form-data" method="post" action="/product/update/{{$data->id}}">
	@csrf
	<nav class="main-header ">
		<div class=" col-lg-12 p-3">
    		<div class="col-lg-12">
			    <div class="card card-primary ">
            		<div class="card-header">
                		<h3 class="card-title p-3">Product Edit</h3>
              		</div>
              		<div class="p-3">
              			<div class="row">
                			<div class="col-lg-6">
                				<label> Tittle</label>
                				<input type="tittle" class="form-control"value="{{$data->tittle}}" name="tittle" placeholder="Edit Product  Tittle">        
                				<span class="text-danger">{{ $errors->first('tittle')}}</span>
            				</div>
            				<div class="col-lg-6">
                				<label>Price</label>
                				<input type="price" class="form-control"value="{{$data->price}}" name="price" placeholder="Edit Product Price">
                				<span class="text-danger">{{ $errors->first('price')}}</span>
            				</div>
                		</div>
                		<div class="row mt-3">
                			<div class="col-lg-6">
	                			<label> Name</label>
    	            			<input type="name" class="form-control"value="{{$data->name}}" name="name" placeholder="Edit Product Name">
        	        			<span class="text-danger">{{ $errors->first('name')}}</span>
            				</div>
                			<div class="col-lg-6">
	                			<label> Video</label>
	                			<input wire:model="video" class="form-control"value="{{$data->video}}" type="text" name="video" accept="video/*" placeholder="Url youtube">
					            <span class="text-danger">{{ $errors->first('video')}}</span>
            				</div>
            			</div>
                		<div class="row mt-3">                						
            				<div class="col-lg-6">
                				<label>Product Sku</label>
                				<input type="sku" class="form-control"value="{{$data->sku}}" name="sku" placeholder="Edit Product Sku">
                				<span class="text-danger">{{ $errors->first('sku')}}</span>
            				</div>
            				<div class="col-lg-6">
                				<label>Product Stock</label>
                				<input type="number" class="form-control"value="{{$data->stock}}" name="stock" placeholder="Edit Product Stock Quantity">
                				<span class="text-danger">{{ $errors->first('stock')}}</span>
            				</div>
                		</div>
                		<div class="row mt-3">
                			<div class="col-lg-6">
                				<label>Product image</label>
                				<input type="file" class="form-control" name="image[]" multiple>
                				<span class="text-danger">{{ $errors->first('image')}}</span>
            				</div>
            				<div class="form-group col-lg-6">
	                  			<label>Categary Id</label>
	                  			<select class="form-control"value="{{$data->categary_id}}" name="categary_id">
	                  				@foreach($categary as $value)
	                  					<option value="{{$value->id}}"{{$value->id == $data->categary_id ? 'selected="selected"' : ''}} >{{$value->name}}</option>
	                  				@endforeach
	                  			</select>
	                  			<span class="text-danger">{{ $errors->first('categary_id') }}</span>
	                  		</div>                					
	                  	</div>
	                  	<div class="row mt-3">
                			<div class="col-lg-6">
                				<label>Size</label>
                				<select class="form-control" name="size">
                					<option {{$data->size =='2XS' ? 'selected="selected"' : ''}}>2XS</option>
                					<option {{$data->size =='XS' ? 'selected="selected"' : ''}}>XS</option>
                					<option {{$data->size =='S' ? 'selected="selected"' : ''}}>S</option>
                					<option {{$data->size =='M' ? 'selected="selected"' : ''}}>M</option>
                					<option {{$data->size =='L' ? 'selected="selected"' : ''}}>L</option>
                					<option {{$data->size =='XL' ? 'selected="selected"' : ''}}>XL</option>
                				</select>
                				<span class="text-danger">{{ $errors->first('size')}}</span>
                			</div>
                			<div class="col-lg-6">
                				<label>Color</label>
                				<select class="form-control" name="color">
                					<option {{$data->color =='White' ? 'selected="selected"' : ''}}>White</option>
                					<option {{$data->color =='Red' ? 'selected="selected"' : ''}}>Red</option>
                					<option {{$data->color =='Black' ? 'selected="selected"' : ''}}>Black</option>
                					<option {{$data->color =='Gray' ? 'selected="selected"' : ''}}>Gray</option>
                				</select>
                				<span class="text-danger">{{ $errors->first('color')}}</span>
                			</div>
                		</div>
                		<div class="row  mt-3">
                			<div class="col-lg-6">
                				<label>Discount</label>
                				<input type="text" class="form-control"value="{{$data->discount}}" name="discount" placeholder="Edit Product Discount Percentage">
                				<span class="text-danger">{{ $errors->first('discount')}}</span>
                			</div>
                			<div class="col-lg-6">
                				<label>Return Policy</label>
                				<select class="form-control" name="return">
                					<option {{$data->return =='0 days' ? 'selected="selected"' : ''}}>0 days</option>
                					<option {{$data->return =='1 days' ? 'selected="selected"' : ''}}>1 days</option>
                					<option {{$data->return =='2 days' ? 'selected="selected"' : ''}}>2 days</option>
                					<option {{$data->return =='3 days' ? 'selected="selected"' : ''}}>3 days</option>
                					<option {{$data->return =='4 days' ? 'selected="selected"' : ''}}>4 days</option>
                					<option {{$data->return =='5 days' ? 'selected="selected"' : ''}}>5 days</option>
                					<option {{$data->return =='6 days' ? 'selected="selected"' : ''}}>6 days</option>
                					<option {{$data->return =='7 days' ? 'selected="selected"' : ''}}>7 days</option>
                					<option {{$data->return =='8 days' ? 'selected="selected"' : ''}}>8 days</option>
                					<option {{$data->return =='9 days' ? 'selected="selected"' : ''}}>9 days</option>
                					<option {{$data->return =='10 days' ? 'selected="selected"' : ''}}>10 days</option>
                				</select>
                				<span class="text-danger">{{ $errors->first('return')}}</span>
                			</div>
                		</div>
                		<div class=" mt-3">
                			<label>Description</label>
                			<textarea type="description" id="editor" name="description" class="form-control">{{$data->description}}</textarea> 
                			<span class="text-danger">{{ $errors->first('description')}}</span>
                		</div>
                		<div class=" mb-4 col-lg-8 d-flex mx-auto mt-3">
    	              		<button type="submit" name="submit" value="submit" class="col-lg-6 mr-2 form-control btn btn-primary">Submit</button>
        	          		<a href="/product/index" type="button" name="back" value="back" class="col-lg-6 form-control btn btn-dark ml-2">Back</a>
            	    	</div>
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