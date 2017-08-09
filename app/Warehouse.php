<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    //
     protected $fillable =[
    	'name','address','country_id','state_id','city','pincode','phone','fax','toll_free','contact_person','contact_person_role'
    ];
}
