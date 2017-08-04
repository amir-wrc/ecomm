<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use Validator;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('admin.vendors.index')->with('vendors',$vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = \App\Country::orderBy('name','asc')->get()->pluck('name','id')->toArray();
        return view('admin.vendors.add')->with('countries',$countries);
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
            'name' => 'required|unique:vendors,name',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
            'pincode' => 'required|max:6|min:6',
            'phone' => 'required|max:11|min:7',
            'toll_free' => 'required_with|max:13|min:13',
            'contact_person' => 'required|max:50',
            'contact_person_role' => 'required|max:20'
        ])->validate();

        $vendors = Vendor::create($request->all());
        $request->session()->flash("message", "Vendor added successfully");
        return redirect("/admin/vendors");
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
        $vendors = Vendor::find($id);
        $countries = \App\Country::orderBy('name','asc')->get()->pluck('name','id')->toArray();
        $states = \App\State::orderBy('name', 'asc')->get()->pluck('name','id')->toArray();

        return view('admin.vendors.edit')->with(['countries' => $countries,'states' => $states, 'vendors' => $vendors]);

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
            'name' => 'required|unique:vendors,name,'.$id,
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
            'pincode' => 'required|max:6|min:6',
            'phone' => 'required|max:11|min:7',
            'toll_free' => 'required_with|max:13|min:13',
            'contact_person' => 'required|max:50',
            'contact_person_role' => 'required|max:20'
        ])->validate();

        $vendors = Vendor::find($id);
        $vendors->name = $request->name;
        $vendors->address = $request->address;
        $vendors->country_id = $request->country_id;
        $vendors->state_id = $request->state_id;
        $vendors->city = $request->city;
        $vendors->pincode = $request->pincode;
        $vendors->phone = $request->phone;
        $vendors->toll_free = $request->toll_free;
        $vendors->contact_person = $request->contact_person;
        $vendors->contact_person_role = $request->contact_person_role;
        $vendors->save();

        $request->session()->flash("message", "Vendor updated successfully");
        return redirect("/admin/vendors");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $vendors = Vendor::find($id);
        if($vendors->delete()) {
            $request->session()->flash("message", "Vendor deleted successfully");
            return redirect("/admin/vendors");
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
