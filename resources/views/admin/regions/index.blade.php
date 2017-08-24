
@extends('admin.layouts.dashboard_layout')
@section('content')
             <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Regions
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/admin/vendors">Regions</a></li>
        
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
            
            <div class="topbtn"><a href="/admin/regions/add"><button type="button" class="btn bg-purple btn-rightad pull-right">ADD</button></a></div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Contact No.</th>
                  <th>Action</th>
                </tr>
                </thead>
                
                 <tbody>
                @if($regions)
                  @foreach($regions as $value)
                    <tr>
                      <td>{{$value->name}}</td>
                      <td>{{ $value->countries->name }}</td>
                      <td>{{ $value->states->name }}</td>
                      <td>{{$value->city}}</td>
                      <td>{{$value->street_address}}</td>
                      <td>{{$value->email_id}}</td>
                      <td>{{$value->contact_no}}</td>
                      <td><a href="/admin/regions/edit/{{$value->id}}" >Edit</a>&nbsp;|&nbsp;<a href="/admin/regions/delete/{{$value->id}}" onclick="return confirm('Are you sure?')">Delete</a></td>
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