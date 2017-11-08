<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\User;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function index(){

		$users = DB::table('users')
		->join('areas', 'users.area_id','=','areas.id')
		->select('users.*','areas.nameLocation')
		->orderBy('users.id', 'DESC')
		->get(); 
		return $users;
	}


	public function create(Request $request){
		$user = new User;

		$user->l_name = $request->l_name;
		$user->f_name = $request->f_name;
		$user->pat_name = $request->pat_name;
		$user->iin = $request->iin;
		$user->position = $request->position;
		$user->area_id = $request->area_id;

		$userCreate = User::create([
			'l_name'=>$user->l_name,
			'f_name'=>$user->f_name,
			'pat_name'=>$user->pat_name,
			'iin'=>$user->iin,
			'position'=>$user->position,
			'area_id' => $user->area_id
		]);

		if($userCreate){
			return response()
			->json(['message' => 'Пользователь успешно добавлен.']);
		} else {
			return response()
			->json(['message' => 'Ошибка.']);
		}
	}


	public function update(Request $request, $id){
		$user = new User;

		$user->id = $id;
		$user->l_name = $request->l_name;
		$user->f_name = $request->f_name;
		$user->pat_name = $request->pat_name;
		$user->iin = $request->iin;
		$user->position = $request->position;
		$user->area_id = $request->area_id;

		$userUpdate = DB::table('users')
		->where('id', $user->id)
		->update(['l_name'=>$user->l_name,
			'f_name'=>$user->f_name,
			'pat_name'=>$user->pat_name,
			'iin'=>$user->iin,
			'position'=>$user->position,
			'area_id' => $user->area_id
		]);

		if($userUpdate){
			return response()
			->json(['successMessage'=>'Пользователь был успешно изменен.']);
		} else {
			return response()
			->json(['errorMessage'=>'Произошла ошибка. Попробуйте снова']);
		}
	}

	public function show($id){
		$user = User::find($id);
		return $user;
	}

	public function delete($id){
		$deleteUser = User::find($id);
		$deleteUser->delete();

		return response()
				->json(['message'=>'Пользователь был успешно удален.']);
		
	}
}
