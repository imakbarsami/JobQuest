@extends('front.layout.app')

@section('title')
| My Jobs
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
                            <li class="breadcrumb-item active">My Jobs</li>
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
                                <h3 class="fs-4 mb-1">My Jobs</h3>
                                <a href="{{ route('account.add_job') }}" class="btn btn-primary">Post a Job</a>
                            </div>
                            
                            <!-- Second Row: Reset button and Search field with icon -->
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{route('account.myjobs')}}" class="btn btn-primary">Reset</a>
                                
                                <form action="" method="GET" class="input-group" style="max-width: 250px;">
                                    <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control" placeholder="Search jobs" aria-label="Search jobs">
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
                                        <th scope="col">Job Created</th>
                                        <th scope="col">Applicants</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @if ($my_jobs->isNotEmpty())
                                        @foreach ($my_jobs as $job)
                                            <tr class="active">
                                                <td>
                                                    <div class="job-name fw-500">{{$job->title}}</div>
                                                    <div class="info1">{{$job->job_type->name}} . {{$job->company_location}}</div>
                                                </td>
                                                <td>{{$job->created_at->format('j M, Y')}}</td>
                                                <td>{{$job->applicaiton->count()}} Applications</td>
                                                <td>
                                                    <div class="job-status">
                                                        @if($job->status == 1)
                                                            <span class="badge bg-success text-white">Active</span>
                                                        @else
                                                            <span class="badge bg-danger text-white">Block</span>
                                                        @endif
                                                    </div>                                                    
                                                </td>
                                                <td>
                                                    <div class="action-dots">
                                                        <button href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            @if ($job->status == 1)
                                                            <li><a class="dropdown-item" href="{{route('account.job_details',$job->id)}}"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                            @endif
                                                            <li><a class="dropdown-item" href="{{route('account.edit_job',$job->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                                            <li><a class="dropdown-item" onclick="deleteCategory({{$job->id}})" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="4" class="text-center text-danger text-muted font-weight-bold p-3">
                                                No Jobs Post Yet
                                            </td>
                                        </tr>
                                    @endif
                                    
                                </tbody>
                                
                            </table>
                        </div>
                        <div>
                            {{ $my_jobs->links() }}
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
    function deleteCategory(id){

     if(confirm("Are you sure you want to delete?")){
         $.ajax({
             url: "{{route('account.job_delete')}}",
             type: 'delete',
             data: {id:id},
             dataType: 'json',
             success: function(response){
                 if(response["status"]){
                     window.location.href="{{route('account.myjobs')}}";
                 }else{
 
                 }
             }});
         }
    }
 
 </script>
@endsection