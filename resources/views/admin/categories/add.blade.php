@extends('front.layout.app')

@section('title')
| Add Category
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
                            <li class="breadcrumb-item"><a href="{{route('admin.categories')}}">Category</a></li>
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
                        <h3 class="fs-4 mb-1">Add Category</h3>
                        @include('front.layout.message')
                        <form action="" name="addCategoryForm" id="addCategoryForm">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Name<span class="req">*</span></label>
                                <input type="text"  placeholder="Name" id="name" name="name" class="form-control">
                                <p></p>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="featured" class="form-label">Featured</label>
                                <select name="is_featured" id="featured" class="form-select">
                                    <option  value="1">Yes</option>
                                    <option selected value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer  p-4">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>    
                </form>
            </div>
       
                                    
        </div>
    </div>
</section>

@endsection


@section('custom_js')
<script>
    $("#addCategoryForm").submit(function(event){
    event.preventDefault();

    $("button[type='submit']").prop('disabled',true)

    $.ajax({
        url: '{{route("admin.categories.store")}}',
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
                window.location.href = '{{ route("admin.categories") }}'
            }
        },
        error: function(jQXHR, exception){
            console.log('something went wrong');
        }
    });
});
</script>
@endsection