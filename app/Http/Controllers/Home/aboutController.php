<?php

namespace App\Http\Controllers\Home;


use App\Models\about;
use App\Models\multiImage;
use Illuminate\Http\Request;
use Illuminate\support\carbon;
use App\Http\Controllers\Controller;
use Image;

class aboutController extends Controller
{
    public function about()
    {
        $aboutData = about::find(1);
        return view('admin.about.about_all',compact('aboutData'));
    }// end function

    public function UpdateAbout(Request $request){


        $about_id = $request->aboutId;
        if ($request->about_image){
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();// 165465.jpg create image name unique before ext
            Image::make($image)->resize(523,605)->save('upload/about_images/'.$name_gen);
            $save_url = 'upload/about_images/'.$name_gen;

        about::where('id',$request->aboutId)->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'about_image' => $save_url
     ]);
            $notification = array(
                'message' => 'Home area Update with image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
        else{
            about::where('id',$request->aboutId)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,


            ]);
            $notification = array(
                'message' => 'Home area Update without image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }

    }
    //end function

    // start about multi image function

    public function AboutMultiImage(){

        return view('admin.about.multiImage');
    }
    public function submitMultiImage (Request $request){

        $image = $request->file('multi_img');

        foreach($image as $multi_img){

            $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();// 165465.jpg create image name unique before ext
            Image::make($multi_img)->resize(100,100)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen;

        multiImage::insert([

            'multi_img' => $save_url,
            'created_at' => carbon::now()
     ]);
            $notification = array(
                'message' => 'Multi images Upload Successfully',
                'alert-type' => 'success'
            );


        }
        return redirect()->back()->with($notification);
    }//end funtion

    //all multi photos

    public function allMultiImage(){

        $allimage = multiImage::all();

        return view('admin.about.allmultiimage',compact('allimage'));
    }//end function

    public function editMultiImage($id){
        $editmultiImage = multiImage::findOrFail($id);

        return view('admin.about.editmultiimage',compact('editmultiImage'));

    }//end function

    public function updateMultiImage(Request $request){
        $updateImageId = $request->id;

        if ($request->Updateid){
            $image = $request->file('multi_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();// 165465.jpg create image name unique before ext
            Image::make($image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen;

            multiImage::where('id',$request->Updateid)->update([
            'multi_img' => $save_url,
        ]);
            $notification = array(
                'message' => 'Home area Update with image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }


    }//end function

    public function deleteMultiImage($id){

        $multi = multiImage::findOrFail($id);
        $img = $multi->multi_img;
        unlink($img);
        multiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'image deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);

    }

}


