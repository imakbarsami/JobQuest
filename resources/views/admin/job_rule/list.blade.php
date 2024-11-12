@extends('front.layout.app')

@section('title')
| JobType
@endsection

@section('main')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item">Job Type</a></li>
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
                                <h3 class="fs-4 mb-1">Job Type</h3>
                                <a href="{{ route('admin.job_types.add') }}" class="btn btn-primary">Create JobType</a>
                            </div>
                            
                            <!-- Second Row: Reset button and Search field with icon -->
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{route('admin.job_types')}}" class="btn btn-primary">Reset</a>
                                
                                <form action="" method="GET" class="input-group" style="max-width: 250px;">
                                    <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control" placeholder="Search jobtype" aria-label="Search jobtype">
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
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @if ($types->isNotEmpty())
                                        @foreach ($types as $type)
                                            <tr class="active">
                                                <td>{{$type->id}}</td>
                                                <td>{{$type->name}}</td>
                                                <td>
                                                    <div class="job-status">
                                                        @if($type->status == 1)
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
                                                            <li><a class="dropdown-item" href="{{route('admin.job_types.edit',$type->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                                            <li><a class="dropdown-item" onclick="deleteJobRule({{$type->id}})" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="4" class="text-center text-danger text-muted font-weight-bold p-3">
                                                No Record
                                            </td>
                                        </tr>
                                    @endif
                                    
                                </tbody>
                                
                            </table>
                        </div>
                        <div>
                            {{ $types->links() }}
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
    function deleteJobRule(id){
        if(confirm('Are you sure you want to remove this job type?')){
            $.ajax({
                url:'{{route("admin.job-types.delete")}}',
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