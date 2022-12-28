<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KontakController extends BaseController
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
    public function index()
    {
        $main_title = "Kontak";
        $data = Kontak::first();
        return view('admin.kontak.index', compact('main_title', 'data'));
    }

    public function store(Request $request)
    {

        $kosong = 'tidak boleh kosong';
        // $validatedData = $request->validate(
        //     [
        //         'name' => 'required',
        //         'alamat' => 'required',
        //         'kota' => 'required',
        //         'desc' => 'required',
        //         'provinsi' => 'required',
        //         'since' => 'required',
        //     ],

        //     [
        //         'name.required' => 'Nama ' . $kosong,
        //         'alamat.required' => 'Alamat ' . $kosong,
        //         'kota.required' => 'kota ' . $kosong,
        //         'desc.required' => 'Deskripsi ' . $kosong,
        //         'provinsi.required' => 'Provinsi ' . $kosong,
        //         'since.required' => 'Tanggal Pendirian ' . $kosong,
        //     ]
        // );

        $send = Kontak::first();
        $send->update([
            'whatsapp'      => $request['whatsapp'],
            'instagram'     => $request['instagram'],
            'facebook'      => $request['facebook'],
            'tiktok'        => $request['tiktok'],
            'linkedin'      => $request['linkedin'],
            'twitter'       => $request['twitter'],
            'youtube'       => $request['youtube'],
            'email'         => $request['email'],
            'telp'          => $request['telp'],
        ]);

        if ($send) {
            return redirect()
                ->route('admin.kontak')
                ->with([
                    'success' => 'Data berhasil diubah.'
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
