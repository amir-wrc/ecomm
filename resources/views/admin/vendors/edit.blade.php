@extends('admin.layouts.dashboard_layout')
@section('title', 'Vendor - Edit')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vendor
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/vendors">Vendor</a></li>
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
              
              <li class="active"><a href="#settings" data-toggle="tab">Vendor - Edit</a></li>
            </ul>
            <div class="tab-content">
              
              <div class="tab-pane active" id="settings">
                <form name="frmVendor" method="post" action="{{ url('admin/vendors/update/'.$vendors->id)}}" class="form-horizontal" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" placeholder="Vendor Name" name="name" value="{{ $vendors->name }}">
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    <label for="address" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="address" placeholder="Vendor Address" name="address" >{{ $vendors->address }}</textarea>
                      <span class="text-danger">{{ $errors->first('address') }}</span>
                    </div>
                  </div>
                  
                  <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Country</label>

                    <div class="col-sm-10">
                      <select name="country_id" id="country_id" class="form-control">
                        <option value="" disabled="disabled">Select Any</option>
                        @foreach($countries as $key=>$value)
                         <option value="{{$key}}" {{ $vendors->country_id == $key ? 'selected' : '' }}>{{$value}}</option>
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
                        @foreach($states as $key=>$value)
                         <option value="{{$key}}" {{ $vendors->state_id == $key ? 'selected' : '' }}>{{$value}}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">{{ $errors->first('state_id') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                    <label for="city" class="col-sm-2 control-label">City</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="city" placeholder="Vendor City" name="city" value="{{ $vendors->city }}">
                      <span class="text-danger">{{ $errors->first('city') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('pincode') ? 'has-error' : '' }}">
                    <label for="pincode" class="col-sm-2 control-label">Pincode</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pincode" placeholder="Vendor Pincode" name="pincode" value="{{ $vendors->pincode }}">
                      <span class="text-danger">{{ $errors->first('pincode') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="phone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="phone" placeholder="Vendor Phone" name="phone" value="{{ $vendors->phone }}">
                      <span class="text-danger">{{ $errors->first('phone') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('fax') ? 'has-error' : '' }}">
                    <label for="fax" class="col-sm-2 control-label">Fax</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="fax" placeholder="Vendor Fax" name="fax" value="{{ $vendors->fax }}">
                      <span class="text-danger">{{ $errors->first('fax') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('toll_free') ? 'has-error' : '' }}">
                    <label for="toll_free" class="col-sm-2 control-label">Toll Free Number</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="toll_free" placeholder="Vendor Toll Free Number" name="toll_free" value="{{ $vendors->toll_free }}">
                      <span class="text-danger">{{ $errors->first('toll_free') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('contact_person') ? 'has-error' : '' }}">
                    <label for="contact_person" class="col-sm-2 control-label">Contact Person</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="contact_person" placeholder="Contact Person" name="contact_person" value="{{ $vendors->contact_person }}">
                      <span class="text-danger">{{ $errors->first('contact_person') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('contact_person_role') ? 'has-error' : '' }}">
                    <label for="contact_person_role" class="col-sm-2 control-label">Contact Person Role</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="contact_person_role" placeholder="Contact Person Role" name="contact_person_role" value="{{ $vendors->contact_person_role }}">
                      <span class="text-danger">{{ $errors->first('contact_person_role') }}</span>
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