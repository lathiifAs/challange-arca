@extends('template_admin.template')
@section('konten')
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">{{ $main_title }}</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="ti-layout-grid2-alt"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">{{ $main_title }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <div class="main-body">
            <form action="{{ route('admin.tentang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="page-wrapper">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tentang</h4>

                            <div class="col-md-12 mt-4">
                                <hr>
                            </div>
                            @include('template.notifikasi')
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nama Website</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ $data->name }}" required placeholder="Nama Website">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            name="alamat" value="{{ $data->address }}" required placeholder="Alamat Kantor">
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Tagline</label>
                                        <input type="text" class="form-control @error('tagline') is-invalid @enderror"
                                            required name="tagline" value="{{ $data->tagline }}" placeholder="Tagline">
                                        <input type="hidden" class="form-control" tagline="role" value="siswa">
                                        @error('tagline')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Kota</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text"
                                                    class="form-control @error('kota') is-invalid @enderror" name="kota"
                                                    value="{{ $data->city }}" id="input_pass" required placeholder="kota">
                                                @error('kota')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Deskripsi</label>
                                        <input type="text" class="form-control @error('desc') is-invalid @enderror"
                                            required name="desc" value="{{ $data->desc }}" placeholder="Deskripsi">
                                        <input type="hidden" class="form-control" desc="role" value="siswa">
                                        @error('desc')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Provinsi</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text"
                                                    class="form-control @error('provinsi') is-invalid @enderror"
                                                    name="provinsi" value="{{ $data->state }}" id="input_pass" required
                                                    placeholder="Provinsi">
                                                @error('provinsi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Tahun Pendirian</label>
                                        <input type="date" class="form-control @error('since') is-invalid @enderror"
                                            required name="since" value="{{ $data->since }}" placeholder="Tanggal">
                                        <input type="hidden" class="form-control" since="role" value="siswa">
                                        @error('since')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Logo Web <i>(*JPG, PNG, BMP, JIFF)</i></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="file"
                                                    class="form-control @error('logo_name') is-invalid @enderror"
                                                    name="logo_name" value="{{ old('logo_name') }}" id="input_pass" placeholder="logo_name">
                                                @error('logo_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Favicon <i>(*JPG, PNG, BMP, JIFF, ICO)</i></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="file"
                                                    class="form-control @error('favicon_name') is-invalid @enderror"
                                                    name="favicon_name" value="{{ old('favicon_name') }}" id="input_pass" placeholder="favicon_name">
                                                @error('favicon_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-3">
                                        <label>Latitude Lokasi Kantor </label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text"
                                                    class="form-control @error('latitude') is-invalid @enderror"
                                                    name="latitude" value="{{ $data->latitude }}" id="input_pass" required
                                                    placeholder="latitude">
                                                @error('logo_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Longitude Lokasi Kantor </label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text"
                                                    class="form-control @error('longitude') is-invalid @enderror"
                                                    name="longitude" value="{{ $data->longitude }}" id="input_pass" required
                                                    placeholder="longitude">
                                                @error('favicon_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mt-2">
                                        <label>Logo Website saat ini.</label>
                                        <div class="row">
                                            <img src="{{ URL($data->logo_path . $data->logo_name) }}" alt=""
                                                width="220px">

                                        </div>
                                    </div>

                                    <div class="col-lg-3 mt-2">
                                        <label>Favicon saat ini.</label>
                                        <div class="row">
                                            @if (empty($data->favicon_name))
                                                <div class="col-md-12">
                                                    <b>Icon Kosong !</b>
                                                </div>
                                            @else
                                                <img src="{{ URL($data->favicon_path . $data->favicon_name) }}" alt=""
                                                width="80px">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <h4 class="mt-5">Visi Misi</h4>

                                <hr>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Visi</label>
                                        <textarea name="visi" id="" cols="30" rows="10" class="form-control">{{ $data->visi }}</textarea>
                                        @error('visi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Misi</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea name="misi" id="" cols="30" rows="10" class="form-control">{{ $data->misi }}</textarea>
                                                @error('misi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-right mt-3">
                                <button class="btn waves-effect waves-light btn-inverse rounded" type="reset"> <i
                                        class="fa fa-times"></i>Reset</button>
                                <button class="btn waves-effect waves-light btn-success rounded" type="submit"><i
                                        class="fa fa-check"></i> Simpan</button>
                            </div>
            </form>
        </div>
    </div>

    @push('custom-scripts')
        <script>
            function generate() {
                var result = '';
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for (var i = 0; i < 5; i++) {
                    result += characters.charAt(Math.floor(Math.random() *
                        charactersLength));
                }
                console.log(result);
                $('#input_pass').val(result)
                // return result;
            }
        </script>
    @endpush
@endsection
