@extends('admin.layouts.dashboard_layout')
@section('title', 'Orders - Add')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Orders
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/orders">Orders</a></li>
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
              
              <li class="active"><a href="#settings" data-toggle="tab">Orders - Add</a></li>
            </ul>
            <div class="tab-content">
              
              <div class="tab-pane active" id="settings">
                <form name="frmOrder" method="post" action="{{ url('admin/orders/store')}}" class="form-horizontal" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group {{ $errors->has('product name') ? 'has-error' : '' }}">
                    <label for="product_id" class="col-sm-2 control-label">Product Name</label>

                    <div class="col-sm-10">
                      <select name="product_id" id="product_id" class="form-control">
                         <option value="">Select Product</option>
                         @foreach($product as $key=>$value)
                          <option value="{{$value['id']}}">{{$value['name']}}</option>
                          @endforeach
                      </select>

                      <span class="text-danger">{{ $errors->first('product_id') }}</span>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('purchase_date') ? 'has-error' : '' }}">
                    <label for="purchase_date" class="col-sm-2 control-label">Purchase Date</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="purchase_date" placeholder="Purchase Date" name="purchase_date" value="{{ old('purchase_date')}}" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask>
                      <span class="text-danger">{{ $errors->first('purchase_date') }}</span>
                    </div>

                 </div>

                 <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                    <label for="quantity" class="col-sm-2 control-label">Quantity</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" value="{{ old('quantity')}}">
                      <span class="text-danger">{{ $errors->first('quantity') }}</span>
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