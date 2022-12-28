<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class PartnerController extends BaseController
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
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $main_title = "Partner";
        $data = Partner::where(function ($query) use ($keyword) {
                $query->orWhere('name', 'LIKE', '%' . $keyword . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $data->withPath('partner');
        $data->appends($request->all());

        return view('admin.master.partner.index', compact('main_title', 'data', 'keyword'));
    }

    public function add(Request $request)
    {
        $main_title = "Partner";
        return view('admin.master.partner.add', compact('main_title'));
    }

    public function store(Request $request)
    {
        $kosong = 'tidak boleh kosong';
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'img_name' => 'required',
            ],

            [
                'name.required' => 'Nama ' . $kosong,
                'img_name.required' => 'Alamat ' . $kosong,
            ]
        );

        if ($request->file('img_name')) {
            // logo website
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('img_name')->getClientOriginalName());
            $request->file('img_name')->move(public_path('file/img/partner'), $filename);
            $send  = Partner::create([
                'name'          => $request['name'],
                'desc'          => $request['desc'],
                'img_name'      => $filename,
                'img_path'      => 'file/img/partner/',
            ]);

            if ($send) {
                return redirect()
                    ->route('master.partner.add')
                    ->with([
                        'success' => 'Data berhasil ditambah.'
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
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Gambar tidak boleh kosong !'
                ]);
        }
    }

    public function delete(Request $request)
    {
        $hapus = Partner::findOrFail($request->id);
        if ($hapus->img_name) {
            File::delete($hapus->img_path . $hapus->img_name);
        }
        $hapus->delete();
        $hapus->where('id', $request->id);
        if ($hapus) {
            return response()->json(['success' => true,  'message' => 'Data Berhasil Hapus.'], 200);
        } else {
            return response()->json(['success' => false,  'message' => 'Data Gagal Hapus.'], 200);
        }
    }
}
