<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = SubCategory::all();
        return view('admin.sub-categories.index')->with('sub_categories',$sub_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::get()->pluck('name','id')->toArray();
        return view('admin.sub-categories.add')->with('categories',$categories);
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
            'name' => 'required|unique:sub_categories,name',
            'category_id' => 'required',
            'status' => 'required'
        ],[
            'name.required' => 'Please enter sub-category name',
            'category_id.required' => 'Please select category',
            'status.required' => 'Please select status' 
        ])->validate();

        $sub_categories = SubCategory::create($request->all());
        $request->session()->flash("message", "Sub-Category added successfully");
        return redirect("/admin/sub-categories");

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
        $sub_categories = SubCategory::find($id);
        $categories = \App\Category::get()->pluck('name','id')->toArray();
        
        return view('admin.sub-categories.edit')->with(['sub_categories'=>$sub_categories,'categories'=>$categories]);

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
            'name' => 'required|unique:sub_categories,name,'.$id,
            'category_id' => 'required',
            'status' => 'required'
        ],[
            'name.required' => 'Please enter sub-category name',
            'category_id.required' => 'Please select category',
            'status.required' => 'Please select status' 
        ])->validate();

        $sub_categories = SubCategory::find($id);
        $sub_categories->name = $request->name;
        $sub_categories->category_id = $request->category_id;
        $sub_categories->status = $request->status;

        $sub_categories->save();

        $request->session()->flash("message", "Sub-Category updated successfully");
        return redirect("/admin/sub-categories");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $sub_categories = SubCategory::find($id);
        $sub_categories->delete();

        $request->session()->flash("message", "Sub-Category deleted successfully");
        return redirect("/admin/sub-categories");
    }
}
