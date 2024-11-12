@extends('front.layout.app')

@section('title')
| Profile
@endsection
@section('main')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.layout.slidebar')
            </div>
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body  p-4">
                        <h3 class="fs-4 mb-1">My Profile</h3>
                        @include('front.layout.message')
                        <form action="" name="profileForm" id="profileForm">
                        <div class="mb-4">
                            <label for="" class="mb-2">Name<span class="text-danger">*</span></label>
                            <input type="text" value="{{$user->name}}" id="name" name="name" placeholder="Name" class="form-control" value="">
                            <p></p>
                            
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Email<span class="text-danger">*</span></label>
                            <input type="email" value="{{$user->email}}" id="email" name="email" placeholder="Email" class="form-control">
                            <p></p>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Designation<span class="text-danger">*</span></label>
                            <input type="text" placeholder="Designation" id="designation" name="designation" value="{{$user->designation}}" class="form-control">
                            
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Mobile<span class="text-danger">*</span></label>
                            <input type="text" name="mobile" id="mobile" value="{{$user->mobile}}" placeholder="Mobile" class="form-control">
                            <p></p>
                        </div>                        
                    </div>
                    <div class="card-footer  p-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>

                <div class="card border-0 shadow mb-4">
                    <form action="" name="changePasswordForm" id="changePasswordForm">
                    <div class="card-body p-4">
                        <h3 class="fs-4 mb-1">Change Password</h3>
                        <div class="mb-4">
                            <label for="" class="mb-2">Old Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" placeholder="Old Password" class="form-control">
                            <p></p>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">New Password<span class="text-danger">*</span></label>
                            <input type="password" name="new_password" id="new_password" placeholder="New Password" class="form-control">
                            <p></p>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control">
                            <p></p>
                        </div>                        
                    </div>
                    <div class="card-footer  p-4">
                        <button type="submit" class="btn btn-primary">Update</button>
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
    $("#profileForm").submit(function(event){
    event.preventDefault();

    $("button[type='submit']").prop('disabled',true)

    $.ajax({
        url: '{{ route("account.profile_update") }}',
        type: 'post',
        data: $(this).serializeArray(),
        dataType: 'json',
        success: function(response){

            $("button[type='submit']").prop('disabled',false)

            if(response.status == false){
                var errors = response.errors;

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

                if(errors.mobile){
                    $("#mobile").siblings('p').addClass('invalid-feedback').html(errors.mobile);
                    $("#mobile").addClass('is-invalid');
                } else {
                    $("#mobile").siblings('p').removeClass('invalid-feedback').html('');
                    $("#mobile").removeClass('is-invalid');
                }
            }else{
                $("#name").siblings('p').removeClass('invalid-feedback').html('');
                $("#name").removeClass('is-invalid');

                $("#email").siblings('p').removeClass('invalid-feedback').html('');
                $("#email").removeClass('is-invalid');

                $("#mobile").siblings('p').removeClass('invalid-feedback').html('');
                $("#mobile").removeClass('is-invalid');

                window.location.href = '{{ route("account.profile") }}';
            }
        },
        error: function(jQXHR, exception){
            console.log('something went wrong');
        }
    });
});

$("#changePasswordForm").submit(function(event){
    event.preventDefault();

    $("button[type='submit']").prop('disabled',true)

    $.ajax({
        url: '{{ route("account.change_password") }}',
        type: 'post',
        data: $(this).serializeArray(),
        dataType: 'json',
        success: function(response){

            $("button[type='submit']").prop('disabled',false)

            if(response.status == false){
                var errors = response.errors;

                if(errors.password){
                    $("#password").siblings('p').addClass('invalid-feedback').html(errors.password);
                    $("#password").addClass('is-invalid');
                } else {
                    $("#password").siblings('p').removeClass('invalid-feedback').html('');
                    $("#password").removeClass('is-invalid');
                }

                if(errors.new_password){
                    $("#new_password").siblings('p').addClass('invalid-feedback').html(errors.new_password);
                    $("#new_password").addClass('is-invalid');
                } else {
                    $("#new_password").siblings('p').removeClass('invalid-feedback').html('');
                    $("#new_password").removeClass('is-invalid');
                }
                if(errors.confirm_password){
                    $("#confirm_password").siblings('p').addClass('invalid-feedback').html(errors.confirm_password);
                    $("#confirm_password").addClass('is-invalid');
                } else {
                    $("#confirm_password").siblings('p').removeClass('invalid-feedback').html('');
                    $("#confirm_password").removeClass('is-invalid');
                }
            }else{
                $("#password").siblings('p').removeClass('invalid-feedback').html('');
                $("#password").removeClass('is-invalid');

                $("#new_password").siblings('p').addClass('invalid-feedback').html();
                $("#new_password").addClass('is-invalid');

                $("#confirm_password").siblings('p').removeClass('invalid-feedback').html('');
                $("#confirm_password").removeClass('is-invalid');

               window.location.href = "{{route('account.profile')}}";
            }
        },
        error: function(jQXHR, exception){
            console.log('something went wrong');
        }
    });
});
</script>
@endsection