<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $users=User::where('role','user')->count();
        $admins=User::where('role','admin')->count();
        $jobs=Job::count();
        $applications=JobApplication::count();
        $active_jobs=Job::where('status',1)->count();
        $inactive_jobs=Job::where('status',0)->count();
       
        return view('admin.dashboard',compact('users','admins','jobs','applications','active_jobs','inactive_jobs'));
    }
}
