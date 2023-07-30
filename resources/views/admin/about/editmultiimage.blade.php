@extends('admin.admin_master')

@section('content')

<form method="post" action="{{ route('update_multiimage') }}" enctype="multipart/form-data">
        @csrf

    <input type="hidden" name="Updateid" value="{{ $editmultiImage->id }}">



        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Update multi Image </label>
            <div class="col-sm-10">
                <input name="multi_img" class="form-control" type="file"  id="image" multiple="">
            </div>
        </div>
        <!-- end row -->

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
            <div class="col-sm-10">
                <img id="showImage" class="rounded avatar-lg" src="{{ asset($editmultiImage->multi_img)}}" height="80" width="80">
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
        <button type='submit' class="btn btn-info waves-effect waves-light"> Update </button>
    </form>




@endsection
