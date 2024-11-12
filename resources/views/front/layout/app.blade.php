<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Jobquest @yield('title')</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css" 
	integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg==" 
	crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" />
	<!-- Add this in your <head> section to load FontAwesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{asset('assets/images/icon.png')}}" type="image/x-icon">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#" />
</head>
<body data-instant-intensity="mousedown">
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
		<div class="container">
			<a class="navbar-brand" href="{{route('home')}}">JobQuest</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
					</li>	
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{route('jobs')}}">Find Jobs</a>
					</li>										
				</ul>		
				@if (Auth::check())
					@if (Auth::user()->role == 'admin')
					<a class="btn btn-outline-primary me-2" href="{{route('admin.dashboard')}}" type="submit">Admin</a>
					@endif

					<a class="btn btn-outline-primary me-2" href="{{route('account.profile')}}" type="submit">My Account</a>
				@else
				<a class="btn btn-outline-primary me-2" href="{{route('account.login')}}" type="submit">Login</a>
				@endif		
				<a class="btn btn-primary" href="{{route('account.add_job')}}" type="submit">Post a Job</a>
			</div>
		</div>
	</nav>
</header>

@yield('main')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form name="profilePicForm" id="profilePicForm" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="image"  name="image">
				<p class="text-danger" id="image-error"></p>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mx-3">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            
        </form>
      </div>
    </div>
  </div>
</div>

<footer class="bg-dark py-5 bg-2">
    <div class="container">
        <!-- Footer Top Section -->
        <div class="row text-white mb-4">
            <div class="col-md-4">
                <h4 class="fw-bold">JobQuest</h4>
                <p class="small">
                    JobQuest is the leading platform for job seekers and employers to connect, discover new opportunities, and manage job applications. We are committed to simplifying the job search process and helping you find your dream job.
                </p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li><a href="{{ route('jobs') }}" class="text-white">Jobs</a></li>
                    <li><a href="#" class="text-white">About Us</a></li>
                    <li><a href="#" class="text-white">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold">Contact Us</h5>
                <p class="small">
                    <strong>Email:</strong> info.jobquest@gmail.com<br>
                    <strong>Phone:</strong> +880 0123456789<br>
                    <strong>Address:</strong> 23 Main Street, San Jose, CA 95112, USA
                </p>
                <div>
                    <a href="#" class="text-white me-3">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white me-3">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Section -->
        <div class="row text-center text-white">
            <div class="col">
                <p class="fs-6 fw-bold">© @php echo date('Y') @endphp JobQuest, All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

<!-- Add this script to load Font Awesome icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.5.1.3.min.js')}}"></script>
<script src="{{asset('assets/js/instantpages.5.1.0.min.js')}}"></script>
<script src="{{asset('assets/js/lazyload.17.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"
 integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg=="
 crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">

    $('.textarea').trumbowyg();

	$.ajaxSetup({
		headers:{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$("#profilePicForm").submit(function(event){
    event.preventDefault();

	var formData=new FormData(this)

    $.ajax({
        url: '{{ route("account.profile_pic_update") }}',
        type: 'post',
        data: formData,
        dataType: 'json',
		contentType: false,
    	processData: false,
        success: function(response){

            if(response.status == false){
                var errors = response.errors;

                if(errors.image){
                    $('#image-error').html(errors.image)
				}
            }else{
				$('#image-error').html('')
				window.location.href='{{url()->current()}}';
			}
        },
        error: function(jQXHR, exception){
            console.log('something went wrong');
        }
    });
});

</script>

@yield('custom_js')
</body>
</html>