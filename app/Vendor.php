<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable =[
    	'name','address','country_id','state_id','city','pincode','phone','fax','toll_free','contact_person','contact_person_role'
    ];

    public function states() {
    	return $this->belongsTo('\App\State','state_id');
    }

    public function countries() {
    	return $this->belongsTo('\App\Country','country_id');
    }
}
