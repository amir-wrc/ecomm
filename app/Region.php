<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
    	'name','head','street_address','country_id','state_id','city','pincode','contact_no','email_id'
    ];


     public function states() {
    	return $this->belongsTo('\App\State','state_id');
    }

    public function countries() {
    	return $this->belongsTo('\App\Country','country_id');
    }
}
