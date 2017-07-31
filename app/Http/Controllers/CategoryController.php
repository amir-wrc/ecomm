<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use Validator;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.add');
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
            'name' => 'required',
            'status' => 'required',
            'image' => 'required_with|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ])->validate();

        if($request->hasFile('image')) {
            $file = $request->file('image') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            
            $destinationPath_2 = public_path().'/uploads/category' ;

            $img = Image::make($file->getRealPath());

            
            $img->resize(300, 300, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName);
        }
        else {
            $fileName = '';
        }
        $categories = new Category();
        $categories->name = $request->name;
        $categories->image = $fileName;
        $categories->status = $request->status;

        $categories->save();

        $request->session()->flash("message", "Category added successfully");
        return redirect("/admin/categories");

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
        $categories = Category::find($id);
        if($categories) {
            return view('admin.categories.edit')->with('categories',$categories);
        }
        else {
            $request->session()->flash("error_message", "No category found");
            return redirect("/admin/categories");
        }
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
            'name' => 'required',
            'status' => 'required',
            'image' => 'required_with|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ])->validate();

        $categories = Category::find($id);

        if($request->hasFile('image')) {
            $file = $request->file('image') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            
            $destinationPath_2 = public_path().'/uploads/category' ;

            $img = Image::make($file->getRealPath());

            
            $img->resize(300, 300, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName);
        }
        else {
            $fileName = $categories->image;
        }
        
        
        $categories->name = $request->name;
        $categories->image = $fileName;
        $categories->status = $request->status;

        $categories->save();

        $request->session()->flash("message", "Category updated successfully");
        return redirect("/admin/categories");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $categories = Category::find($id);
        if($categories) {
            $categories->delete();
            $request->session()->flash("message", "Category deleted successfully");
            return redirect("/admin/categories");
        }
        else {
            $request->session()->flash("error_message", "Please try again");
            return redirect("/admin/categories");
        }
    }
}
