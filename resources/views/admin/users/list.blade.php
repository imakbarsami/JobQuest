@extends('front.layout.app')

@section('title')
| Users
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
                            <li class="breadcrumb-item active">Users</li>
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
                                <h3 class="fs-4 mb-1">Users</h3>
                                <a href="{{ route('admin.user.add') }}" class="btn btn-primary">Create User</a>
                            </div>
                            
                            <!-- Second Row: Reset button and Search field with icon -->
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{route('admin.users')}}" class="btn btn-primary">Reset</a>
                                
                                <form action="" method="GET" class="input-group" style="max-width: 250px;">
                                    <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control" placeholder="Search users" aria-label="Search users">
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
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @if ($users->isNotEmpty())
                                        @foreach ($users as $user)
                                            <tr class="active">
                                                <td>
                                                    <div class="job-name fw-500">{{$user->id}}</div>
                                                </td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->mobile}}</td>
                                                <td>
                                                    <div class="action-dots">
                                                        <button href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="{{route('admin.user.edit',$user->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                                            <li><a class="dropdown-item" onclick="removeUser({{$user->id}})" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
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
                            {{ $users->links() }}
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
    function removeUser(id){
        if(confirm('Are you sure you want to remove this user?')){
            $.ajax({
                url:'{{route("admin.user.delete")}}',
                type:'post',
                data:{id:id},
                dataType:'json',
                success:function(response){
                    if(response.status){
                        window.location.reload();
                    }
                }
            })
        }
    }
</script>
@endsection