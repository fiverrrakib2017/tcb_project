<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
   // protected $redirectTo = '/home';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index(){
        return view('Backend.Auth.Login');
    }
    public function login(Request $request)
    {   
       //return $request->all();exit;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
   
        if(auth()->attempt(array('email' => $request->email, 'password' => $request->password)))
        {
            if (auth()->user()->user_type == 1) {
                return redirect()->route('admin.dashboard');
                exit;
              
            }else{
               // return redirect()->route('home');
            }
        }else{
            return redirect()->route('admin.login')
            ->with('error','Email-Address And Password Are Wrong.')
            ->withErrors(['email' => 'আপনার তথ্য আমাদের কাছে নেই ! ']); 
                
        }
          
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login'); // You can redirect to any route after logout
    }
}
