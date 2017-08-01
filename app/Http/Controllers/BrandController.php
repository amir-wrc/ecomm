<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Validator;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index')->with('brands',$brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required|unique:brands,name',
            'link' => 'required|regex:/^(http?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ])->validate();

        if($request->hasFile('image')) {
            $file = $request->file('image') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            
            $destinationPath_2 = public_path().'/uploads/brand' ;

            $img = Image::make($file->getRealPath());

            
            $img->resize(200, 200, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName);
        }
        else {
            $fileName = '';
        }

        $brands = new Brand();
        $brands->name = $request->name;
        $brands->image = $fileName;
        $brands->link = $request->link;

        $brands->save();

        $request->session()->flash("message", "Brand added successfully");
        return redirect("/admin/brands");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit')->with('brand',$brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(),[
            'name' => 'required|unique:brands,name,'.$id,
            'link' => 'required|regex:/^(http?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'image' => 'required_with|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ])->validate();

        $brands = Brand::find($id);

        if($request->hasFile('image')) {
            $file = $request->file('image') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            
            $destinationPath_2 = public_path().'/uploads/brand' ;

            $img = Image::make($file->getRealPath());

            
            $img->resize(200, 200, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName);
        }
        else {
            $fileName = $brands->image;
        }

        $brands->name = $request->name;
        $brands->image = $fileName;
        $brands->link = $request->link;

        $brands->save();

        $request->session()->flash("message", "Brand updated successfully");
        return redirect("/admin/brands");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $brands = Brand::find($id);
        if($brands->delete()) {
            $request->session()->flash("message", "Brand deleted successfully");
            return redirect("/admin/brands");
        }
        else {
            $request->session()->flash("error_message", "Try again");
            return redirect("/admin/brands");
        }
    }
}
