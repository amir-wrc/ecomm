<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Warehouse;

class WarehouseController extends Controller
{
    //
     public function index()
     {
     	$warehousedata=Warehouse::all();
     	
     	return view('admin/warehouse/index')->with('warehousedata',$warehousedata);
     }
     public function add()
     {
     	return view('admin/warehouse/add');
     }

     public function store(Request $request)
     {
     	Validator::make($request->all(),[
            'name' => 'required',
            'address'=> 'required',
            'phone' => 'required|min:7,max:11|numeric', 
            'email'=>'required|email'
         ])->validate();

     	   $warehouses= new Warehouse();

     	   $warehouses->name=$request->name;
     	   $warehouses->street_address=$request->address;
     	   $warehouses->phone=$request->phone;
     	   $warehouses->email=$request->email;
     	   $warehouses->created_at=time();
     	   $warehouses->updated_at=time();
     	   
     	   if($warehouses->save())
     	   {
     	   	  $request->session()->flash("message", "Warehose added successfully");
              return redirect("/admin/warehouse");
     	   }

     } 

     public function edit($id)
     {
     	 $warehousesview= Warehouse::find($id);
         
         return view('admin/warehouse/edit')->with('warehousesview',$warehousesview);
     }
     public function update(Request $request)
     {
         Validator::make($request->all(),[
            'name' => 'required',
            'address'=> 'required',
            'phone' => 'required|min:7,max:11|numeric', 
            'email'=>'required|email'
         ])->validate();

         $id=$request->wid;

          $warehouseedit= Warehouse::find($id);

          $warehouseedit->name=$request->name;
          $warehouseedit->street_address=$request->name;
          $warehouseedit->phone=$request->phone;
          $warehouseedit->email=$request->email;
          $warehouseedit->created_at=time();
          $warehouseedit->updated_at=time();

           if($warehouseedit->save())
     	   {
     	   	  $request->session()->flash("message", "Warehose updated successfully");
              return redirect("/admin/warehouse");
     	   }
     }
     public function delete(Request $request,$id)
     {

     	 $warehousedelete= Warehouse::find($id);


           if($warehousedelete->delete())
     	   {
     	   	  $request->session()->flash("message", "Warehose deleted successfully");
              return redirect("/admin/warehouse");
     	   }
     }
}

