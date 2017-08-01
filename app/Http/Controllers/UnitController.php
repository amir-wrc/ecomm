<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use Validator;

class UnitController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::all();
        return view('admin.units.index')->with('units',$units);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.units.add');
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
            'name' => 'required|unique:units,name',
            'status' => 'required'
        ])->validate();

        $units = new Unit();
        $units->name = $request->name;
        $units->status = $request->status;

        $units->save();

        $request->session()->flash("message", "Unit added successfully");
        return redirect("/admin/units");
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
        $units = Unit::find($id);
        if($units) {
            return view('admin.units.edit')->with('units',$units);
        }
        else {
            $request->session()->flash("error_message", "No category found");
            return redirect("/admin/units");
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
            'name' => 'required|unique:units,name,'.$id,
            'status' => 'required'
        ])->validate();

        $units = Unit::find($id);
        
        
        $units->name = $request->name;
        $units->status = $request->status;

        $units->save();

        $request->session()->flash("message", "Unit updated successfully");
        return redirect("/admin/units");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $units = Unit::find($id);
        if($units) {
            $units->delete();
            $request->session()->flash("message", "Unit deleted successfully");
            return redirect("/admin/units");
        }
        else {
            $request->session()->flash("error_message", "Please try again");
            return redirect("/admin/units");
        }
    }
}
