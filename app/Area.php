<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
	public function user(){
		return $this->hasMany('App\User', 'area_id');
	}

	public function new_image(){
		return $this->hasMany('App\new_image', 'area_id');
	}
}
