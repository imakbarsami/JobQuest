<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function index(Request $request){

        $jobs=Job::orderBy('updated_at','desc')->with(['job_type','category','user']);
        if($request->keyword){
            $jobs=$jobs->where(function($query) use ($request) {
                $query->orWhere('title','like','%'.$request->keyword.'%');
            });
        }
        $jobs=$jobs->paginate(5);
        return view('admin.jobs.list',compact('jobs'));
    }

    public function edit($id){

        $job=Job::where('id',$id)->first();
        $categories=Category::orderBy('name','asc')->get();
        $job_types=JobType::orderBy('name','asc')->get();

        if(!$job || !$categories || !$job_types){
            abort(404);
        }

        return view('admin.jobs.edit',compact('job','categories','job_types'));
    }


    public function update(Request $request,$id){

        $job=Job::find($id);

        if(empty($job)){

            session()->flash('error','No Record Found');

            return response()->json([
                'status'=> true,
                'success'=> 'No Record Found'
            ]);
        }

        $validator=Validator::make($request->all(),[
            'title'=>'required|min:5',
            'vacancy'=>'required|integer',
            'location'=>'required|max:50',
            'experience'=>'required',
            'company_name'=>'required|max:50',
            'category_id'=>'required',
            'job_type_id'=>'required',
            'salary'=>'required',
            'description'=>'required',
        ]);

        if($validator->passes()){

            $job->title = $request->title;
            $job->category_id=$request->category_id;
            $job->job_type_id=$request->job_type_id;
            $job->vacancy=$request->vacancy;
            $job->salary = $request->salary;
            $job->location=$request->location;
            $job->description=$request->description;
            $job->benefits=$request->benefits;
            $job->responsibility=$request->responsibility;
            $job->qualifications=$request->qualifications;
            $job->experience=$request->experience;
            $job->keywords=$request->keywords;
            $job->company_name=$request->company_name;
            $job->company_location=$request->company_location;     
            $job->company_website=$request->company_website;
            $job->status=$request->status;
            $job->is_featured=$request->is_featured;
            $job->save();

            session()->flash('success','Job Updated Successfully');

            return response()->json([
                'status'=> true,
                'success'=> 'Job Updated Successfully'
            ]);
            
        }else{
            return response()->json([
                'status'=> false,
                'errors'=> $validator->errors()
            ]);
        }
    }


    public function delete(Request $request){

        $job=Job::where('id',$request->id)->first();

        if(empty($job)){
            session()->flash('error','Job not found');
            return response()->json([
                'status'=>true,
                'message'=>'Job not found'
            ]);
        }

        $job->delete();

        session()->flash('success','Job deleted successfully');
        return response()->json([
            'status'=>true,
            'message'=>'Job deleted successfully'
        ]);
    }
}
