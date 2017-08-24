@extends('admin.layouts.dashboard_layout')
@section('title', 'Region - Add')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Region
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/regions">Region</a></li>
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
              
              <li class="active"><a href="#settings" data-toggle="tab">Region - Add</a></li>
            </ul>
            <div class="tab-content">
              
              <div class="tab-pane active" id="settings">
                <form name="frmRegion" method="post" action="{{ url('admin/regions/store')}}" class="form-horizontal" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" placeholder="Region Name" name="name" value="{{ old('name')}}">
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('head') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Head</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="head" placeholder="Region head" name="head" value="{{ old('head')}}">
                      <span class="text-danger">{{ $errors->first('head') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    <label for="address" class="col-sm-2 control-label">Street Address</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="address" placeholder="Region Address" name="address" >{{ old('address')}}</textarea>
                      <span class="text-danger">{{ $errors->first('address') }}</span>
                    </div>
                  </div>
                  
                  <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Country</label>

                    <div class="col-sm-10">
                      <select name="country_id" id="country_id" class="form-control">
                        <option value="" disabled="disabled">Select Any</option>
                         @foreach($countries as $key=>$value)
                         <option value="{{$key}}" {{ (old('country_id') == $key || $key == "99") ? 'selected' : '' }}>{{$value}}</option>
                        @endforeach
                      </select>
                      
                      <span class="text-danger">{{ $errors->first('country_id') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('state_id') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">State</label>

                    <div class="col-sm-10">
                      <select name="state_id" id="state_id" class="form-control" >
                        <option value="" disabled="disabled">Select Any</option>
                        
                      </select>
                      <span class="text-danger">{{ $errors->first('state_id') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                    <label for="city" class="col-sm-2 control-label">City</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="city" placeholder="Region City" name="city" value="{{ old('city')}}">
                      <span class="text-danger">{{ $errors->first('city') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('pincode') ? 'has-error' : '' }}">
                    <label for="pincode" class="col-sm-2 control-label">Pincode</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pincode" placeholder="Region Pincode" name="pincode" value="{{ old('pincode')}}">
                      <span class="text-danger">{{ $errors->first('pincode') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="phone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="phone" placeholder="Region Phone" name="phone" value="{{ old('phone')}}">
                      <span class="text-danger">{{ $errors->first('phone') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="email" placeholder="Region email" name="email" value="{{ old('email')}}">
                      <span class="text-danger">{{ $errors->first('email') }}</span>
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