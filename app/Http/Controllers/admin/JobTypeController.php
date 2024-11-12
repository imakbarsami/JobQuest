<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobTypeController extends Controller
{
    public function index(Request $request){
        
        $types=JobType::orderBy('updated_at','desc');
        if($request->keyword){
            $types=$types->where(function($query) use ($request) {
                $query->orWhere('name','like','%'.$request->keyword.'%');
            });
        }
        $types=$types->paginate(5);
        return view('admin.job_rule.list',compact('types'));
    }

    public function create(){

        return view('admin.job_rule.add');
    }
    public function store(Request $request){

        $validator=Validator::make($request->all(),[
            'name'=>'required'
        ]);
        
        if($validator->passes()){

            $type=new JobType();
            $type->name=$request->name;
            $type->status=$request->status;
            $type->save();

            session()->flash('success','Job Type Added Successfully');
            return response()->json([
                'status'=>true,
                'message'=>'Job Type Added Successfully'
            ]);

        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }
    }
    public function edit($id){

        $type=JobType::find($id);
        if(!$type){
            abort(404);
        }
        return view('admin.job_rule.edit',compact('type'));
    }
    public function update(Request $request,$id){

        $type = JobType::find($id);

        if(!$type){
            session()->flash('error', 'Job type not found');
            return response()->json([
                'status' => true,
                'message' => 'Job type not found'
            ]);
        }

        $validator=Validator::make($request->all(),[
            'name'=>'required'
        ]);

        if($validator->fails()){
            
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);

        }else{

            $type->name = $request->name;
            $type->status=$request->status;
            $type->save();
    
            session()->flash('success', 'Job type updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'Job type updated successfully'
            ]);
        }
    }
    public function delete(Request $request){

        $type = JobType::find($request->id);
        if(!$type){
            session()->flash('error', 'Job Type not found');
            return response()->json([
                'status' => true,
                'message' => 'Job Type not found'
            ]);
        }
        $type->delete();

        session()->flash('success', 'Job Type deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Job Type deleted successfully'
        ]);
    }
}
