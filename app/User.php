<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile_pic()
    {
      if(file_exists( public_path() . '/uploads/profile/' . Auth::guard('admin')->user()->image) && Auth::guard('admin')->user()->image != "") {
          return url('uploads/profile/' . Auth::guard('admin')->user()->image);
      } else {
          return url('uploads/profile/user2-160x160.jpg');
      }
    }
}
