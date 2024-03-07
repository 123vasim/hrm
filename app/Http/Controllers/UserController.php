<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{   
    private $user;

    public function index(Request $request){
        $role = Role::get();         
        $data = Users::paginate(10);
        return view('user.index',compact('data','role'));        
    }
    public function create(){
        $data = Role::get();
        return view('user.create',compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',              
            'email'  => 'required|unique:user',              
            'number'  => 'required|unique:user',              
            'password'  => 'required|max:12|min:8',              
        ]);
      
            $user_add = new Users();
            $user_add->name= $request->name;
            $user_add->email= $request->email;
            $user_add->number= $request->number;
            $user_add->password= Hash::make($request['password']);
            $user_add->role= $request->role;
            
            $user_add->save();
        return redirect('/user/index')->with('success',"user data created successfully");
    } 
    public function delete($id){
        Users::where('id', $id)->delete();
        return redirect('/user/index')->with('success',"user data deleted successfully");
    }
    public function edit($id){
        $data = Users::where('id',$id)->first();
        $role = Role::get();
        return view('user.edit',compact('data','role'));  
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'  => 'required',
            'email'  => 'required|unique:user,email,'.$id,
            'number'  => 'required|unique:user,number,'.$id,
        ]);      
            $update_user = Users::find($id);
            $update_user->name= $request->name;
            $update_user->email= $request->email;
            $update_user->number= $request->number;
            $update_user->role= $request->role;            
            $update_user->update();
        return redirect('/user/index')->with('success',"user data Updated successfully");
    }
    public function login(){
        return view('user.login');  
    }
    public function success(Request $request){
        $request->validate([
            'email'  => 'required',
            'password'  => 'required',
        ]);
        $email = $request->email;
        $password = $request->password;
        $data = Users::where('email',$email)->where('password',$password)->first();

        if (!empty($data)) {
            return redirect('/user/index');
        }else{
            return redirect()->back();
        }
    }
    
    
}