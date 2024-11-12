@extends('front.layout.app')

@section('main')
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Register</h1>
                    <form action="" name="registationForm" id="registationForm" method="POST">
                        <div class="mb-3">
                            <label for="" class="mb-2">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                            <p></p>
                        </div> 
                        <button class="btn btn-primary mt-2">Register</button>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Have an account? <a  href="{{route('account.login')}}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('title')
| Register
@endsection
@section('main')

@section('custom_js')

<script>
$("#registationForm").submit(function(event){
    event.preventDefault();

    $("button[type='submit']").prop('disabled',true)

    $.ajax({
        url: '{{ route("account.register_process") }}',
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
            }else{
                $("#name").siblings('p').removeClass('invalid-feedback').html('');
                $("#name").removeClass('is-invalid');

                $("#email").siblings('p').removeClass('invalid-feedback').html('');
                $("#email").removeClass('is-invalid');

                $("#password").siblings('p').removeClass('invalid-feedback').html('');
                $("#password").removeClass('is-invalid');

                $("#confirm_password").siblings('p').removeClass('invalid-feedback').html('');
                $("#confirm_password").removeClass('is-invalid');
                
                window.location.href="{{route('account.login')}}"
            }
        },
        error: function(jQXHR, exception){
            console.log('something went wrong');
        }
    });
});

</script>
@endsection