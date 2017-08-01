
@extends('admin.layouts.dashboard_layout')
@section('content')
             <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/admin/products">Product</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          @if (Session::has('message'))
              <div class="alert alert-info" id="result7">{{ Session::get('message') }}</div>
          @endif
           @if (Session::has('error_message'))
              <div class="alert alert-danger" id="result8">{{ Session::get('error_message') }}</div>
          @endif
          <div class="box">
            
            <div class="topbtn"><a href="/admin/products/create"><button type="button" class="btn bg-purple btn-rightad pull-right">ADD</button></a></div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Code</th>
                  <th>Price</th>
                  <th>Brand</th>
                  <th>Unit</th>
                  <th>Image</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @if($products)
                  @foreach($products as $value)
                    <tr>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->code }}</td>
                      <td>{{ $value->price }}</td>
                      <td>{{ $value->brands->name }}</td>
                      <td>{{ $value->units->name }}</td>
                      <td><img src="{{ url('uploads/product/' .$value->image)}}" alt="{{$value->image}}" style="height:75px;width: 75px;"></td>
                      <td><a href="/admin/products/{{$value->id}}/edit" >Edit</a>&nbsp;|&nbsp;<a href="/admin/products/delete/{{$value->id}}" onclick="return confirm('Are you sure?')">Delete</a></td>
                    </tr>
                  @endforeach
                @endif
                
                </tbody>
                
              </table>
            </div>
          </div>
         
        </div>
        
      </div>
      
    </section>
    
  </div>
  @stop