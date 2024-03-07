<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\leadmodels;
use App\Models\categarymodels;
use App\Models\Customer;
class leadController extends Controller
{
    public function create(){
        $data = categarymodels::get();
        $customer=Customer::get();
        return view('lead.create' ,compact('data','customer'));
    }
    public function index(){
        $data = leadmodels::paginate(3);
        return view('lead.index',compact('data'));
    }
    public function store(Request $request){
        $request->validate([
            'lead_name' => 'required|unique:lead',
            'description'  => 'required',
            'categary_id'  => 'required',              
            'customer_id'  => 'required',              
            'image'  => 'required',              
            'start_date'  => 'required',
            'end_date'  => 'required',              
        ]);
        if (!empty($request->image)) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/lead/');
            $image->move($destinationPath, $name);
        }
        $lead = new leadmodels();
        $lead->lead_name= $request->lead_name;
        $lead->description= $request->description;
        $lead->categary_id= $request->categary_id;
        $lead->customer_id= $request->customer_id;
        $lead->image= $name;
        $lead->start_date= $request->start_date;
        $lead->end_date= $request->end_date;
        $lead->save();
        return redirect('/lead/index')->with('success',"lead data created successfully");
    }
    public function delete($id){
        leadmodels::where('id', $id)->delete();
        return redirect('/lead/index')->with('success',"lead data deleted successfully");
    }     
    public function edit($id){
        $data = leadmodels::where('id',$id)->first();
        $categary = categarymodels::get();
        $customer = Customer::get();
        return view('lead.edit',compact('data','categary','customer'));  
    }
    public function update(Request $request,$id){
        $request->validate([
            'lead_name' => 'required|unique:lead,lead_name,'.$id,
            'description'  => 'required',
            'categary_id'  => 'required',              
            'customer_id'  => 'required',              
            'image'  => 'required',              
            'start_date'  => 'required',
            'end_date'  => 'required',              
        ]);
        if (!empty($request->image)) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/lead/');
            $image->move($destinationPath, $name);
        }
        $update = leadmodels::find($id);
        $update->lead_name= $request->lead_name;
        $update->description= $request->description;
        $update->categary_id= $request->categary_id;
        $update->customer_id= $request->customer_id;
        $update->image= $name;
        $update->start_date= $request->start_date;
        $update->end_date= $request->end_date;
        $update->update();
        return redirect('/lead/index')->with('success',"lead data Updated successfully");
    }
}