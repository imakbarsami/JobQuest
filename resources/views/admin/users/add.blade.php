@extends('front.layout.app')

@section('title')
| Add User
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
                            <li class="breadcrumb-item"><a href="{{route('admin.users')}}">Users</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('admin.layout.slider')
            </div>
       
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-2 ">
                    <div class="card-body card-form p-4">
                        <h3 class="fs-4 mb-1">Create User</h3>
                        @include('front.layout.message')
                        <form action="" name="createUserForm" id="createUserForm">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text"  placeholder="Name" id="name" name="name" class="form-control">
                                    <p></p>
                                </div>  
                            
                                <div class="col-md-6 mb-4">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email"  placeholder="Email" id="email" name="email" class="form-control">
                                    <p></p>
                                </div>   
                            
                                <div class="col-md-6 mb-4">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text"  placeholder="Designation" id="designation" name="designation" class="form-control">
                                </div>  
                            
                                <div class="col-md-6 mb-4">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="text"  placeholder="Mobile" id="mobile" name="mobile" class="form-control">
                                </div> 
                            
                                <div class="col-md-6 mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" placeholder="Password" id="password" name="password" class="form-control">
                                    <p></p>
                                </div> 
                            
                                <div class="col-md-6 mb-4">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-select">
                                        <option  value="user">User</option>
                                        <option  value="admin">Admin</option>
                                    </select>
                                </div>
                            
                                <div class="col-md-12  text-center">
                                    <button type="submit" class="btn btn-primary">Create User</button>
                                </div> 
                            </div>  
                        </form>      
                    </div>  
            </div>                        
        </div>
    </div>
</section>

@endsection


@section('custom_js')
<script>
    $('#createUserForm').submit(function(event){
        event.preventDefault();

        $("button[type='submit']").prop('disabled',true)

        $.ajax({
            url:'{{route("admin.user.store")}}',
            type:'post',
            data:$(this).serializeArray(),
            dataType:'json',
            success:function(response){

                $("button[type='submit']").prop('disabled',false)

                var errors = response.errors;

                if(!response.status){

                    if(errors.name){
                        $("#name").siblings('p').addClass('invalid-feedback').html(errors.name);
                        $("#name").addClass('is-invalid');
                    } else {
                        $("#name").siblings('p').removeClass('invalid-feedback').html('');
                        $("#name").removeClass('is-invalid');
                    }

                    if(errors.email){
                        $("#email").siblings('p').addClass('invalid-feedback').html(errors.email);
                        $("#email").addClass('is-invalid');
                    } else {
                        $("#email").siblings('p').removeClass('invalid-feedback').html('');
                        $("#email").removeClass('is-invalid');
                    }

                    if(errors.password){
                        $("#password").siblings('p').addClass('invalid-feedback').html(errors.password);
                        $("#password").addClass('is-invalid');
                    } else {
                        $("#password").siblings('p').removeClass('invalid-feedback').html('');
                        $("#password").removeClass('is-invalid');
                    }


                }else{

                    $("#name").siblings('p').removeClass('invalid-feedback').html('');
                    $("#name").removeClass('is-invalid');

                    $("#email").siblings('p').removeClass('invalid-feedback').html('');
                    $("#email").removeClass('is-invalid');

                    $("#password").siblings('p').removeClass('invalid-feedback').html('');
                    $("#password").removeClass('is-invalid');

                    window.location.href="{{route('admin.users')}}"
                }
            }
        })
    })
</script>
@endsection