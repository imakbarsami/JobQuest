<?php

namespace App\Http\Controllers;

use App\Mail\JobNotification;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobType;
use App\Models\SaveJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function add_job(){

        $categories=Category::orderBy('name','asc')->where('status',1)->get();
        $job_types=JobType::orderBy('name','asc')->where('status',1)->get();
        return view('front.job.add',compact('categories','job_types'));
    }

    public function store(Request $request){

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

            $job=new Job();
            $job->title = $request->title;
            $job->user_id=Auth::user()->id;
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
            $job->status=empty($request->status) ?1: $request->status;
            $job->is_featured=empty($request->is_featured)?0:$request->is_featured;
            $job->save();

            session()->flash('success','Job added successfully');

            return response()->json([
                'status'=> true,
                'success'=> 'Job added successfully'
            ]);
        }else{
            return response()->json([
                'status'=> false,
                'errors'=> $validator->errors()
            ]);
        }
    }

    public function job_details(Request $request,$id){

        $job=Job::where(['id'=>$id,'status'=>1])->with(['category','job_type'])->first();
        if(!$job){
            abort(404);
        }

        if(Auth::check()){
            $saved_job=SaveJob::where('job_id',$id)->where('user_id',Auth::user()->id)->count();
        }else{
            $saved_job=0;
        }
        
        $applications=JobApplication::where('job_id',$id)->with('user')->orderBy('id','desc')->get();
        
        return view('front.job.details',compact('job','saved_job','applications'));
    }

    public function my_jobs(Request $request){

        $my_jobs=Job::latest()->where('user_id',Auth::user()->id)->with(['job_type','category','applicaiton']);
        if($request->keyword){
            $my_jobs=$my_jobs->where(function($query) use ($request) {
                $query->orWhere('title','like','%'.$request->keyword.'%');
            });
        }
        $my_jobs=$my_jobs->paginate(5);
        return view('front.job.myjob',compact('my_jobs'));
    }

    public function edit_job($id){

        $categories=Category::orderBy('name','asc')->where('status',1)->get();
        $job_types=JobType::orderBy('name','asc')->where('status',1)->get();
        $job=Job::where('id',$id)->where('user_id',Auth::user()->id)->first();

        if(!$job){
            return redirect()->route('account.myjobs');
        }

        return view('front.job.edit',compact('job','categories','job_types'));
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
            $job->status=empty($request->status) ?1: $request->status;
            $job->is_featured=empty($request->is_featured)?0:$request->is_featured;
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

        $job=Job::where('id',$request->id)->where('user_id',Auth::user()->id)->first();
        if(!$job){

            session()->flash('error','No Record Found');
            return response()->json([
                'status'=> true,
                'success'=> 'No Record Found'
            ]);
        }

        $job->delete();
        session()->flash('success','Job Deleted Successfully');
        return response()->json([
            'status'=> true,
            'success'=> 'Job Deleted Successfully'
        ]);
    }

    public function apply_job(Request $request){

        $id= $request->id;
        $employer=Job::where('id',$id)->first();
        
        //job not exist in database
        if(!$employer){
            session()->flash('error','No Record Found');
            return response()->json([
                'status'=> true,
                'success'=> 'No Record Found'
            ]);
        }

        //user cant applied their own job
        if(Auth::user()->id==$employer->user_id){
            session()->flash('error','You are not allowed to apply your own job');
            return response()->json([
                'status'=> true,
                'success'=> 'You are not allowed to apply your own job'
            ]);
        }

        $job_applied_count=JobApplication::where([
            'user_id'=>Auth::user()->id,
            'job_id'=>$id
        ])->count();


        //user already applied for this job
        if($job_applied_count> 0){
            session()->flash('error','You have already applied for this job');
            return response()->json([
                'status'=> true,
                'success'=> 'You have already applied for this job'
            ]);
        }

        $application=new JobApplication();
        $application->user_id=Auth::user()->id;
        $application->job_id=$id;
        $application->employer_id= $employer->user_id;
        $application->applied_at=now();

        $employer_mail=User::find($employer->user_id);

        $mailData=[
            'job'=>$employer,
            'user'=>Auth::user(),
            'employer'=>$employer_mail
        ];

        Mail::to($employer_mail->email)->send(new JobNotification($mailData));
        $application->save();

        session()->flash('success','Job Applied Successfully');

        return response()->json([
            'status'=> true,
            'success'=> 'Job Applied Successfully'
        ]);
    }

    public function my_application(Request $request){

        $job_applications=JobApplication::where('user_id',Auth::user()->id)->with(['job','job.job_type','job.category'])->orderBy('id','desc');
        if($request->keyword){
            $job_applications = $job_applications->whereHas('job', function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->keyword . '%');
            });            
        }
        $job_applications=$job_applications->paginate(5);
        return view('front.job.myapplicaiton',compact('job_applications'));
    }

    public function delete_application(Request $request){

        $job_applicaiton=JobApplication::where(['id'=>$request->id,'user_id'=>Auth::user()->id])->first();

        if(!$job_applicaiton){
            session()->flash('error','No Record Found');
            return response()->json([
                'status'=> true,
                'success'=> 'No Record Found'
            ]);
        }

        $job_applicaiton->delete();

        session()->flash('success','Job Application Deleted Successfully');
        return response()->json([
            'status'=> true,
            'success'=> 'Job Application Deleted Successfully'
        ]);
    }

    public function save_job(Request $request){
        $saved_jobs=SaveJob::where('user_id',Auth::user()->id)->with(['job','job.category','job.job_type'])->orderBy('id','desc');
        if($request->keyword){
            $saved_jobs = $saved_jobs->whereHas('job', function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->keyword . '%');
            });            
        }
        $saved_jobs=$saved_jobs->paginate(5);
        return view('front.job.savepost',compact('saved_jobs'));
    }

    public function save_job_process(Request $request){

        $job=Job::where('id',$request->id)->first();

        if(!$job){
            return redirect()->route('home');
        }

        $exit_save=SaveJob::where([
            'user_id'=>Auth::user()->id,
            'job_id'=>$request->id
        ])->first();

        if($exit_save){
            session()->flash('error','Job Already Saved');
            return response()->json([
                'status'=> true,
                'success'=> 'Job Already Saved'
            ]);
        }

        $save_job=new SaveJob();
        $save_job->user_id=Auth::user()->id;
        $save_job->job_id=$request->id;
        $save_job->save();

        session()->flash('success','Job Saved Successfully');
        return response()->json([
            'status'=> true,
            'success'=> 'Job Saved Successfully'
        ]);
    }

    public function delete_save_post(Request $request){

        $saved_job=SaveJob::where([
            'user_id'=>Auth::user()->id,
            'id'=>$request->id
        ]);
        
        if(!$saved_job){
            session()->flash('error','No Record Found');
            return response()->json([
                'status'=> true,
                'errors'=> 'No Record Found'
            ]);
        }

        $saved_job->delete();

        session()->flash('success','Saved Job Deleted Successfully');
        return response()->json([
            'status'=> true,
            'success'=> 'Saved Job Deleted Successfully'
        ]);
    }
}
