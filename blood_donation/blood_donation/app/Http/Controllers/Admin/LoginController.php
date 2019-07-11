<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
  
        $this->middleware('guest:admin')->except('logout');
    }

     public function showLoginForm()
    {
        return view('Admin.Admins.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        //admin login
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){

            $request->session()->flash('alert-success','Welcome at Admin Panel');
            return redirect()->intended('admin/index');
        }
        else{
            $request->session()->flash('alert-success','Login Failed');
            return redirect()->back()->withInput($request->only('email','remember'));
        }
      
    }
     

     protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }

      protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

     protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    } 

      public function logout(Request $request)
    {
       Auth::guard('admin')->logout();

       //$request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/admin');
    }

      protected function guard()
    {
        return Auth::guard('admin');
    }

}
