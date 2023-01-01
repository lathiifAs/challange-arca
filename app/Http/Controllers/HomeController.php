<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function Home()
    {
        $_portal_data = Tentang::all()->first();
        return view('welcome', compact('_portal_data'));
    }

    public function adminHome()
    {
        return view('adminHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function operatorHome()
    {
        return view('operatorHome');
    }
}
