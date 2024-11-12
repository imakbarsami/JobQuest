<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobType;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){

        $categories=Category::orderBy('name','asc')->where('status',1)->get();
        $pcategories=Category::orderBy('name','asc')->where(['status'=>1,'is_featured'=>1])->take(8)->get();
        $jobs=Job::orderBy("id","desc")->where("status",1)->take(6)->get();
        $feature_jobs=Job::orderBy('updated_at','desc')->where(['is_featured'=>1,'status'=>1])->take(6)->get();
        return view('front.home',compact('jobs','categories','feature_jobs','pcategories'));
    }

    public function jobs(Request $request){

        $jobs=Job::where('status',1);

        if(!empty($request->keyword)){
            $jobs=$jobs->where(function($query) use ($request) {
                $query->orWhere('title', 'like', '%' . $request->keyword . '%')
                      ->orWhere('keywords', 'like', '%' . $request->keyword . '%');
            });
        }

        if(!empty($request->location)){
            $jobs=$jobs->where('location',$request->location);
        }

        if(!empty($request->category)){
            $jobs=$jobs->where('category_id',$request->category);
        }

        $job_type_array=[];
        if(!empty($request->job_type)){

            $job_type_array=explode(',',$request->job_type);
            $jobs=$jobs->whereIn('job_type_id',$job_type_array);
        }

        if(!empty($request->experience)){
            $jobs=$jobs->where('experience',$request->experience);
        }

        $jobs = $jobs->with(['job_type','category']);

        if($request->sort=='oldest'){
            $jobs = $jobs->orderBy('id','asc');
        }else{
            $jobs = $jobs->orderBy('id','desc');
        }

        $jobs= $jobs->paginate(6);
        $categories=Category::orderBy('name','asc')->where('status',1)->get();
        $job_types=JobType::orderBy('name','asc')->where('status',1)->get();
        return view('front.job.jobs',compact('jobs','categories','job_types','job_type_array'));
    }

}
