<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Portofolio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class PortofolioController extends BaseController
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
        $main_title = "Portofolio";
        $data = Portofolio::leftjoin('layanans', 'layanans.id', '=', 'portofolios.layanan_id')->select('portofolios.*', 'layanans.name as layanan_name')->where(function ($query) use ($keyword) {
            $query->orWhere('portofolios.name', 'LIKE', '%' . $keyword . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $data->withPath('portofolio');
        $data->appends($request->all());

        return view('admin.master.portofolio.index', compact('main_title', 'data', 'keyword'));
    }

    public function add(Request $request)
    {
        $main_title = "Portofolio";
        $data = Layanan::get();
        return view('admin.master.portofolio.add', compact('main_title', 'data'));
    }

    public function store(Request $request)
    {
        $kosong = 'tidak boleh kosong';
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'tanggal' => 'required',
                'desc' => 'required',
                'img_thumb_name' => 'required|image|mimes:jpeg,png,jpg,gif,bmp|max:2000',
                'img_porto_1_name' => 'image|mimes:jpeg,png,jpg,gif,bmp|max:2000',
                'img_porto_2_name' => 'image|mimes:jpeg,png,jpg,gif,bmp|max:2000',
                'img_porto_3_name' => 'image|mimes:jpeg,png,jpg,gif,bmp|max:2000',
                'img_porto_4_name' => 'image|mimes:jpeg,png,jpg,gif,bmp|max:2000',
            ],

            [
                'name.required' => 'Nama ' . $kosong,
                'tanggal.required' => 'Tanggal ' . $kosong,
                'desc.required' => 'Deskripsi ' . $kosong,
                'img_thumb_name.required' => 'Type ekstensi gambar harus (jpg/png/jiff/bmp)',
                'img_porto_1_name.required' => 'Type ekstensi gambar harus (jpg/png/jiff/bmp)',
                'img_porto_2_name.required' => 'Type ekstensi gambar harus (jpg/png/jiff/bmp)',
                'img_porto_3_name.required' => 'Type ekstensi gambar harus (jpg/png/jiff/bmp)',
                'img_porto_4_name.required' => 'Type ekstensi gambar harus (jpg/png/jiff/bmp)',
            ]
        );

        if ($request->file('img_thumb_name') && $request->file('img_porto_1_name')) {

            // logo website
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('img_thumb_name')->getClientOriginalName());
            $request->file('img_thumb_name')->move(public_path('file/img/portofolio'), $filename);

            $filename_1 = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('img_porto_1_name')->getClientOriginalName());
            $request->file('img_porto_1_name')->move(public_path('file/img/portofolio'), $filename_1);

            // init file
            $filename_2 = '';
            $filename_3 = '';
            $filename_4 = '';

            if ($request->file('img_porto_2_name')) {
                $filename_2 = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('img_porto_2_name')->getClientOriginalName());
                $request->file('img_porto_2_name')->move(public_path('file/img/portofolio'), $filename_2);
            }

            if ($request->file('img_porto_3_name')) {
                $filename_3 = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('img_porto_3_name')->getClientOriginalName());
                $request->file('img_porto_3_name')->move(public_path('file/img/portofolio'), $filename_3);
            }

            if ($request->file('img_porto_4_name')) {
                $filename_4 = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('img_porto_4_name')->getClientOriginalName());
                $request->file('img_porto_4_name')->move(public_path('file/img/portofolio'), $filename_4);
            }

            $send  = Portofolio::create([
                'layanan_id'            => $request['layanan_id'],
                'name'                  => $request['name'],
                'desc'                  => $request['desc'],
                'tanggal'               => $request['tanggal'],
                'img_thumb_path'        => 'file/img/portofolio/',
                'img_thumb_name'        => $filename,
                'img_porto_path'        => 'file/img/portofolio/',
                'img_porto_1_name'      => $filename_1,
                'img_porto_2_name'      => $filename_2,
                'img_porto_3_name'      => $filename_3,
                'img_porto_4_name'      => $filename_4,
            ]);

            if ($send) {
                return redirect()
                    ->route('master.portofolio.add')
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
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Gambar Cover / Gambar Portofolio Pertama tidak boleh kosong !'
                ]);
        }
    }

    public function edit($id)
    {
        $main_title = "Portofolio";
        $layanan = Layanan::get();
        $data = Portofolio::where('id', $id)->first();
        return view('admin.master.portofolio.edit', compact('main_title', 'layanan','data'));
    }

    public function update(Request $request)
    {
        $kosong = 'tidak boleh kosong';
        $validatedData = $request->validate(
            [
                'id' => 'required',
                'name' => 'required',
                'tanggal' => 'required',
                'desc' => 'required',
                'img_thumb_name' => 'image|mimes:jpeg,png,jpg,gif,bmp|max:2000',
                'img_porto_1_name' => 'image|mimes:jpeg,png,jpg,gif,bmp|max:2000',
                'img_porto_2_name' => 'image|mimes:jpeg,png,jpg,gif,bmp|max:2000',
                'img_porto_3_name' => 'image|mimes:jpeg,png,jpg,gif,bmp|max:2000',
                'img_porto_4_name' => 'image|mimes:jpeg,png,jpg,gif,bmp|max:2000',
            ],

            [
                'id.required' => 'ID ' . $kosong,
                'name.required' => 'Nama ' . $kosong,
                'tanggal.required' => 'Tanggal ' . $kosong,
                'desc.required' => 'Deskripsi ' . $kosong,
                'img_thumb_name.required' => 'Type ekstensi gambar harus (jpg/png/jiff/bmp)',
                'img_porto_1_name.required' => 'Type ekstensi gambar harus (jpg/png/jiff/bmp)',
                'img_porto_2_name.required' => 'Type ekstensi gambar harus (jpg/png/jiff/bmp)',
                'img_porto_3_name.required' => 'Type ekstensi gambar harus (jpg/png/jiff/bmp)',
                'img_porto_4_name.required' => 'Type ekstensi gambar harus (jpg/png/jiff/bmp)',
            ]
        );

        // init file
        $filename = '';
        $filename_1 = '';
        $filename_2 = '';
        $filename_3 = '';
        $filename_4 = '';

        //
        $id = $request->id;

        //
        $params = [
            'layanan_id'            => $request['layanan_id'],
            'name'                  => $request['name'],
            'desc'                  => $request['desc'],
            'tanggal'               => $request['tanggal'],
        ];

        if ($request->file('img_thumb_name')) {
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('img_thumb_name')->getClientOriginalName());
            $request->file('img_thumb_name')->move(public_path('file/img/portofolio'), $filename);
            $params['img_thumb_name'] = $filename;
        }

        if ($request->file('img_porto_1_name')) {
            $filename_1 = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('img_porto_1_name')->getClientOriginalName());
            $request->file('img_porto_1_name')->move(public_path('file/img/portofolio'), $filename_1);
            $params['img_porto_1_name'] = $filename_1;
        }

        if ($request->file('img_porto_2_name')) {
            $filename_2 = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('img_porto_2_name')->getClientOriginalName());
            $request->file('img_porto_2_name')->move(public_path('file/img/portofolio'), $filename_2);
            $params['img_porto_2_name'] = $filename_2;
        }

        if ($request->file('img_porto_3_name')) {
            $filename_3 = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('img_porto_3_name')->getClientOriginalName());
            $request->file('img_porto_3_name')->move(public_path('file/img/portofolio'), $filename_3);
            $params['img_porto_3_name'] = $filename_3;
        }

        if ($request->file('img_porto_4_name')) {
            $filename_4 = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('img_porto_4_name')->getClientOriginalName());
            $request->file('img_porto_4_name')->move(public_path('file/img/portofolio'), $filename_4);
            $params['img_porto_4_name'] = $filename_4;
        }

        $send = Portofolio::findOrFail($id);
        //
        $send->update($params);

        if ($send) {
            return redirect()
                ->route('master.portofolio.edit', compact('id'))
                ->with([
                    'success' => 'Data berhasil diedit.'
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

        $hapus = Portofolio::findOrFail($request->id);
        if ($hapus->img_thumb_name) {
            File::delete($hapus->img_thumb_path . $hapus->img_thumb_name);
        }

        if ($hapus->img_porto_1_name) {
            File::delete($hapus->img_porto_path . $hapus->img_porto_1_name);
        }
        if ($hapus->img_porto_2_name) {
            File::delete($hapus->img_porto_path . $hapus->img_porto_2_name);
        }
        if ($hapus->img_porto_3_name) {
            File::delete($hapus->img_porto_path . $hapus->img_porto_3_name);
        }
        if ($hapus->img_porto_4_name) {
            File::delete($hapus->img_porto_path . $hapus->img_porto_4_name);
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
