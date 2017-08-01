@extends('admin.layouts.dashboard_layout')
@section('title', 'Brand - Edit')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Brand
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/brands">Brand</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              
              <li class="active"><a href="#settings" data-toggle="tab">Brand - Edit</a></li>
            </ul>
            <div class="tab-content">
              
              <div class="tab-pane active" id="settings">
                <form name="frmBrand" method="post" action="{{ url('admin/brands/update/'.$brand->id)}}" class="form-horizontal" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" placeholder="Brand Name" name="name" value="{{ $brand->name }}">
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                  </div>
                 

                  <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                    <label for="link" class="col-sm-2 control-label">Website</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="link" name="link" placeholder="Brand website" value="{{ $brand->link }}"> 
                      <span class="text-danger">{{ $errors->first('link') }}</span>
                    </div>
                  </div>


                  <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    <label for="image" class="col-sm-2 control-label">Image</label>

                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="image" name="image" >
                      <span class="text-danger">{{ $errors->first('image') }}</span>
                      <img src="{{ url('uploads/brand/' .$brand->image)}}" alt="{{$brand->image}}">
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