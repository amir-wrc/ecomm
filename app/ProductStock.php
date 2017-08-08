<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    //
    protected $fillable = [
    	'product_id','purchased_date','quantity'
    ];

    public function products() {
    	return $this->belongsTo('\App\Product','product_id');
    }
}
