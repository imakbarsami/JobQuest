@extends('front.layout.app')


@section('title')
| Edit Job
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
                            <li class="breadcrumb-item"><a href="{{route('admin.jobs')}}">Jobs</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('admin.layout.slider')
            </div>

            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 ">
                    <div class="card-body card-form p-4">
                        <h3 class="fs-4 mb-1">Edit Job Details</h3>
                        @include('front.layout.message')
                        <form action="" name="updateJobAddForm" id="updateJobAddForm">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Title<span class="req">*</span></label>
                                <input type="text" value="{{$job->title}}" placeholder="Job Title" id="title" name="title" class="form-control">
                                <p></p>
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Category<span class="req">*</span></label>
                                <select name="category_id" id="category" class="form-select">
                                    <option value="">Select a Category</option>
                                    @if ($categories->isNotEmpty())
                                    @foreach ($categories as $category )
                                    <option {{$job->category_id==$category->id?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                @endif
                                </select>
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Job Type<span class="req">*</span></label>
                                <select class="form-select" name="job_type_id" id="job_type">
                                    <option value="">Select a Job Type</option>
                                        @if ($job_types->isNotEmpty())
                                        @foreach ($job_types as $job_type )
                                        <option {{$job->job_type_id==$job_type->id?'selected':''}} value="{{$job_type->id}}">{{$job_type->name}}</option>
                                        @endforeach
                                @endif
                                </select>
                                <p></p>
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                <input type="number" min="1" value="{{$job->vacancy}}" placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                                <p></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Salary</label>
                                <input type="text" value="{{$job->salary}}" placeholder="Salary" id="salary" name="salary" class="form-control">
                                <p></p>
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location<span class="req">*</span></label>
                                <input type="text" value="{{$job->location}}" placeholder="location" id="location" name="location" class="form-control">
                                <p></p>
                            </div>


                            <div class="col-md-6 mb-4">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option {{ $job->status == '1' ? 'selected' : '' }} value="1">Yes</option>
                                    <option {{ $job->status == '0' ? 'selected' : '' }} value="0">No</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="featured" class="form-label">Is Featured</label>
                                <select name="is_featured" id="featured" class="form-select">
                                    <option {{ $job->is_featured == '1' ? 'selected' : '' }} value="1">Yes</option>
                                    <option {{ $job->is_featured == '0' ? 'selected' : '' }} value="0">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Description<span class="req">*</span></label>
                            <textarea class="textarea" name="description" id="description" cols="5" rows="5" placeholder="Description">{{$job->description}}</textarea>
                            <p></p>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Benefits</label>
                            <textarea class="textarea" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits">{{$job->benefits}}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Responsibility</label>
                            <textarea class="textarea" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility">{{$job->responsibility}}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Qualifications</label>
                            <textarea class="textarea" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications">{{$job->qualifications}}</textarea>
                        </div>
    
                        <div class="col-md-12  mb-4">
                            <label for="" class="mb-2">Experience<span class="req">*</span></label>
                            <select name="experience" id="experience" class="form-select">
                                <option disabled selected>Select Experience</option>
                                <option {{$job->experience=='1'?'selected':''}} value="1">1 Year</option>
                                <option {{$job->experience=='2'?'selected':''}} value="2">2 Years</option>
                                <option {{$job->experience=='3'?'selected':''}} value="3">3 Years</option>
                                <option {{$job->experience=='4'?'selected':''}} value="4">4 Years</option>
                                <option {{$job->experience=='5'?'selected':''}} value="5">5 Years</option>
                                <option {{$job->experience=='5plus'?'selected':''}} value="5plus">5 Years+</option>
                            </select>
                            <p></p>
                        </div>
                        

                        <div class="mb-4">
                            <label for="" class="mb-2">Keywords<span class="req">*</span></label>
                            <input type="text" value="{{$job->keywords}}" placeholder="Keywords" id="keywords" name="keywords" class="form-control">
                        </div>

                        <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Name<span class="req">*</span></label>
                                <input type="text" value="{{$job->company_name}}" placeholder="Company Name" id="company_name" name="company_name" class="form-control">
                                <p></p>
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location</label>
                                <input type="text" value="{{$job->company_location}}" placeholder="Location" id="company_location" name="company_location" class="form-control">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Website</label>
                            <input type="text" value="{{$job->company_website}}" placeholder="Website" id="website" name="company_website" class="form-control">
                        </div>
                    </div>

                    <div class="card-footer  p-4">
                        <button type="submit" class="btn btn-primary">Update Job</button>
                    </div>    
                </form>
            </div>
       
                                    
        </div>
    </div>
</section>

@endsection


@section('custom_js')
<script>
    $("#updateJobAddForm").submit(function(event){
    event.preventDefault();

    $("button[type='submit']").prop('disabled',true)

    $.ajax({
        url: '{{ route("admin.job.update",$job->id) }}',
        type: 'post',
        data: $(this).serializeArray(),
        dataType: 'json',
        success: function(response){

            $("button[type='submit']").prop('disabled',false)

            if(response.status == false){
                var errors = response.errors;

                if(errors.title){
                    $("#title").siblings('p').addClass('invalid-feedback').html(errors.title);
                    $("#title").addClass('is-invalid');
                } else {
                    $("#title").siblings('p').removeClass('invalid-feedback').html('');
                    $("#title").removeClass('is-invalid');
                }

                if(errors.vacancy){
                    $("#vacancy").siblings('p').addClass('invalid-feedback').html(errors.vacancy);
                    $("#vacancy").addClass('is-invalid');
                } else {
                    $("#vacancy").siblings('p').removeClass('invalid-feedback').html('');
                    $("#vacancy").removeClass('is-invalid');
                }
                if(errors.location){
                    $("#location").siblings('p').addClass('invalid-feedback').html(errors.location);
                    $("#location").addClass('is-invalid');
                } else {
                    $("#location").siblings('p').removeClass('invalid-feedback').html('');
                    $("#location").removeClass('is-invalid');
                }
                if(errors.experience){
                    $("#experience").siblings('p').addClass('invalid-feedback').html(errors.experience);
                    $("#experience").addClass('is-invalid');
                } else {
                    $("#experience").siblings('p').removeClass('invalid-feedback').html('');
                    $("#experience").removeClass('is-invalid');
                }
                if(errors.company_name){
                    $("#company_name").siblings('p').addClass('invalid-feedback').html(errors.company_name);
                    $("#company_name").addClass('is-invalid');
                } else {
                    $("#company_name").siblings('p').removeClass('invalid-feedback').html('');
                    $("#company_name").removeClass('is-invalid');
                }
                if(errors.category_id){
                    $("#category").siblings('p').addClass('invalid-feedback').html(errors.category_id);
                    $("#category").addClass('is-invalid');
                } else {
                    $("#category").siblings('p').removeClass('invalid-feedback').html('');
                    $("#category").removeClass('is-invalid');
                }
                if(errors.job_type_id){
                    $("#job_type").siblings('p').addClass('invalid-feedback').html(errors.job_type_id);
                    $("#job_type").addClass('is-invalid');
                } else {
                    $("#job_type").siblings('p').removeClass('invalid-feedback').html('');
                    $("#job_type").removeClass('is-invalid');
                }
                if(errors.salary){
                    $("#salary").siblings('p').addClass('invalid-feedback').html(errors.salary);
                    $("#salary").addClass('is-invalid');
                } else {
                    $("#salary").siblings('p').removeClass('invalid-feedback').html('');
                    $("#salary").removeClass('is-invalid');
                }
                if(errors.description){
                    $("#description").siblings('p').addClass('invalid-feedback').html(errors.description);
                    $("#description").addClass('is-invalid');
                } else {
                    $("#description").siblings('p').removeClass('invalid-feedback').html('');
                    $("#description").removeClass('is-invalid');
                }
            }else{
                $("#title").siblings('p').removeClass('invalid-feedback').html('');
                $("#title").removeClass('is-invalid');

                $("#vacancy").siblings('p').removeClass('invalid-feedback').html('');
                $("#vacancy").removeClass('is-invalid');

                $("#location").siblings('p').removeClass('invalid-feedback').html('');
                $("#location").removeClass('is-invalid');


                $("#experience").siblings('p').removeClass('invalid-feedback').html('');
                $("#experience").removeClass('is-invalid');

                $("#company_name").siblings('p').removeClass('invalid-feedback').html('');
                $("#company_name").removeClass('is-invalid');

                $("#job_type").siblings('p').removeClass('invalid-feedback').html('');
                $("#job_type").removeClass('is-invalid');

                $("#category").siblings('p').removeClass('invalid-feedback').html('');
                $("#category").removeClass('is-invalid');

                $("#salary").siblings('p').removeClass('invalid-feedback').html('');
                $("#salary").removeClass('is-invalid');

                $("#description").siblings('p').removeClass('invalid-feedback').html('');
                $("#description").removeClass('is-invalid');

                console.log(response.success);
                window.location.href = '{{ route("admin.jobs") }}'
            }
        },
        error: function(jQXHR, exception){
            console.log('something went wrong');
        }
    });
});
</script>
@endsection