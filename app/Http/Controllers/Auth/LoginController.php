<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
        //  adjusted this to handle logouts (otherwise, would only go to logout if logged out)
        $this->middleware('guest', ['except' =>['logout', 'userLogout']]);
    }
    /**
     * Log ONLY the admin out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //  copied this piece from vendor/laravel/framework/src/Illuminate/Foundation/Auth/AuthenticatesUsers.php file
    public function userLogout()  // don't need request
    {
        Auth::guard('web')->logout();     // using the 'admin' guard from config/auth.php  (also needed to rename logout)

        /*      // commented these out to keep the session data, so only logs out admin, not user
                $request->session()->flush();
                $request->session()->regenerate();  */

        return redirect('/');
    }
}
