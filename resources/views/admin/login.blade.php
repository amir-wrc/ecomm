@extends('admin.layouts.login_layout')
@section('content')
<!-- /.login-logo -->
  <div class="login-box-body">
  @if(Session::has('login-msg'))
        <p class="login-box-msg" style="color: red;">{{ Session::get('login-msg') }}</p>
  @else
        <p class="login-box-msg">Sign in to start your session</p>
  @endif
    

    <form action="/admin/login-submit" method="post">
    {{ csrf_field() }}
      <div class="form-group has-feedback {{ $errors->has('email')? 'has-error': '' }}">
        <input type="text" class="form-control" placeholder="Username" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <span class="text-danger">{{ $errors->first('email') }}</span>
      </div>
      <div class="form-group has-feedback {{ $errors->has('password')? 'has-error': '' }}">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <span class="text-danger">{{ $errors->first('password') }}</span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <a href="#">I forgot my password</a><br>
    

  </div>
  <!-- /.login-box-body -->
  @stop