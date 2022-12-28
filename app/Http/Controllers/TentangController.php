<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TentangController extends BaseController
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
        $main_title = "Tentang";
        $data = Tentang::first();
        return view('admin.tentang.index', compact('main_title', 'data'));
    }

    public function store(Request $request)
    {

        $kosong = 'tidak boleh kosong';
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'alamat' => 'required',
                'kota' => 'required',
                'desc' => 'required',
                'provinsi' => 'required',
                'since' => 'required',
            ],

            [
                'name.required' => 'Nama ' . $kosong,
                'alamat.required' => 'Alamat ' . $kosong,
                'kota.required' => 'kota ' . $kosong,
                'desc.required' => 'Deskripsi ' . $kosong,
                'provinsi.required' => 'Provinsi ' . $kosong,
                'since.required' => 'Tanggal Pendirian ' . $kosong,
            ]
        );

        if ($request->file('favicon_name')) {

            $send = Tentang::first();
            // favicon
            $filename_favicon = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('favicon_name')->getClientOriginalName());
            $request->file('favicon_name')->move(public_path('file/img/tentang'), $filename_favicon);


            if ($request->file('logo_name')) {
                // logo website
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('logo_name')->getClientOriginalName());
                $request->file('logo_name')->move(public_path('file/img/tentang'), $filename);
                $send->update([
                    'name'          => $request['name'],
                    'address'       => $request['alamat'],
                    'city'          => $request['kota'],
                    'desc'          => $request['desc'],
                    'state'         => $request['provinsi'],
                    'since'         => $request['since'],
                    'logo_name'     => $filename,
                    'favicon_name'  => $filename_favicon,
                    'logo_path'     => 'file/img/tentang/',
                    'favicon_path'  => 'file/img/tentang/',
                    'visi'          => $request['visi'],
                    'misi'          => $request['misi'],
                    'latitude'      => $request['latitude'],
                    'longitude'     => $request['longitude'],
                ]);
            }else{
                $send->update([
                    'name'          => $request['name'],
                    'address'       => $request['alamat'],
                    'city'          => $request['kota'],
                    'desc'          => $request['desc'],
                    'state'         => $request['provinsi'],
                    'since'         => $request['since'],
                    'favicon_name'  => $filename_favicon,
                    'favicon_path'  => 'file/img/tentang/',
                    'visi'          => $request['visi'],
                    'misi'          => $request['misi'],
                    'latitude'      => $request['latitude'],
                    'longitude'     => $request['longitude'],
                ]);
            }

            if ($send) {
                return redirect()
                    ->route('admin.tentang')
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
        }else{
            $send = Tentang::first();
            $send->update([
                'name'      => $request['name'],
                'address'   => $request['alamat'],
                'city'      => $request['kota'],
                'desc'      => $request['desc'],
                'state'     => $request['provinsi'],
                'since'     => $request['since'],
                'visi'      => $request['visi'],
                'misi'      => $request['misi'],
                'latitude'  => $request['latitude'],
                'longitude' => $request['longitude'],
            ]);

            if ($send) {
                return redirect()
                    ->route('admin.tentang')
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
}
