@extends('admin.admin_master')

@section('content')
<form method="post" action="{{ route('store.portfolio') }}" enctype="multipart/form-data">
    @csrf
{{-- <input type='hidden' name='aboutId' value='{{ $aboutData->id }}'> --}}


    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
        <div class="col-sm-10">
            <input name="portfolio_name" class="form-control" type="text" value=""  id="example-text-input">
        </div>
        @error('portfolio_name')
        <span class="text-danger">{{ $message }}</span>
        @enderror

    </div>
    <!-- end row -->

    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
        <div class="col-sm-10">
            <input name="portfolio_title" class="form-control" type="text" value=""  id="example-text-input">
        </div>
        @error('portfolio_title')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- end row -->

    <!-- end row -->
    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
        <div class="col-sm-10">
        <textarea required="" name="portfolio_desc" class="form-control" rows="5" id="elm1">
        </textarea>
        </div>
    </div>

    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">About Image </label>
        <div class="col-sm-10">
            <input name="portfolio_image" class="form-control" type="file"  id="image">
        </div>
        @error('portfolio_image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- end row -->

    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
        <div class="col-sm-10">
            <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/noimg.png') }}" height="80" width="80">
        </div>
    </div>
    <!-- end row -->


<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


    <!-- end row -->
    <!-- <input type="submit" class="btn btn-info waves-effect waves-light" value="Update about"> -->
    <button type='submit' class="btn btn-info waves-effect waves-light" value="Insert Portfolio"> Insert</button>
</form>

@endsection
