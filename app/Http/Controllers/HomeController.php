<?php

namespace App\Http\Controllers;

use App\Models\Buruh;
use App\Models\Pembayaran;
use App\Models\Pembayaran_detail;
use App\Models\Tentang;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('welcome');
    }

    public function adminHome(Request $request)
    {
        $main_title = "Pembayaran Buruh";
        $data = Pembayaran::orderBy('created_at', 'desc')
            ->simplePaginate(5);
        $data->withPath('pembayaran');
        $data->appends($request->all());

        return view('adminHome', compact('main_title', 'data'));
    }

    public function add(Request $request)
    {
        $main_title = "Pembayaran Buruh";
        $data = Buruh::get();
        return view('admin.pembayaran.add', compact('main_title', 'data'));
    }

    public function store(Request $request)
    {
        $kosong = 'tidak boleh kosong';
        $validatedData = $request->validate(
            [
                "buruh_id.*"  => "required",
                'pembayaran' => 'required',
                'presentase.*' => 'required',
                'hasil_bayar.*' => 'required',
            ],

            [
                'name.required' => 'Buruh ' . $kosong,
                'pembayaran.required' => 'Total Pembayaran ' . $kosong,
                'presentase.required' => 'Presentase ' . $kosong,
                'hasil_bayar.required' => 'Hasil Bonus ' . $kosong,
            ]
        );

        $send = Pembayaran::create([
            'total_bonus' => $request->pembayaran,
        ]);
        if ($send) {

            $pembayaran_id = $send->id;
            foreach ($request->buruh_id as $key => $value) {
                $send = Pembayaran_detail::create([
                    'hasil_bonus' => $request->hasil_bayar[$key],
                    'pembayaran_id' => $pembayaran_id,
                    'presentase' => $request->presentase[$key],
                    'buruh_id' => $value,
                ]);

                if ($key + 1 == count($request->buruh_id)) {
                    if ($send) {
                        return redirect()
                            ->route('admin.home.add')
                            ->with([
                                'success' => 'Data berhasil ditambahkan.'
                            ]);
                    } else {
                        return redirect()
                            ->back()
                            ->withInput()
                            ->with([
                                'error' => 'Ada kesalahan pada detail, coba lagi !'
                            ]);
                    }
                }
            }
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Ada kesalahan, coba lagi !'
                ]);
        }
    }


    public function detail($id)
    {
        $pembayaran = Pembayaran::where('id', $id)->first();
        $pembayaran_detail = Pembayaran_detail::join('buruhs', 'buruhs.id', '=', 'pembayaran_details.buruh_id')->select('pembayaran_details.*', 'buruhs.nama')->where('pembayaran_id', $id)->get();
        return response()->json(['success' => false,  'message' => 'Data Gagal Hapus.', 'data_pembayaran' => $pembayaran, 'data_pembayaran_detail' => $pembayaran_detail], 200);
    }

    public function edit($id)
    {
        $main_title = "Pembayaran Buruh";
        $pembayaran = Pembayaran::where('id', $id)->first();
        $pembayaran_detail = Pembayaran_detail::join('buruhs', 'buruhs.id', '=', 'pembayaran_details.buruh_id')->select('pembayaran_details.*', 'buruhs.nama')->where('pembayaran_id', $id)->get();
        $data = Buruh::get();
        return view('admin.pembayaran.edit', compact('main_title', 'data', 'pembayaran', 'pembayaran_detail'));
    }

    public function update(Request $request)
    {
        $kosong = 'tidak boleh kosong';
        $validatedData = $request->validate(
            [
                "id"  => "required",
                "buruh_id.*"  => "required",
                'pembayaran' => 'required',
                'presentase.*' => 'required',
                'hasil_bayar.*' => 'required',
            ],

            [
                'id.required' => 'ID ' . $kosong,
                'name.required' => 'Buruh ' . $kosong,
                'pembayaran.required' => 'Total Pembayaran ' . $kosong,
                'presentase.required' => 'Presentase ' . $kosong,
                'hasil_bayar.required' => 'Hasil Bonus ' . $kosong,
            ]
        );


        $id = $request->id;
        $send = Pembayaran::findOrFail($id);
        $send->update([
            'total_bonus' => $request->pembayaran,
        ]);

        if ($send) {

            $hapus = Pembayaran_detail::where('pembayaran_id', $id)->delete();
            if ($hapus) {
                foreach ($request->buruh_id as $key => $value) {
                    $send = Pembayaran_detail::create([
                        'hasil_bonus' => $request->hasil_bayar[$key],
                        'pembayaran_id' => $id,
                        'presentase' => $request->presentase[$key],
                        'buruh_id' => $value,
                    ]);

                    if ($key + 1 == count($request->buruh_id)) {
                        if ($send) {
                            return redirect()
                                ->route('admin.home.edit', compact('id'))
                                ->with([
                                    'success' => 'Data berhasil disimpan.'
                                ]);
                        } else {
                            return redirect()
                                ->back()
                                ->withInput()
                                ->with([
                                    'error' => 'Ada kesalahan pada detail, coba lagi !'
                                ]);
                        }
                    }
                }
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

        $hapus = Pembayaran_detail::findOrFail($request->id);
        $hapus->delete();
        $hapus->where('pembayaran_id', $request->id);
        if ($hapus) {

            $hapus = Pembayaran::findOrFail($request->id);
            $hapus->delete();
            $hapus->where('id', $request->id);
            return response()->json(['success' => true,  'message' => 'Data Berhasil Hapus.'], 200);
        } else {
            return response()->json(['success' => false,  'message' => 'Data Gagal Hapus.'], 200);
        }
    }
}
