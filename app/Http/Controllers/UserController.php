<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function index(){

		$users = User::all();

		return $users;
	}
}
