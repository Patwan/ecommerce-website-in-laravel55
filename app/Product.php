<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function cats(){
    	//States that many products belong to 1 Category
    	return $this->belongsTo('App\Cat', 'cat_id');
  	}
}
