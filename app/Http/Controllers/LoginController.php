<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    protected function index() {
        return view('admin.login');
    }

    protected function login_submit(Request $request) {
        Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Please enter username',
            'password.required' => 'Please enter password'
        ])->validate();

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])) {
            return redirect("/admin/dashboard");
        }
        else {
            $request->session()->flash("login-msg", "Username or password didn't matched");
            return view('admin.login');
        }

    }

    protected function logout() {
        Auth::guard('admin')->logout();
        return redirect("/admin");
    }
}
