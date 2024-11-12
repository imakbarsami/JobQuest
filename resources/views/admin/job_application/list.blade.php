@extends('front.layout.app')

@section('title')
| Applications
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
                            <li class="breadcrumb-item">Job Application</a></li>
                        </ol>
                    </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('admin.layout.slider')
            </div>
       
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="mb-3">
                            <!-- First Row: Title and Create User button -->
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h3 class="fs-4 mb-1">Job Application</h3>
                            </div>
                            
                            <!-- Second Row: Reset button and Search field with icon -->
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{route('admin.job_applications')}}" class="btn btn-primary">Reset</a>
                                
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
                                        <th>User</th>
                                        <th scope="col">Employer</th>
                                        <th scope="col">Applied At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @if ($applications->isNotEmpty())
                                        @foreach ($applications as $application)
                                            <tr class="active">
                                                <td>
                                                    <div class="job-name fw-500">{{$application->job->title}}</div>
                                                </td>
                                                <td>{{$application->user->name}}</td>
                                                <td>{{$application->employer->name}}</td>
                                                <td>{{$application->created_at->format('j M, Y')}}</td>
                                              
                                                <td>
                                                    <div class="action-dots">
                                                        <button href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" onclick="deleteJobApplication({{$application->id}})" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="4" class="text-center text-danger text-muted font-weight-bold p-3">
                                                No Jobs Application Yet
                                            </td>
                                        </tr>
                                    @endif
                                    
                                </tbody>
                                
                            </table>
                        </div>
                        <div>
                            {{ $applications->links() }}
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
    function deleteJobApplication(id){
        if(confirm('Are you sure you want to remove this application?')){
            $.ajax({
                url:'{{route("admin.job_applications.delete")}}',
                type:'post',
                data:{id:id},
                dataType:'json',
                success:function(response){
                    if(response.status){
                        window.location.href="{{url()->current()}}";
                    }
                }
            })
        }
    }
</script>
@endsection