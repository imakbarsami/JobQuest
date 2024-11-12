@extends('front.layout.app')

@section('title')
| Forget Password
@endsection
@section('main')

@section('main')

<section class="section-5">
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Forget Password</h1>
                    @include('front.layout.message')
                    <form action="{{route('forget-password-process')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="mb-2">Email<span class="text-danger">*</span></label>
                            <input type="email" value="{{old('email')}}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                            @error('email')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div> 
                     
                        <div class="justify-content-between d-flex">
                            <button class="btn btn-primary mt-2 w-100">Submit</button>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="mb-0">Don't have an account? <a href="{{ route('account.register') }}" class="text-decoration-none">Register</a></p>
                            <p class="mb-0">Remember your password? <a href="{{ route('account.login') }}" class="text-decoration-none">Login</a></p>
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

</script>
@endsection
