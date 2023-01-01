<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Layanan;
use App\Models\Partner;
use App\Models\Pesan;
use App\Models\Portofolio;
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
        $_portofolio = Portofolio::get();
        $_kontak = Kontak::first();
        return view('welcome', compact('_kontak','_portal_data', '_layanan', '_teknologi', '_partner', '_portofolio'));
    }

    public function StorePesan(Request $request)
    {
        $kosong = 'tidak boleh kosong';
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required'
            ],

            [
                'name.required' => 'Nama ' . $kosong,
                'email.required' => 'Email ' . $kosong,
                'subject.required' => 'Tentang ' . $kosong,
                'message.required' => 'Pesan ' . $kosong
            ]
        );

        $send = Pesan::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'subject' => $request['subject'],
            'message' => $request['message']
        ]);
        if ($send) {
            return redirect()
                ->route('/')
                ->with([
                    'success' => 'Data berhasil ditambahkan.'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Ada kesalahan, coba lagi !'
                ]);
        }
    }


}
