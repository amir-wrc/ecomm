@extends('admin.layouts.dashboard_layout')
@section('title', 'Product - Add')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/products">Product</a></li>
        <li class="active">Add</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              
              <li class="active"><a href="#settings" data-toggle="tab">Product - Add</a></li>
            </ul>
            <div class="tab-content">
              
              <div class="tab-pane active" id="settings">
                <form name="frmProduct" method="post" action="{{ url('admin/products')}}" class="form-horizontal" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" placeholder=" Product Name" name="name" value="{{ old('name')}}">
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                    <label for="code" class="col-sm-2 control-label">Code</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="code" placeholder=" Product Code" name="code" value="{{ old('code')}}">
                      <span class="text-danger">{{ $errors->first('code') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
                    <label for="short_description" class="col-sm-2 control-label">Short Description</label>

                    <div class="col-sm-10">
                      <textarea name="short_description" id="short_description" class="form-control" placeholder="Product Short Description">{{ old('short_description') }}</textarea>
                      <span class="text-danger">{{ $errors->first('short_description') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('full_description') ? 'has-error' : '' }}">
                    <label for="full_description" class="col-sm-2 control-label">Full Description</label>

                    <div class="col-sm-10">
                      <textarea name="full_description" id="full_description" class="form-control" placeholder="Product Full Description">{{ old('full_description') }}</textarea>
                      <span class="text-danger">{{ $errors->first('full_description') }}</span>
                    </div>
                  </div>
                  
                  <div class="form-group {{ $errors->has('brand_id') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Brand</label>

                    <div class="col-sm-10">
                      <select name="brand_id" id="brand_id" class="form-control">
                        <option value="" disabled="disabled">Select Any</option>
                        @foreach($brands as $key=>$value)
                         <option value="{{$key}}" {{old('brand_id') == $key ? 'selected' : '' }}>{{$value}}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('unit_id') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Unit</label>

                    <div class="col-sm-10">
                      <select name="unit_id" id="unit_id" class="form-control">
                        <option value="" disabled="disabled">Select Any</option>
                        @foreach($units as $key=>$value)
                         <option value="{{$key}}" {{old('unit_id') == $key ? 'selected' : '' }}>{{$value}}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">{{ $errors->first('unit_id') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('tag_id') ? 'has-error' : '' }}">
                    <label for="tag_id" class="col-sm-2 control-label">Tags</label>

                    <div class="col-sm-10">
                      
                      <select name="tag_id[]" id="tag_id" class="form-control js-example-basic-multiple" multiple="multiple" >
                      <option value="" disabled="disabled">Select Any</option>
                      @foreach($tags as $key=>$value)
                        <option value="{{$key}}" {{old('tag_id') == $key ? 'selected' : '' }}>{{$value}}</option>
                      @endforeach
                      </select>
                      <span class="text-danger">{{ $errors->first('tag_id') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('sub_category_id') ? 'has-error' : '' }}">
                    <label for="sub_category_id" class="col-sm-2 control-label">Category</label>

                    <div class="col-sm-10">
                      
                      <select name="sub_category_id[]" id="sub_category_id" class="form-control js-example-basic-multiple" multiple="multiple" >
                      <option value="" disabled="disabled">Select Any</option>
                      @foreach($sub_categories as $key=>$value)
                        <option value="{{$key}}" {{old('sub_category_id') == $key ? 'selected' : '' }}>{{$value}}</option>
                      @endforeach
                      </select>
                      <span class="text-danger">{{ $errors->first('sub_category_id') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                    <label for="price" class="col-sm-2 control-label">Price</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="price" placeholder=" Product Price" name="price" value="{{ old('price')}}">
                      <span class="text-danger">{{ $errors->first('price') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                    <label for="quantity" class="col-sm-2 control-label">Quantity</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="quantity" placeholder=" Product Quantity" name="quantity" value="{{ old('quantity')}}">
                      <span class="text-danger">{{ $errors->first('quantity') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    <label for="image" class="col-sm-2 control-label">Image</label>

                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="image" name="image" >
                      <span class="text-danger">{{ $errors->first('image') }}</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
@stop