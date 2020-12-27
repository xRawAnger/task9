<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:normalUser')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function showNormalUserLoginForm()
    {
        return view('auth.login', ['url' => 'normalUser']);
    }

    public function normalUserLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('normalUser')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/normalUser');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function google(){
        return Socialite::driver("google"->redirect());
    }

    public function google_redirect(){
        $user=Socialite::driver("google")->stateless()->user();
        $user=User::firstOrCreate([
            "email"=>$user->email
        ],[
            "email"=>$user->email,
            "name"=>$user->name?$user->name:$user->nickname,

        ]);
        Auth::login($user,true);
        return redirect()->route("home");
    }
    public function facebook()
    {
        return Socialite::driver("facebook"->redirect());
    }
    public function facebook_redirect()
    {
        $fbuser=Socialite::driver("facebook")->stateless()->user();
        $fbuser=User::firstOrCreate([
            "email"=>$fbuser->email
        ],[
            "email"=>$fbuser->email,
            "name"=>$fbuser->name,
        ]);
        Auth::login($fbuser,true);
        return redirect()->route("home");
    }

}
