@extends('front.layout.app')

@section('title')
| Edit JobType
@endsection

@section('main')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.job_types')}}">Job Type</a></li>
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
                        <h3 class="fs-4 mb-1">Edit Job Type</h3>
                        @include('front.layout.message')
                        <form action="" name="updatetypeForm" id="updatetypeForm">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Name<span class="req">*</span></label>
                                <input type="text" value="{{$type->name}}" placeholder="Name" id="name" name="name" class="form-control">
                                <p></p>
                            </div>  

                            <div class="col-md-6 mb-4">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option {{ $type->status == '1' ? 'selected' : '' }} value="1">Yes</option>
                                    <option {{ $type->status == '0' ? 'selected' : '' }} value="0">No</option>
                                </select>
                            </div>
                        </div>

                        
                    </div>

                    <div class="card-footer  p-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>    
                </form>
            </div>
       
                                    
        </div>
    </div>
</section>

@endsection


@section('custom_js')
<script>
    $("#updatetypeForm").submit(function(event){
    event.preventDefault();

    $("button[type='submit']").prop('disabled',true)

    $.ajax({
        url: '{{ route("admin.job-types.update",$type->id) }}',
        type: 'post',
        data: $(this).serializeArray(),
        dataType: 'json',
        success: function(response){

            $("button[type='submit']").prop('disabled',false)

            if(!response.status){
                var errors = response.errors;

                if(errors.name){
                    $("#name").siblings('p').addClass('invalid-feedback').html(errors.name);
                    $("#name").addClass('is-invalid');
                } else {
                    $("#name").siblings('p').removeClass('invalid-feedback').html('');
                    $("#name").removeClass('is-invalid');
                }
               
            }else{
                $("#name").siblings('p').removeClass('invalid-feedback').html('');
                $("#name").removeClass('is-invalid');

                console.log(response.success);
                window.location.href = '{{ route("admin.job_types") }}'
            }
        },
        error: function(jQXHR, exception){
            console.log('something went wrong');
        }
    });
});
</script>
@endsection