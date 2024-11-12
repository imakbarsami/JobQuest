<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index(Request $request){

        $applications=JobApplication::orderBy('id','desc')->with(['job','user','employer']);
        if($request->keyword){
            $applications = $applications->whereHas('job', function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->keyword . '%');
            });            
        }
        $applications=$applications->paginate(5);

        return view('admin.job_application.list',compact('applications'));
    }

    public function delete(Request $request){

        $application=JobApplication::find($request->id);

        if(!$application){
            session()->flash('error','Application not found');
            return response()->json([
                'status'=>true,
                'message'=>'Application not found'
            ]);
        }

        $application->delete();
        session()->flash('success','Application deleted successfully');
        return response()->json([
            'status'=>true,
            'message'=>'Application deleted successfully'
        ]);
    }
}
