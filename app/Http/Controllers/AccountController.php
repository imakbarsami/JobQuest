<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPassword;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;


class AccountController extends Controller
{
    public function registation(){

        return view('front.account.registation');
    }

    public function login(){

        return view('front.account.login');
    }

    public function register_process(Request $request){

        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'email|required|unique:users',
            'password'=>'required|min:8',
            'confirm_password'=>'required|same:password',
        ]);

        if($validator->passes()){

            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->save();
           
            session()->flash('success','Account created successfully');
            return response()->json([
                'status'=>true,
            ]);

        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }


    }
 
    
    public function login_process(Request $request){

        $validator=Validator::make($request->all(),[
            'email'=>'email|required|exists:users,email',
            'password'=> 'required',
        ]);

        if($validator->passes()){
          if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('account.profile');

          }else{
            session()->flash('error','Invalid Credentials');
           return redirect()->route('account.login')->withInput($request->only('email'));
          }
        }else{
            return redirect()->route('account.login')
                   ->withErrors($validator)
                   ->withInput($request->only('email'));
        }
    }

    public function profile(){
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('front.account.profile',compact('user'));
    }

    public function profile_update(Request $request){

        $validator=Validator::make($request->all(),[

            'name'=>'required',
            'email'=>'email|required|unique:users,email,'.Auth::user()->id,
            'mobile'=>'numeric',
        ]);

        if($validator->passes()){

            $id=Auth::user()->id;
            $user=User::find($id);
            $user->name=$request->name;
            $user->email=$request->email;
            $user->designation=$request->designation;
            $user->mobile=$request->mobile;
            $user->save();

            session()->flash('success','Profile Updated Successfully');
            return response()->json([
                'status'=>true,
                'success'=>'Profile Updated Successfully'
            ]);
        }else{

            session()->flash('error','Something Went Wrong');
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }
    }

    public function change_password(Request $request){

        $id=Auth::user()->id;
        $user=User::find($id);

        $validator=Validator::make($request->all(),[
            'password' => [
                'required',
                'min:8',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Old password is incorrect.');
                    }
                },
            ],
            'new_password'=>'required|min:8',
            'confirm_password'=>'required|same:new_password',
        ],[
            'password.exists'=>'old password is incorrect'
        ]);

        if($validator->passes()){

            $user->password=$request->new_password;
            $user->save();

            session()->flash('success','Password Changed Successfully');

            return response()->json([
                'status'=>true,
                'success'=>'Password Changed Successfully'
            ]);

        }else{
            
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }
    }

    public function update_profile_pic(Request $request){

        $validator = Validator::make($request->all(), [
            'image' => 'required|image|max:3072'
        ], [
            'image.max' => 'The image must be less than 3 MB.'
        ]);
        

        $id=Auth::user()->id;
        if($validator->passes()){

            $image=$request->image;
            $extention=$image->getClientOriginalExtension();
            $imageName=$id.'-'.time().'.'.$extention;
            $image->move(public_path('/images/profile_pic/'), $imageName);

            $sourcePath=public_path('/images/profile_pic/'.$imageName);
            $destinationPath=public_path('/images/profile_pic/thumb/'.$imageName);

            $manager = new ImageManager(Driver::class);
            $image = $manager->read($sourcePath);
            $image->scaleDown(width: 170); 
            $image->scaleDown(height: 170); 
            $image->toPng()->save($destinationPath);

            File::delete(public_path('/images/profile_pic/'.Auth::user()->image));
            File::delete(public_path('/images/profile_pic/thumb/'.Auth::user()->image));


            User::where('id',$id)->update(['image'=>$imageName]);
            
            session()->flash('success','Profile Pic Updated Successfully');

            return response()->json([
                'status'=>true,
                'success'=>'Profile Updated Successfully'
            ]);
        }else{
            session()->flash('error','Something Went Wrong');
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }
    }

    public function forget_password(){

        return view('front.account.forget_password');
    }
    
   public function forget_password_process(Request $request){

         $validator=Validator::make($request->all(),[
            'email'=>'required|email|exists:users,email',
         ]);

         if($validator->passes()){

            DB::table('password_reset_tokens')->where('email',$request->email)->delete();

            DB::table('password_reset_tokens')->insert([
                'email'=>$request->email,
                'token'=>Str::random(60),
                'created_at'=>now()
            ]);

            $token=DB::table('password_reset_tokens')->where('email',$request->email)->first();
            $email= $request->email;

            $user=User::where('email',$email)->first();

            $mailData=[
                'name'=>$user->name,
                'email'=>$email,
                'token'=>$token->token,
            ];

            Mail::to($email)->send(new ForgetPassword($mailData));

            return redirect()->route('account.login')->with('success','We have sent you a password reset link on your email');

         }else{
            return redirect()
                    ->route('forget-password')
                    ->withErrors($validator)
                    ->withInput($request->only('email'));
        }
   }

   public function new_password_form(Request $request,$token){
    
        $user=User::where('email',$request->email)->first();
        
        $token_match=DB::table('password_reset_tokens')->where('token', $token)->first();

        if(!$token_match){
            return redirect()->route('account.login')->with('error','Your reset link has expired. Please request a new one.');
        }else{
            $token=$token_match->token;
            return view('front.account.new_password',compact('token'));
        }     
   }

   public function update_password_reset_form(Request $request){

          $exist_token=DB::table('password_reset_tokens')->where('token',$request->token)->first();
          $user=User::where('email',$exist_token->email)->first();

          $validator=Validator::make($request->all(),[
            'password'=>'required|min:8',
            'confirm_password'=>'required|same:password',
        ]);

        if($validator->passes()){
            $user->password=Hash::make($request->password);
            $user->save();
            DB::table('password_reset_tokens')->where('email',$exist_token->email)->delete();

            session()->flash('success','Password Updated Successfully');

            return response()->json([
                'status'=>true,
                'success'=>'Password Updated Successfully'
            ]);

        }else{
            
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }
   }
    public function logout(){
        Auth::logout();
        return redirect()->route('account.login')->with('success','Logout Successfully');
    }
}
