<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductStock;
use Validator;
class OrderController extends Controller
{
    //
    public function index()
    {
    	$orderstock=ProductStock::with('products')->get()->toArray();
    	
    	return view('admin/orders/index')->with('orderstock',$orderstock);
    }
    public function add()
    {
    	$Product=product::all();
    	
    	return view('admin/orders/add')->with('product',$Product);
    }
    public function store(Request $request)
    {
    	Validator::make($request->all(),[
            'product_id' => 'required',
            'purchase_date'=> 'required|date_format:d-m-Y|',
            'quantity' => 'required',
         ])->validate();
      
       $id=$request->product_id;
      
        $product= Product::find($id);
        $quantity=$product['quantity'];
        
        $new_quantity=$request->quantity;
        $total_quantity=$quantity+$new_quantity;
        $product->quantity=$total_quantity;
        
        $product->save();

      $ProductStock= new ProductStock();

       $ProductStock->product_id=$request->product_id;
       $ProductStock->purchased_date=date("Y-m-d",strtotime($request->purchase_date));
       $ProductStock->quantity=$new_quantity;
      $ProductStock->created_at=time();
      $ProductStock->updated_at=time();

      if($ProductStock->save())
      {
         $request->session()->flash("message", "Order added successfully");
         return redirect("/admin/orders");
      }
    }

    public function edit($id)
    {
    	$Product=product::all();
    	$orderplaced=ProductStock::find($id);
    	/*echo "<pre>";
    	print_r($orderplaced);
    	echo "</pre>";die();*/
    	return view('admin/orders/edit')->with(['orderplaced'=>$orderplaced,'product'=>$Product]);
    }
    public function update(Request $request)
    {
         Validator::make($request->all(),[
            'product_id' => 'required',
            'purchase_date'=> 'required|date_format:d-m-Y|',
            'quantity' => 'required',
         ])->validate();

        $product_id=$request->pid;
        $id=$request->id;
        $edit_quantity=$request->quantity;
        $purchase_date=$request->purchase_date;
        $product_id=$request->product_id;

        $product=Product::find($product_id);
        $quantity=$product['quantity'];

        
        
        $productStock=ProductStock::find($id);
        $previousQuantity=$productStock['quantity'];

        if($edit_quantity>$previousQuantity)
        {
          $quantitydiff=$edit_quantity-$previousQuantity;
          $newProductQuantity=$quantitydiff+$quantity;
        }
        else
        {
          $quantitydiff=$previousQuantity-$edit_quantity;
          $newProductQuantity=$quantity-$quantitydiff;
        }

        $product->quantity=$newProductQuantity;

        $product->save();
        

       $productStock->product_id=$request->product_id;
       $productStock->purchased_date=date("Y-m-d",strtotime($request->purchase_date));
       $productStock->quantity=$edit_quantity;
       $productStock->created_at=time();
       $productStock->updated_at=time();

        if($productStock->save())
         {
          $request->session()->flash("message", "Order updated successfully");
          return redirect("/admin/orders");
         }
    }

    public function delete($id)
    {
    	$delete=ProductStock::find($id);

    	if($delete->delete())
    	{
    		$request->session()->flash("message", "Order Deleted successfully");
          return redirect("/admin/orders");
    	}
    }
}
