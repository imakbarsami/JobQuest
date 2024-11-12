@extends('front.layout.app')

@section('title')
| Home
@endsection
@section('main')

<section class="section-0 lazy d-flex bg-image-style dark align-items-center "   class="" data-bg="{{asset('assets/images/banner7.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <h1>Discover your dream job</h1>
                <p>Explore thousands of opportunities today</p>
                <div class="banner-btn mt-5"><a href="{{route('jobs')}}" class="btn btn-primary mb-4 mb-sm-0">Explore Now</a></div>
            </div>
        </div>
    </div>
</section>

<section class="section-1 py-5 "> 
    <div class="container">
        <form action="{{route('jobs')}}" method="get">
        <div class="card border-0 shadow p-5">
            <div class="row">
               
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keywords">
                </div>
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <input type="text"  class="form-control" name="location" id="location" placeholder="Location">
                </div>
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <select name="category" id="category" class="form-select">
                        <option disabled selected>Select a Category</option>
                        @if ($categories->isNotEmpty())
                            @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                
                <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                    </div>
                    
                </div>
               
            </div>            
        </div>
    </form>
    </div>
</section>
<section class="section-2 bg-2 py-5">
    <div class="container">
        <h2>Popular Categories</h2>
        <div class="row pt-5">
            @if ($pcategories->isNotEmpty())
                @foreach ($pcategories as $pcategory )
            
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <a href="{{route('jobs').'?category='.$pcategory->id}}"><h4 class="pb-2">{{$pcategory->name}}</h4></a>
                            <p class="mb-0"> </p>
                        </div>
                    </div> 
                @endforeach
                @else
                <p class="text-center font-weight-bold text-danger">No Record</p>
            @endif
                      
        </div>
    </div>
</section>

<section class="section-3  py-5">
    <div class="container">
        <h2>Featured Jobs</h2>
        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                        @if ($feature_jobs->isNotEmpty())
                            @foreach ($feature_jobs as $feature_job)
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">{{$feature_job->title}}</h3>
                                            <p>{{Str::words(strip_tags($feature_job->description),5)}}</p>
                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">{{$feature_job->location}}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">{{$feature_job->job_type->name}}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                    <span class="ps-1">{{$feature_job->salary}}</span>
                                                </p>
                                            </div>
        
                                            <div class="d-grid mt-3">
                                                <a href="{{route('account.job_details',$feature_job->id)}}" class="btn btn-primary btn-lg">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            @endforeach
                            @else
                            <p class="text-center font-weight-bold text-danger">No Record</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-3 bg-2 py-5">
    <div class="container">
        <h2>Latest Jobs</h2>
        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                        @if ($jobs->isNotEmpty())
                            @foreach ($jobs as $job )
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">{{$job->title}}</h3>
                                            <p>{{Str::words(strip_tags($job->description),5)}}</p>
                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">{{$job->location}}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">{{$job->job_type->name}}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                    <span class="ps-1">{{$job->salary}}</span>
                                                </p>
                                            </div>
        
                                            <div class="d-grid mt-3">
                                                <a href="{{route('account.job_details',$job->id)}}" class="btn btn-primary btn-lg">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @else
                            <p class="text-center font-weight-bold text-danger">No Record</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@section('custom_js')

@endsection