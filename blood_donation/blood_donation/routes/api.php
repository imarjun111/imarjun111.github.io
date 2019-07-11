<?php

use Illuminate\Http\Request;
use App\Http\Requests\addUserRequest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/users',function(){
	$user = App\User::all();
	//$arr['data'] = $user;

	$arr['msg'] = 'user data got successfully';
	$arr['status'] = 200;
	$arr['data'] = $user;
	return $arr;
	
});
Route::get('/users/{id}',function($id){
	$user =  App\User::where('id',$id)->get();
	//dd($user);
	
	$arr['msg'] = 'user data got successfully';
	$arr['status'] = 200;
	if($user != ''){
		$arr['data'] = $user;
	}
	else{
		$arr['data'] = 'sorry data not found';
	}
	

		return $arr;

});

Route::get('/admins',function(){
	$admin =  App\Admin::all();
	$arr['msg'] = 'Admin data got successfully';
	$arr['status'] = 200;
	$arr['data'] = $admin;
	return $arr;
});
Route::get('/admins/{id}',function($id){
	$admin =  App\Admin::where('id',$id)->get();
	$arr['msg'] = 'Admin data got successfully';
	$arr['status'] = 200;
	$arr['data'] = $admin;
	return $arr;

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
