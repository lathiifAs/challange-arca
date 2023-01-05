<?php

namespace App\Http\Controllers;

use App\Models\Buruh;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BuruhController extends Controller
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
        $main_title = "Master Data Buruh";
        $buruh = Buruh::where(function ($query) use ($keyword) {
                $query->orWhere('nama', 'LIKE', '%' . $keyword . '%');
            })
            ->orderBy('created_at', 'desc')
            ->simplePaginate(5);
        $buruh->withPath('buruh');
        $buruh->appends($request->all());

        return view('admin.master.buruh.index', compact('main_title', 'buruh', 'keyword'));
    }

    public function add(Request $request)
    {
        $main_title = "Master Data Buruh";
        return view('admin.master.buruh.add', compact('main_title'));
    }

    public function store(Request $request)
    {
        $kosong = 'tidak boleh kosong';
        $validatedData = $request->validate(
            [
                'nama' => 'required',
                'alamat' => 'required'
            ],

            [
                'nama.required' => 'Nama ' . $kosong,
                'alamat.required' => 'alamat ' . $kosong,
            ]
        );

        $send = Buruh::create([
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
        ]);
        if ($send) {
            return redirect()
                ->route('master.buruh.add')
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

    public function edit($id)
    {
        $main_title = "Master Data Buruh";
        $buruh = Buruh::where('id', $id)->first();
        return view('admin.master.buruh.edit', compact('main_title', 'buruh'));
    }

    public function update(Request $request){
        $kosong = 'tidak boleh kosong';
        $validatedData = $request->validate(
            [
                'id' => 'required',
                'nama' => 'required',
            ],

            [
                'id.required' => 'ID ' . $kosong,
                'nama.required' => 'Nama ' . $kosong,
            ]
        );

        $id = $request->id;
        if (!empty($request->password)) {
            $akun = Buruh::where('id', $request->id)->update([
                'nama' => $request['nama'],
                'alamat' => $request['alamat'],

            ]);
        }else{
            $akun = Buruh::where('id', $request->id)->update([
                'nama' => $request['nama'],
                'alamat' => $request['alamat'],
            ]);
        }

        if ($akun) {
            return redirect()
                ->route('master.buruh.edit', compact('id'))
                ->with([
                    'success' => 'Data berhasil diupdate'
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

    public function delete(Request $request)
    {

        $hapus = Buruh::findOrFail($request->id);
        $hapus->delete();
        $hapus->where('id', $request->id);
        if ($hapus) {
            return response()->json(['success' => true,  'message' => 'Data Berhasil Hapus.'], 200);
        } else {
            return response()->json(['success' => false,  'message' => 'Data Gagal Hapus.'], 200);
        }
    }
}
