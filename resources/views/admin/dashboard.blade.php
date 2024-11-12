@extends('front.layout.app')

@section('title')
| Dashboard
@endsection
@section('main')

@section('main')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <div class="row mb-5 text-center">
            <div class="col">
                <div class="card p-4 shadow-lg border-0">
                    <div class="card-body">
                        <h2 class="fw-bold" style="position: relative;">Welcome to JobQuest</h2>
                        <p class="lead text-muted">
                            JobQuest is your go-to platform for discovering exciting job opportunities, connecting with employers, and managing job applications. Our mission is to simplify the job search process and help you find your dream job with ease.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Statistics Section -->
        <div class="row">
            <div class="col-lg-3">
                @include('admin.layout.slider')
            </div>
            <div class="col-lg-9">
                <div class="row text-center">

                    <div class="col-md-4 mb-4">
                        <div class="p-4 rounded-3 shadow-lg text-dark" style="background: linear-gradient(135deg, #FFB75E, #ED8F03);">
                            <h3 class="mb-2">Admins</h3>
                            <p class="display-5 fw-bold">{{$admins}}</p>
                        </div>
                    </div>

                     <!-- Total Users Box -->
                     <div class="col-md-4 mb-4">
                        <div class="p-4 rounded-3 shadow-lg text-white" style="background: linear-gradient(135deg, #1E3C72, #2A5298);">
                            <h3 class="mb-2">Users</h3>
                            <p class="display-5 fw-bold">{{$users}}</p>
                        </div>
                    </div>

                    <!-- Total Jobs Box -->
                    <div class="col-md-4 mb-4">
                        <div class="p-4 rounded-3 shadow-lg text-white" style="background: linear-gradient(135deg, #1D976C, #93F9B9);">
                            <h3 class="mb-2">Jobs</h3>
                            <p class="display-5 fw-bold">{{$jobs}}</p>
                        </div>
                    </div>
                   
                    <!-- Active Jobs Box -->
                    <div class="col-md-4 mb-4">
                        <div class="p-4 rounded-3 shadow-lg text-white" style="background: linear-gradient(135deg, #11998e, #38ef7d);">
                            <h3 class="mb-2">Active Jobs</h3>
                            <p class="display-5 fw-bold">{{$active_jobs}}</p>
                        </div>
                    </div>
                    <!-- Inactive Jobs Box -->
                    <div class="col-md-4 mb-4">
                        <div class="p-4 rounded-3 shadow-lg text-white" style="background: linear-gradient(135deg, #ff512f, #dd2476);">
                            <h3 class="mb-2">Inactive Jobs</h3>
                            <p class="display-5 fw-bold">{{$inactive_jobs}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="p-4 rounded-3 shadow-lg text-white" style="background: linear-gradient(135deg, #9C27B0, #AB47BC);">
                            <h3 class="mb-2">Applications</h3>
                            <p class="display-5 fw-bold">{{$applications}}</p>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</section>

@endsection

@section('custom_js')
<!-- Custom JS can be added here if needed -->
@endsection
