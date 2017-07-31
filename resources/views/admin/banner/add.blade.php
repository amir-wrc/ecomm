@extends('admin.layouts.dashboard_layout')
@section('title', 'Banner - Add')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Banner
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/banner">Banner</a></li>
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
              
              <li class="active"><a href="#settings" data-toggle="tab">Banner - Add</a></li>
            </ul>
            <div class="tab-content">
              
              <div class="tab-pane active" id="settings">
                <form name="frmBanner" method="post" action="/admin/banner/store" class="form-horizontal" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group {{ $errors->has('header') ? 'has-error' : '' }}">
                    <label for="header" class="col-sm-2 control-label">Title</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="header" placeholder="Banner Header" name="header" value="{{ old('header')}}">
                      <span class="text-danger">{{ $errors->first('header') }}</span>
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description" class="col-sm-2 control-label">Description</label>

                    <div class="col-sm-10">
                      <textarea id="description" name="description" class="form-control">{{ old('description')}}</textarea>
                      <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    <label for="image" class="col-sm-2 control-label">Image</label>

                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="image" name="image" >
                      <span class="text-danger">{{ $errors->first('image') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="status" class="col-sm-2 control-label">Status</label>

                    <div class="col-sm-10">
                      
                      <select name="status" id="status" class="form-control" >
                      <option value="1" {{old('status') == "1" ? 'selected' :'' }}>Active</option>
                      <option value="0" {{old('status') == "0" ? 'selected' :'' }}>In-Active</option>
                      </select>
                      <span class="text-danger">{{ $errors->first('status') }}</span>
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