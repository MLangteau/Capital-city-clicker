<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    // setting up the middleware

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // validating the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' =>'required|min:6'
        ]);
        // Attempt to log the user in
        // attempt is in the LoginController; passing $credentials in array (email, password above- matches in admin model)
        // $remember passes in truthy or falsey values(optional parameter);
        // if truthy - it will also set up the session to remember across multiple sessions
        // if falsey - it will do it for the one session

        //  PASSWORD is already hashed by laravel
        // also, in Middleware Trim, will trim all leading and triling spaces (except for passwords
        //  Also, we need to set the admin guard for this, so that it does not go to the default
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location (laravel keeps track of intended location)
            // default you can set in intended parameter, in case program does not know where the intended is.
            return redirect()->intended(route('admin.dashboard'));
        }
            // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}