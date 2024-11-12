@extends('front.layout.app')

@section('title')
 | Change Password
@endsection

@section('main')

<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Change Password</h1>
                    <form action="" name="newPasswordForm" id="newPasswordForm">
                        @csrf
                        <input type="hidden" name="token" value="{{$token}}">
                        <div class="mb-3">
                            <label for="" class="mb-2">New Password*</label>
                            <input type="password"  name="password" id="password" class="form-control" placeholder="New Password">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Confirm Password*</label>
                            <input type="password"  name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                            <p></p>
                        </div> 
                     
                        <div class="justify-content-between d-flex">
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>
@endsection


@section('custom_js')
<script>
$("#newPasswordForm").submit(function(event){
    event.preventDefault();
     
    $("button[type='submit']").prop('disabled',true)
    $.ajax({
        url:'{{route("forget-password-updated")}}',
        type:'post',
        data:$(this).serializeArray(),
        dataType:'json',
        success:function(response){

            $("button[type='submit']").prop('disabled',false)
            var errors = response.errors;
            if(response.status){

                $("#password").siblings('p').removeClass('invalid-feedback').html('');
                $("#password").removeClass('is-invalid');

                $("#confirm_password").siblings('p').removeClass('invalid-feedback').html('');
                $("#confirm_password").removeClass('is-invalid');

                window.location.href="{{route('account.login')}}";
            }else{
                if(errors.password){
                    $("#password").siblings('p').addClass('invalid-feedback').html(errors.password);
                    $("#password").addClass('is-invalid');
                } else {
                    $("#password").siblings('p').removeClass('invalid-feedback').html('');
                    $("#password").removeClass('is-invalid');
                }
                if(errors.confirm_password){
                    $("#confirm_password").siblings('p').addClass('invalid-feedback').html(errors.confirm_password);
                    $("#confirm_password").addClass('is-invalid');
                } else {
                    $("#confirm_password").siblings('p').removeClass('invalid-feedback').html('');
                    $("#confirm_password").removeClass('is-invalid');
                }
            }
        }
    })
})
</script>
@endsection