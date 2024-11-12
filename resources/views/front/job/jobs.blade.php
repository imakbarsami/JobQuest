@extends('front.layout.app')

@section('title')
| Jobs
@endsection
@section('main')


@section('main')
<section class="section-3 py-5 bg-2 ">
    <div class="container">     
        <div class="row">
            <div class="col-6 col-md-10 ">
                <h2>Find Jobs</h2>  
            </div>
            <div class="col-6 col-md-2">
                <div class="align-end">
                    <select name="sort" id="sort" class="form-control">
                        <option {{Request::get('sort')=='latest'?'selected':''}} value="latest">Latest</option>
                        <option {{Request::get('sort')=='oldest'?'selected':''}} value="oldest">Oldest</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-md-4 col-lg-3 sidebar mb-4">
                <form action="" name="searchForm" id="searchForm">
                <div class="card border-0 shadow p-4">
                    <div class="mb-4 mt-3">
                        <h2>Keywords</h2>
                        <input type="text" value="{{Request::get('keyword')}}" name="keyword" id="keyword" placeholder="Keywords" class="form-control">
                    </div>

                    <div class="mb-4">
                        <h2>Location</h2>
                        <input type="text" value="{{Request::get('location')}}" name="location" id="location" placeholder="Location" class="form-control">
                    </div>

                    <div class="mb-4">
                        <h2>Category</h2>
                        <select name="category" id="category" class="form-control">
                            <option value="">Select a Category</option>
                            @if ($categories->isNotEmpty())
                                @foreach ($categories as $category)
                                 <option {{Request::get('category')==$category->id?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                @else
                                <p class="text-center font-weight-bold text-danger">No Record</p>
                            @endif
                            
                            
                        </select>
                    </div>                   

                    <div class="mb-4">
                        <h2>Job Type</h2>
                            @if ($job_types->isNotEmpty())
                            @foreach ($job_types as $job_type)
                                <div class="form-check mb-2"> 
                                    <input class="form-check-input" {{in_array($job_type->id,$job_type_array)?'checked':''}} name="job_type[]" type="checkbox" value="{{ $job_type->id }}" id="job-type-{{ $job_type->id }}">    
                                    <label class="form-check-label" for="job-type-{{ $job_type->id }}">{{ $job_type->name }}</label>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center font-weight-bold text-danger">No Record</p>
                        @endif 

                    </div>

                    <div class="mb-4">
                        <h2>Experience</h2>
                        <select name="experience" id="experience" class="form-control">
                            <option value="">Select Experience</option>
                            <option value="1" {{Request::get('experience')== '1' ? 'selected' : ''}}>1 Year</option>
                            <option value="2" {{Request::get('experience')== '2' ? 'selected' : ''}}>2 Years</option>
                            <option value="3" {{Request::get('experience')== '3' ? 'selected' : ''}}>3 Years</option>
                            <option value="4" {{Request::get('experience')== '4' ? 'selected' : ''}}>4 Years</option>
                            <option value="5" {{Request::get('experience')== '5' ? 'selected' : ''}}>5 Years</option>
                            <option value="5plus" {{Request::get('experience')== '5plus' ? 'selected' : ''}}>5 Years+</option>
                        </select>
                    </div>      
                    <button type="submit" class="btn btn-primary btn-block">Search</button>        
                    <a href="{{route('jobs')}}" class="btn btn-secondary mt-3">Reset Search</a>      
                </div>
            </form>
            </div>
            <div class="col-md-8 col-lg-9 ">
                <div class="job_listing_area">                    
                    <div class="job_lists">
                    <div class="row">
                        @if ($jobs->isNotEmpty())
                            @foreach ($jobs as $job )
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">{{$job->title}}</h3>
                                            <p>{{Str::words(strip_tags($job->description),12)}}</p>
                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">{{$job->company_location}}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">{{$job->job_type->name}}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                    <span class="ps-1">{{$job->salary}} </span>
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
                    <div>
                        {{$jobs->links()}}
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
    $("#searchForm").submit(function(event){
        event.preventDefault();

        var url="{{route('jobs')}}?"

        var keyword=$("#keyword").val();
        var location=$("#location").val();
        var category=$("#category").val();
        var experience=$("#experience").val();
        var job_type = $('input[name="job_type[]"]:checked').map(function() {
                return $(this).val();
        }).get();

        var sort=$("#sort").val();

        if(!keyword==''){
            url+='&keyword='+keyword
        }

        if(!location==''){
            url+='&location='+location
        }

        if(!category==''){
            url+='&category='+category
        }

        if(!experience==''){
            url+='&experience='+experience
        }

        if(job_type.length>0){
            url+='&job_type='+job_type
        }

        url+='&sort='+sort

        window.location.href=url;
    })

    $("#sort").change(function(){
        $("#searchForm").submit();
    })
</script>

@endsection