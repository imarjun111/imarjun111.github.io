<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Requests\addUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use File;

class UsersController extends Controller
{
	 public function __construct()
    {
       $this->middleware('auth:admin');
    }
    
    public function index(){
		$users = User::paginate(5);
    	// print_r($users);die;
    	 return view('Admin.Users.index',compact('users'));

    }

    public function add(){
			return view('Admin.Users.add');
    	}

    public function addUser(addUserRequest $request){

    	$input = $request->except('_token');
		//dd($input);

		if(!empty($input)){

			$input['image']='';
			if($request->hasFile('image')){
				$file = $request->file('image');
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png'){

				}else{
					$request->session()->flash('alert-danger','File type is not valid.Please choose <b>jpg</b>&nbsp;<b>jpeg</b>&nbsp;<b>png
						</b>');
					return redirect()->back();

				}
				$input['image'] = uniqid().$filename;
				$des_path = public_path('/img/user_image/');
				$file->move($des_path,$input['image']);
			}
				$input['password'] = Hash::make($input['password']);

					try{
						//$user_data = new User($input);
						//$user_data->save();
						$user_data = DB::table('users')->insert($input);
						//$user_data = DB::table('users')->insertGetId($input);
						//$userId = $user_data.'th  '.'user added successfully';

					}catch(\Exception $e){
						$request->session()->flash('alert-danger',$e->getMessage());
						return redirect()->back();
					}
					$request->session()->flash('alert-success','user added successfully');
					return redirect('admin/users');
			
		}else{
					$request->session()->flash('alert-danger','unable to insert data');
					return redirect()->back();
		}
	}


public function edit($id=null){
		$id= convert_uudecode(base64_decode($id));
		$data = User::where('id',$id)->first();
		//dd($data);die;
		return view('Admin.Users.edit',compact('data'));
}

public function editUser(addUserRequest $request){

	$data = $request->except('_token');
	if(!empty($data)){
		if($request->hasFile('image')){

				$oldimage = User::where('id',$data['id'])->value('image');
				$full_path = public_path('/img/user_image/').$oldimage;
				File::delete($full_path);


				$file = $request->file('image');
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				$data['image'] = uniqid().$filename;
				$des_path = public_path('/img/user_image/');
				$file->move($des_path,$data['image']);
			}
			else{
				$data['image'] = User::where('id',$data['id'])->value('image');
			}
		try{
		$user_data = DB::table('users')->where('id',$data['id'])->update($data);
		
	}catch(\Exception $e){
		$request->session()->flash('alert-danger',$e->getMessage());
		return redirect()->back();
	}
		$request->session()->flash('alert-success','user update successfully');
		return redirect()->to('admin/users');
	}else{
		$request->session()->flash('alert-danger','unable to update data');
		return redirect()->back();
	}
	
}

public function delete(Request $request,$id=null){
$id= convert_uudecode(base64_decode($id));
		try{
			//DB::table('users')->where('id',$id)->delete(); // its another way to delete data
			User::where('id',$id)->delete();
			$request->session()->flash('alert-success','Delete user successfully');
			
		}catch(\Exception $e){
			$request->session()->flash('alert-danger','Unable to delete data'.' '.$e->getMessage());
			/*return redirect()->to('admin/users');*/
		}
		return redirect()->back();
}
}
