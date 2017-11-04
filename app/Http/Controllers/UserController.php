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

		$users = User::orderBy('id', 'desc')->get();

		return $users;
	}


	public function create(Request $request){
		$user = new User;

		$user->l_name = $request->l_name;
		$user->f_name = $request->f_name;
		$user->pat_name = $request->pat_name;
		$user->iin = $request->iin;
		$user->position = $request->position;

		$userCreate = User::create([
			'l_name'=>$user->l_name,
			'f_name'=>$user->f_name,
			'pat_name'=>$user->pat_name,
			'iin'=>$user->iin,
			'position'=>$user->position
		]);

		if($userCreate){
			return response()
			->json(['message' => 'Пользователь успешно добавлен.']);
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


		$userUpdate = DB::table('users')
		->where('id', $user->id)
		->update(['l_name'=>$user->l_name,
			'f_name'=>$user->f_name,
			'pat_name'=>$user->pat_name,
			'iin'=>$user->iin,
			'position'=>$user->position
		]);

		if($userUpdate){
			return response()
			->json(['message'=>'Пользователь был успешно изменен.']);
		} else {
			return response()
			->json(['message'=>'Произошла ошибка. Попробуйте снова']);
		}
	}


	public function delete($id){
		$deleteUser = User::find($id);
		$deleteUser->delete();

		return response()
		->json(['message'=>'Пользователь был успешно удален.']);
	}
}
