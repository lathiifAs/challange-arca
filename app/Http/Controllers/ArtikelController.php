<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori_artikel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ArtikelController extends BaseController
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
        $main_title = "Artikel";
        $data = Artikel::leftjoin('kategori_artikels', 'artikels.kategori_id', '=', 'kategori_artikels.id')->select('artikels.*', 'kategori_artikels.name as nama_kategori')->where(function ($query) use ($keyword) {
                $query->orWhere('title', 'LIKE', '%' . $keyword . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $data->withPath('artikel');
        $data->appends($request->all());

        return view('admin.master.artikel.index', compact('main_title', 'data', 'keyword'));
    }

    public function add(Request $request)
    {
        $main_title = "Artikel";
        $kategori = Kategori_artikel::get();
        return view('admin.master.artikel.add', compact('main_title', 'kategori'));
    }

    public function store(Request $request)
    {
        $kosong = 'tidak boleh kosong';
        $validatedData = $request->validate(
            [
                'title' => 'required',
                'kategori_id' => 'required',
                'content' => 'required',
                'thumbnail_name' => 'required|image|mimes:jpeg,png,jpg,gif,bmp|max:2000',
            ],

            [
                'kategori_id.required' => 'Kategori ' . $kosong,
                'title.required' => 'Judul ' . $kosong,
                'content.required' => 'Deskripsi ' . $kosong,
                'thumbnail_name.required' => 'Thumbnail format tidak sesuai atau ukuran terlalu besar !',
            ]
        );

        if ($request->file('thumbnail_name')) {
            // logo website
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('thumbnail_name')->getClientOriginalName());
            $request->file('thumbnail_name')->move(public_path('file/img/artikel'), $filename);
            $send  = Artikel::create([
                'kategori_id'       => $request['kategori_id'],
                'title'             => $request['title'],
                'content'           => $request['content'],
                'st_publish'        => $request['st_publish'],
                'thumbnail_name'    => $filename,
                'thumbnail_path'    => 'file/img/artikel/',
                'slug'              => Str::slug($request->title)
            ]);

            if ($send) {
                return redirect()
                    ->route('master.artikel.add')
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

    public function edit($id)
    {
        $main_title = "Artikel";
        $data = Artikel::where('id', $id)->first();
        $kategori = Kategori_artikel::get();
        return view('admin.master.artikel.edit', compact('main_title', 'data', 'kategori'));
    }

    public function update(Request $request)
    {
        $kosong = 'tidak boleh kosong';
        $validatedData = $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
                'old_thumbnail' => 'required',
                'thumbnail_path' => 'required',
            ],

            [
                'title.required' => 'Judul ' . $kosong,
                'content.required' => 'Deskripsi ' . $kosong,
                'old_thumbnail.required' => 'Thumbnail saat ini ' . $kosong,
                'thumbnail_path.required' => 'Thumbnail saat ini ' . $kosong,
            ]
        );

        $data = Artikel::findOrFail($request->id);
        $id = $request->id;

        if ($request->file('thumbnail_name')) {

            File::delete($request->thumbnail_path . $request->thumbnail_name);

            // logo website
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('thumbnail_name')->getClientOriginalName());
            $request->file('thumbnail_name')->move(public_path('file/img/artikel'), $filename);
            $send  = $data->update([
                'kategori_id'       => $request['kategori_id'],
                'title'             => $request['title'],
                'content'           => $request['content'],
                'st_publish'        => $request['st_publish'],
                'thumbnail_name'    => $filename,
                'thumbnail_path'    => 'file/img/artikel/',
                'slug' => Str::slug($request->title)
            ]);

            if ($send) {
                return redirect()
                    ->route('master.artikel.edit',  compact('id'))
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
            $send  = $data->update([
                'kategori_id'       => $request['kategori_id'],
                'title'             => $request['title'],
                'content'           => $request['content'],
                'st_publish'        => $request['st_publish'],
                'slug' => Str::slug($request->title)
            ]);

            if ($send) {
                return redirect()
                    ->route('master.artikel.edit',  compact('id'))
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
        }
    }

    public function delete(Request $request)
    {
        $hapus = Artikel::findOrFail($request->id);
        if ($hapus->img_name) {
            File::delete($hapus->thumbnail_path . $hapus->thumbnail_name);
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
