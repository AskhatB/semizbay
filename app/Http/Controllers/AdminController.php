<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Admin;

class AdminController extends Controller
{
    public function index(){
    	$admins = DB::table('admins')
		->join('areas', 'admins.area_id','=','areas.id')
		->select('admins.*','areas.nameLocation')
		->get(); 
		return $admins;
    }

    public function update(Request $request, $id){
		$admin = new Admin;

		$admin->id = $id;
		$admin->login = $request->login;
		$admin->password = $request->password;
	

		$adminUpdate = DB::table('admins')
		->where('id', $admin->id)
		->update(['login'=>$admin->login,
			'password'=>$admin->password
			]);

		if($adminUpdate){
			return response()
			->json(['message'=>'Пользователь был успешно изменен.']);
		} else {
			return response()
			->json(['error' => true,'message'=>'Произошла ошибка. Попробуйте снова']);
		}
	}

	public function show($id){
		$admin = Admin::find($id);
		return $admin;
	}}
