<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdminController extends Controller
{
    public function index(){
    	$admins = DB::table('admins')
		->join('areas', 'admins.area_id','=','areas.id')
		->select('admins.*','areas.nameLocation')
		->get(); 
		return $admins;
    }
}
