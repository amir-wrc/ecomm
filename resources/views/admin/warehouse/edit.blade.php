@extends('admin.layouts.dashboard_layout')
@section('title', 'Warehouse - Edit')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Warehouse
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/warehouse">Warehouse</a></li>
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
              
              <li class="active"><a href="#settings" data-toggle="tab">Warehouse - Edit</a></li>
            </ul>
            <div class="tab-content">
              
              <div class="tab-pane active" id="settings">
                <form name="frmWarehouse" method="post" action="{{ url('admin/warehouse/update')}}" class="form-horizontal" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" placeholder="Warehouse Name" name="name" value="{{ $warehousesview->name}}">
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                  </div>

                

                  <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    <label for="address" class="col-sm-2 control-label">Street Address</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="address" placeholder="Warehouse Address" name="address" >{{ $warehousesview->street_address}}</textarea>
                      <span class="text-danger">{{ $errors->first('address') }}</span>
                    </div>
                  </div>
             
                  <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="phone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="phone" placeholder="Warehouse Phone" name="phone" value="{{  $warehousesview->phone}}">
                      <span class="text-danger">{{ $errors->first('phone') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="email" placeholder="Warehouse email" name="email" value="{{  $warehousesview->email}}">
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                     <input type="hidden" name="wid" value="{{$warehousesview->id}}">
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