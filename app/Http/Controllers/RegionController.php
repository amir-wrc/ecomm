<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;
use Validator;

class RegionController extends Controller
{
    //
    public function index()
    {
      $regions = Region::all();
    
      return view('admin.regions.index')->with('regions',$regions);
    }

    public function add()
    {
    	$countries = \App\Country::orderBy('name','asc')->get()->pluck('name','id')->toArray();
    	return view('admin.regions.add')->with('countries',$countries);
    }

    public function store(Request $request)
    {
    	 Validator::make($request->all(),[
            'name' => 'required|unique:regions,name',
            'head'=> 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
            'pincode' => 'required|max:6|min:6',
            'phone' => 'required|max:11|min:7',
            'email' => 'required',
            
        ])->validate();

    	 $regions=new \App\Region();

    	 $regions->name=$request->name;
    	 $regions->head=$request->head;
    	 $regions->street_address=$request->address;
    	 $regions->country_id=$request->country_id;
    	 $regions->state_id=$request->state_id;
    	 $regions->city=$request->city;
    	 $regions->pincode=$request->pincode;
    	 $regions->contact_no=$request->phone;
    	 $regions->email_id=$request->email;
    	 $regions->created_at=time();
    	 $regions->updated_at=time();

    	 if($regions->save())
    	 {
    	 	$request->session()->flash("message", "Region added successfully");
        return redirect("/admin/regions");
    	 }
    }
    public function edit($id)
    {
    	$region= Region::find($id);

    	$countries = \App\Country::orderBy('name','asc')->get()->pluck('name','id')->toArray();
        $states = \App\State::orderBy('name', 'asc')->get()->pluck('name','id')->toArray();
    	
    	return view('admin/regions/edit')->with(['region'=>$region,'countries' => $countries,'states' => $states]);
    }

    public function update(Request $request)
    {
    	Validator::make($request->all(),[
            'name' => 'required|unique:regions,name',
            'head'=> 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
            'pincode' => 'required|max:6|min:6',
            'phone' => 'required|max:11|min:7',
            'email' => 'required',
            
        ])->validate();
         
        $id=$request->uid;
        $regions= Region::find($id);


        $regions->name=$request->name;
    	 $regions->head=$request->head;
    	 $regions->street_address=$request->address;
    	 $regions->country_id=$request->country_id;
    	 $regions->state_id=$request->state_id;
    	 $regions->city=$request->city;
    	 $regions->pincode=$request->pincode;
    	 $regions->contact_no=$request->phone;
    	 $regions->email_id=$request->email;
    	 $regions->created_at=time();
    	 $regions->updated_at=time();

    	 if($regions->save())
    	 {
    	 	$request->session()->flash("message", "Region Updated successfully");
        return redirect("/admin/regions");
    	 }

    }
    public function delete(Request $request,$id)
    {
    	$regions=Region::find($id);
    	if($regions->delete())
    	 {
    	 	$request->session()->flash("message", "Region Deleted successfully");
        return redirect("/admin/regions");
    	 }
    }

     public function get_states(Request $request) {
        if($request->ajax()) {
           $country_id = $request->country_id;
           $state_list = \App\State::where('country_id',$country_id)->get()->pluck('name','id')->toArray();
           return response()->json(['state_list'=>$state_list]); 
        }
        
    }
}
