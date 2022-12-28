<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Globals;
use App\Models\Tentang;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $_portal_data = Tentang::all()->first();
        View::share(compact('_portal_data'));
    }
}
