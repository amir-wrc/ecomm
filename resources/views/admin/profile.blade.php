@extends('admin.layouts.dashboard_layout')
@section('content')

  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        
        <li class="active">My profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{!! Auth::guard('admin')->user()->profile_pic() !!}" alt="User profile picture">

              <h3 class="profile-username text-center">{{Auth::guard('admin')->user()->name}}</h3>

              <p class="text-muted text-center">Administrator</p>
            </div>
            
          </div>
    

        </div>

        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              
              <li  class="active"><a href="#settings" data-toggle="tab">My Profile</a></li>
            </ul>
            <div class="tab-content">
             

              <div class="active tab-pane" id="settings">
                @if(Session::has('profile-msg'))
                    <div class="login-box-msg" style="color: red;">{{ Session::get('profile-msg') }}</div>
  
                @endif
                <form  method="post" class="form-horizontal" action="/admin/profile-submit" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-group has-feedback {{ $errors->has('name')? 'has-error': '' }}">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="{{$profile->name}}">
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                  </div>
                  <div class="form-group has-feedback {{ $errors->has('email')? 'has-error': '' }}">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{$profile->email}}" readonly="readonly">
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                  </div>
                  <div class="form-group has-feedback {{ $errors->has('address')? 'has-error': '' }}">
                    <label for="inputName" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                     
                       <textarea class="form-control" id="inputExperience" name="address" placeholder="Address">{{$profile->address}}</textarea>
                       <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      <span class="text-danger">{{ $errors->first('address') }}</span>
                    </div>
                  </div>
                  <div class="form-group has-feedback {{ $errors->has('phone')? 'has-error': '' }}">
                    <label for="inputExperience" class="col-sm-2 control-label">Phone No.</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="phone"  id="inputName" placeholder="Name" value="{{$profile->phone}}">
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      <span class="text-danger">{{ $errors->first('phone') }}</span>
                    </div>
                  </div>

                  <div class="form-group has-feedback {{ $errors->has('profile_image')? 'has-error': '' }}">
                  
                  <label for="exampleInputFile" class="col-sm-2 control-label">File input</label>
                  <div class="col-sm-10">
                  <input type="file" id="profile_image" name="profile_image">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      <span class="text-danger">{{ $errors->first('profile_image') }}</span>
                  </div>  
                  
                </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>

            </div>

          </div>

        </div>

      </div>


    </section>

  </div>
@stop