<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name','code','short_description','long_description','brand_id','price','image','quantity','unit_id'
    ];

    public function tags() {
    	return $this->belongsToMany('\App\Tag','product_tags','product_id','tag_id');
    }

    public function categories() {
    	return $this->belongsToMany('\App\SubCategory','product_categories','product_id','sub_category_id');
    }

    public function brands() {
    	return $this->belongsTo('\App\Brand','brand_id');
    }

    public function units() {
    	return $this->belongsTo('\App\Unit','unit_id');
    }
}
