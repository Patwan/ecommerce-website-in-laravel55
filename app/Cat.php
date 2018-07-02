<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    public function childs(){
    	return $this->hasMany('App\Cat', 'p_id');
    }
}
