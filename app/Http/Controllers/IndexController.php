<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\new_image;
use App\User;
use DB;
use Validator;
use Session;
use Redirect;
use Illuminate\Http\Response;
class IndexController extends Controller
{

	public function show(){

		$new_images  = new_image::orderBy('id','DESC')->get();
		return view('index-3') -> with(['new_images'=>$new_images]);
	}
	public function index(){
		return view('welcome');
	}
	public function message(Request $request){
		if ($request->session()->has('user')) {
			
			return view('index') -> with([
				$session = session()->get('status')
			]);

		} else {
			return view('auth.message');
		}
		
	}
	public function info($id){

		$situation = new_image::select(['id','file1','file2','file3','location','descrip','f_name','l_name','phone','email'])->where('id',$id)->first();
		return view('index-1')->with(['situation' => $situation]);

	}

	public function fixShow($id){

		$situation = new_image::select(['id'])->where('id',$id)->first();
		return view('index-2')->with(['fixed_situation' => $situation]);  
	}


	public function fixSituation($id,Request $request){
		$current_id = $id;
		if($request->isMethod('post')){
			
			if(empty($request['works'])){
				return Redirect::back()->withErrors(['Добавьте описание']);
			}

			if($request->hasFile('fixed_file1')) {
				$file1  = $request->file('fixed_file1');
				$file1->move(public_path() . '/fixedSituations', $_FILES['fixed_file1']['name']);
			} 

			if($request->hasFile('fixed_file2')) {
				$file2 = $request->file('fixed_file2');
				$file2->move(public_path(). '/fixedSituations', $_FILES['fixed_file2']['name']);
			} 

			if($request->hasFile('fixed_file3')) {
				$file3 = $request->file('fixed_file3');
				$file3->move(public_path(). '/fixedSituations', $_FILES['fixed_file3']['name']);
			}  



			if(!($request->hasFile('fixed_file1'))&&!($request->hasFile('fixed_file2'))&&!($request->hasFile('fixed_file3')))
			{  
				return Redirect::back()->withErrors(['Загрузите фотографию!']);
				exit();
			}

			DB::table('new_images')->where('id',$id)->update([

				'fixed_file1'=> $_FILES['fixed_file1']['name'],
				'fixed_file2'=> $_FILES['fixed_file2']['name'],
				'fixed_file3' => $_FILES['fixed_file3']['name'],
				'works'=> $request['works']
			]);
			//return redirect()->back();
		}
		return view('index-8');  
	}
	public function imgUpload(Request $request){



		if($request->isMethod('post')){

			$validator = Validator::make($request->all(), [

				'location'  => 'required|max:255',
				'descrip'  => 'required|max:1000',
			]);


			if($validator->fails()){
				return view('index') -> with(['errors' =>$validator->errors()->all()]);
			}


			if($request->hasFile('file1')) {
				$file1 = $request->file('file1');
				$file1->move(public_path() . '/newSituations', $_FILES['file1']['name']);
			} 

			if($request->hasFile('file2')) {
				$file2 = $request->file('file2');
				$file2->move(public_path(). '/newSituations', $_FILES['file2']['name']);
			} 

			if($request->hasFile('file3')) {
				$file3 = $request->file('file3');
				$file3->move(public_path(). '/newSituations', $_FILES['file3']['name']);
			}  

			if(!($request->hasFile('file1'))&&!($request->hasFile('file2'))&&!($request->hasFile('file3')))

			{  
				$message_error = 'Загрузите фотографию';
				return view('index')->with([
					'message_error' => $message_error
				]);
				exit();
			}
			if(session()->has('user')){
				session()->flash('status', 'Спасибо! Ваше сообщение успешно отправлено!');
				$value = session()->get('user');
				$user = User::select('f_name','l_name','phone','email','position','area_id')->where('iin',$value)->first();

				DB::table('new_images')->insert([

					['file1' => $_FILES['file1']['name'],
					'file2' => $_FILES['file2']['name'],
					'file3' => $_FILES['file3']['name'], 
					'location' => $request['location'],
					'descrip' => $request['descrip'], 
					'phone' => $user['phone'], 
					'email' => $user['email'],
					'f_name' => $user['f_name'],
					'l_name' => $user['l_name'],
					'area_id' => $user['area_id']
				]
			]);
				return redirect('success');

			} else {
				return view('index-7');
			}

		}
	}

	public function success(){

		if(!(session()->has('status'))){
			return redirect('/');
		} else {
			return view('index-6');
		}
	}

	public function deleteSuccess(){
		session()->forget('status');
		return redirect('success');
	}

	public function listFixSit(){

		$fixed_images= new_image::orderBy('id','DESC')->get();
		return view('index-4') -> with(['fixed_images'=>$fixed_images]);

	}
	public function fixed_sit($id){

		$fixed_situation= new_image::select(['id','file1','file2','file3','location','descrip','f_name','l_name','phone','email','fixed_file1','fixed_file2','fixed_file3','works'])->where('id',$id)->first();
		return view('index-5')->with(['fixed_situation' => $fixed_situation]);
	}


	public function ready(){
		return view('index-5');
	}

	public function getLogin(Request $request){
		if(!($request->session()->has('user'))){
			return view('index-7');
		} else {
			return redirect('/profile');
		}

	}

	public function  postLogin(Request $request){
		$iin = $_POST['iin'];
		$user = User::select(['iin'])->where('iin',$iin)->first();
		if(!empty($user->iin)){
			$request->session()->put('user', $iin);
			return redirect('profile');

		} else {
			return Redirect::back()->withErrors(['Пользователь не найден!']);
			exit();
		}
	}

	public function profile(Request $request)
	{   
		

		if (session()->has('user')){
			$value = session()->get('user');

			$user = DB::table('users')
			->join('areas', 'users.area_id','=','areas.id')
			->select('users.*','areas.nameLocation')
			->where('iin', $value)
			->get()->first(); 

			if($user){
				return view('auth.profile')->with([
					'user' => $user
				]);
			} else {
				return view('auth/login');
			}
		} else {
			return redirect('auth/login');
		}
	}



	public function logout(){
		session()->forget('user');
		return redirect('profile');
	}

	public function mobileEvents()
	{

		$events  = new_image::orderBy('id','DESC')->get();


		return view('mobile.events') -> with([
			'events' => $events
		]);
	}
	public function mobileInfo($id)
	{

		$situation = new_image::select(['id','file1','file2','file3','location','descrip','f_name','l_name','phone','email'])->where('id',$id)->first();
		return view('mobile.info')->with(['situation' => $situation]);

	}

	public function adminEvents($id){
		$events = DB::table('new_images')
			->join('areas', 'new_images.area_id','=','areas.id')
			->select('new_images.*','areas.nameLocation')
			->where('new_images.area_id',$id)
			->get(); 
		return $events;
	}
}
