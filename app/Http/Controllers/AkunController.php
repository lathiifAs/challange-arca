<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
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
        $main_title = "Master Data Admin";
        $data = User::where('type', '!=', 0)->where(function ($query) use ($keyword) {
                $query->orWhere('name', 'LIKE', '%' . $keyword . '%');
            })
            ->orderBy('created_at', 'desc')
            ->simplePaginate(5);
        $data->withPath('akun');
        $data->appends($request->all());

        return view('admin.master.akun.index', compact('main_title', 'data', 'keyword'));
    }

    public function add(Request $request)
    {
        $main_title = "Master Data Admin";
        return view('admin.master.akun.add', compact('main_title'));
    }

    public function store(Request $request)
    {
        $kosong = 'tidak boleh kosong';
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ],

            [
                'name.required' => 'Nama ' . $kosong,
                'email.required' => 'Email ' . $kosong,
                'password.required' => 'Password ' . $kosong,
            ]
        );

        $send = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'type' => 1
        ]);
        if ($send) {
            return redirect()
                ->route('master.akun.add')
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
        $main_title = "Master Data Admin";
        $akun = User::where('id', $id)->first();
        return view('admin.master.akun.edit', compact('main_title', 'akun'));
    }

    public function update(Request $request){
        $kosong = 'tidak boleh kosong';
        $validatedData = $request->validate(
            [
                'id' => 'required',
                'name' => 'required',
                'email' => 'required',
            ],

            [
                'id.required' => 'ID ' . $kosong,
                'name.required' => 'Nama ' . $kosong,
                'email.required' => 'Email ' . $kosong,
            ]
        );

        $id = $request->id;
        if (!empty($request->password)) {
            $akun = User::where('id', $request->id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),

            ]);
        }else{
            $akun = User::where('id', $request->id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
            ]);
        }

        if ($akun) {
            return redirect()
                ->route('master.akun.edit', compact('id'))
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

        $hapus = User::findOrFail($request->id);
        $hapus->delete();
        $hapus->where('id', $request->id);
        if ($hapus) {
            return response()->json(['success' => true,  'message' => 'Data Berhasil Hapus.'], 200);
        } else {
            return response()->json(['success' => false,  'message' => 'Data Gagal Hapus.'], 200);
        }
    }
}
