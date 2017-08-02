<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Brand;
use Validator;
use Image;
use App\Logic\Image\ImageRepository;
use Illuminate\Support\Facades\Input;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $image;
    public function __construct(ImageRepository $imageRepository)
    {
        $this->image = $imageRepository;
    }

    public function index()
    {
        $products = \App\Product::all();
        return view('admin.products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::get()->pluck('name','id')->toArray();
        $brands = Brand::get()->pluck('name','id')->toArray();
        $tags = \App\Tag::get()->pluck('name','id')->toArray();
        $sub_categories = \App\SubCategory::get()->pluck('name','id')->toArray();
        return view('admin.products.add')->with(['units'=>$units,'brands'=>$brands,'tags'=>$tags,'sub_categories'=>$sub_categories]);
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
            'name' => 'required|unique:products,name',
            'code' => 'required|unique:products,code',
            'short_description' => 'required',
            'full_description' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric|min:1|max:9999',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required|integer|digits_between:1,999',
            'unit_id' => 'required',
            'tag_id' => 'required|array',
            'sub_category_id' => 'required|array'
        ],[
            'brand_id.required' => 'Select product brand',
            'unit_id.required' => 'Select product unit',
            'tag_id.array' => 'Please select product related tags',
            'tag_id.required' => 'Please select product related tags',
            'sub_category_id.array' => 'Please select product related category',
            'sub_category_id.required' => 'Please select product related category',
            'quantity.integer' => 'Product quantity must be number'
        ])->validate();

        try {
            if($request->hasFile('image')) {
                $file = $request->file('image') ;

                $fileName = time().'_'.$file->getClientOriginalName() ;

                //thumb destination path
                
                $destinationPath_2 = public_path().'/uploads/product' ;

                $img = Image::make($file->getRealPath());

                
                $img->resize(270, 340, function ($constraint){
                    $constraint->aspectRatio();
                })->save($destinationPath_2.'/'.$fileName);
            }
            else {
                $fileName = '';
            }

            $product = new \App\Product();
            $product->name = $request->name;
            $product->code = $request->code;
            $product->short_description = $request->short_description;
            $product->long_description = $request->full_description;
            $product->brand_id = $request->brand_id;
            $product->price = $request->price;
            $product->image = $fileName;
            $product->quantity = $request->quantity;
            $product->unit_id = $request->unit_id;

            $product->save();

            $product->tags()->attach($request->tag_id);
            $product->categories()->attach($request->sub_category_id);

            $request->session()->flash("message", "Product added successfully");
            return redirect("/admin/products");
        }
        catch(\Exception $e) {
            $request->session()->flash("error_message", "Please try again");
            return redirect("/admin/products");
        }
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
        $product = \App\Product::find($id);

        $units = Unit::get()->pluck('name','id')->toArray();
        $brands = Brand::get()->pluck('name','id')->toArray();
        $product_tags = \App\Product::with('tags')->where('id',$id)->get()->toArray();
        $product_categories = \App\Product::with('categories')->where('id',$id)->get()->toArray();
        $tags = \App\Tag::get()->pluck('name','id')->toArray();
        $sub_categories = \App\SubCategory::get()->pluck('name','id')->toArray();

        foreach ($product_tags[0]['tags'] as $key => $value) {
          $tags_array[] = $value['id'];
        }

        foreach ($product_categories[0]['categories'] as $key => $value) {
          $categories_array[] = $value['id'];
        }

        return view('admin.products.edit')->with(['product'=>$product,'units'=>$units,'brands'=>$brands,'tags'=>$tags,'sub_categories'=>$sub_categories,'tags_array'=>$tags_array,'categories_array'=>$categories_array]);

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
            'name' => 'required|unique:products,name,'.$id,
            'code' => 'required|unique:products,code,'.$id,
            'short_description' => 'required',
            'full_description' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric|min:1|max:9999',
            'image' => 'required_with|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required|integer|digits_between:1,999',
            'unit_id' => 'required',
            'tag_id' => 'required|array',
            'sub_category_id' => 'required|array'
        ],[
            'brand_id.required' => 'Select product brand',
            'unit_id.required' => 'Select product unit',
            'tag_id.array' => 'Please select product related tags',
            'tag_id.required' => 'Please select product related tags',
            'sub_category_id.array' => 'Please select product related category',
            'sub_category_id.required' => 'Please select product related category',
            'quantity.integer' => 'Product quantity must be number'
        ])->validate();

        try {
            $product = \App\Product::find($id);
            if($request->hasFile('image')) {
                $file = $request->file('image') ;

                $fileName = time().'_'.$file->getClientOriginalName() ;

                //thumb destination path
                
                $destinationPath_2 = public_path().'/uploads/product' ;

                $img = Image::make($file->getRealPath());

                
                $img->resize(270, 340, function ($constraint){
                    $constraint->aspectRatio();
                })->save($destinationPath_2.'/'.$fileName);
            }
            else {
                $fileName = $product->image;
            }

            
            $product->name = $request->name;
            $product->code = $request->code;
            $product->short_description = $request->short_description;
            $product->long_description = $request->full_description;
            $product->brand_id = $request->brand_id;
            $product->price = $request->price;
            $product->image = $fileName;
            $product->quantity = $request->quantity;
            $product->unit_id = $request->unit_id;

            $product->save();

            $product->tags()->wherePivot('product_id', '=', $id)->detach();
            $product->tags()->attach($request->tag_id);

            $product->categories()->wherePivot('product_id', '=', $id)->detach();
            $product->categories()->attach($request->sub_category_id);

            $request->session()->flash("message", "Product updated successfully");
            return redirect("/admin/products");
        }
        catch(\Exception $e) {
            $request->session()->flash("error_message", "Please try again");
            return redirect("/admin/products");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = \App\Product::find($id);
        if($product) {
            $product->delete();
            $product->tags()->wherePivot('product_id', '=', $id)->detach();
            $product->categories()->wherePivot('product_id', '=', $id)->detach();
            $request->session()->flash("message", "Product deleted successfully");
            return redirect("/admin/products");
        }
        else {
            $request->session()->flash("error_message", "Please try again");
            return redirect("/admin/products");
        }
    }

    public function gallery(Request $request, $id) {
        return view('admin.products.gallery')->with('id',$id);
    }

    public function get_gallery($id) {

        $images = \App\ProductGallery::where('product_id',$id)->get(['image']);

        $imageAnswer = [];

        foreach ($images as $image) {
            $imageAnswer[] = [
                'server' => $image->image,
                'size' => File::size(public_path('uploads/product/gallery/' . $image->image))
            ];
        }

        return response()->json([
            'images' => $imageAnswer
        ]);
    }


    public function store_gallery(Request $request) {
        $photo = Input::all();
        $response = $this->image->upload($photo,$request->product_id);
        return $response;
    }


    public function remove_gallery_image($file_name,$product_id) {
        $filename = $file_name;
        $product_id = $product_id;

        if(!$filename)
        {
            return 0;
        }
        $response = $this->image->delete( $filename,$product_id );
        return $response;
        
    }
}
