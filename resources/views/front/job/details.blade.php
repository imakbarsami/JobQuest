@extends('front.layout.app')

@section('title')
| Job Details
@endsection
@section('main')

@section('main')
<section class="section-4 bg-2">    
    <div class="container pt-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#"  onclick="window.history.back()"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back</a></li>
                    </ol>
                </nav>
            </div>
        </div> 
    </div>
    <div class="container job_details_area">
        @include('front.layout.message')
        <div class="row pb-5">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="jobs_conetent">
                                    <a href="#">
                                        <h4>{{$job->title}}</h4>
                                    </a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i>{{$job->location}}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> {{$job->job_type->name}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now {{($saved_job>0)?'saved-job' : ''}}">
                                    <a class="heart_mark" href="javascript:void(0)" onclick="saveJob({{$job->id}})"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                            <p>{!! nl2br($job->description) !!}</p>
                        </div>
                        @if (!empty($job->responsibility))
                            <div class="single_wrap">
                                <h4>Responsibility</h4>
                                <p> <p>{!! nl2br($job->responsibility) !!}</p></p>
                            </div>
                        @endif
                       
                        @if (!empty($job->qualifications))
                            <div class="single_wrap">
                                <h4>Qualifications</h4>
                                <p>{!! nl2br($job->qualifications) !!}</p>
                            </div>
                        @endif
                       
                        @if (!empty($job->other_benefits))
                            <div class="single_wrap">
                                <h4>Benefits</h4>
                                <p> {!! nl2br($job->benefits) !!}</p>
                            </div>
                        @endif
                        
                        <div class="border-bottom"></div>
                        <div class="pt-3 text-end">
                           
                            @if (Auth::check())
                                 <a href="#" onclick="saveJob({{$job->id}})" class="btn btn-secondary">Save</a>
                                <a href="#" onclick="applyJob({{$job->id}})" class="btn btn-primary">Apply</a>

                            @else
                                <a href="javascript:void(0)" dsiabled class="btn btn-secondary">Save to Apply</a>
                                <a href="javascript:void(0)" dsiabled class="btn btn-primary">Login to Apply</a>      
                            @endif
                            
                        </div>
                    </div>
                </div>


                <div class="card shadow border-0 mt-3">
                    
                    @if (Auth::user() && $job->user_id==Auth::user()->id)
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="jobs_conetent">    
                                    <h4>Applicants</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Applied At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($applications->isNotEmpty())
                                    @foreach ($applications as $application)
                                        <tr>
                                            <td>{{ $application->user->name }}</td>
                                            <td>{{ $application->user->email }}</td>
                                            <td>{{ $application->user->mobile }}</td>
                                            <td>{{ $application->applied_at->format('j M Y') }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center text-secondary font-weight-bold p-4">
                                            No Applications Yet
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                    @endif

                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h3>Job Summery</h3>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Published on: <span>{{ $job->created_at->format('d F Y') }}</span></li>
                                <li>Vacancy: <span>{{$job->vacancy}} Position</span></li>
                                <li>Salary: <span>{{$job->salary}} </span></li>
                                <li>Location: <span>{{$job->location}}</span></li>
                                <li>Job Nature: <span> Full-time</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-0 my-4">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h3>Company Details</h3>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Name: <span>{{$job->company_name}}</span></li>
                                <li>Locaion: <span>{{$job->company_location}}</span></li>
                                <li>Webite: <span><a href="{{$job->company_website}}">{{$job->company_website}}</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('custom_js')

<script>
   
   function applyJob(id){
     
    if(confirm('Are you sure to apply this job?')){
        $.ajax({
            url:'{{route("apply-job")}}',
            type:'post',
            data:{id:id},
            dataType:'json',
            success:function(response){
                if(response.status){
                    window.location.href='{{url()->current()}}';
                }
            }
        })
    }
     
   }

   function saveJob(id){
    $.ajax({
            url:'{{route("account.save-job-process")}}',
            type:'post',
            data:{id:id},
            dataType:'json',
            success:function(response){
                if(response.status){
                    window.location.href='{{url()->current()}}';
                }
            }
        })
    }
   
</script>
@endsection