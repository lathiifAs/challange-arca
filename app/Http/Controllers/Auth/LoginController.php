<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {


            switch(auth()->user()->type){
                case 'admin':
                // $this->redirectTo = '/admin/home';
                return redirect()->route('admin.home');
                    break;
                case 'operator':
                    return redirect()->route('admin.home');
                    break;
                default:
                    $this->redirectTo = '/login';
                    return $this->redirectTo;
            }
        //     if (auth()->user()->type == 'admin' || auth()->user()->type == 'operator') {
        //         return redirect()->route('admin.home');
        //     }
        //     // else if (auth()->user()->type == 'operator') {
        //     //     // return redirect()->route('operator.home');
        //     //     return redirect()->route('admin.home');
        //     // }
        // }else{
        //     return redirect()->route('login')
        //         ->with('error','Email-Address And Password Are Wrong.');
        // }

    }
}
}
