@extends('admin.admin_master')

@section('content')

    <form method="post" action="{{ route('update_about') }}" enctype="multipart/form-data">
        @csrf
 <input type='hidden' name='aboutId' value='{{ $aboutData->id }}'>


        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input name="title" class="form-control" type="text" value="{{ $aboutData->title  }}"  id="example-text-input">
            </div>
        </div>
        <!-- end row -->

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
            <div class="col-sm-10">
                <input name="short_title" class="form-control" type="text" value="{{ $aboutData->short_title  }}"  id="example-text-input">
            </div>
        </div>
        <!-- end row -->


        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
            <div class="col-sm-10">
            <textarea required="" name="short_desc" class="form-control" rows="5">
             {{ $aboutData->short_desc }}
            </textarea>
            </div>
        </div>
        <!-- end row -->
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
            <div class="col-sm-10">
            <textarea required="" name="long_desc" class="form-control" rows="5" id="elm1">
             {{ $aboutData->long_desc }}
            </textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">About Image </label>
            <div class="col-sm-10">
                <input name="about_image" class="form-control" type="file"  id="image">
            </div>
        </div>
        <!-- end row -->

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
            <div class="col-sm-10">
                <img id="show" class="rounded avatar-lg" src="{{url('upload/noimg.png') }}" height="80" width="80">
            </div>
        </div>
        <!-- end row -->


    <script type="text/javascript">

        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#show').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


        <!-- end row -->
        <!-- <input type="submit" class="btn btn-info waves-effect waves-light" value="Update about"> -->
        <button type='submit' class="btn btn-info waves-effect waves-light" value="Update about"> Update </button>
    </form>




@endsection
