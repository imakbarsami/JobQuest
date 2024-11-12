<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request){

        $users=User::orderBy('updated_at','desc');

        if($request->keyword){
            $users=$users->where(function($query) use ($request) {
                $query->orWhere('name','like','%'.$request->keyword.'%')
                ->orWhere('email','like','%'.$request->keyword.'%')
                ->orWhere('mobile','like','%'.$request->keyword.'%');
            });
        }
        $users=$users->paginate(5);
        return view('admin.users.list',compact('users'));
    }

    public function create(){
        return view('admin.users.add');
    }

    public function store(Request $request){

        $validator=Validator::make(($request->all()),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'role'=>'required',
            'password'=>'required|min:8',
           
        ]);

        if($validator->passes()){

            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->designation=$request->designation;
            $user->mobile=$request->mobile;
            $user->role=$request->role;
            $user->save();

            session()->flash('success','User {'.$request->name.'} Created Successfully');
            
            return response()->json([
                'status'=>true,
                'message'=>'User Created Successfully'
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }

    }

       

    public function edit($id){

        $user=User::find($id);
        if(!$user){
            abort(404);
        }
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request,$id){

        $validator=Validator::make(($request->all()),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,
            'role'=>'required',
           
        ]);

        if($validator->passes()){

            $user=User::find($id);
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->designation=$request->designation;
            $user->mobile=$request->mobile;
            $user->role=$request->role;
            $user->save();

            if(!$user){
                session()->flash('error','No user found');
                return response()->json([
                    'status'=>true,
                    'message'=>'No user found'
                ]);
            }

            session()->flash('success','User {'.$request->name.'} Updated Successfully');
            
            return response()->json([
                'status'=>true,
                'message'=>'User Updated Successfully'
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }
    }

    public function delete(Request $request){

        $user=User::find($request->id);
        
        if(Auth::user()->id==$request->id){
            session()->flash('error','You can not delete your account');
            return response()->json([
                'status'=>true,
                'message'=>'You can not delete your account'
            ]);
        }

        if(empty($user)){
            session()->flash('error','User not found');
            return response()->json([
                'status'=>true,
                'message'=>'User not found'
            ]);
        }

        $user->delete();

        session()->flash('success','User Deleted Successfully');
        return response()->json([
            'status'=>true,
            'message'=>'User Deleted Successfully'
        ]);
    }
}
