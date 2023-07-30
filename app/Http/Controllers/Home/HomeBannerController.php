<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\HomeBanner;
use Image;


class HomeBannerController extends Controller
{
    public function homeBanner()
    {
    $homebanner = HomeBanner::find(1);
    return view('admin.homeBanner.home_banner_all',compact('homebanner'));
    }// end function

    public function UpdateBanner(Request $request){
        $banner_id = $request->id;
        if ($request->file('banner_image')){
            $image = $request->file('banner_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();// 165465.jpg create image name unique before ext
            Image::make($image)->resize(636,852)->save('upload/banner_images/'.$name_gen);
            $save_url = 'upload/banner_images/'.$name_gen;

            HomeBanner::where('id',$banner_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'banner_image' => $save_url,

            ]);
            $notification = array(
                'message' => 'Home area Update with image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else{
            HomeBanner::where('id',$banner_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,

            ]);
            $notification = array(
                'message' => 'Home area Update without image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }
}
