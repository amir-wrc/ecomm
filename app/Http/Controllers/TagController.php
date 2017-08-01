<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index')->with('tags',$tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.add');
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
            'name' => 'required|unique:tags,name',
            'status' => 'required'
        ])->validate();

        $tags = new Tag();
        $tags->name = $request->name;
        $tags->status = $request->status;

        $tags->save();

        $request->session()->flash("message", "Tag added successfully");
        return redirect("/admin/tags");
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
        $tags = Tag::find($id);
        if($tags) {
            return view('admin.tags.edit')->with('tags',$tags);
        }
        else {
            $request->session()->flash("error_message", "No category found");
            return redirect("/admin/tags");
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
            'name' => 'required|unique:tags,name,'.$id,
            'status' => 'required'
        ])->validate();

        $tags = Tag::find($id);
        
        
        $tags->name = $request->name;
        $tags->status = $request->status;

        $tags->save();

        $request->session()->flash("message", "Tag updated successfully");
        return redirect("/admin/tags");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $tags = Tag::find($id);
        if($tags) {
            $tags->delete();
            $request->session()->flash("message", "Tag deleted successfully");
            return redirect("/admin/tags");
        }
        else {
            $request->session()->flash("error_message", "Please try again");
            return redirect("/admin/tags");
        }
    }
}
