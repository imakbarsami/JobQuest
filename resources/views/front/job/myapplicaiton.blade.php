@extends('front.layout.app')

@section('title')
| My Application
@endsection
@section('main')

@section('main')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Jobs Applied</li>
                        </ol>
                    </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.layout.slidebar')
            </div>
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="mb-3">
                            <!-- First Row: Title and Create User button -->
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h3 class="fs-4 mb-1">My Application</h3>
                                
                            </div>
                            
                            <!-- Second Row: Reset button and Search field with icon -->
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{route('account.my-application')}}" class="btn btn-primary">Reset</a>
                                
                                <form action="" method="GET" class="input-group" style="max-width: 250px;">
                                    <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control" placeholder="Search application" aria-label="Search application">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @include('front.layout.message')
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Applied At</th>
                                        <th scope="col">Applicants</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                   @if ($job_applications->isNotEmpty())
                                   @foreach ($job_applications as $job_application)
                                        @if ($job_application->job->status!=1)
                                                                    
                                        @else
                                        <tr class="expired">
                                            <td>
                                                <div class="job-name fw-500">{{$job_application->job->title}}</div>
                                                <div class="info1">{{$job_application->job->job_type->name}} . {{$job_application->job->location}}</div>
                                            </td>
                                            <td>{{$job_application->applied_at->format('j M Y')}}</td>
                                            <td>{{$job_application->job->applicaiton->count()}} Applications</td>
                                            <td>
                                                @if ($job_application->job->status==1)
                                                <div class="job-status text-capitalize">Active</div>
                                                @else
                                                <div class="job-status text-capitalize">Block</div>
                                                @endif
                                               
                                            </td>
                                            <td>
                                                <div class="action-dots">
                                                    <a href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                
                                                        <li><a class="dropdown-item" href="{{route('account.job_details',$job_application->job_id)}}"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                        <li><a class="dropdown-item" onclick="deleteApplicaiton({{$job_application->id}})" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                   @endforeach
                                    @else
                                    <tr class="text-center">
                                        <td colspan="4" class="text-center text-danger text-muted font-weight-bold p-3">
                                            No Job Applications Found
                                        </td>
                                    </tr>
                                        
                                    @endif
                                </tbody>
                            </table>
                            <div>{{$job_applications->links()}}</div>
                        </div>
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
    function deleteApplicaiton(id){
        if(confirm("Are you sure you want to delete this job application?")){
        $.ajax({
            url:"{{route('account.delete-application')}}",
            type:'post',
            data:{id:id},
            dataType:'json',
            success:function(response){
                if(response.status){
                    window.location.href = "{{route('account.my-application')}}";
                }
            }
        })
    }
  }   
</script>
@endsection