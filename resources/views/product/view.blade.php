<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>    
<title>Product View</title>
</head>
@include('layouts.master');	
<body>                
<nav class="main-header">
	<div class="col-lg-12 p-3" style="margin-top:30px">
		<div class="card card-primary">
			<div class="card-header">
				<div class="d-flex ">
					<a class="mt-3" href="/product/index"><i class="fas fa-arrow-left"></i></a>
					<h3 class="card-title p-3 ">Product</h3>
				</div>			
			</div>
			<div class="d-flex p-4 bg-light">
				<div class="col-lg-5"  >
					<div style="background-color:gray;" class="card p-2">
						@php
                    		$explode= explode(',',$data->image);
               			@endphp                	
                   		<img style="width:100%;padding:3px" src="/product/{{$explode[0]}}">
                   	</div>
                   	<div class="card p-2">
                   		<a href="{{$data->video}}" class="text-dark">Product Video</a>
                   	</div>
                   	<div class="d-flex">
                   		<div class="col-lg-6 ">
                   			<div class="card ">
	                   			<p  style="font-weight: bold;margin-top:15px;margin-left:40px;"><i class="fa fa-shopping-cart"></i> ADD TO CART</p>
	                   		</div>
	                   	</div>
	                   	<div class="col-lg-6 ">
	                   		<div class="card bg-dark">
	                   			<p style="font-weight: bold;color:white; margin-top:15px;margin-left:40px;"><i class="fa fa-bolt"></i> BUY NOW</p>
	                   		</div>
	                   	</div>
                   	</div>
                </div>
				<div class="col-lg-7">
					<h5>{{$data->name}}</h5>
					<h4><i class="fa fa-inr"></i>{{ ($data->price/100*(100-$data->discount))}}<del style="font-size:15px ;margin-left: 15px; color: grey;"><i class="fa fa-inr"></i> {{$data->price}}</del><span style="margin-left:20px;font-size:15px;color: green;">{{$data->discount}}% Off</span> </h4>
					<p>{!!$data->description!!}</p>
					<div class="col-lg-12 ml-2">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title" >Specifications</h3>
							</div>
							<div class="card-body">
								<div class="p-3">
									<h5>General</h5>
									<div class="d-flex">
										<p class="col-lg-3" style="color:gray;">Color</p>
										<p>: {{$data->color}}</p>
									</div>
									<div class="d-flex">
										<p class="col-lg-3" style="color:gray;">Size</p>
										<p>: {{$data->size}}</p>
									</div>
									<div class="d-flex">
										<p class="col-lg-3" style="color:gray;">Stock</p>
										<p>: {{$data->stock}} Items</p>
									</div>
									<div class="d-flex">
										<p class="col-lg-3" style="color:gray;">Return Policy</p>
										<p>: {{$data->return}}</p>
									</div>
								</div>
								
							</div>	
							<div class="p-3" style="border-top: 1px solid #dcddde;">
								<p style="color:blue;">Read More</p>
							</div>						
						</div>

					</div>
				</div>
				
			</div>
		</div>		
	</div>   
</nav>   		
</body>
</html>	