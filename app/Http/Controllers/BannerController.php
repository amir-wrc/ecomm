<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Banner;
use Image;
use Auth;
class BannerController extends Controller
{
    //

    protected function index(){
    	$banner_list = Banner::all();
        return view('admin.banner.list')->with('banner_list', $banner_list);
    }

    protected function add() {
    	return view('admin.banner.add');
    }

    protected function store(Request $request) {
    	Validator::make($request->all(),[
    		'header' => 'required|max:70',
    		'description' => 'required',
    		'status' => 'required',
    		'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    	],[
    		'header.required' => 'Please enter banner title',
    		'header.max:70' => 'Not more than 70 characters',
    		'description.required' => 'Please enter description',
    		'status.required' => 'Please select status',
    		'image.required' => 'Please upload banner image'
    	])->validate();

    	if($request->hasFile('image')) {
            $file = $request->file('image') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            
            $destinationPath_2 = public_path().'/uploads/banner' ;

            $img = Image::make($file->getRealPath());

            
            $img->resize(1350, 350, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName);
        }
        else {
            $fileName = '';
        }

        $banner = new Banner();
        $banner->header = $request->header;
        $banner->description = $request->description;
        $banner->status = $request->status;
        $banner->image = $fileName;

        $banner->save();

        $request->session()->flash("message", "Banner added successfully");
        return redirect("/admin/banner");
    }

    public function edit($id) {
    	$banner_details = Banner::find($id);
    	return view('admin.banner.edit')->with('banner_details', $banner_details);
    }

    public function update(Request $request, $id) {
    	Validator::make($request->all(),[
    		'header' => 'required|max:70',
    		'description' => 'required',
    		'status' => 'required',
    		'image' => 'required_with|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    	],[
    		'header.required' => 'Please enter banner title',
    		'header.max:70' => 'Not more than 70 characters',
    		'description.required' => 'Please enter description',
    		'status.required' => 'Please select status',
    		'image.required_with' => 'Please upload valid banner image'
    	])->validate();

    	$banner = Banner::find($id);

    	if($request->hasFile('image')) {
            $file = $request->file('image') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            
            $destinationPath_2 = public_path().'/uploads/banner' ;

            $img = Image::make($file->getRealPath());

            
            $img->resize(1350, 350, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName);
        }
        else {
            $fileName = $banner->image;
        }
        
        $banner->header = $request->header;
        $banner->description = $request->description;
        $banner->status = $request->status;
        $banner->image = $fileName;

        $banner->save();

        $request->session()->flash("message", "Banner updated successfully");
        return redirect("/admin/banner");
    }

    public function delete(Request $request, $id) {
    	$banner = Banner::find($id);
    	if($banner) {
    		$banner->delete();
    		$request->session()->flash("message", "Banner deleted successfully");
        	return redirect("/admin/banner");
    	}
    	else {
    		$request->session()->flash("error_message", "Please try again");
        	return redirect("/admin/banner");
    	}
    }
}
