<?php

namespace App\Http\Controllers\Home;

use App\Models\portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\carbon;
use Illuminate\Support\Str;
use Image;

class portfolioController extends Controller
{
    public function addPortfolio(){
        return view('admin.portfolio.add_portifolio');
    }//end function

    public function storePortfolio(Request $request){

        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_image' => 'required',
        ],[
            'portfolio_name.required' => 'portfolio name is required',
            'portfolio_title.required' => 'portfolio title is required',
            'portfolio_image.required' => 'portfolio image is required',
        ]);

        $image = $request->file('portfolio_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();// 165465.jpg create image name unique before ext
        Image::make($image)->resize(1020,519)->save('upload/portfolio_images/'.$name_gen);
        $save_url = 'upload/portfolio_images/'.$name_gen;

    portfolio::insert([
        'portfolio_name' => $request->portfolio_name,
        'portfolio_title' => $request->portfolio_title,
        'portfolio_desc' => $request->portfolio_desc,
        'portfolio_image' => $save_url,
        'created_at'       => carbon::now(),
 ]);
        $notification = array(
            'message' => 'Portfolio insert Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
      //end function

    public function showPortfolio(Request $request){
        $portfolio = portfolio::latest()->get();
        return view('admin.portfolio.show_all_portfolio',compact('portfolio'));
    }//end fuction


    //edit portfolio function

    public function editPortfolio($id){
        $portfolioId = portfolio::findOrFail($id);
        return view('admin.portfolio.edit_view',compact('portfolioId'));
    }//end function

    public function updatePortfolio(Request $request){
        $UpdateId = $request->id;

        if($request->portfolio_image){

        $image = $request->file('portfolio_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();// 165465.jpg create image name unique before ext
        Image::make($image)->resize(1020,519)->save('upload/portfolio_images/'.$name_gen);
        $save_url = 'upload/portfolio_images/'.$name_gen;

            portfolio::where('id',$request->portId)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_desc' => $request->portfolio_desc,
                'portfolio_image' => $save_url,
            ]);
            $notification = array(
                'message' => 'portfolio Update Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('show.portfolio')->with($notification);
        } else{
            portfolio::where('id',$request->portId)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_desc' => $request->portfolio_desc,


            ]);
            $notification = array(
                'message' => 'update Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('show.portfolio')->with($notification);
        }
    }//end function

    public function deletePortfolio($id){
        $portfolio = portfolio::findOrFail($id);
        $img =  $portfolio->portfolio_image;
        unlink($img);
        portfolio::findOrFail($id)->delete();
        $notification = array(
            'message' => 'delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('show.portfolio')->with($notification);
    }//end function

    //portfolio details
    public function detailsPortfolio($id){
        $portfolioDt = portfolio::findOrFail($id);
        return view('frontend.portfolio.portfolio_details',compact('portfolioDt'));
    }
}
