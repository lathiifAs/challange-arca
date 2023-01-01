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
                        <li class="breadcrumb-item"><a href="{{ route('master.portofolio') }}">Master</a>
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
            <form action="{{ route('master.portofolio.add') }}" method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="page-wrapper">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data</h4>
                            <div class="card-header-right">
                                <a href="{{ route('master.portofolio') }}"
                                    class="btn btn-outline-secondary text-center border-0 btn-sm"><span><i
                                            class="fa fa-arrow-left"></i> Kembali</span></a>
                            </div>
                            <div class="col-md-12 mt-4">
                                <hr>
                            </div>
                            @include('template.notifikasi')
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            name="tanggal" value="{{ old('tanggal') }}" required placeholder="tanggal">
                                        @error('tanggal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label>Layanan</label>
                                        <select class="form-control" required name="layanan_id">
                                            @forelse($data as $key=> $layanan)
                                                <option value="{{ $layanan->id }}">{{ $layanan->name }}</option>
                                            @empty
                                            <option value="">Data Kosong !</option>
                                            @endforelse
                                        </select>
                                        @error('tanggal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Gambar Cover <i>(*JPG, PNG, BMP, JIFF)</i></label>
                                        <input type="file"
                                            class="form-control @error('img_thumb_name') is-invalid @enderror"
                                            name="img_thumb_name" value="{{ old('img_thumb_name') }}" required
                                            placeholder="img_thumb_name">
                                        @error('img_thumb_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Judul</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required placeholder="Judul">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Gambar 1 <i>(*JPG, PNG, BMP, JIFF)</i></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="file"
                                                    class="form-control @error('img_porto_1_name') is-invalid @enderror"
                                                    name="img_porto_1_name" value="{{ old('img_porto_1_name') }}"
                                                    id="input_pass" required placeholder="img_porto_1_name">
                                                @error('img_porto_1_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Gambar 2 <i>(*JPG, PNG, BMP, JIFF)</i></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="file"
                                                    class="form-control @error('img_porto_2_name') is-invalid @enderror"
                                                    name="img_porto_2_name" value="{{ old('img_porto_2_name') }}"
                                                    id="input_pass" placeholder="img_porto_2_name">
                                                @error('img_porto_2_name')
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
                                        <textarea name="desc" name="desc" class="form-control" id="" cols="30" rows="5">{{ old('desc') }}</textarea>
                                        @error('desc')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Gambar 3 <i>(*JPG, PNG, BMP, JIFF)</i></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="file"
                                                    class="form-control @error('img_porto_3_name') is-invalid @enderror"
                                                    name="img_porto_3_name" value="{{ old('img_porto_3_name') }}"
                                                    id="input_pass" placeholder="img_porto_3_name">
                                                @error('img_porto_3_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Gambar 4 <i>(*JPG, PNG, BMP, JIFF)</i></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="file"
                                                    class="form-control @error('img_porto_4_name') is-invalid @enderror"
                                                    name="img_porto_4_name" value="{{ old('img_porto_4_name') }}"
                                                    id="input_pass" placeholder="img_porto_4_name">
                                                @error('img_porto_4_name')
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
    </div>
    </form>
    </div>
    </div>

    @push('custom-scripts')
    @endpush
@endsection
