<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
	public function user(){
		return $this->hasMany('App\User', 'area_id');
	}
}
