<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Partner;
use App\Models\Teknologi;
use App\Models\Tentang;
use Illuminate\Http\Request;

class LandingPageController extends Controller
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
        $_layanan = Layanan::get();
        $_teknologi = Teknologi::get();
        $_partner = Partner::get();
        return view('welcome', compact('_portal_data', '_layanan', '_teknologi', '_partner'));
    }

}
