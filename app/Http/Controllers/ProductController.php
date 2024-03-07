<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\categarymodels;
use App\Models\Warranty;
use App\Models\Accessories;
use App\Models\Condition;
use Illuminate\Http\Request;
class productController extends Controller
{

    public function create(){
        $data = categarymodels::get();
        return view('product.create',compact('data'));
    }
    public function index(Request $request){
        $categary = categarymodels::get();         
        $data = Product::paginate(3);
        return view('product.index',compact('data','categary'));        
    }  
    public function search(Request $request){
        $name = $request->name;
        $price= $request->price;
        $size= $request->size;
        if (!empty($name) && !empty($price) && !empty($size)) {
            $data = Product::where('name',$name)
                           ->where('price',$price)
                           ->where('size',$size)
                           ->paginate(3);
           return view('product.index',compact('data')); 
        }else{
             return redirect('product/index');
        }   
    }  
    public function view($id){
        $data = Product::where('id',$id)->first();
        $categary = categarymodels::get();
        return view('product.view',compact('data','categary'));  
    }      
    public function store(Request $request)
    {
        $request->validate([
            // 'tittle' => 'required',
            // 'price'  => 'required',
            // 'name'  => 'required|unique:product',              
            // 'video'=> 'required|url',
            // 'sku'  => 'required',              
            // 'stock'  => 'required',              
            'images'  => 'required',              
            // 'categary_id'  => 'required',
            // 'color'  => 'required',
            // 'discount'  => 'required',
            // 'return'  => 'required',
            // 'description'  => 'required',              
        ]);
       if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $file->move('product', 
                $image_full_name);
                $images[] = $image_full_name;
            }
        }
        $explode = explode(",",$images);
        dd($images);
        $product = new Product();
        $product->tittle= $request->tittle;
        $product->price= $request->price;
        $product->name= $request->name;
        $product->video = $request->video;
        $product->sku= $request->sku;
        $product->stock= $request->stock;
        $product->image= $images;
        $product->categary_id= $request->categary_id;
        $product->size= $request->size;
        $product->color= $request->color;
        $product->discount= $request->discount;
        $product->return= $request->return;
        $product->description= $request->description;
        $product->save();

        return redirect('/product/index')->with('success',"product data created successfully");
    }
    public function delete($id){
        Product::where('id', $id)->delete();
        return redirect('/product/index')->with('success',"Product data deleted successfully");
    }
    public function edit($id){
        $data = Product::where('id',$id)->first();
        $categary = categarymodels::get();
        return view('product.edit',compact('data','categary'));  
    }    
    public function update(Request $request,$id)
    {
        $request->validate([
            'tittle' => 'required',
            'price'  => 'required',
            'name'  => 'required|unique:product,name,'.$id,    
            'video'=> 'required|url',          
            'sku'  => 'required',              
            'stock'  => 'required',              
            'image'  => 'required',              
            'color'  => 'required',              
            'discount'  => 'required',              
            'return'  => 'required',              
            'categary_id'  => 'required',
            'description'  => 'required',              
        ]);
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $file->move('product', 
                $image_full_name);
                $images[] = $image_full_name;
            }
        }
        $explode = implode(',',$images);
        $update_product = Product::find($id);
        $update_product->tittle= $request->tittle;
        $update_product->price= $request->price;
        $update_product->name= $request->name;
        $update_product->video = $request->video;
        $update_product->sku= $request->sku;
        $update_product->stock= $request->stock;
        $update_product->image= $images;
        $update_product->categary_id= $request->categary_id;
        $update_product->size= $request->size;
        $update_product->color= $request->color;
        $update_product->discount= $request->discount;
        $update_product->return= $request->return;
        $update_product->description= $request->description;
        $update_product->update();
        return redirect('/product/index')->with('success',"Product data Updated successfully");
    }
}