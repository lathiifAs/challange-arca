<?php

namespace App\Http\Controllers;

use App\Models\Teknologi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class TeknologiController extends BaseController
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
        $main_title = "Teknologi";
        $data = Teknologi::where(function ($query) use ($keyword) {
                $query->orWhere('name', 'LIKE', '%' . $keyword . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $data->withPath('teknologi');
        $data->appends($request->all());

        return view('admin.master.teknologi.index', compact('main_title', 'data', 'keyword'));
    }

    public function add(Request $request)
    {
        $main_title = "Teknologi";
        return view('admin.master.teknologi.add', compact('main_title'));
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
            $request->file('img_name')->move(public_path('file/img/teknologi'), $filename);
            $send  = Teknologi::create([
                'name'          => $request['name'],
                'desc'          => $request['desc'],
                'img_name'      => $filename,
                'img_path'      => 'file/img/teknologi/',
            ]);

            if ($send) {
                return redirect()
                    ->route('master.teknologi.add')
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
        $hapus = Teknologi::findOrFail($request->id);
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
