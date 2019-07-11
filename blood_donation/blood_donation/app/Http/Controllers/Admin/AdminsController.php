<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Requests\addAdminRequest;
use App\Http\Controllers\Controller;
use App\Admin;
use DB;

class AdminsController extends Controller
{

	  public function __construct()
    {
       $this->middleware('auth:admin');
    }


    public function index(){

    	 return view('Admin.Admins.index');

    }

    public function profile(){

    	$admin = Admin::all()->first()->toArray();
    	//dd($admin);
    	return view('Admin.Admins.profile',compact('admin'));

    }
    public function ShowEditProfileForm(){
    	$user_id = \Auth::user()->id;
    	//dd($user_id);
    	$admin = Admin::where('id',$user_id)->first();
    	//dd($admin);
    	return view('Admin.Admins.editProfile',compact('admin'));
    }

    public function editProfile(addAdminRequest $request){

    	$data = $request->except('_token');
    	//dd($data);
    	if(!empty($data)){
    		if($request->hasFile('image')){


    			//unlink image from folder after upload image
				$oldimage = Admin::where('id',$data['id'])->value('image');
				$full_path = public_path('/img/admin_image/').$oldimage;
				\File::delete($full_path);


				$file = $request->file('image');
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				$data['image'] = uniqid().$filename;
				$des_path = public_path('/img/admin_image/');
				$file->move($des_path,$data['image']);
			}
				
			else{
				$data['image'] = Admin::where('id',$data['id'])->value('image');
			}
			try{
						$user_data = DB::table('admins')->where('id',$data['id'])->update($data);
						
					}catch(\Exception $e){
						$request->session()->flash('alert-danger',$e->getMessage());
						return redirect()->back();
					}
						$request->session()->flash('alert-success','Admin Profile update successfully');
						return redirect()->to(route('admin.profile'));
    	}
    	else{
		$request->session()->flash('alert-danger','unable to update data');
		return redirect()->back();
	}
    }
}
