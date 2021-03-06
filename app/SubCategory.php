<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
    	'name','category_id','status'
    ];

    public function categories() {
    	return $this->belongsTo('\App\Category','category_id');
    }
}
