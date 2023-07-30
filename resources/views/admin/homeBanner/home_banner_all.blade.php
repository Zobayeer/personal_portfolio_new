@extends('admin.admin_master')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <form method="post" action="{{ route('update.banner') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $homebanner->id }}">

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input name="title" class="form-control" type="text" value="{{ $homebanner->title  }}"  id="example-text-input">
            </div>
        </div>
        <!-- end row -->

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
            <div class="col-sm-10">
                <input name="short_title" class="form-control" type="text" value="{{ $homebanner->short_title  }}"  id="example-text-input">
            </div>
        </div>
        <!-- end row -->


        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Video Url</label>
            <div class="col-sm-10">
                <input name="video_url" class="form-control" type="text" value="{{ $homebanner->video_url }}"  id="example-text-input">
            </div>
        </div>
        <!-- end row -->


        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Banner Image </label>
            <div class="col-sm-10">
                <input name="banner_image" class="form-control" type="file"  id="image">
            </div>
        </div>
        <!-- end row -->

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
         <div class="col-sm-10">
                <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($homebanner->banner_image))? url($homebanner->banner_image):url('upload/noimg.png') }}" height="80" width="80">
            </div> 
        </div>
        <!-- end row -->
        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
    </form>

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
@endsection
